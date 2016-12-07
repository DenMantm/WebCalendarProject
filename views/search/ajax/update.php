<?php
if (isset($_POST)) {
    include_once('../views/search/ajax/lib.php');
 
    $id = $_POST['id'];
   
    $subject = $_POST['subject'];
    
    $start = $_POST['start'];
    
    $end = $_POST['end'];
    $description = $_POST['description'];
 
    $object = new CRUD();
 
    $object->Update($subject,$start,$end, $description,$id);
}