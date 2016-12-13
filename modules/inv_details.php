<?php

    //filter.php
    include_once '../modules/db.php';
        $usersHTML = ' <table class="table table-striped">
                                  <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                  </tr>';

          $teamID = $_SESSION['currentTeam'];
          $me = $_SESSION['user']['uID'];
            $result = '';
          $sqlQuery = "SELECT 
                        u.name, 
                        u.surname, 
                        t.teamName, 
                        t.role, 
                        t.confirm, 
                        t.userUID
                    FROM 
                        Teams t,
                        Users u
                    WHERE
                        t.userUID = u.uID
                        and t.teamID = '".$teamID."';";

        $sqlQuery2 = "SELECT teamName, teamID from Teams where teamID = '".$teamID."' Limit 1;";

          $query = $db->prepare($sqlQuery);

          $query->execute();
          $query->bindColumn(1, $name);
          $query->bindColumn(2, $surname);
          $query->bindColumn(3, $teamName);
          $query->bindColumn(4, $role);
          $query->bindColumn(5, $confirm);
          $query->bindColumn(6, $userID);

          $query2 = $db->prepare($sqlQuery2);
          $query2->execute();
          $query2->bindColumn(1, $teamName2);
          $query2->bindColumn(2, $teamID2);
            while ($query2->fetch(PDO::FETCH_BOUND)) {
                $result .= '<div class="row">
                            <div class="col-sm-12">
                                <span class="span-right close" onclick="close_inv(); return false;">&times</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3" >
                                    <a href="/acceptteam/'.$teamID2.'" class="btn btn-success span-right">Accept</a>
                            </div>
                            <div class="col-sm-3" >
                                <a href="/declineteam/'.$teamID2.'" class="btn btn-warning span-right">Decline</a>
                            </div>
                        </div>
                        
                        <hr>';
            }

            if ($query->rowCount() > 0) {
                while ($query->fetch(PDO::FETCH_BOUND)) {
                    if ($userID != $me) {
                        switch ($confirm) {
                            case 0:
                                $status = 'Avaiting for confirmation';
                                break;
                            case 1:
                                $status = 'Confirmed';
                                break;
                            case 2:
                                $status = 'Not registered';
                                break;
                            case 3:
                                $status = 'Invitation declined';
                                break;
                        }

                        $usersHTML .= ' <tr>
                                            <td>'.$name.' '.$surname.'</td>
                                            <td>'.$status.'</td>
                                            <td>'.$role.'</td>
                                        </tr>';
                    }
                }
            } else {
                $usersHTML .= '<div class="row">Nothig</div>';
            }

                $usersHTML .= '</table>
                                </div>';
                echo $result;
              echo $usersHTML;
