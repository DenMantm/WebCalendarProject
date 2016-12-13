<?php

    //filter.php
    include_once '../modules/db.php';
        $usersHTML = ' <table class="table table-striped">
                                  <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Change role</th>
                                    <th>Remove from team</th>
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

        $sqlQuery2 = "SELECT teamName, teamID from Teams where teamID = '".$teamID."' Limit=1;";

          $query = $db->prepare($sqlQuery);

          $query->execute();
          $query->bindColumn(1, $name);
          $query->bindColumn(2, $surname);
          $query->bindColumn(3, $teamName);
          $query->bindColumn(4, $role);
          $query->bindColumn(5, $confirm);
          $query->bindColumn(6, $userID);

          $query2 = $db->prepare($sqlQuery2);
          $query2->bindColumn(1, $teamName);
          $query2->bindColumn(2, $teamID);
            $query->fetch(PDO::FETCH_BOUND);

            $result .= '<div class="row">
                            <div class="col-sm-12">
                                <span class="span-right close" onclick="close_details(); return false;">&times</span></div>
                                <label class="col-sm-2" control-label>
                                    <a href="#" onclick="editname(\''.$teamID.'\'); return false;"class="btn btn-default btn-xs" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <span>Display name</span><span id="tnc_'.$teamID.'
                                    </span>
                                </label>
            
                                <div class="col-sm-9" >
                                    <span id="tn_'.$teamID.'">
                                        '.$teamName.'
                                    </span>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2" control-label>
                                   
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                   
                                    <span>Invite to the team</span><span id="tnc_'.$teamID.'">
                                    </span>
                                </label>
                                <div class="col-sm-9" >
                                    <select id="i_email'.$teamID.'" class="js-example-basic-single js-states form-control" multiple="multiple" style="width: 100%;">
                                    </select>
                                    <script>
                                        $(function() {
                                		    $("select").select2();
                                	    });
                                	</script><div class="btn-group pull-left" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                          <input type="radio" name="role" value="user" autocomplete="off" checked> User
                                        </label>
                                        <label class="btn btn-primary">
                                          <input type="radio" name="role" value="editor" autocomplete="off"> Editor
                                        </label>
                                      </div>
                                	<button id="btnSendInvite" onclick="invite(\''.$teamID.'\'); return false;" class="btn btn-primary span-right">Send</button>
                                </div>
                            </div>
                            <hr>
                        </div>
                        ';

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
                                            <td>
                                                <a href="#" onclick="changerole(\''.$userID.'\' , \''.$teamID.'\' , \''.$role.'\'); return false;"class="btn btn-default btn-xs" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" onclick="remove(\''.$userID.'\' , \''.$teamID.'\'); return false;"class="btn btn-default btn-xs" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>';
                    }
                }
            } else {
                $usersHTML .= '<div class="row">Nothig</div>';
            }

                $usersHTML .= '</table>
                                </div>
                                <div class="row">
                                <div class="col-sm-12" >
                                <button type="button" onclick="leave(\''.$teamID.'\'); return false;" class="btn btn-danger span-right">Leave team</button>
                                </div>
                                </div>
                                
                                ';
                echo $result;
              echo $usersHTML;
