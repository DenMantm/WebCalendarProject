<?php
    // First we execute our common code to connection to the database and start the session 
    require("../modules/db.php"); 
     
    // This variable will be used to re-display the user's username to them in the 
    // login form if they fail to enter the correct password.  
    $submitted_username = ''; 
     
    // check to determine whether the login form has been submitted 
    // If it has, then the login code is run, otherwise the form is displayed 
    if(!empty($_POST)){
        // This query retreives the user's information from the database using 
        // their username. 
        $query = "SELECT userID, username, password, email FROM Users 
                  WHERE email = :email;";
         
        // The parameter values 
        $query_params = array( 
            ':email' => $_POST['email']
        ); 

        try { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            echo $ex->getMessage();
        } 



        // Retrieve the user data from the database.  If $row is false, then the username 
        // they entered is not registered. 
        $row = $stmt->fetch(); 
        if($row) {
            
            //utilixing e-mail sending module and sending recovery e-mail to the user.
        $temp_password = $row['password'];
            
        $email_adress = $_POST['email'];
        $email_subject = 'Password recovery e-mail';
        $link_server_address = 'http://www.'.$_SERVER['HTTP_HOST'];
        $email_link = $link_server_address.'/retrieve_password/'.$temp_password.'/'.$email_adress;
        $email_body = '<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Title</title>
  </head>
  <body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p>Hi there,</p>
                        <p>Password recovery for '.$email_adress.'</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> <a href="'.$email_link.'">Change password</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Please ignore this e-mail if you havent triggerd it...</p>
                        <p>Good luck! Hope it works.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- END MAIN CONTENT AREA -->
              </table>

            <!-- START FOOTER -->
            <div class="footer">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">CalendarApplication</span>
                  </td>
                </tr>
              </table>
            </div>

            <!-- END FOOTER -->
            
<!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';
        sendEmail($email_adress,$email_subject,$email_body);
            
                $response = array("key"=>"p_recovery_success");
                echo json_encode($response);
            } 
            else { 
            //returning to ajax script result
                $response = array("key"=>"p_recovery_fail","mail"=>$_POST['email']);
                echo json_encode($response);
            } 
        }
        else { 
            //returning to ajax script result
                $response = array("key"=>"p_recovery_fail","mail"=>$_POST['email']);
                echo json_encode($response);
            } 
?> 