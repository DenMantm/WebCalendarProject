<?php 

    // First we execute our common code to connection to the database and start the session 
    require("modules/db.php"); 
     
    // This if statement checks to determine whether the registration form has been submitted 
    // If it has, then the registration code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
        // Ensure that the user has entered a non-empty username 
        if(empty($_POST['username'])) 
        { 
            die("Please enter a username."); 
        } 
         
        // Ensure that the user has entered a non-empty password 
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
         
        // Make sure the user entered a valid E-Mail address 
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
                $response = array("key"=>"email_fail");
                echo json_encode($response);
                die();
        } 
         
        // We will use this SQL query to see whether the username entered by the 
        // user is already in use.  A SELECT query is used to retrieve data from the database. 
        // :username is a special token, we will substitute a real value in its place when 
        // we execute the query. 
        $query = "SELECT 1 FROM user WHERE username = :username ;"; 
       
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // These two statements run the query against the database table. 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
           
                $response = array("key"=>"Failed to run query: " . $ex->getMessage());
                echo json_encode($response);
                die();
        } 
         
        // The fetch() method returns an array representing the "next" row from 
        // the selected results, or false if there are no more rows to fetch. 
        $row = $stmt->fetch(); 
         
        // If a row was returned, then we know a matching username was found in 
        // the database already and we should not allow the user to continue. 
        
        //USER EXISTS
        if($row) { 
                $response = array("key"=>"username_exists");
                echo json_encode($response);
                die();
        } 
         
        // Now we perform the same type of check for the email address, in order 
        // to ensure that it is unique. 
        $query = "SELECT 1 FROM user WHERE email = :email ;"; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
                $response = array("key"=>"Failed to run query: " . $ex->getMessage());
                echo json_encode($response);
                die();
        } 
         
        $row = $stmt->fetch(); 
         
         //EMAIL EXISTS
        if($row) { 
                $response = array("key"=>"email_exists");
                echo json_encode($response);
                die();
        } 
         
        // An INSERT query is used to add new rows to a database table.
        // Again, we are using special tokens (technically called parameters) to 
        // protect against SQL injection attacks. 
        $query = "INSERT INTO user ( username, password, salt, email ) VALUES ( :username, :password, :salt, :email ) ;"; 
         
        // A salt is randomly generated here to protect again brute force attacks 
        // and rainbow table attacks.  The following statement generates a hex 
        // representation of an 8 byte salt.   
    
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        // This hashes the password with the salt so that it can be stored securely 
        // in the database. 
        $password = hash('sha256', $_POST['password'] . $salt); 
         
       
        for($round = 0; $round < 65536; $round++) { 
            $password = hash('sha256', $password . $salt); 
        } 
         
        // Here we prepare our tokens for insertion into the SQL query.  We do not 
        // store the original password; only the hashed version of it.   
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
         
        try { 
            // Execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) {   
                $response = array("key"=>"Failed to run query: " . $ex->getMessage());
                echo json_encode($response);
                die();
        } 
         
        // This redirects the user back to the login page after they register
        
        
        //REGISTRATION SUCCESFULL
        $response = array("key"=>"pass");
        echo json_encode($response);
        
        
        //header("Location: login.php"); 
        //die("Redirecting to login.php"); 
    } 
     
?> 
    