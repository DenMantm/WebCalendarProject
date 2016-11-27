<?php
if (isset($_POST)) {
    include_once('../views/search/ajax/lib.php');
 
    $id = $_POST['id'];
    $location  = $_POST['location'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
 
    $object = new CRUD();
 
    $object->Update($location , $subject , $description, $id);
}