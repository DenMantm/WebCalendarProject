
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Main</title>
  
<?php include('partials/head.php') ?>
<?php include_once("../modules/db.php") ?>
<script type="text/javascript" src="js/tasks.js"></script>
<link rel="stylesheet" href="/css/tasks.css">
<script type="text/javascript" src="js/metro.min.js"></script>
  
  
<style>

	body {
		margin-top: 40px;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}

</style>
  
  
  
</head>

<body>
  <?php
include('partials/navbar.php');

?>


    <div class="row">

      <!--##################-->
      <!--Left handside menu-->
      <!--##################-->

      <div class="col-md-1 remove_right_padding dark" style="height:500px;">

    
      </div>

      <!--##################-->
      <!--###   Teams   ####-->
      <!--##################-->
    
      <div class="col-md-6 remove_padding">
          <h1>TASKS</h1>
          <br/>
          <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Issued by me  <span class="badge"><?php include('../modules/get_tasks_issued.php') ?></span></a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Personal  <span class="badge">1</span></a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">To be completed  <span class="badge">0</span></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home"><?php include('../modules/show_tasks.php') ?></div>
    <div role="tabpanel" class="tab-pane" id="profile">.dd</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
  </div>

</div>
      
  
      </div>

      <!--#################################-->
      <!--### Div with meeting details ####-->
      <!--#################################-->


      <!--####################-->
      <!--###  Notes area ####-->
      <!--####################-->

      <div class="col-md-4">
        

      </div>
          <div class="modal" id="modal"></div>
    </div>

</body>