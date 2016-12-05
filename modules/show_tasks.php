<?php  
    //filter.php  
    include_once("../modules/db.php");  
          $text = ''; 
          $user = $_SESSION['user']['username'];
          $userUID = $_SESSION['user']['uID'];
          $query = "SELECT 
                        task_uid, 
                        name, 
                        completed, 
                        end
                    FROM 
                        Tasks
                    WHERE 
                       owner_id = '" . $userUID . "'
                       and type = 'tt'
                    ORDER BY
                        end;";
          
                      
          $result = $db->prepare($query);  
            
        
              
          $result->execute();
          $result->bindColumn(1,$taskID);
          $result->bindColumn(2,$taskName);
          $result->bindColumn(3,$taksCompleted);
          $result->bindColumn(4,$taskDue);

        
        
                   
           
            if( $result->rowCount() > 0) 
                {
                  while ($result ->fetch(PDO::FETCH_BOUND)) {
                      
                      $text .= '
     
                      <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">
                                <span><a href="#" onclick="details(\'' . $taskID . '\');">' . $taskName . '</a></span><span class="span-right">Due: ' . $taskDue . '</span>
                            </h3>
                          </div>
                          <div id="details' . $taskID . '">
                          </div>
                        </div>';
                      
                  } 
                }
                else  
                {  
                  $teams .= '<div> You are are not member of any team yet. Create your own or ask to be invited to exsisting one </div>';
                }  
                    
              echo $text;  

           
 ?>