<?php

    //filter.php
    include_once '../modules/db.php';

          $result = '<ul>';
          $invites = '<H2>Your invitations:</H2>';
          $teamID = $_SESSION['currentTeam'];
          $query = "SELECT 
                        concat( u.name, ' ' , u.surname, ' (' , u.username , ')')
                    FROM 
                        Teams t left join Users u on t.userUID = u.uID
                    WHERE 
                        teamID = '".$teamID."'
                        and confirm = 1;";

          $sth = $db->prepare($query);

          try {
              $sth->execute();
              $sth->bindColumn(1, $user);
          } catch (PDOException $e) {
              echo 'Error: '.$e->getMessage();
          }

            if ($sth->rowCount() > 0) {
                while ($row = $sth->fetch(PDO::FETCH_BOUND)) {
                    $result .= '<li>'.$user.'</li>';
                }
            }
                $result .= '</ul>';
              echo $result;
