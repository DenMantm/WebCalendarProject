<?php  
    //filter.php  
    include_once("../modules/db.php");  

          $output = ''; 
          $user = $_SESSION['user']['username'];
          $query = "SELECT teamId, teamName, count(*) as users_cout 
                      FROM Teams 
                      where teamId in 
                          (Select teamId 
                          from Teams 
                          where userID = '" . $user . "') 
                      group by teamID;";
                      
          $sth = $db->prepare($query);  
            
          try{
              
          $sth->execute();
          $sth->bindColumn(1,$teamId);
          $sth->bindColumn(2,$teamName);
          $sth->bindColumn(3,$users_cout);
        
          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $sth->rowCount() > 0) 
                {
                  while ($row = $sth ->fetch(PDO::FETCH_BOUND)) {
  
                          $output .= '  
                        <div class="row">
                          <div class="col-md-3">' . $teamName . '</div>
                          <div class="col-md-1"><div>Users:</div>' . $users_cout . '<div></div></div>
                          <div class="col-md-1">' . $teamId . '</div></div>';  
                  } 
                }
                else  
                {  
                  $output .= '<div> You are are not member of any team yet. Create your own or ask to be invited to exsisting one </div>';
                }  
                    
              echo $output;  
             exit();
 ?>