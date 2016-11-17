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
                 <table class="table table-bordered table-condensed table-hover table-striped">  
                      <tr>  
                           <th width="15%">Meeting No̲</th> 
                           <th width="5%">Title</th>  
                           <th width="30%">Subject</th>  
                           <th width="43%">Date</th>  
                          
                           <th width="12%">Location</th>  
                           
                      </tr>  
            ';  
           
            
             $result = $sth->fetch();
            
             //echo(array_values($result));
          //print_r(array_values($result));
        
            
            
         
            if( $sth->rowCount() > 0) 
            {  
               
                
                // while($row = $result->fetch(PDO::FETCH_ASSOC))  
                while ($row = $sth->fetch())
                 {  
                  extract($row);
                      $output .= '  
                           <tr>  
                                <td>'. $row["meetingID"] .'</td>  
                                <td>'. $row["title"] .'</td>  
                                <td>'. $row["subject"] .'</td>  
                                <td>'. $row["date"] .'</td>  
                                <td>'. $row["location"] .'</td>  
                                 <td>
                <a class="delete_product" data-id="$row["meetingID"]" href="javascript:void(0)">
                <i class="glyphicon glyphicon-trash"></i>
                </a></td>
                           </tr>  
                      ';  
                   
                 } 
                }
                
     
            else  
            {  
                 $output .= '  
                      <tr>  
                           <td colspan="5">You have no Meetings yet !!</td>  
                      </tr>  
                 ';  
                
            }  
            
         
      
      $output .= '</table>';  
      echo $output;  
     exit();
       
 }  
 ?>  