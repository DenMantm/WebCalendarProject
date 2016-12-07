<?php
if (isset($_POST)) {
    include_once('../views/search/ajax/lib.php');
 
    $id = $_POST['id'];
   
    $subject = $_POST['subject'];
      $location = $_POST['location'];
    
    $start = $_POST['start'];
    
    $end = $_POST['end'];
    $description = $_POST['description'];
 
    $object = new CRUD();
 
    $object->Update($subject,$location,$start,$end, $description,$id);
}