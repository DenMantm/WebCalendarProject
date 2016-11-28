<?php
if (isset($_POST)) {
    include_once('../views/Settings/ajax/libsettings.php');
 
    
   
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $Username = $_POST['Username'];
 echo $Username;
    $object = new CRUD();
 
    $object->Update( $Email,$Username,$password);
}