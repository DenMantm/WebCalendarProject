<?php
if (isset($_POST)) {
    require 'lib.php';
 
    $id = $_POST['id'];
    $first_name = $_POST['location'];
    $last_name = $_POST['subject'];
    $email = $_POST['title'];
 
    $object = new CRUD();
 
    $object->Update($first_name, $last_name, $email, $id);
}