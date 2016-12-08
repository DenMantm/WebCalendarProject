<?php
//include db configuration file
include_once("../modules/db.php");

// PREPARE VARIABLES
    $task_uid = uniqid('pt_');
 	$name = $_POST["name"];
 	$details = nl2br(htmlentities($_POST["details"], ENT_QUOTES, 'UTF-8'));
 	$to = $_POST["to"];
 	$meID = $_SESSION['user']['uID'];
 	

 	$date_to = DateTime::createFromFormat('d/m/Y', $to);
    $date_to_str = $date_to->format('Y-m-d');
 	    
 	    //INSERTING user INTO PARTICIPANTS TABLE FOR LATER DISPLAYING IT ON CALENDAR
 	    $addTeamsToParticipants = $db->prepare("INSERT INTO Participants_t (taskID, participantID) 
 	                                                VALUES (:taskID, :participantID);");
 	    
 	    $addTeamsToParticipants->bindParam(':taskID',$task_uid, PDO::PARAM_STR );
 	    $addTeamsToParticipants->bindParam(':participantID',$meID, PDO::PARAM_STR );
 	    $addTeamsToParticipants->execute();
 	
 	
 	//INSERTING TASK DETAILS TO TASK TABLE
 	$insertTask = $db->prepare("INSERT INTO Tasks (task_uid, owner_id, name, details, type, completed, completed_by, end) 
 	                                    VALUES (:task_uid, :owner_id, :name, :details, 'pt', 0, :completed_by, :end);");
 	                                    
    $insertTask->bindParam(':task_uid',$task_uid, PDO::PARAM_STR );
    $insertTask->bindParam(':owner_id',$meID, PDO::PARAM_STR );
    $insertTask->bindParam(':name',$name, PDO::PARAM_STR );
    $insertTask->bindParam(':details',$details, PDO::PARAM_STR );
    $insertTask->bindParam(':completed_by',$completed_by, PDO::PARAM_STR );
    $insertTask->bindParam(':end',$date_to_str, PDO::PARAM_STR );
 	$insertTask->execute();
 	
?>