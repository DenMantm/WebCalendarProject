<?php
//include db configuration file
include_once("../modules/db.php");
$me = $_SESSION['user']['uID'];
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
        $check2->bindParam(':var1', $me, PDO::PARAM_STR );
        $check2->bindParam(':var2', $teamid, PDO::PARAM_STR );
        $check2->execute();
        $isEditor = $check2->rowCount();

        
    if (($coutEditors == 1) && ($isEditor == 1)){
        echo('NO');
    }   
    else 
    {
        $insert_row = $db->prepare("DELETE FROM Teams WHERE userUID = :var1 and teamID = :var2;");
        $uid = uniqid();
        $insert_row->bindParam(':var1', $me, PDO::PARAM_STR );
        $insert_row->bindParam(':var2', $teamid, PDO::PARAM_STR );
        $insert_row->execute();
       
       $query = "select t.id
                from Task_completion t
                left join Participants_t p
                on p.taskID = t.task_uid
                where participantID = '".$teamid."'
                and t.user_uid = '".$me."';";
        $getrows = $db->prepare($query);
        $getrows->execute();
        $getrows->bindColumn(1,$id);
        
        while ($getrows ->fetch(PDO::FETCH_BOUND)) {
            $query2 = "delete from Task_completion 
                        where id = '" . $id . "';";
            $remove = $db->prepare($query2);
            $remove->execute();
        
        }
    }
    
}
?>