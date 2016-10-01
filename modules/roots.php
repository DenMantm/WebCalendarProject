
<?php
// Kickstart the framework
$f3=require('lib/base.php');


//setting up basic rooting
$f3->route('GET /',
    function() {
        echo View::instance()->render('views/temp_index.html');
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
            } 
}




//kicking off server
$f3->run();
?> 