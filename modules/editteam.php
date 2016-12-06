<?php  
    //filter.php  
    include_once("../modules/db.php");  

          $usersHTML = ''; 
          $teamnameHTML = '';
          $deleteHTML = '';
          $teamID = $_SESSION['currentTeam'];
          $me = $_SESSION['user']['uID'];
          $sqlQuery = "SELECT 
                        u.name, u.surname, t.teamName, t.role, t.confirm, t.userUID
                    FROM 
                        Teams t,
                        Users u
                    WHERE
                        t.userUID = u.uID
                        and t.teamID = '" . $teamID . "';";
                      
          $query = $db->prepare($sqlQuery);  
            
          try{
              
          $query->execute();
          $query->bindColumn(1,$name);
          $query->bindColumn(2,$surname);
          $query->bindColumn(3,$teamName);
          $query->bindColumn(4,$role);
          $query->bindColumn(5,$confirm);
          $query->bindColumn(6,$userID);
          

          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $query->rowCount() > 0) 
                {
                  while ($row = $query ->fetch(PDO::FETCH_BOUND)) {
                     
                    if($userID != $me) {
                        
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
                        
                          $usersHTML .= '<div class="row" id="' . $userID . '">
                                            <div class="col-md-2">' . $name . ' ' . $surname . '</div>
                                            <div class="col-md-1">' . $status . '</div>
                                            <div class="col-md-1">' . $role . '</div>
                                            <div class="btn-group pull-left" role="group" aria-label="...">
                                                <a href="#" onclick="changerole(\'' . $userID . '\' , \'' . $teamID . '\' , \'' . $role . '\');"class="btn btn-default" aria-label="Left Align">
                                                Change role  <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                                                </a>
                                                <a href="#" onclick="remove(\'' . $userID . '\' , \'' . $teamID . '\');"class="btn btn-default" aria-label="Left Align">
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