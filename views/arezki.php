<?php

require('../modules/db.php');

$db = new Database();

$sql = 'SELECT * FROM user WHERE username = :username';

          $results = $db->select($sql,
          [
                    [
                      'placeholder' => ':username',
                      'value'       => $_GET['username'],
                      'type'        => PDO::PARAM_STR
                    ]
          ]
          );
          
          foreach ($results as $result) {
            echo 'Id = ' . $result->id . '<br />';
            echo 'Name = ' . $result->username;
            
          }
          
          
          echo '<pre>';
          print_r($result);die;

// $name=$_POST['fname'];
// if (!$con1)
//   {
//   die('Could not connect: ' . mysql_error());
//   }
 
// mysqli_select_db("calendar", $con1);
 
// $sql="INSERT INTO task (fname)
// VALUES
// ('$name')";
 
// if (!mysqli_query($sql,$con1))
//   {
//   die('Error: ' . mysql_error());
//   }
// echo "1 record added";
 
// mysql_close($con1)
?>

<html>
<body>

<form action="arezki.php" method="post">
Task: <input type="text" name="fname" /><br><br>

 
<input type="submit" />
</form>
</body>
</html>
