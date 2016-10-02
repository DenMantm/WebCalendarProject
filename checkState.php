<?php
session_start();
if($_SESSION['logged'] != true){
                header("Location: ../temp_index.php"); 
            die("Redirecting to: ../temp_index.php"); 
}

echo "you are not logged in. Redirecting to home";

?>