<?php

//include db configuration file
include_once '../modules/db.php';

    $team_id = $_POST['team_ud'];
    $new_name = $_POST['new_name'];

    $query = 'UPDATE Teams SET teamName="'.$new_name.'" WHERE teamID = "'.$team_id.'";';
    $update = $db->prepare($query);
    $update->execute();
