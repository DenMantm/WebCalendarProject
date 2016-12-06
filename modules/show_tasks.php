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
                    
                    $date_to = DateTime::createFromFormat('Y-m-d', $taskDue);
                    $date_today = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                    
                    $days = date_diff($date_today, $date_to);
                    
                    if ($days->format('%a') == '0') {
                        $due_status = 'Due: Today';
                    } elseif ($days->format('%R%a') == '+1') {
                        $due_status = 'Due: Tomorrow';
                    } elseif ($days->format('%R') == '+') {
                        $due_status = $days->format('Due: %a days');
                    } elseif ($days->format('%R') == '-') {
                        $due_status = $days->format('Expired %a days ago');
                    };
                  
                    $text .= '
     
                      <div class="panel panel-default" >
                          <div class="panel-heading" onclick="details(\'' . $taskID . '\'); return false;">
                            
                                <span>' . $taskName . '</span>
                                <span class="span-right">' . $due_status . '</span>
                          
                          </div>
                          <div class="details" id="details' . $taskID . '">
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