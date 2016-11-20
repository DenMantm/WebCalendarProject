<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_POST['email'])) 
{	
	$email = filter_var($_POST["email"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$teamID = filter_var($_SESSION["currentTeam"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	$check = $db->prepare("SELECT username FROM Users WHERE email = :var1");
    
    try{
        $check->bindParam(':var1', $email, PDO::PARAM_STR );
        $check->execute();
        $check->bindColumn(1,$userName);
    }
     
    catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	
	
 	 $pullTeamName = $db->prepare("SELECT DISTINCT teamName FROM Teams WHERE teamID = :var31");
	 
    try{
      $pullTeamName->bindParam(':var31', $teamID, PDO::PARAM_STR );
        $pullTeamName->execute();
        $pullTeamName->bindColumn(1,$teamName);
     } catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
 	}
	
	if($check->rowCount() > 0) 
    {
        while ($row = $check ->fetch(PDO::FETCH_BOUND)) {
	    
      while ($row2 = $pullTeamName -> fetch(PDO::FETCH_BOUND)){
          
         	$insert_row = $db->prepare("INSERT INTO Teams (userID,teamName,teamID,role,confirm) VALUES (:var1,:var2,:var3,'user',0)");
            
            try{
                $insert_row->bindParam(':var1', $userName, PDO::PARAM_STR );
                $insert_row->bindParam(':var2', $teamName, PDO::PARAM_STR );
                $insert_row->bindParam(':var3', $teamID, PDO::PARAM_STR );
                $insert_row->execute();
                echo('Invite to ' . $teamName . ' has been set to user: ' . $userName);
            } catch(PDOException $e) {
        		echo "Error: " . $e->getMessage();
         	}
         
         
          
	    }
       }
	} else {
		echo('User with email ' . $email . ' not found, an invitation has been sent to email.');
	}
	
}
?>
