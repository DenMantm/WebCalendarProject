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
     * @param $location
     * @param $subject
     * @param $title
     * @return $mixed
     * */
    public function Create($location, $subject, $title)
    {
        $query = $this->db->prepare("INSERT INTO Meetings(location,subject,title) VALUES (:location,:subject,:title)");
        $query->bindParam("location", $location, PDO::PARAM_STR);
        $query->bindParam("subject", $subject, PDO::PARAM_STR);
        $query->bindParam("title", $title, PDO::PARAM_STR);
        $query->execute();
        return $this->db->lastInsertId();
    }
 
  
    /*
     * Delete Record
     *
     * @param $meetingID
     * */
    public function Delete($user_id)
    {
        $query = $this->db->prepare("DELETE FROM Meetings WHERE meetingID = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
    }
 
    /*
     * Update Record
     *
     * @param $
     * @param $subject
     * @param $title
     * @return $mixed
     * */
    public function Update($location, $subject, $title, $meetingID)
    {
        $query = $this->db->prepare("UPDATE Meetings SET location = :location, subject = :subject, title = :title  WHERE meetingID = :id");
        $query->bindParam("location", $location, PDO::PARAM_STR);
        $query->bindParam("subject", $subject, PDO::PARAM_STR);
        $query->bindParam("title", $title, PDO::PARAM_STR);
        $query->bindParam("id", $meetingID, PDO::PARAM_STR);
        $query->execute();
    }
 
    /*
     * Get Details
     *
     * @param $meetingID
     * */
    public function Details($meetingID)
    {
        $query = $this->db->prepare("SELECT * FROM Meetings WHERE meetingID = :id");
        $query->bindParam("id", $meetingID, PDO::PARAM_STR);
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