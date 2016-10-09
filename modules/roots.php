
<?php
// Kickstart the framework
$f3=require('lib/base.php');
//$f3->set('CACHE','memcache=localhost');

//connection to database

require("db.php"); 

//setting up basic rooting

$f3->route('GET /',
    function() {
        echo View::instance()->render('views/index_page.php');
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

$f3->route('POST /register_ajax',
    function() {
        
        require("registration/register_ajax.php"); 
    }
);

$f3->route('GET /verify_email/@link',
    function($f3,$params) {
        //getting parametres from get query:
        $link = $params['link'];
        echo $link;
        //$link = $params['link'];
       // $formatted = explode('!', $link);
        $result = array();
        preg_match('!', $link, $result);

        echo $result[0]+" "+$result[1];
        
       // emailVerification($link, $name);
        
        //echo View::instance()->render('views/authorised_zone.php');
        
        
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

function sendEmail(){
    
    $url = 'https://api.sendgrid.com/';
$user = 'CalendarApplication';
$pass = 'calendarapplication123';

$json_string = array(

  'to' => array(
    'denmantm@inbox.lv', 'example2@sendgrid.com'
  ),
  'category' => 'test_category'
);


$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'x-smtpapi' => json_encode($json_string),
    'to'        => 'denmantm@inbox.lv',
    'subject'   => 'testing from curl',
    'html'      => 'testing body',
    'text'      => 'testing body',
    'from'      => 'CalendarApplication@sendgrid.com',
  );


$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
print_r($response);
    
}

function emailVerification($link,$user){
    
    
     if($link!="") 
    { 
        // This query retreives the user's information from the database using 
        // their username. 
        $query = "SELECT id, username, password, salt, email FROM user 
                  WHERE username = :username and password = :link;"; 
         
        // The parameter values 
        $query_params = array( 
            ':username' => $user,
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
         
        // This variable tells us whether the user has successfully logged in or not. 
        // We initialize it to false, assuming they have not.
        $login_ok = false;
         
        // Retrieve the user data from the database.  If $row is false, then the username 
        // they entered is not registered. 
        $row = $stmt->fetch(); 
        if($row) 
        { 
            echo "verified";
        }
        else { 
            echo "failed";
            } 
    } 
    
    
}

//kicking off server
$f3->run();
?> 