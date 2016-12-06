<?php
//include db configuration file
include_once("../modules/db.php");

// Update Task_completion
 	$task_id = $_POST["task_id"];
 	$me = $_SESSION['user']['uID'];

 	$query = 'update Task_completion
                set completed = 1
                where task_uid = "' . $task_id . '"
                and user_uid = "' . $me . '";';
 	$update = $db->prepare($query);
 	$update->execute();
 
?>