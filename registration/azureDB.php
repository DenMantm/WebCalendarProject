<?
Server: ourcalendar.database.windows.net,1433
SQL Database: calendar
User Name: nciadmin

PHP Data Objects(PDO) Sample Code:

try {
    $conn = new PDO ( \"sqlsrv:server = tcp:ourcalendar.database.windows.net,1433; Database = calendar\", \"nciadmin\", \"P4ssw0rd12\");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch ( PDOException $e ) {
        print( \"Error connecting to SQL Server.\" );
        die(print_r($e));
        
    }
    SQL Server Extension Sample Code:
    
    $connectionInfo = array(\"UID\" => \"nciadmin@ourcalendar\", \"pwd\" => \"{your_password_here}\", \"Database\" => \"calendar\", \"LoginTimeout\" => 30, \"Encrypt\" => 1, \"TrustServerCertificate\" => 0);
    $serverName = \"tcp:ourcalendar.database.windows.net,1433\";
    $conn = sqlsrv_connect($serverName, $connectionInfo);