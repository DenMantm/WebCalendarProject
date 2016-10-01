
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
        echo View::instance()->render('views/authorised_zone.php');
    }
);

$f3->route('GET /logout',
    function() {
        
    // We remove the user's data from the session 
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



//kicking off server
$f3->run();
?> 