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
 
   
    public function Update($Email, $Username,$Password)
    {
       
       
        $query = $this->db->prepare("UPDATE Users  SET username=:Username, email = :Email, password=:Password where username= :Name");
       // $name=$_SESSION['user']['username'];
        $query->bindParam("Email", $Email, PDO::PARAM_STR);
        $query->bindParam("Name", $_SESSION['user']['username'], PDO::PARAM_STR);
         $query->bindParam("Username", $Username, PDO::PARAM_STR);
        $query->bindParam("Password", $Password, PDO::PARAM_STR);
      
        $query->execute();
    }
 
    
 
}
 
?>