<?php  
    //filter.php  
    include_once("../modules/db.php");  

          $result =''; 
          $currentTeam = $_SESSION["currentTeam"];
          $me = $_SESSION['user']['uID'];
          $query = "SELECT 
                        name, 
                        surname, 
                        username, 
                        uID
                    FROM 
                        Users
                    where uID in (  select 
                                        userUID
                                    from 
                                        Teams 
                                    where   teamID in (select 
                                                        teamID 
                                                    from 
                                                        Teams 
                                                    where 
                                                        userUID = '" . $me . "'
                                                    ) 
                                            and confirm = 1
                                    );";
                      
          $sth = $db->prepare($query);  
            
          try{
              
          $sth->execute();
          $sth->bindColumn(1,$name);
          $sth->bindColumn(2,$surname);
          $sth->bindColumn(3,$uname);
          $sth->bindColumn(4,$uid);

          }
                  
          catch(PDOException $e)
          
        	{
                echo "Error: " . $e->getMessage();
        	}
                   
           
            if( $sth->rowCount() > 0) 
                {
                  while ($row = $sth ->fetch(PDO::FETCH_BOUND)) {
                     
                    if($uid != $_SESSION['user']['uID']){
                        $result .= '<option value="'  . $uid . '">' . $name . ' ' . $surname . ' ( ' . $uname . ' )</option>';
                    }
                }
            }
         
              echo $result;  
             
           
 ?>