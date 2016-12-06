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
                        t.task_uid, 
                        t.name,
                        t.details,
                        t.completed,
                        t.completed_by,
                        t.end,
                        concat(u.name , ' ' , u.surname)
                    FROM 
                        Tasks t,
                        Users u
                    WHERE 
                        t.owner_id = u.uID
                        and task_uid = '" . $taskID . "';";
          
                      
          $task = $db->prepare($query);  
            
        
              
          $task->execute();
          $task->bindColumn(1,$taskID);
          $task->bindColumn(2,$taskName);
          $task->bindColumn(3,$taskdetails);
          $task->bindColumn(4,$taksCompleted);
          $task->bindColumn(5,$taksCompleted_by);
          $task->bindColumn(6,$taskDue);
          $task->bindColumn(7,$owner);


        while ($task ->fetch(PDO::FETCH_BOUND)) {
            $date_to = DateTime::createFromFormat('Y-m-d', $to);
            
            $query2 = "SELECT distinct u.name,
                        		u.surname,
                        		c.completed,
                        		t.teamName
                        FROM    Task_completion c
								left join Participants_t p
                                on c.task_uid = p.taskID
                                left join Teams t
                                on t.teamID = p.participantID
                                left join Users u
                                on u.uID = c.user_uid
                        where 	p.taskID = '" . $taskID . "'";
                        
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
                        <span class="span-right close" onclick="close_tbc_details(); return false;">&times</span></div>
                        </div>
                        </div>
                        
                        
                        <div class="row">
                        <label class="col-sm-2" control-label>
                            <span>Issued by</span><span id="tbcni_' . $taskID . '">
                        </span>
                        </label>
            
                        <div class="col-sm-9" >
                        <span id="tbci_' . $taskID . '">
                            ' . $owner . '
                        </span>
                        </div>
                        </div>
                        <hr>
                        
                        <div class="row">
                        <label class="col-sm-2" control-label>
                            <span>Display name</span><span id="tbcnc_' . $taskID . '">
                        </span>
                        </label>
            
                        <div class="col-sm-9" >
                        <span id="tbcn_' . $taskID . '">
                            ' . $taskName . '
                        </span>
                        </div>
                        </div>
                        <hr>
                        
                        <div class="row">
                      
                        <label class="col-sm-2" control-label>
                            <span>Details</span><span id="tnbdc_' . $taskID . '">
                        </span>
                        </label>
            
                        <div class="col-sm-9" > 
                        <span id="tbcd_' . $taskID . '">
                            ' . $taskdetails . '
                        </span>
                        </span>
                        </div>
                        </div>
                        <hr>
                        
                        <div class="row">
                        
                        <label class="col-sm-2" control-label>
                           <span>Completion</span><span id="tnc_' . $taskID . '">
                           </span>
                        </label>';
                        
                        if($taksCompleted_by == "single") {
                            $result .= '<div class="col-sm-9" > 
                                            <div class="text-success">Task will be completed when <strong>any user</strong> from assigned team will mark it as completed</div>
                                        </div>
                                        </div>';
                        } else if ($taksCompleted_by == "everyone"){
                            $result .= '<div class="col-sm-9" > 
                                            <div class="text-success">Currently active : Task will be completed only when <strong>all users</strong> from assigned team mark it as completed</div>
                                        </div>
                                        </div>';
                       
                        }
                        $result .= '<hr>
                        
                                    <div class="row">
                                        <label class="col-sm-2" control-label>
                                            <span> Mark this task as compleeted</span><span id="tnc_' . $taskID . '">
                                        </span>
                                        </label>
                                    <div class="col-sm-9" >
                                        <button type="button" onclick="complete_task(\'' . $taskID . '\'); return false;" class="btn btn-success span-left">Complete</button>
                                    </div>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="row">
                                        <label class="col-sm-2" control-label>
                                            <span> Other users assigned to the task</span><span id="tnc_' . $taskID . '">
                                        </span>
                                        </label>
                                    <div class="col-sm-9" > ' ;
                        
                         $result .= $user_list;               
                                        
                                        
                         $result .= '</div>
                                    </div>';
                      
                  }

                    
              echo $result; 
           
 ?>