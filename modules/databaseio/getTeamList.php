
<?php

require("connection.php");

 $user = $_SESSION['user']['username'];
 
          $query = "SELECT 
                        t.teamId, 
                        t.teamName, 
                        c.Count, 
                        t.role,
                        t.confirm
                    FROM 
                        (SELECT 
                            teamID, 
                            count(*) as Count 
                        FROM 
                            Teams
                        WHERE
                            confirm = 1
                        GROUP BY 
                            teamID) c, 
                        Teams t 
                    WHERE 
                        c.teamID = t.teamID 
                        and userID = '" . $user . "';";


        $sth = $db->prepare($query);  

         try{
              
          $sth->execute();
          $sth->bindColumn(1,$teamId);
          $sth->bindColumn(2,$teamName);
          $sth->bindColumn(3,$users_cout);
          $sth->bindColumn(4,$role);
          $sth->bindColumn(5,$confirmed);
        
          }
                    catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
          
                 $teams = array();
                      if( $sth->rowCount() > 0) 
                {
                  while ($row = $sth ->fetch(PDO::FETCH_BOUND)) {
                      
                       $team = array('teamId'=> $teamId,
                       'teamName'=> $teamName,
                       'Count'  => $users_cout,
                       'role'=>$role,
                       'confirm'=>$confirmed);
                       
                        array_push($teams,$team);
                  }
    
                }

            //->title;//db mapper
        
        echo json_encode($teams);

?>