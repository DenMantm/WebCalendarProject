<?php
if (isset($_POST)) {
    include_once('../views/search/ajax/lib.php');
 
    $id = $_POST['id'];
   
    $Completed = $_POST['Completed'];
    $description = $_POST['description'];
 
    $object = new CRUD();
 
    $object->Update($Completed , $description, $id);
}