<?php  
    //filter.php  
    include_once("../modules/db.php");  
        $me = $_SESSION['user']['uID'];
        $result ='<div><br/></div>'; 
        $query = "SELECT 
	                c.meetingID, c.count, m.subject, m.location, m.start, m.type
                FROM 
	               (SELECT meetingID, count(*) as count FROM Participants GROUP BY meetingID) c
                   left join Participants p
                   on p.meetingID = c.meetingID
                   left  join Meetings m
                   on m.meetingID = p.meetingID
                WHERE
                    p.participantID ='" . $me . "'
                    and p.accepted = 1;";
                      
          $sth = $db->prepare($query);  
            
          try{
              
          $sth->execute();
          $sth->bindColumn(1,$meetingID);
          $sth->bindColumn(2,$count);
          $sth->bindColumn(3,$subject);
          $sth->bindColumn(4,$location);
          $sth->bindColumn(5,$start_date);
          $sth->bindColumn(6,$type);
          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $sth->rowCount() > 0) 
                {
                  while ($row = $sth ->fetch(PDO::FETCH_BOUND)) {
                     
                        $result .= '<p><div>Invitation to the:</div>
                                    <div>' . $subject . '</div>
                                    <div> with ' . $count . ' other users</div>
                                    <div> on ' . $stat_date . '</div></p>';
                }
            }
         
              echo $result;  
             
           
 ?>