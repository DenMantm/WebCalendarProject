<?php  
    //filter.php  
    include_once("../modules/db.php");  
          $tasks_issued_by_me = '<H2>Task issued by me:</H2>';
          $personal_task_to_do = '<H2>Your peronal tasks to be compleeted:</H2>';
          $team_task_to_do = '<H2>Team tasks to be compleeted:</H2>';
          $user = $_SESSION['user']['username'];
          $userUID = $_SESSION['user']['uID'];
          $query_issuer = "SELECT
                        task_uid.
                        name,
                        end,
                        compleeted
                    FROM 
                        tasks
                    WHERE 
                        owner_id = '" . $userUID . "';";
          
                      
          $issuer = $db->prepare($query);  
            
          
          $issuer->execute();
          $issuer->bindColumn(1,$taskID);
          $issuer->bindColumn(2,$task_name);
          $issuer->bindColumn(3,$task_due);
          $issuer->bindColumn(4,$task_compleeted);
          
           
            if( $issuer->rowCount() > 0) 
                {
                  while ($issuer ->fetch(PDO::FETCH_BOUND)) {
                      
                      $tasks_issued_by_me .=  
                      '<div class="row">
                        <div class="col-md-4"><a href="#" onclick="details(\'' . $taskID . '\');"class="btn btn-default" aria-label="Left Align">\'' . $task_name . '\'</a></div>
                        <div id="details_\'' . $taskID . '\'"></div>
                      </div>';
                      
                  } 
                }
                else  
                {  
                  $tasks_issued_by_me .= '<div> You did not issued eny tasks yet. you can do tat on your callendat page.</div>';
                }  
                    
              echo $tasks_issued_by_me;  
              echo $invites;
           
 ?>