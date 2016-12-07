<?php
if (isset($_POST['Completed']) && isset($_POST['description'])) {
   include_once('../views/search/ajax/lib.php');
 
  	$date_start = DateTime::createFromFormat('m/d/Y g:i A', $date_start_str);
    $start = $date_start->format('Y-m-d H:i:s');
    	$date_end = DateTime::createFromFormat('m/d/Y g:i A', $date_end_str);
    $end = $date_end->format('Y-m-d H:i:s');
   
    $subject = $_POST['subject'];
    $location = $_POST['location'];
    
    $date_start_str = $_POST['start'];
    
   $date_end_str = $_POST['end'];
    $description = $_POST['description'];
 
    $object = new CRUD();
 
    $object->Create($subject,$location, $start, $end, $description);
}
?>