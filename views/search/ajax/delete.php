<?php
if (isset($_POST['id']) && isset($_POST['id']) != "") {
   include_once('../views/search/ajax/lib.php');
    $user_id = $_POST['id'];
 echo " helo";
    $object = new CRUD();
    $object->Delete($user_id);
}
?>