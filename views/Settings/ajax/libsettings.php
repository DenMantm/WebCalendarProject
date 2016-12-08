<?php
 
//require __DIR__ . '/db_connection.php';
include_once('../views/search/ajax/db_connection.php');
 
class CRUD
{
 
    protected $db;
 
    function __construct()
    {
        $this->db = DB();
    }
 
    function __destruct()
    {
        $this->db = null;
    }
 
   
    public function Update($Email,$Firstname,$Surname,$Username,$Password,$Salt)
    {
        $query = $this->db->prepare("UPDATE Users  SET  email = :Email,name=:Firstname,surname=:Surname,username=:Username, password=:Password, salt=:Salt where username= :Name");
       // $name=$_SESSION['user']['username'];
        $query->bindParam("Email", $Email, PDO::PARAM_STR);
        $query->bindParam("Name", $_SESSION['user']['username'], PDO::PARAM_STR);
        $query->bindParam("Username", $Username, PDO::PARAM_STR);
         $query->bindParam("Firstname", $Firstname, PDO::PARAM_STR);
          $query->bindParam("Surname", $Surname, PDO::PARAM_STR);
        $query->bindParam("Password", $Password, PDO::PARAM_STR);
        $query->bindParam("Salt", $Salt, PDO::PARAM_STR);
         
        
        $query->execute();
        
    }
 
    
 
}


 
?>