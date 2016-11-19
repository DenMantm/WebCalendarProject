
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Main</title>
  
<?php include('partials/head.php') ?>
<?php include_once("../modules/db.php") ?>
<script type="text/javascript" src="js/team.js"></script>

  

  
  
  
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}
		
	#wrap {
		width: 100%;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: right;
	
	}

</style>
  
  
  
</head>

<body>
  <div data-role="dialog" id="dialog9" class="padding20 dialog" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true" style="width: auto; height: auto; visibility: visible; left: 701.5px; top: 209px;">
            <h1>Users within that team:</h1>
            <div id="landing"></div>
        <span class="dialog-close-button"></span></div>
  <?php
include('partials/navbar.php');

?>


    <div class="row">

      <!--##################-->
      <!--Left handside menu-->
      <!--##################-->

      <div class="col-md-1 remove_right_padding dark" style="height:500px;">

        </style>
        <div class="cell">
          <ul class="sidebar no-responsive-future" id="sidebar">
            <li>
              <a href="#">
                <span class="mif-calendar icon"></span>
                <span class="title">Calendar</span>
                <span class="counter">0</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="mif-event-available icon"></span>
                <span class="title">Meetings</span>
                <span class="counter">0</span>
              </a>
            </li>
            <li class="active">
              <a href="#">
                <span class="mif-list icon"></span>
                <span class="title">Tasks</span>
                <span class="counter">0</span>
              </a>
            </li>
            <li class="active">
              <a href="/team">
                <span class="mif-list icon"></span>
                <span class="title">Teams</span>
                <span class="counter">0</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="mif-file-text icon"></span>
                <span class="title">Notes</span>
                <span class="counter">0</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="mif-cogs icon"></span>
                <span class="title">Settings</span>
                <span class="counter">0</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!--##################-->
      <!--###   Teams   ####-->
      <!--##################-->

      <div class="col-md-6 remove_padding">
        Your teams:
        
      <?php include('../modules/showteam.php') ?>
  
      </div>

      <!--#################################-->
      <!--### Div with meeting details ####-->
      <!--#################################-->


      <!--####################-->
      <!--###  Notes area ####-->
      <!--####################-->

      <div class="col-md-4">
        
        
        <button type="button" id="newmeetingBtn" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#newteam">
            Start new team</button>
            
            
                    
            
        <div class="panel" style="width: 200px; z-index: auto; top: 100px; left: 250px;" data-role="draggable">
          <div class="heading">
            <span class="icon mif-file-text"></span>
            <span class="title">Note1</span>
          </div>
          <div class="content">
            <p>
              remember
            </p>
            Kill Mr. president
            </br>

          </div>
        </div>

        <div class="panel" style="width: 200px; z-index: auto; top: 100px; left: 50px;" data-role="draggable">
          <div class="heading">
            <span class="icon mif-file-text"></span>
            <span class="title">Note2</span>
          </div>
          <div class="content">
            <p>Try not to go to the jail</p>
            <p></p>
            <p>Find out how to!</p>

          </div>
        </div>
        
        
        
        
      </div>
    </div>
    <div class="row dark">
      <div class="col-md-12 remove_right_padding dark" style="height:70px;"></div>
      <div>

      </div>

</body>