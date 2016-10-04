<?php
    // First we execute our common code to connection to the database and start the session 
    require("modules/db.php"); 
     
    // This variable will be used to re-display the user's username to them in the 
    // login form if they fail to enter the correct password.  
    $submitted_username = ''; 
     
    // check to determine whether the login form has been submitted 
    // If it has, then the login code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
        // This query retreives the user's information from the database using 
        // their username. 
        $query = "SELECT id, username, password, salt, email FROM user 
                  WHERE username = :username;"; 
         
        // The parameter values 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This variable tells us whether the user has successfully logged in or not. 
        // We initialize it to false, assuming they have not.
        $login_ok = false; 
         
        // Retrieve the user data from the database.  If $row is false, then the username 
        // they entered is not registered. 
        $row = $stmt->fetch(); 
        if($row) 
        { 
            // Check if passwords match with hash and salt
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) { 
                //cleaning sensitive data
                unset($row['salt']); 
                unset($row['password']); 
                //saving user info in session variable
                 $_SESSION['user'] = $row;
                 $_SESSION['logged'] = true; 
                 
                //returning to ajax script result
                $response = array("key"=>"pass");
                echo json_encode($response);
                
            } 
            else { 
            //returning to ajax script result
                $response = array("key"=>"fail");
                echo json_encode($response);
            } 
        }
        else { 
            //returning to ajax script result
                $response = array("key"=>"fail");
                echo json_encode($response);
            } 
    } 
?> 