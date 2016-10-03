<?php 

    // These variables define the connection information fo MySQL database 
    // $username = "sql8138108"; 
    // $password = "YCLUJyxs9P"; 
    // $host = "sql8.freemysqlhosting.net"; 
    // $dbname ="sql8138108"; 
    
    $username = "nciadmin"; 
    $password = "K7zSZ6uK524SnT6s"; 
    $host = "kamil-lasecki.ddns.net"; 
    $dbname ="calendar"; 
    


    
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
     
 
    try 
    { 
        // This statement opens a connection to the database using the PDO library 
        // PDO is designed to provide a flexible interface between PHP and many 
        // different types of database servers. 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
    } 
    catch(PDOException $ex) 
    { 
        // If an error occurs while opening a connection the database, it will 
        // be trapped here
        die("Failed to connect to the database: " . $ex->getMessage());
    } 
     
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
    
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
     
   
    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) 
    { 
        function undo_magic_quotes_gpc(&$array) 
        { 
            foreach($array as &$value) 
            { 
                if(is_array($value)) 
                { 
                    undo_magic_quotes_gpc($value); 
                } 
                else 
                { 
                    $value = stripslashes($value); 
                } 
            } 
        } 
     
        undo_magic_quotes_gpc($_POST); 
        undo_magic_quotes_gpc($_GET); 
        undo_magic_quotes_gpc($_COOKIE); 
    } 
     
    // This tells the web browser that the content is encoded using UTF-8 

    header('Content-Type: text/html; charset=utf-8'); 
     

    session_start(); 

   