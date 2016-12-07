<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_SESSION['currentTeam'])) 
{	
	$team = filter_var($_SESSION["currentTeam"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	$insert_row = $db->prepare("UPDATE Teams SET confirm=1 WHERE userUID = :var1 and teamID = :var2;");
    
    try{
        $uid = uniqid();
        $insert_row->bindParam(':var1', $_SESSION['user']['uID'], PDO::PARAM_STR );
        $insert_row->bindParam(':var2', $team, PDO::PARAM_STR );
        $insert_row->execute();
    }
     
  catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	
	
    $query = "select taskID
                    from Participants_t
                    where participantID = '". $team ."';";
                    
        $getteams = $db->prepare($query);
        $getteams->execute();
        $getteams->bindColumn(1,$task);
        
        while ($getteams -> fetch(PDO::FETCH_BOUND)){
            $query2 = "insert into Task_completion (task_uid, user_uid, completed) values (:var1,:var2,0);";
            $insertCompletions = $db->prepare($query2);
            $insertCompletions->bindParam(':var1', $task, PDO::PARAM_STR );
            $insertCompletions->bindParam(':var2', $_SESSION['user']['uID'] , PDO::PARAM_STR );
            $insertCompletions->execute();
            
            $_POST["task_id"] = $task;
 	        include('../modules/check_if_completed.php');
        }

        echo('<script type="text/javascript">location.href = "/team";</script>');

}
?>