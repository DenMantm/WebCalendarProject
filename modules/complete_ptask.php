<?php
//include db configuration file
include_once("../modules/db.php");

// Update Task_completion
 	$task_id = $_POST["task_id"];


 	$query = 'update Tasks
                set completed = 1
                where task_uid = "' . $task_id . '";';
 	$update = $db->prepare($query);
 	$update->execute();
 
?>