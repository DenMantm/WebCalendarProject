<?php  
    //filter.php  
    include_once("../modules/db.php");  

     
          $myuid = $_SESSION['user']['uID'];
          $result =''; 
          $query = "SELECT 
                        teamName, teamID
                    FROM 
                        Teams
                    WHERE
                        userUID = '" . $myuid . "'
                        and confirm = 1;";
                      
          $sth = $db->prepare($query);  
            
          try{
              
          $sth->execute();
          $sth->bindColumn(1,$teamName);
          $sth->bindColumn(2,$teamID);

          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $sth->rowCount() > 0) 
                {
                  while ($row = $sth ->fetch(PDO::FETCH_BOUND)) {

                          $result .= '<option value="'  . $teamID . '">' . $teamName . '</option>';

                }
            } else {
                $result .= '<option>NOTHING</option>';
            }
         
              echo $result;  
             
           
 ?>