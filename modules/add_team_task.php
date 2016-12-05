<?php
//include db configuration file
include_once("../modules/db.php");

// PREPARE VARIABLES
    $task_uid = uniqid('t_');
 	$name = $_POST["name"];
 	$teams = $_POST["team"];
 	$details = nl2br(htmlentities($_POST["details"], ENT_QUOTES, 'UTF-8'));
 	$to = $_POST["to"];
 	$completed_by = $_POST["completed"];
 	$meID = $_SESSION['user']['uID'];
 	

 	$date_to = DateTime::createFromFormat('m/d/Y g:i A', $to);
    $date_to_str = $date_to->format('Y-m-d');

 	//LOOP THROUGH EVERY TEAM ID ADDED TO TASK
 	foreach ($teams as $team)
 	{
 	    //GETTING EVERY USER ID OF CURRENT TEAM
 	    $getUsers = $db->prepare("SELECT userUID FROM Teams WHERE teamID = '" . $team . "';");
 	    $getUsers->execute();
 	    $getUsers->bindColumn(1,$userID);
 	    
 	    //INSERTING EVERY USER CONNECTED WITH TASK TO TASK_COMPLETION TABLE 
 	    if( $getUsers->rowCount() > 0) {
 	        while ($row = $getUsers ->fetch(PDO::FETCH_BOUND)) {
 	            $insertToTaskCompletion = $db->prepare("INSERT INTO Task_completion (task_uid, user_uid, completed)
 	                                                        VALUES (:task_uid,:user_uid,0);");
 	                                                        
 	            $insertToTaskCompletion->bindParam(':task_uid',$task_uid, PDO::PARAM_STR );
 	            $insertToTaskCompletion->bindParam(':user_uid',$userID, PDO::PARAM_STR );
 	            $insertToTaskCompletion->execute();
 	        }
 	    }
 	    
 	    //INSERTING TEAMS INTO PARTICIPANTS TABLE FOR LATER DISPLAYING IT ON CALENDAR
 	    $addTeamsToParticipants = $db->prepare("INSERT INTO Participants_t (taskID, participantID) 
 	                                                VALUES (:taskID, :participantID);");
 	    
 	    $addTeamsToParticipants->bindParam(':taskID',$task_uid, PDO::PARAM_STR );
 	    $addTeamsToParticipants->bindParam(':participantID',$team, PDO::PARAM_STR );
 	    $addTeamsToParticipants->execute();
 	}
 	
 	//INSERTING TASK DETAILS TO TASK TABLE
 	$insertTask = $db->prepare("INSERT INTO Tasks (task_uid, owner_id, name, details, type, completed, completed_by, end) 
 	                                    VALUES (:task_uid, :owner_id, :name, :details, 'tt', 0, :completed_by, :end);");
 	                                    
    $insertTask->bindParam(':task_uid',$task_uid, PDO::PARAM_STR );
    $insertTask->bindParam(':owner_id',$meID, PDO::PARAM_STR );
    $insertTask->bindParam(':name',$name, PDO::PARAM_STR );
    $insertTask->bindParam(':details',$details, PDO::PARAM_STR );
    $insertTask->bindParam(':completed_by',$completed_by, PDO::PARAM_STR );
    $insertTask->bindParam(':end',$date_to_str, PDO::PARAM_STR );
 	$insertTask->execute();
 	
?>