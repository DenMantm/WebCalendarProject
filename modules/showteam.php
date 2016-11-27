<?php  
    //filter.php  
    include_once("../modules/db.php");  
          $teams = '<H2>Your Teams:</H2>'; 
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
                        WHERE
                            confirm = 1
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
                        
                          <div class="col-md-4">' . $teamName . '</div>
                          <div class="col-md-1"><div>Users:</div><div>' . $users_cout . '</div></div>';
                          
                          if ($role == "editor") {
                              $teams .= ' 
                                <div class="col-md-6">
                                <div class="btn-group pull-left" role="group" aria-label="...">
                                 <a href="#" onclick="edit(\'' . $teamId . '\');"class="btn btn-default" aria-label="Left Align">
                                Edit  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a href="#" onclick="invite(\'' . $teamId . '\');"class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#invite">
                                Invite  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                 </a>';  
                          } else {
                              $teams .= '
                              <div class="col-md-6">
                                <div class="btn-group pull-left" role="group" aria-label="...">
                                <a href="/editteam/' . $teamId . '" class="btn btn-default disabled" aria-label="Left Align">
                                Edit  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a href="#" onclick="leave(\'' . $teamId . '\');"class="btn btn-default disabled" aria-label="Left Align" data-toggle="modal" data-target="#invite">
                                Invite  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                 </a>'; 
                          }
                          
                          $teams .= ' <a href="#" onclick="leave(\'' . $teamId . '\');" class="btn btn-default" aria-label="Left Align">
                            Leave  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a></div></div></div>'; 
                         
                      }  else if ($confirmed == 0) {
                          $invites .= '<div class="row">
                                        <div class="col-md-3">' . $teamName . '</div>
                                        <div class="col-md-1"><div>Role:</div><div>' . $role . '</div></div>
                                        <div class="col-md-1"><div>Users:</div><div>' . $users_cout . '</div></div>
                                        <div class="col-md-6">
                                            <div class="btn-group pull-left" role="group" aria-label="...">
                                                <a href="#" onclick="showusers(\'' . $teamId . '\');" class="btn btn-default" aria-label="Left Align">
                                                    Users <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                                </a>
                                                <a href="/acceptteam/' . $teamId . '" class="btn btn-default" aria-label="Left Align">
                                                    Accept <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                                                </a>
                                                <a href="/declineteam/' . $teamId . '" class="btn btn-default" aria-label="Left Align">
                                                    Decline <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                                                </a>
                                            </div>
                                        
                                        </div>
                                        
                                        </div>
                                        <div class="row">
                                        <div id="display' . $teamId . '"></div>
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