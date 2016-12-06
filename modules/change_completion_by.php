<?php
//include db configuration file
include_once("../modules/db.php");

 	$task_id = $_POST["task_id"];
 	$status = $_POST["state"];
 	
 	$query = 'UPDATE Tasks SET completed_by="' . $status . '" WHERE task_uid = "' . $task_id . '";';
 	$update = $db->prepare($query);
 	$update->execute();

?>