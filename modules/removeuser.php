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

	$delete_row = $db->prepare("DELETE FROM Teams WHERE userUID = :var1 and teamID = :var2;");

        $delete_row->bindParam(':var1', $user, PDO::PARAM_STR );
        $delete_row->bindParam(':var2', $team, PDO::PARAM_STR );
        $delete_row->execute();

     $query = "select t.id
                from Task_completion t
                left join Participants_t p
                on p.taskID = t.task_uid
                where participantID = '".$team."'
                and t.user_uid = '".$user."';";
        $getrows = $db->prepare($query);
        $getrows->execute();
        $getrows->bindColumn(1,$id);
        
        while ($getrows ->fetch(PDO::FETCH_BOUND)) {
            $query2 = "delete from Task_completion 
                        where id = '" . $id . "';";
            $remove = $db->prepare($query2);
            $remove->execute();
        }
	

        echo('User has been removed');

?>