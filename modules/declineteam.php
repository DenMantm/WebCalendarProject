<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_SESSION['currentTeam'])) 
{	
	$teamID = filter_var($_SESSION["currentTeam"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	$insert_row = $db->prepare("UPDATE Teams SET confirm=3 WHERE userUID = :var1 and teamID = :var2;");
    
    try{
        $uid = uniqid();
        $insert_row->bindParam(':var1', $_SESSION['user']['uID'], PDO::PARAM_STR );
        $insert_row->bindParam(':var2', $teamID, PDO::PARAM_STR );
        $insert_row->execute();
    }
     
  catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	

        echo('<script type="text/javascript">location.href = "/team";</script>');

}
?>