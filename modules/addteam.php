<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_POST['team_name'])) 
{	
	$contentToSave = filter_var($_POST["team_name"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	$insert_row = $db->prepare("INSERT INTO Teams (userName,teamName,teamID,role,confirm,userUID) 
    VALUES (:var1,:var2,:var3,'editor',1,:var4)");
    
    try{
        $uid = uniqid();
        $insert_row->bindParam(':var1', $_SESSION['user']['username'], PDO::PARAM_STR );
        $insert_row->bindParam(':var2', $contentToSave, PDO::PARAM_STR );
        $insert_row->bindParam(':var3', $uid, PDO::PARAM_STR );
        $insert_row->bindParam(':var4', $_SESSION['user']['uID'], PDO::PARAM_STR );
    $insert_row->execute();
    }
     
  catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	
	if($insert_row)
	{
	    echo($_SESSION['user']['uID']);
        
	} else {
		header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
		exit();
	}
	
}
?>