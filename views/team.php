
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Main</title>
  
<?php include('partials/head.php') ?>
<?php include_once("../modules/db.php") ?>
<script type="text/javascript" src="js/team.js"></script>
<script type="text/javascript" src="js/select2.full.min.js"></script>

  

  
  
  
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
  <div data-role="dialog" id="dialog9" class="padding20 dialog info" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true" style="width: auto; height: auto; visibility: visible; left: 701.5px; top: 209px;">
            <h1>Users within that team:</h1>
            <div id="landing"></div>
        <span class="dialog-close-button"></span></div>
        
        <div data-role="dialog" id="dialog8" class="padding20 dialog success" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true" style="width: auto; height: auto; visibility: visible; left: 701.5px; top: 209px;">
            <h1>Invitation sent</h1>
            <div id="landing2"></div>
            <span class="dialog-close-button"></span></div>
            
            <div data-role="dialog" id="dialog7" class="padding20 dialog info" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true" data-windows-style="true" style="left: 0px; right: 0px; width: auto; height: auto; visibility: visible; top: 429.5px;">
            <h1>Edit</h1>
            <div id="landing3"></div>
        <span class="dialog-close-button"></span></div>
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

    </div>
      <div class="modal fade" id="newteam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">New team</h4>
            </div>
            <div class="modal-body">
              
              <div class="row">
                <label class="col-sm-3" control-label>Team name:</label>
                <div class="col-sm-9">
                  <input type="text" name="team_name" id="t_name" class="form-control" placeholder="Enter name of the team here" required/>
                </div>
              </div>
              
 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btnSaveNewTeam" class="btn btn-primary">Create</button>
</div>
</div>
</div>
</div>


<div class="modal fade" id="invite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Invite new user to the team</h4>
            </div>
            <div class="modal-body">
              
              <div class="row">
                <label class="col-sm-3" control-label>Email address:</label>
                <div class="col-sm-9">
                  <select id="i_email" class="js-example-basic-single js-states form-control" multiple="multiple" style="width: 100%;">
                    </select>
                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-3" control-label>Role:</label>
                <div class="col-sm-9" >
                  <div class="btn-group pull-left" data-toggle="buttons">
                <label class="btn btn-primary active">
                  <input type="radio" name="role" value="user" autocomplete="off" checked> User
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="role" value="editor" autocomplete="off"> Editor
                </label>
              </div>
                </div>
              </div>
              
 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btnSendInvite" class="btn btn-primary">Create</button>
</div>
</div>
</div>
</div>
</body>