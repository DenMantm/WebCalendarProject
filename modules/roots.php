
<?php
// Kickstart the framework
$f3=require('lib/base.php');
//$f3->set('CACHE','memcache=localhost');



//this here is sending e-mail module
require('send_email.php');


//setting up basic rooting

$f3->route('GET /',
    function($f3) {
                        session_start();
                if($_SESSION['logged'] == true ) {
                    $f3->reroute('/main');
                }
                else{
                    echo View::instance()->render('views/index_page.php');
                }

    }
);

$f3->route('GET /arezki',
    function() {
        echo View::instance()->render('views/arezki.php');
    }
);
//$f3->get('var')

$f3->route('GET /main',
    function() {
        isUserLogged();
        echo View::instance()->render('views/main.php');
    }
);

$f3->route('GET /authorised_zone',
    function() {
        
        isUserLogged();
        
        echo View::instance()->render('views/authorised_zone.php');
    }
);

$f3->route('GET /logout',
    function() {
    // We remove the user's data from the session
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['logged']);
     
    // We redirect them to the login page 
    header("Location: /"); 
    die("Redirecting to: /");
    }
);

$f3->route('POST /login_ajax',
    function() {
        require("registration/login_ajax.php"); 
    }
);
$f3->route('POST /addtask',
    function() {
        require("response.php"); 
    }
);

$f3->route('POST /register_ajax',
    function() {
        
        require("registration/register_ajax.php"); 
    }
);

$f3->route('POST /email_retrieve_password',
    function() {
        
        require("registration/retrieve_password.php"); 
    }
);

$f3->route('POST /addNewTask',
    function() {
        require("response.php");
       
       
    }
);




$f3->route('GET /retrieve_password/@arg1/@arg2',

    function($f3,$params) {
        
    $link =  $params['arg1'];
    $name =  $params['arg2'];
        
        retrieve_password($name,$link);
        
    }
);

$f3->route('POST /create_new_password',
    function() {
        
               session_start();
               $user =  $_SESSION['recover_user'];
               $link =  $_SESSION['recover_link'];
        
       $newPassword =  $_POST['new_password'];
       
       
        
        change_password($user,$link,$newPassword);
        
        
    }
);



$f3->route('GET /arezki1',
    function() {
        echo View::instance()->render('views/arezki1.php');
    }
);





$f3->route('GET /verify_email/@arg1/@arg2',

    function($f3,$params) {
        
    $link =  $params['arg1'];
    $name =  $params['arg2'];

        emailVerification($link, $name);
  
    }
);


//SECTION FOR REUSABLE FUNCTIONS

//Creating function to check if user is logged in to session
function isUserLogged(){
    
                session_start();
                if($_SESSION['logged'] != true ) {
                // If they are not, we redirect them to the login page. 
                header("Location: /"); 
                // Remember that this die statement is absolutely critical.  Without it, 
                // people can view your members-only content without logging in. 
                die("Redirecting to /");
                return false;
            } 
            else{return true;}
}

// This function queries database and gets row for user with encripted password link,
// if it doesnt get row in the querry it is asumed that query parametres ar wrong

function retrieve_password($user,$link){
    
       //connection to database
require("db.php"); 
     if($link!="") 
    { 
        // This query retreives the user's information from the database using 
        // their username. 
        $query = "SELECT id, username, email_verified, password, salt, email FROM user 
                  WHERE email = :email and password = :link;"; 
         
        // The parameter values 
        $query_params = array( 
            ':email' => $user,
            ':link' => $link
        ); 
         
        try { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         $row = $stmt->fetch(); 
         
        
        if($row) { 
                session_start();
                $_SESSION['recover_user'] = $user;
                $_SESSION['recover_link'] = $link;
            
            echo View::instance()->render('views/verification/recover_password.html');
        }
        else { 
            echo View::instance()->render('views/verification/information_verification_failed.html');
            } 
    } 
    
    
    
}

function change_password($user,$link,$newPassword){
    
       
       //connection to database
require("db.php"); 
     if($link!="") 
    { 
        // This query retreives the user's information from the database using 
        // their username. 
        $query = "SELECT id, username, email_verified, password, salt, email FROM user 
                  WHERE email = :email and password = :link;"; 
         
        // The parameter values 
        $query_params = array( 
            ':email' => $user,
            ':link' => $link
        ); 
         
        try { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         $row = $stmt->fetch(); 
         
        
        if($row) { 
            
             $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
            $password = hash('sha256', $newPassword . $salt); 
            
            for($round = 0; $round < 65536; $round++) { 
            $password = hash('sha256', $password . $salt); 
        } 
            
              $query = "UPDATE user SET password = :password, salt = :salt where email = :email;";
                     $query_params = array( 
                         ':email' => $user,
                         ':password' => $password,
                         ':salt' => $salt
                 ); 
                    try { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
            
            
            echo View::instance()->render('views/verification/password_changed.html');
        }
        else { 
            echo View::instance()->render('views/verification/information_verification_failed.html');
            } 
    } 
    else{
        
        echo View::instance()->render('views/verification/information_verification_failed.html');
    }
    
    
    
    
}



function emailVerification($link,$user){

    //connection to database
require("db.php"); 
     if($link!="") 
    { 
        // This query retreives the user's information from the database using 
        // their username. 
        $query = "SELECT id, username, email_verified, password, salt, email FROM user 
                  WHERE email = :email and password = :link;"; 
         
        // The parameter values 
        $query_params = array( 
            ':email' => $user,
            ':link' => $link
        ); 
         
        try { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         $row = $stmt->fetch(); 
         
         if($row['email_verified'] == 1){
             
             echo View::instance()->render('views/verification/information_already_verified_email.html');
             return;
             
         }
        
        if($row) { 
                 $query = "UPDATE user SET email_verified = 1 where email = :email;";
                     $query_params = array( 
                         ':email' => $user
                 ); 
            
                    try { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
            echo View::instance()->render('views/verification/information_verified_email.html');
        }
        else { 
            echo View::instance()->render('views/verification/information_verification_failed.html');
            } 
    } 
    
    
}

//kicking off server
$f3->run();
?> 