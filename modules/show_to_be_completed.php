<?php  
    //filter.php  
    include_once("../modules/db.php");  
          $text = ''; 
          $user = $_SESSION['user']['username'];
          $userUID = $_SESSION['user']['uID'];
          $query = "select 
                        p.taskID, 
                        ta.name, 
                        ta.end 
                    from Participants_t p
                        left join Task_completion tc
                            on p.taskID = tc.task_uid
                        left join Tasks ta
                            on ta.task_uid = p.taskID
                    where (tc.completed = 0 and tc.user_uid = '" . $userUID . "')
                        and ta.type = 'tt'
                        and ta.end >= CURDATE()";
          
          
          $result = $db->prepare($query);  
              
          $result->execute();
          $result->bindColumn(1,$taskID);
          $result->bindColumn(2,$taskName);
          $result->bindColumn(3,$taskDue);

           
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
                          <div class="panel-heading" onclick="tbc_details(\'' . $taskID . '\'); return false;">
                            
                                <span>' . $taskName . '</span>
                                <span class="span-right">' . $due_status . '</span>
                          
                          </div>
                          <div class="tbc_details" id="tbc_details' . $taskID . '">
                          </div>
                        </div>';
                      
                  } 
                }
                else  
                {  
                  $teams .= '<div> You do not have any team tasks to br completed. Lucky you!!!</div>';
                }  
                    
              echo $text;  
?>