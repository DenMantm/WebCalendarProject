<?php  
    //filter.php  
    include_once("../modules/db.php");  

          $usersHTML = ''; 
          $teamnameHTML = '';
          $deleteHTML = '';
          $teamID = $_SESSION['currentTeam'];
          $me = $_SESSION['user']['username'];
          $sqlQuery = "SELECT 
                        username, teamName, role, confirm
                    FROM 
                        Teams
                    WHERE 
                        teamID = '" . $teamID . "';";
                      
          $query = $db->prepare($sqlQuery);  
            
          try{
              
          $query->execute();
          $query->bindColumn(1,$user);
          $query->bindColumn(2,$teamName);
          $query->bindColumn(3,$role);
          $query->bindColumn(4,$confirm);

          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $query->rowCount() > 0) 
                {
                  while ($row = $query ->fetch(PDO::FETCH_BOUND)) {
                     
                    if($user != $me) {
                        
                        switch ($confirm) {
                            case 0:
                                $status = "Avaiting for confirmation";
                                break;
                            case 1:
                                $status = "Confirmed";
                                break;
                            case 2:
                                $status = "Not registered";
                                break;
                            case 3:
                                $status = "Invitation declined";
                                break;
                        }
                        
                          $usersHTML .= '<div class="row" id="' . $user . '">
                                            <div class="col-md-2">' . $user . '</div>
                                            <div class="col-md-1">' . $status . '</div>
                                            <div class="col-md-1">' . $role . '</div>
                                            <div class="btn-group pull-left" role="group" aria-label="...">
                                                <a href="#" onclick="changerole(\'' . $user . '\' , \'' . $teamID . '\' , \'' . $role . '\');"class="btn btn-default" aria-label="Left Align">
                                                Change role  <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                                                </a>
                                                <a href="#" onclick="remove(\'' . $user . '\' , \'' . $teamID . '\');"class="btn btn-default" aria-label="Left Align">
                                                Remove  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </a>  
                                            </div>
                                         </div>';
                    }
                }
            } else {
                $usersHTML .= '<div class="row">Nothig</div>';
            }
               
              echo $usersHTML;  
             
           
 ?>