<?php  
    //filter.php  
    include_once("../modules/db.php");  

          $result = '<ul>'; 
          $invites = '<H2>Your invitations:</H2>';
          $teamID = $_SESSION['currentTeam'];
          $query = "SELECT 
                        userID
                    FROM 
                        Teams
                    WHERE 
                        teamID = '" . $teamID . "';";
                      
          $sth = $db->prepare($query);  
            
          try{
              
          $sth->execute();
          $sth->bindColumn(1,$user);

          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $sth->rowCount() > 0) 
                {
                  while ($row = $sth ->fetch(PDO::FETCH_BOUND)) {
                     
  
                          $result .= '<li>' . $user . '</li>';
                          
                }
            }
                $result .= '</ul>';
              echo $result;  
             
           
 ?>