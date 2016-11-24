<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_POST['email'])) 
{	
	$email = filter_var($_POST["email"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$role = filter_var($_POST["role"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
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
          
         	$insert_row = $db->prepare("INSERT INTO Teams (userID,teamName,teamID,role,confirm) VALUES (:var1,:var2,:var3,:var4,0)");
            
            try{
                $insert_row->bindParam(':var1', $userName, PDO::PARAM_STR );
                $insert_row->bindParam(':var2', $teamName, PDO::PARAM_STR );
                $insert_row->bindParam(':var3', $teamID, PDO::PARAM_STR );
                $insert_row->bindParam(':var4', $role, PDO::PARAM_STR );
                $insert_row->execute();
                echo('<div>Invite to</div>
                       <div><h4> ' . $teamName . '</h4></div>
                       <div>has been set to user: </div>
                       <div><h4> ' . $userName . '</h4></div>');
            } catch(PDOException $e) {
        		echo "Error: " . $e->getMessage();
         	}
	    }
       }
	} else {
	    while ($row2 = $pullTeamName -> fetch(PDO::FETCH_BOUND)){
		
		      
		      $insert_row2 = $db->prepare("INSERT INTO Teams (userID,teamName,teamID,role,confirm) VALUES (:var1,:var2,:var3,:var4,2)");
		       try{
                $insert_row2->bindParam(':var1', $email, PDO::PARAM_STR );
                $insert_row2->bindParam(':var2', $teamName, PDO::PARAM_STR );
                $insert_row2->bindParam(':var3', $teamID, PDO::PARAM_STR );
                $insert_row2->bindParam(':var4', $role, PDO::PARAM_STR );
                $insert_row2->execute();
                echo('<p>
        		        <div>User with email </div>
        		        <div><h4> ' . $email . '</h4></div>
        		        <div> was not found in our system.</div>
        		      </p>
        		      <p>
        		        <div>We have send an email with invitation to join our application to the email above.</div>
        		        <div>Once the user sign up to our serveice your invitation to </div>
        		        <div><h4> ' . $teamName . '</h4></div>
        		        <div>will be awaiting for him.</div>
        		      </p>');
            } catch(PDOException $e) {
        		echo "Error: " . $e->getMessage();
         	}
		      
	    }
	}
	
}
?>