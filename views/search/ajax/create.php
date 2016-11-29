<?php
if (isset($_POST['Completed']) && isset($_POST['description'])) {
   include_once('../views/search/ajax/lib.php');
 
  
    $Completed = $_POST['Completed'];
    $description = $_POST['description'];
 
    $object = new CRUD();
 
    $object->Create($Completed, $description);
}
?>