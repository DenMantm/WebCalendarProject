<?php
if (isset($_POST['id']) && isset($_POST['id']) != "") {
    include_once('../views/search/ajax/lib.php');
    $user_id = $_POST['id'];
 
    $object = new CRUD();
 
    echo $object->Details($user_id);
}
?>