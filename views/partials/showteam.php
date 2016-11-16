<?php  
    //filter.php  
    include_once("../modules/db.php");  

          $teams = ''; 
          $invites = '<H2>Your invitations:</H2>';
          $user = $_SESSION['user']['username'];
          $query = "SELECT 
                        t.teamId, 
                        t.teamName, 
                        c.Count, 
                        t.role,
                        t.confirm
                    FROM 
                        (SELECT 
                            teamID, 
                            count(*) as Count 
                        FROM 
                            Teams 
                        GROUP BY 
                            teamID) c, 
                        Teams t 
                    WHERE 
                        c.teamID = t.teamID 
                        and userID = '" . $user . "';";
          
                      
          $sth = $db->prepare($query);  
            
          try{
              
          $sth->execute();
          $sth->bindColumn(1,$teamId);
          $sth->bindColumn(2,$teamName);
          $sth->bindColumn(3,$users_cout);
          $sth->bindColumn(4,$role);
          $sth->bindColumn(5,$confirmed);
        
          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $sth->rowCount() > 0) 
                {
                  while ($row = $sth ->fetch(PDO::FETCH_BOUND)) {
                      
                      if($confirmed == 1) {
  
                          $teams .= '  
                        <div class="row">
                        
                          <div class="col-md-2">' . $teamName . '</div>
                          <div class="col-md-1"><div>Users:</div><div>' . $users_cout . '</div></div>';
                          
                          if ($role == "editor") {
                              $teams .= ' 
                                <div class="col-md-6">
                                <div class="btn-group" role="group" aria-label="...">
                                <a href="/editteam/' . $teamId . '" class="btn btn-default" aria-label="Left Align">
                                Edit <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a href="/teaminvite/' . $teamId . '" class="btn btn-default" aria-label="Left Align">
                                Invite member <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                 </a>';  
                          } else {
                              $teams .= '
                              <div class="col-md-6">
                                <div class="btn-group" role="group" aria-label="...">
                                <a href="/editteam/' . $teamId . '" class="btn btn-default disabled" aria-label="Left Align">
                                Edit <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a href="/teaminvite/' . $teamId . '" class="btn btn-default disabled" aria-label="Left Align">
                                Invite member <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                 </a>'; 
                          }
                          
                          $teams .= ' <a href="#" onclick="leave(\'' . $teamId . '\');" class="btn btn-default" aria-label="Left Align">
                            Leave the team <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a></div></div></div>'; 
                         
                      }  else {
                          $invites .= '<div class="row">
                                        <div class="col-md-2">' . $teamName . '</div>
                                        <div class="col-md-1"><div>Users:</div><div>' . $users_cout . '</div></div>
                                        <div class="col-md-1"><div>Invited as:</div><div>' . $role . '</div></div>
                                        <div class="col-md-5">
                                            <div class="btn-group" role="group" aria-label="...">
                                                <a href="/showusers/' . $teamId . '" class="btn btn-default" aria-label="Left Align">
                                                    Show users <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                                </a>
                                                <a href="/acceptteam/' . $teamId . '" class="btn btn-default" aria-label="Left Align">
                                                    Accept <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                                                </a>
                                                <a href="#" onclick="leave(\'' . $teamId . '\');" class="btn btn-default" aria-label="Left Align">
                                                    Decline <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                                                </a>
                                            </div>
                                        </div>
                                        </div>';
                      }  
                  } 
                }
                else  
                {  
                  $teams .= '<div> You are are not member of any team yet. Create your own or ask to be invited to exsisting one </div>';
                }  
                    
              echo $teams;  
              echo $invites;
           
 ?>