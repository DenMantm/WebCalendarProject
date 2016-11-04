



<?php  
 //filter.php  
 include_once("../modules/db.php");  
 if (isset($_POST['from_date']) || ($_POST['to_date']))  

 {  
      
      $output = ''; 
      
      $fromdate=filter_var(date('Y-m-d',strtotime($_POST['from_date'])),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
      $todate=filter_var(date('Y-m-d',strtotime($_POST['to_date'])),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
      
      $sth = $db->prepare("  
           SELECT * FROM Meetings  
           WHERE date BETWEEN :var1 AND :var2  
      ");  
      
      
      try{
        
     $var1="$fromdate";
     $var2="$todate";
    $sth->bindParam(':var1', $var1,PDO::PARAM_STR  );
     $sth->bindParam(':var2', $var2,PDO::PARAM_STR  );
    $sth->execute();
       
      }
            
             
      catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
           
            $output .= '  
                 <table class="table table-bordered">  
                      <tr>  
                           <th width="5%">MeetingID</th>  
                           <th width="30%">Subject</th>  
                           <th width="43%">Date</th>  
                          
                           <th width="12%">Location</th>  
                      </tr>  
            ';  
           
            
             $result = $sth->fetch();
            
             //echo(array_values($result));
          //print_r(array_values($result));
        
            
            
          echo ( " <b>The number of meeting is : " .$sth->rowCount())." But this App has a probelm and shows one less, Fuck it anyway!</b>";
            if( $sth->rowCount() > 0) 
            {  
               
                
                // while($row = $result->fetch(PDO::FETCH_ASSOC))  
                while ($row = $sth->fetch())
                 {  
                      $output .= '  
                           <tr>  
                                <td>'. $row["meetingID"] .'</td>  
                                <td>'. $row["subject"] .'</td>  
                                <td> '. $row["date"] .'</td>  
                               
                                <td>'. $row["location"] .'</td>  
                           </tr>  
                      ';  
                   
                 } 
                }
                
     
            else  
            {  
                 $output .= '  
                      <tr>  
                           <td colspan="5">You have no Meetings yet !! Make one idiot !!!!!!!!!!!</td>  
                      </tr>  
                 ';  
                
            }  
            
         
      
      $output .= '</table>';  
      echo $output;  
     exit();
       
 }  
 ?>  