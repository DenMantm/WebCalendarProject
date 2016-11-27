<?php  
    //filter.php  
    include_once("../modules/db.php");  

          $result =''; 
          $query = "SELECT 
                        email, uid
                    FROM 
                        Users;";
                      
          $sth = $db->prepare($query);  
            
          try{
              
          $sth->execute();
          $sth->bindColumn(1,$user);
          $sth->bindColumn(2,$uid);

          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $sth->rowCount() > 0) 
                {
                  while ($row = $sth ->fetch(PDO::FETCH_BOUND)) {
                     
  
                          $result .= '<option value="'  . $uid . '">' . $user . '</option>';
                      
                          
                }
            }
         
              echo $result;  
             
           
 ?>