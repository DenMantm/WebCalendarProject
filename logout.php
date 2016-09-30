<?php 

    // First we execute our common code to connection to the database and start the session 
    require("registration/common.php"); 
     
    // We remove the user's data from the session 
    unset($_SESSION['user']);
    unset($_SESSION['logged']);
     
    // We redirect them to the login page 
    header("Location: registration/login.php"); 
    die("Redirecting to: registration/login.php");?>