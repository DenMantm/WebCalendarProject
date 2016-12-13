
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Main</title>
  
<?php include 'partials/head.php'?>
<?php include_once '../modules/db.php'?>
<script type="text/javascript" src="js/team.js"></script>
<script type="text/javascript" src="js/select2.full.min.js"></script>
<link rel="stylesheet" href="/css/tasks.css">

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
include 'partials/navbar.php';

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

      <div class="col-md-6">
        <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#my_teams" aria-controls="my_teams" role="tab" data-toggle="tab">My Teams  <span class="badge"><?php include '../modules/get_tasks_issued.php'?></span></a></li>
    <li role="presentation"><a href="#personal" onclick="populate_pt(); return false;" aria-controls="personal" role="tab" data-toggle="tab">My invitations  <span class="badge"><?php include '../modules/get_personal.php'?></span></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="my_teams"><?php include '../modules/show_my_teams.php'?></div>
    <div role="tabpanel" class="tab-pane" id="personal"></div>
  </div>

  
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

</body>