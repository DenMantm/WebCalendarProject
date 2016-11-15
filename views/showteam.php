<?php  
    //filter.php  
    include_once("../modules/db.php");  

    $output = ''; 
    $user = $_SESSION['user']['username'];
      
    $sth = $db->prepare("SELECT teamId, teamName, count(*) as users_cout FROM Teams group by teamID;");  
      
    try{
        
    $sth->bindParam(':var1', $user ,PDO::PARAM_STR  );
    $sth->execute();
       
    }
            
    catch(PDOException $e)
    
	{
        echo "Error: " . $e->getMessage();
	}
           
    $result = $sth->fetch();
    echo(array_values($result));
    print_r(array_values($result));
    if( $sth->rowCount() > 0) 
        {
        
        //foreach ($result as $key => $value) 
        //while ($row = $sth->fetch())
        while($row = mysql_fetch_array($result)) {
            
                //extract($row);
            
                $output .= '  
                
                <div class="col-md-3">' . $row['teamName'] . '</div>
                <div class="col-md-1"><div>Users:</div>' . $row['users_count'] . '<div></div></div>
                <div class="col-md-1">' . $row['teamId'] . '</div>';  
                   
            } 
        }
        else  
        {  
            $output .= '<div> You are are not member of any team yet. Create your own or ask to be invited to exsisting one</div>';
        }  
            
      echo $output;  
     exit();
 ?>