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
                        $due_status = '<div class="text-info">Due: Today</div>';
                    } elseif ($days->format('%R%a') == '+1') {
                        $due_status = '<div class="text-info">Due: Tomorrow</div>';
                    } elseif ($days->format('%R') == '+') {
                        $due_status = '<div class="text-success">' . $days->format('Due: %a days') . '</div>';
                    } elseif ($days->format('%R') == '-') {
                        $due_status = '<div class="text-danger">' . $days->format('Expired %a days ago') . '</div>';
                    };
                    if($taksCompleted = 1) {
                    $text .= '
                        
                        <div class="panel panel-default" >
                            
                            <div class="panel-heading" onclick="details(\'' . $taskID . '\'); return false;">
                            <div class="row">
                                <span class="col-sm-9">' . $taskName . '</span>
                                <span class="col-sm-3 span-right">' . $due_status . '<div>Completed</div></span>
                            </div>
                            </div>
                            <div class="details" id="details' . $taskID . '">
                            </div>
                        </div>';
                    } else {
                        
                    }
                  } 
                }
                else  
                {  
                  $teams .= '<div>You did not issue any tasks yet. you can do it from the calendar screen.</div>';
                }  
                    
              echo $text;  

           
 ?>