<?php

    //filter.php
    include_once '../modules/db.php';
    $user = $_SESSION['user']['username'];
    $userUID = $_SESSION['user']['uID'];
          $query = "select 
                        count(*)
                    from Participants_t p
                        left join Task_completion tc
                            on p.taskID = tc.task_uid
                        left join Tasks ta
                            on ta.task_uid = p.taskID
                    where (tc.completed = 0 and tc.user_uid = '".$userUID."')
                        and ta.type = 'tt'
                        and ta.end >= CURDATE()";

          $sth = $db->prepare($query);

          $sth->execute();
          $sth->bindColumn(1, $count);

              echo $sth->rowCount();
