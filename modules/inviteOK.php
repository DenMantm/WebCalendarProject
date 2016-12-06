<?php
//include db configuration file
include_once("../modules/db.php");
$uID = $_POST["email"]; 
$role = filter_var($_POST["role"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
$teamID = filter_var($_SESSION["currentTeam"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

$pullTeamName = $db->prepare("SELECT DISTINCT teamName FROM Teams WHERE teamID = :var31");
	 
try
{
    $pullTeamName->bindParam(':var31', $teamID, PDO::PARAM_STR );
    $pullTeamName->execute();
    $pullTeamName->bindColumn(1,$teamName);
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
	
while ($pullTeamName -> fetch(PDO::FETCH_BOUND)){
       
    foreach ($uID as $user_uid)
    {
        $insert_row = $db->prepare("INSERT INTO Teams (teamName,teamID,role,confirm,userUID) VALUES (:var1,:var2,:var3,0,:var4)");
        
        try{
            $insert_row->bindParam(':var1', $teamName, PDO::PARAM_STR );
            $insert_row->bindParam(':var2', $teamID , PDO::PARAM_STR );
            $insert_row->bindParam(':var3', $role, PDO::PARAM_STR );
            $insert_row->bindParam(':var4', $user_uid, PDO::PARAM_STR );
            $insert_row->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }    
        
        
        
    }
}
echo('<div>Invite to team</div>
<div><h4> ' . $teamName . '</h4></div>
<div>has been sent.</div>');

	    

?>
