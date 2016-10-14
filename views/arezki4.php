
<?php
session_start();


require('../modules/db.php');


echo htmlentities($_SESSION['user'][':username'], ENT_QUOTES, 'UTF-8'); 

If(isset($_POST['submit'])){
    try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // prepare sql and bind parameters
   $stmt = $db->prepare("INSERT INTO task (task_note,task_owner,date)
    VALUES (:stu_name,:owner_name,:date)");
    $stmt->bindParam(':stu_name', $stu_name);
    $stmt->bindParam(':owner_name', $owner_name);
   $stmt->bindParam(':date', $date);

    $stu_name = $_POST['stu_name'];
    $owner_name = $_POST['owner_name'];
     $date = $_POST['date'];
     
    $stmt->execute();
    echo "New records created successfully";
}catch(PDOException $e){
  echo "Error: " . $e->getMessage();
}
$conn = null;
}

?>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    
 Task:        <input type="text" name="stu_name">
  Your Name:  <input type="text" name="owner_name">
  Date:       <input type="date" name="date">
  
  <input type="submit" name="submit" value="submit">
</form>

<?php

$result = $db->prepare("SELECT task_note, Task_owner FROM task");
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$title = $row['task_note'];
$Name = $row['Task_owner'];
}

echo "Hi ".$Name;
echo "<br />\n";
echo "Your task is : ". $title;

?>