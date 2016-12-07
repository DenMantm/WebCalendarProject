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
 
    /*
     * Add new Record
     *
     
     * @param $subject
     * @param $description
     * @return $mixed
     * */
    public function Create($subject,$start,$end, $description)
    {
         $start=filter_var(date('Y-m-d',strtotime($_POST['start'])),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
         $end=filter_var(date('Y-m-d',strtotime($_POST['end'])),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
        $query = $this->db->prepare("INSERT INTO Meetings(subject,start,end,description) VALUES (:subject,:start,:end,:description)");
        
        $query->bindParam("subject", $subject, PDO::PARAM_STR);
        $query->bindParam("start", $start, PDO::PARAM_STR);
        $query->bindParam("end", $end, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->execute();
        return $this->db->lastInsertId();
    }
 
  
    /*
     * Delete Record
     *
     * @param $id
     * */
    public function Delete($user_id)
    {
        $query = $this->db->prepare("DELETE FROM Meetings WHERE id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
       
        $query->execute();
    }
 
    /*
     * Update Record
     *
     * @param $
     * @param $subject
     * @param $description
     * @return $mixed
     * */
    public function Update($subject,$start,$end, $description,$id)
    {
        $query = $this->db->prepare("UPDATE Meetings SET subject = :subject,start=:start,end=:end, description = :description  WHERE id = :id");
       
        $query->bindParam("subject", $subject, PDO::PARAM_STR);
        $query->bindParam("start", $start, PDO::PARAM_STR);
        $query->bindParam("end", $end, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
    }
 
    /*
     * Get Details
     *
     * @param $id
     * */
    public function Details($id)
    {
        $query = $this->db->prepare("SELECT * FROM Meetings WHERE id = :id");
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }
    
      /*
     * Read all records
     *
     * @return $mixed
     * */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM Meetings");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
 
}
 
?>