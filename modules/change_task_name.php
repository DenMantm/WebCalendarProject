<?php
//include db configuration file
include_once("../modules/db.php");

 	$task_id = $_POST["task_id"];
 	$new_name = $_POST["new_name"];
 	
 	$query = 'UPDATE Tasks SET name="' . $new_name . '" WHERE task_uid = "' . $task_id . '";';
 	$update = $db->prepare($query);
 	$update->execute();

?>