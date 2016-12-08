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
          $task->bindColumn(5,$taskDue);
          $task ->fetch(PDO::FETCH_BOUND);
        
          $date_to = DateTime::createFromFormat('Y-m-d', $to);
          $result .= '
            <div class="row">
            <div class="col-sm-12">
            <span class="span-right close" onclick="close_p_details(); return false;">&times</span></div>
            <label class="col-sm-2" control-label>
                <a href="#" onclick="editpname(\'' . $taskID . '\'); return false;"class="btn btn-default btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                <span>Display name</span><span id="ptnc_' . $taskID . '">
            </span>
            </label>
            
                        <div class="col-sm-9" >
                        <span id="ptn_' . $taskID . '">
                            ' . $taskName . '
                        </span>
                        </div>
                        </div>
                        <hr>
                        
                        <div class="row">
                      
                        <label class="col-sm-2" control-label>
                            <a href="#" onclick="editpdetails(\'' . $taskID . '\'); return false;"class="btn btn-default btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <span>Details</span><span id="ptnc_' . $taskID . '">
                        </span>
                        </label>
            
                        <div class="col-sm-9" > 
                        <span id="ptd_' . $taskID . '">
                            ' . $taskdetails . '
                        </span>
                        </span>
                        </div>
                        </div>
                        <hr>';
                        

                                        
                         $result .= '</div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12" >';
                                    
                        if($taksCompleted == 0) {
                            $result .= '<button type="button" onclick="complete_ptask(\'' . $taskID . '\'); return false;" class="btn btn-success span-right">Complete</button>';
                        }
                            $result .= '<button type="button" onclick="delete_ptask(\'' . $taskID . '\'); return false;" class="btn btn-danger span-left">Remove task</button>
                                    </div>
                                    </div>';
                      
                  

                    
              echo $result; 
           
 ?>