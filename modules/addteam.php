<?php

//include db configuration file
include_once '../modules/db.php';

if (isset($_POST['team_name'])) {
    $teamName = filter_var($_POST['team_name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $insert_row = $db->prepare("INSERT INTO Teams (teamName,teamID,role,confirm,userUID) 
    VALUES (:var1,:var2,'editor',1,:var3)");

    try {
        $uid = uniqid();
        $insert_row->bindParam(':var1', $teamName, PDO::PARAM_STR);
        $insert_row->bindParam(':var2', $uid, PDO::PARAM_STR);
        $insert_row->bindParam(':var3', $_SESSION['user']['uID'], PDO::PARAM_STR);
        $insert_row->execute();
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }

    if ($insert_row) {
        echo $_SESSION['user']['uID'];
    } else {
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
        exit();
    }
}
