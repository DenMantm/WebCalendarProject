<?php
//include db configuration file
include_once("../modules/db.php");

 	$task_id = $_POST["task_id"];
 	$details = nl2br(htmlentities($_POST["new_details"], ENT_QUOTES, 'UTF-8'));
 	
 	$query = 'UPDATE Tasks SET details="' . $details . '" WHERE task_uid = "' . $task_id . '";';
 	$update = $db->prepare($query);
 	$update->execute();

?>