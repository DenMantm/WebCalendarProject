<?php
if (isset($_POST['location']) && isset($_POST['subject']) && isset($_POST['description'])) {
   include_once('../views/search/ajax/lib.php');
 
    $location = $_POST['location'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
 
    $object = new CRUD();
 
    $object->Create($location, $subject, $description);
}
?>