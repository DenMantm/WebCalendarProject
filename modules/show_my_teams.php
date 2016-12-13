<?php

    //filter.php
    include_once '../modules/db.php';
          $teams = '<H2>Your Teams:</H2>';
          $user = $_SESSION['user']['username'];
          $userUID = $_SESSION['user']['uID'];
          $query = "SELECT 
                        t.teamId, 
                        t.teamName, 
                        c.Count, 
                        t.role
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
                        and t.confirm = 1
                        and userUID = '".$userUID."';";

          $sth = $db->prepare($query);

          $sth->execute();
          $sth->bindColumn(1, $teamId);
          $sth->bindColumn(2, $teamName);
          $sth->bindColumn(3, $users_cout);
          $sth->bindColumn(4, $role);

          if ($sth->rowCount() > 0) {
              while ($sth->fetch(PDO::FETCH_BOUND)) {
                  $teams .= '
                        <div class="panel panel-default" >
                            <div class="panel-heading" onclick="teamdetails(\''.$teamId.'\'); return false;">
                            <div class="row">
                                <span class="col-sm-9"><h3>'.$teamName.'</h3></span>
                                <span class="col-sm-3 span-right">'.$users_cout.'<div>Users</div></span>
                            </div>
                            </div>
                            <div class="team_details" id="team_details'.$teamId.'">
                            </div>
                        </div>';
              }
          }

echo $teams;
