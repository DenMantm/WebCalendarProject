<?php  
    //filter.php  
    include_once("../modules/db.php");  

         $result = '';
         $user_list = ' <table class="table table-striped">
                          <tr>
                            <th>Name</th>
                            <th>Team</th>
                            <th>Status</th>
                          </tr>';
          $taskID = $_SESSION['details'];
          $query = "SELECT 
                        task_uid, 
                        name,
                        details,
                        completed,
                        completed_by,
                        end
                    FROM 
                        Tasks
                    WHERE 
                       task_uid = '" . $taskID . "';";
          
                      
          $task = $db->prepare($query);  
            
        
              
          $task->execute();
          $task->bindColumn(1,$taskID);
          $task->bindColumn(2,$taskName);
          $task->bindColumn(3,$taskdetails);
          $task->bindColumn(4,$taksCompleted);
          $task->bindColumn(5,$taksCompleted_by);
          $task->bindColumn(6,$taskDue);


        while ($task ->fetch(PDO::FETCH_BOUND)) {
            $date_to = DateTime::createFromFormat('Y-m-d', $to);
            
            $query2 = "SELECT distinct u.name,
                        		u.surname,
                        		c.completed,
                        		t.teamName
                        FROM    Task_completion c,
                        		Participants_t p,
                                Teams t,
                                Users u
                        where 	p.taskID = '" . $taskID . "'
                        		and p.participantID = t.teamID
                                and t.userUID = u.uID;";
                        
            $users = $db->prepare($query2);
            $users->execute();
            $users->bindColumn(1,$user_name);
            $users->bindColumn(2,$user_surname);
            $users->bindColumn(3,$user_completed);
            $users->bindColumn(4,$user_teamname);
            
             while ($users ->fetch(PDO::FETCH_BOUND)) {
                 if($user_completed == 0 ) {
                     $task_status = '<td class="text-warning">Not compleeted</td>';
                 } else {
                     $task_status = '<td class="text-success">Compleeted</td>';
                 }
                $task_status =
                $user_list .= ' <tr>
                                    <td>' . $user_name . ' ' . $user_surname . '</td>
                                    <td>' . $user_teamname . '</td>' 
                                        . $task_status . '
                                </tr>';
             }
             
             $user_list .= '</table>';
             
                      $result .= '
                        <div class="row">
                        <div class="col-sm-12">
                        <span class="span-right close" onclick="close_details(); return false;">&times</span></div>
                        <label class="col-sm-2" control-label>
                            <a href="#" onclick="editname(\'' . $taskID . '\'); return false;"class="btn btn-default btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <span>Display name</span><span id="tnc_' . $taskID . '">
                        </span>
                        </label>
            
                        <div class="col-sm-9" >
                        <span id="tn_' . $taskID . '">
                            ' . $taskName . '
                        </span>
                        </div>
                        </div>
                        <hr>
                        
                        <div class="row">
                      
                        <label class="col-sm-2" control-label>
                            <a href="#" onclick="editdetails(\'' . $taskID . '\'); return false;"class="btn btn-default btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <span>Details</span><span id="tnc_' . $taskID . '">
                        </span>
                        </label>
            
                        <div class="col-sm-9" > 
                        <span id="td_' . $taskID . '">
                            ' . $taskdetails . '
                        </span>
                        </span>
                        </div>
                        </div>
                        <hr>
                        
                        <div class="row">';
                        
                        if($taksCompleted_by == "single") {
                            $result .= '<label class="col-sm-2" control-label>
                                            <a href="#" onclick="completionToAll(\'' . $taskID . '\'); return false;"class="btn btn-default btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                            </a>
                                            <span>Completion</span><span id="tnc_' . $taskID . '">
                                        </span>
                                        </label>
                            
                                        <div class="col-sm-9" > 
                                            <div class="text-success">Currently active : Task will be completed when <strong>any user</strong> from assigned team will mark it as completed</div>
                                            <br/>
                                            <div class="text-muted">Can be changed to : Task will be completed only when <strong>all users</strong> from assigned team mark it as completed</div>
                                        </div>
                                        </div>';
                        } else if ($taksCompleted_by == "everyone"){
                            $result .= '<label class="col-sm-2" control-label>
                                            <a href="#" onclick="completionToSingle(\'' . $taskID . '\'); return false;" class="btn btn-default btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                            </a>
                                            <span>Completion</span><span id="tnc_' . $taskID . '">
                                        </span>
                                        </label>
                            
                                        <div class="col-sm-9" > 
                                            <div class="text-success">Currently active : Task will be completed only when <strong>all users</strong> from assigned team mark it as completed</div>
                                            <br/>
                                            <div class="text-muted">Can be changed to : Task will be completed when <strong>any user</strong> from assigned team will mark it as completed</div>
                                        </div>
                                        </div>';
                       
                        }
                        $result .= '<hr>
                                    <div class="row">
                                        <label class="col-sm-2" control-label>
                                            <span class="glyphicon glyphicon-user btn btn-default btn-xs" aria-label="Left Align" aria-hidden="true"></span><span> Assigned users</span><span id="tnc_' . $taskID . '">
                                        </span>
                                        </label>
                                    <div class="col-sm-9" > ' ;
                        
                         $result .= $user_list;               
                                        
                                        
                         $result .= '</div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12" >
                                    <button type="button" onclick="delete_task(\'' . $taskID . '\'); return false;" class="btn btn-danger span-right">Remove task</button>
                                    </div>
                                    </div>';
                      
                  }

                    
              echo $result; 
           
 ?>