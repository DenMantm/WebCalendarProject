<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_SESSION['currentTeam'])) 
{	
	$contentToDelete = filter_var($_SESSION["currentTeam"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	$insert_row = $db->prepare("DELETE FROM Teams WHERE username = :var1 and teamID = :var2;");
    
    try{
        $uid = uniqid();
        $insert_row->bindParam(':var1', $_SESSION['user']['username'], PDO::PARAM_STR );
        $insert_row->bindParam(':var2', $contentToDelete, PDO::PARAM_STR );
        $insert_row->execute();
    }
     
  catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	

        echo('<script type="text/javascript">location.href = "/team";</script>');

}
?>