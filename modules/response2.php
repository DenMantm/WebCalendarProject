


<?php
//include db configuration file
include_once("../modules/db.php");

if(isset($_POST['subject_text']) || ($_POST['location_text'])) 
{	//check $_POST["content_txt"] is not empty


	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["location_text"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentToSave1 = filter_var(date('Y-m-d',strtotime($_POST['date_text'])),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentToSave2 = filter_var($_POST["subject_text"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	// Insert sanitize string in record
	
	$insert_row = $db->prepare("INSERT INTO Meetings (location,subject,date) 
    VALUES (:var1,:var2,:var3)");
    
    try{
    $insert_row->bindParam(':var1', $contentToSave, PDO::PARAM_STR );
    $insert_row->bindParam(':var2', $contentToSave2, PDO::PARAM_STR );
    $insert_row->bindParam(':var3', $contentToSave1, PDO::PARAM_STR );
   // $insert_row->bindParam(':var4', $contentToSave3, PDO::PARAM_STR );
    $insert_row->execute();
    //$my_id = $db->lastInsertId();
    }
     
  catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}

	
	
//	$insert_row = $mysqli->query("INSERT INTO add_delete_record(content) VALUES('".$contentToSave."')");
	
	if($insert_row)
	{
		 //Record was successfully inserted, respond result back to index page
		 // $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  //echo '<li id="item_'.$my_id.'">';
		  //echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  //echo '<img src="images/icon_del.gif" border="0" />';
		  //echo '</a></div>';
		  echo $contentToSave1.'</li>';
		  //$db=null; //close db connection
  echo '<script language="javascript">';
echo 'alert("successfully saved your request !!!!")';
echo '</script>';
	}else{
		
		//header('HTTP/1.1 500 '.mysql_error()); //display sql errors.. must not output sql errors in live mode.
		header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
		exit();
	}

}

?>