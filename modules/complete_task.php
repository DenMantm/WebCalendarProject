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
 	
// Check what is the completion rule 	
 	
 	$query2 = 'select completed_by
                from Tasks
                where task_uid = "' . $task_id . '";';
 	$update2 = $db->prepare($query2);
 	$update2->execute();
 	$update2->bindColumn(1,$status);
 	$update2->fetch(PDO::FETCH_BOUND);

// Check number of not completed
 	
 	$query3 = 'select count(*)
                from Task_completion tc
                where tc.task_uid = "' . $task_id . '"
                and tc.completed = 0;';
 	$update3 = $db->prepare($query3);
 	$update3->execute();
 	$update3->bindColumn(1,$count);
 	$update3->fetch(PDO::FETCH_BOUND);
 	
     	if(($count==0 && $status == 'everyone') || ($status == 'single')) {
 	    $query4 = 'update Tasks
                set completed = 1
                where task_uid = "' . $task_id . '";';
      	$update4 = $db->prepare($query4);
      	$update4->execute();
 	}
?>