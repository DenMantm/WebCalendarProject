<?php
//include db configuration file
include_once("../modules/db.php");

// Update Task_completion

 	$me = $_SESSION['user']['uID'];
    $team = $_POST['team_id'];
    
    
// Check what is the completion rule 	
 	
 	$query2 = 'select taskID from Participants_t where participantID ="' . $team . '";';
  	$update2 = $db->prepare($query2);
  	$update2->execute();
 	$update2->bindColumn(1,$task);
 	while($update2->fetch(PDO::FETCH_BOUND)) 
 	{
 	    $_POST["task_id"] = $task;
 	   include('../modules/check_if_completed.php');
 	}
?>