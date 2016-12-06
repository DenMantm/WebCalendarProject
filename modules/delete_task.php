<?php
//include db configuration file
include_once("../modules/db.php");

 	$task_id = $_POST["task_id"];
 	$details = nl2br(htmlentities($_POST["new_details"], ENT_QUOTES, 'UTF-8'));
 	
 	$query = 'DELETE FROM Participants_t WHERE taskID = "' . $task_id . '"; ';
 	$update = $db->prepare($query);
 	$update->execute();
 	
 	$query2 = 'DELETE FROM Task_completion WHERE task_uid = "' . $task_id . '"; ';
 	$update2 = $db->prepare($query2);
 	$update2->execute();
 	
 	$query3 = 'DELETE FROM Tasks WHERE task_uid = "' . $task_id . '"; ';
 	$update3 = $db->prepare($query3);
 	$update3->execute();

?>