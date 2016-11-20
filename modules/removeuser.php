<?php
//include db configuration file
include_once("../modules/db.php");

// if(isset($_SESSION['currentTeam'])) 
// {	
    echo("currentteam OK");
	$team = filter_var($_SESSION["currentTeam"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
 	$user = filter_var($_SESSION["currentUser"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
        echo("currentteam " . $team);
        echo("currenuser " . $user);

	$delete_row = $db->prepare("DELETE FROM Teams WHERE userID = :var1 and teamID = :var2;");
    
     try{
     
        $delete_row->bindParam(':var1', $user, PDO::PARAM_STR );
        $delete_row->bindParam(':var2', $team, PDO::PARAM_STR );
        $delete_row->execute();
    }
     
  catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	

        echo('User has been removed');

?>