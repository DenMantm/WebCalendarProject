<?php  
    //filter.php  
    include_once("../modules/db.php");  
     
          $myuid = $_SESSION['user']['uID'];
          $query = $query = "SELECT 
                        id
                    FROM 
                        Tasks
                    WHERE 
                       owner_id = '" . $myuid . "'
                       and type = 'tt';";
                      
          $sth = $db->prepare($query);  
        
          $sth->execute();
          $sth->bindColumn(1,$count);



              echo $sth->rowCount();  
             
           
 ?>