<?php
session_start();
if($_SESSION['logged'] != true){
                header("Location: ../temp_index.php"); 
            die("Redirecting to: ../temp_index.php"); 
}
include("templates/header.php");
?>

<p>
    helo there, you are in members zone
    
    <a href="logout.php">Log Out Btn</a>
    
    
</p>