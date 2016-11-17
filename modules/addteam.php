<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_POST['team_name'])) 
{	
	$contentToSave = filter_var($_POST["team_name"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	$insert_row = $db->prepare("INSERT INTO Teams (userID,teamName,teamID,role,confirm) 
    VALUES (:var1,:var2,:var3,'editor',1)");
    
    try{
        $uid = uniqid();
        $insert_row->bindParam(':var1', $_SESSION['user']['username'], PDO::PARAM_STR );
        $insert_row->bindParam(':var2', $contentToSave, PDO::PARAM_STR );
        $insert_row->bindParam(':var3', $uid, PDO::PARAM_STR );
    $insert_row->execute();
    }
     
  catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	
	if($insert_row)
	{
	    echo('<script type="text/javascript">location.href = "/team";</script>');
        
	} else {
		header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
		exit();
	}
	
}
?>