
<?php
// Kickstart the framework
$f3=require('lib/base.php');


//setting up basic rooting
$f3->route('GET /',
    function() {
        echo View::instance()->render('views/temp_index.html');
    }
);
$f3->route('GET /about',
    function() {
        echo "about";
    }
);

$f3->route('POST /login_ajax',
    function() {
        require("login_ajax.php"); 
    }
);


$f3->route('POST /register_ajax',
    function() {
        require("register_ajax.php"); 
    }
);



//kicking off server
$f3->run();
?> 