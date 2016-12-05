<?php  
    //filter.php  
    include_once("../modules/db.php");  

         $result = '';
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
                      
                      $result .= '
                        <div class="row">
                        <br/>
                        <label class="col-sm-2" control-label>
                            <a href="#" onclick="editname(\'' . $taskID . '\');"class="btn btn-default btn-xs" aria-label="Left Align">
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
                            <a href="#" onclick="editdetails(\'' . $taskID . '\');"class="btn btn-default btn-xs" aria-label="Left Align">
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
                        
                        <div class="row">'
                        if($taksCompleted_by == "single") {
                            $result .= '<label class="col-sm-2" control-label>
                                            <a href="#" onclick="completionToAll(\'' . $taskID . '\');"class="btn btn-default btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                            </a>
                                            <span>Completion</span><span id="tnc_' . $taskID . '">
                                        </span>
                                        </label>
                            
                                        <div class="col-sm-9" > 
                                            <div class="text-success">Currently active : Task will be completed when any user from assigned team will mark it as completed</div>
                                            <br/>
                                            <div class="text-muted">Can be changed to : Task will be completed only when all users from assigned team mark it as completed</div>
                                        </div>
                                        </div>'
                        } else {
                            $result .= '<label class="col-sm-2" control-label>
                                            <a href="#" onclick="completionToAll(\'' . $taskID . '\');"class="btn btn-default btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                            </a>
                                            <span>Completion</span><span id="tnc_' . $taskID . '">
                                        </span>
                                        </label>
                            
                                        <div class="col-sm-9" > 
                                            <div class="text-success">Currently active : Task will be completed when any user from assigned team will mark it as completed</div>
                                            <br/>
                                            <div class="text-muted">Can be changed to : Task will be completed only when all users from assigned team mark it as completed</div>
                                        </div>
                                        </div>'
                        }
                        <label class="col-sm-2" control-label>
                            <a href="#" onclick="completionToAll(\'' . $taskID . '\');"class="btn btn-default btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                            </a>
                            <span>Completion</span><span id="tnc_' . $taskID . '">
                        </span>
                        </label>
            
                        <div class="col-sm-9" > 
                            <div class="text-success">Currently active : Task will be completed when any user from assigned team will mark it as completed</div>
                            <br/>
                            <div class="text-muted">Can be changed to : Task will be completed only when all users from assigned team mark it as completed</div>
                        </div>
                        </div>
                        <hr>';
                      
                  }

                    
              echo $result; 
           
 ?>