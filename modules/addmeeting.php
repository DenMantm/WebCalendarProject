<?php
//include db configuration file
include_once("../modules/db.php");

 if(isset($_POST['subject'])) 
 {	
    $meeting_uid = uniqid('m_');
 	$subject = $_POST["subject"];
 	$participants = $_POST["participants"];
 	$title = $_POST["title"];
 	$location = $_POST["location"];
 	$description = nl2br(htmlentities($_POST["details"], ENT_QUOTES, 'UTF-8'));
 	$from = $_POST["from"];
 	$to = $_POST["to"];
 	
 	$date_from = DateTime::createFromFormat('m/d/Y g:i A', $from);
    $date_from_str = $date_from->format('Y-m-d H:i:s');
    
 	$date_to = DateTime::createFromFormat('m/d/Y g:i A', $to);
    $date_to_str = $date_to->format('Y-m-d H:i:s');
 	$result=$date_to->format('Y-m-d H:i:s');
 	
 	// INSERT CREATOR TO PARTICIPANTS
 	
 	$insert_row0 = $db->prepare("INSERT INTO Participants (meetingID,participantID,accepted) 
 	                                    VALUES (:var1,:var2,1)");
 	                                    
 	    try{
 	        $insert_row0->bindParam(':var1',$meeting_uid, PDO::PARAM_STR );
 	        $insert_row0->bindParam(':var2',$_SESSION['user']['uID'], PDO::PARAM_STR );
 	        $insert_row0->execute();
 	    }
 	    catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
 	
 	foreach ($participants as $user_uid)
 	{
 	    $insert_row = $db->prepare("INSERT INTO Participants (meetingID,participantID,accepted) 
 	                                    VALUES (:var1,:var2,0)");
 	                                    
 	    try{
 	        $insert_row->bindParam(':var1',$meeting_uid, PDO::PARAM_STR );
 	        $insert_row->bindParam(':var2',$user_uid, PDO::PARAM_STR );
 	        $insert_row->execute();
 	    }
 	    catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
 	}
 	$query = "INSERT INTO 
 	                Meetings    (
 	                    meetingID,
 	                    subject,
 	                    location,
 	                    description,
 	                    start,
 	                    end,
 	                    type) 
 	                VALUES (
 	                    '" . $meeting_uid . "',
 	                    '" . $subject . "',
 	                    '" . $location . "',
 	                    '" . $description . "',
 	                    '" . $date_from_str . "',
 	                    '" . $date_to_str . "',
 	                    'm');";
 	                    
 	$insert_row2 = $db->prepare($query);
 	                                    
    try{
 	   
 	        $insert_row2->execute();
 	    }
 	    catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
 	
 	echo($description);
	
 }
?>