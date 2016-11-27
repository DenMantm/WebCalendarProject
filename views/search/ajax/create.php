<?php
if (isset($_POST['location']) && isset($_POST['subject']) && isset($_POST['title'])) {
   include_once('../views/search/ajax/lib.php');
 
    $location = $_POST['location'];
    $subject = $_POST['subject'];
    $title = $_POST['title'];
 
    $object = new CRUD();
 
    $object->Create($location, $subject, $title);
}
?>