<?php
if (isset($_POST)) {
    include_once('../views/Settings/ajax/libsettings.php');
 
    
      $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        // This hashes the password with the salt so that it can be stored securely 
        // in the database. 
        $password = hash('sha256', $_POST['Password'] . $salt); 
         
       
        for($round = 0; $round < 65536; $round++) { 
            $password = hash('sha256', $password . $salt); 
        } 
       
    $Salt=$salt;   
    $Password=$password;
    $Email = $_POST['Email'];
    $Username = $_POST['Username'];
    $object = new CRUD();
 
    $object->Update( $Email,$Username,$Password,$Salt);
}