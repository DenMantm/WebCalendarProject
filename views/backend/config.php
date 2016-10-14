
<?php
$host = "127.0.0.1";
$user = "arezki";
$pass = "";
$db_name = "c9";


try {
        $con = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
        // set the PDO error mode to exception
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}

catch(PDOException $e)
{
        echo "Error: " . $e->getMessage();
}?>