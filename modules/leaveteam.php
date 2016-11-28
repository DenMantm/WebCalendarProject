<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_SESSION['currentTeam'])) 
    {	
        $teamid = filter_var($_SESSION["currentTeam"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
        
        // CHECK THE NUMBER OF EDITORS
        
        $check1 = $db->prepare("SELECT * FROM Teams WHERE  teamID = :var1 and role = 'editor';");
        $check1->bindParam(':var1', $teamid, PDO::PARAM_STR );
        $check1->execute();
        $coutEditors = $check1->rowCount();
        
        // CHECK IF THE USER IS EDITOR
        
        $check2 = $db->prepare("SELECT * FROM Teams WHERE  userUID = :var1 and teamID = :var2 and role = 'editor';");
        $check2->bindParam(':var1', $_SESSION['user']['uID'], PDO::PARAM_STR );
        $check2->bindParam(':var2', $teamid, PDO::PARAM_STR );
        $check2->execute();
        $isEditor = $check2->rowCount();
        echo('<script type="text/javascript">alert(' .  $isEditor  .  ' ------ ' . $coutEditors . ');</script>');
    if (($coutEditors == 1) && ($isEditor == 1)){
        echo('NO');
    }   
    else 
    {
        $insert_row = $db->prepare("DELETE FROM Teams WHERE userUID = :var1 and teamID = :var2;");
        
        try{
            $uid = uniqid();
            $insert_row->bindParam(':var1', $_SESSION['user']['uID'], PDO::PARAM_STR );
            $insert_row->bindParam(':var2', $teamid, PDO::PARAM_STR );
            $insert_row->execute();
        }
         
        catch(PDOException $e)
    	{
    		echo "Error: " . $e->getMessage();
    	}
    }
    
    //echo('<script type="text/javascript">location.href = "/team";</script>');
}
?>