<?php
//include db configuration file
include_once("../modules/db.php");

// if(isset($_SESSION['currentTeam'])) 
// {	

	$team = filter_var($_SESSION["currentTeam"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
 	$userID = filter_var($_SESSION["currentUser"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
 	$currentrole = filter_var($_SESSION["currentrole"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    if ($currentrole == "user") {
        $role = "editor";
    }   else {
        $role = "user";
    }
        
	$delete_row = $db->prepare("UPDATE Teams SET role = :var3 WHERE userUID = :var1 and teamID = :var2;");
    
     try{
     
        $delete_row->bindParam(':var1', $userID, PDO::PARAM_STR );
        $delete_row->bindParam(':var2', $team, PDO::PARAM_STR );
        $delete_row->bindParam(':var3', $role, PDO::PARAM_STR );
        $delete_row->execute();
    }
     
  catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	

        echo('User role been changed');

?>