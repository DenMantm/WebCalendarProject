
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Main</title>

<?php include('partials/head.php') ?>
<script src='calendarLib/lib/moment.min.js'></script>
    <link rel="stylesheet" href="/css/calendar.css">
    <link href='css/main.css' rel='stylesheet' media='print' />
    <link href='calendarLib/fullcalendar.css' rel='stylesheet' />
    <link href='calendarLib/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='calendarLib/lib/jquery.min.js'></script>
    <script src='calendarLib/lib/jquery-ui.min.js'></script>
    <script src='calendarLib/fullcalendar.min.js'></script>
    <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/target.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/select2.full.min.js"></script>
  

</head>
<body>
  <?php include('partials/navbar.php') ?>

<h1 id = "m_calendar_name">Team Calendar - International Flinstones</h1>
<hr/>
    <div class="row">

      <!--##################-->
      <!--Left handside menu-->
      <!--##################-->

      <div class="col-md-2 remove_right_padding" style="min-width:250px; margin-left:10px">

        <div class="cell">
                        <h5>TreeView</h5>
                        <div class="treeview" data-role="treeview">
                            <ul>
                                <li class="node" >
                                    <span class="leaf">MiniCalendar</span>
                                    <span class="node-toggle"></span>
                                    <ul>
                                        <li style="padding: 0;"><span class="leaf">
                                          
   <div data-role="calendar" class="calendar" data-day-click="day_click">
   <div class="calendar-grid" >
      <div class="calendar-row no-margin calendar-header">
         <div class="calendar-cell align-center"><a class="btn-previous-year" href="#">-</a></div>
         <div class="calendar-cell align-center"><a class="btn-previous-month" href="#">〈</a></div>
         <div class="calendar-cell sel-month align-center"><a class="btn-select-month" href="#">November 2016</a></div>
         <div class="calendar-cell align-center"><a class="btn-next-month" href="#">〉</a></div>
         <div class="calendar-cell align-center"><a class="btn-next-year" href="#">+</a></div>
      </div>
      <div class="calendar-row week-days calendar-subheader">
         <div class="calendar-cell align-center day-of-week">
            <div>Su</div>
         </div>
         <div class="calendar-cell align-center day-of-week">
            <div>Mo</div>
         </div>
         <div class="calendar-cell align-center day-of-week">
            <div>Tu</div>
         </div>
         <div class="calendar-cell align-center day-of-week">
            <div>We</div>
         </div>
         <div class="calendar-cell align-center day-of-week">
            <div>Th</div>
         </div>
         <div class="calendar-cell align-center day-of-week">
            <div>Fr</div>
         </div>
         <div class="calendar-cell align-center day-of-week">
            <div>Sa</div>
         </div>
      </div>
      <div class="calendar-row">
         <div class="calendar-cell empty">
            <div class="other-day">30</div>
         </div>
         <div class="calendar-cell empty">
            <div class="other-day">31</div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">1</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">2</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">3</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">4</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">5</a></div>
         </div>
      </div>
      <div class="calendar-row">
         <div class="calendar-cell align-center day">
            <div><a href="#">6</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">7</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">8</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">9</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">10</a></div>
         </div>
         <div class="calendar-cell align-center day today">
            <div><a href="#">11</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">12</a></div>
         </div>
      </div>
      <div class="calendar-row">
         <div class="calendar-cell align-center day">
            <div><a href="#">13</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">14</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">15</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">16</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">17</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">18</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">19</a></div>
         </div>
      </div>
      <div class="calendar-row">
         <div class="calendar-cell align-center day">
            <div><a href="#">20</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">21</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">22</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">23</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">24</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">25</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">26</a></div>
         </div>
      </div>
      <div class="calendar-row">
         <div class="calendar-cell align-center day">
            <div><a href="#">27</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">28</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">29</a></div>
         </div>
         <div class="calendar-cell align-center day">
            <div><a href="#">30</a></div>
         </div>
         <div class="calendar-cell empty">
            <div class="other-day">1</div>
         </div>
         <div class="calendar-cell empty">
            <div class="other-day">2</div>
         </div>
         <div class="calendar-cell empty">
            <div class="other-day">3</div>
         </div>
      </div>
      <div class="calendar-row calendar-actions">
         <div class="align-center"><button class="button calendar-btn-today small-button success">Today</button></div>
      </div>
   </div>
</div>
                                    
                                          
                                          
                                        </span></li>
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
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
                    
                    <div class="cell">
                        <h5>Chose Team</h5>
                        <div class="treeview" data-role="treeview">
                            <ul>
                                <li class="node" data-mode="checkbox" data-name="c0">
                                    <label class="input-control checkbox small-check"><input type="checkbox" name="c0" class=""><span class="check"></span></label><span class="leaf">Calendars:</span>
                                    <span class="node-toggle"></span>
                                    <ul>
                                        <li data-mode="checkbox" data-name="c3_1_1">
                                            <label class="input-control checkbox small-check"><input type="checkbox" name="c3_1_1"><span class="check"></span></label><span class="leaf">Team Calendar 1</span>
                                        </li>
                                                                                <li data-mode="checkbox" data-name="c3_1_1">
                                            <label class="input-control checkbox small-check"><input type="checkbox" name="c3_1_1"><span class="check"></span></label><span class="leaf">Team Calendar 2</span>
                                        </li>
                                        <li data-mode="checkbox" data-name="c3_1_1">
                                            <label class="input-control checkbox small-check"><input type="checkbox" name="c3_1_1"><span class="check"></span></label><span class="leaf">My Calendar</span>
                                        </li>
                                        <li data-mode="checkbox" data-name="c1" class="node">
                                            <label class="input-control checkbox small-check"><input type="checkbox" name="c1"><span class="check"></span></label><span class="leaf">International Flinstones</span>
                                            <span class="node-toggle"></span>
                                            <ul>
                                                <li data-mode="checkbox" data-name="c1_1">
                                                    <label class="input-control checkbox small-check"><input type="checkbox" name="c1_1"><span class="check"></span></label><span class="leaf">Deniss</span>
                                                </li>
                                                <li data-mode="checkbox" data-name="c1_2">
                                                    <label class="input-control checkbox small-check"><input type="checkbox" name="c1_2"><span class="check"></span></label><span class="leaf">Kamil</span>
                                                </li>
                                                <li data-mode="checkbox" data-name="c1_3">
                                                    <label class="input-control checkbox small-check"><input type="checkbox" name="c1_3"><span class="check"></span></label><span class="leaf">Arezki</span>
                                                </li>
                                                <li data-mode="checkbox" data-name="c1_4">
                                                    <label class="input-control checkbox small-check"><input type="checkbox" name="c1_4"><span class="check"></span></label><span class="leaf">Maurice</span>
                                                </li>
                                                  <li data-mode="checkbox" data-name="c1_5">
                                                    <label class="input-control checkbox small-check"><input type="checkbox" name="c1_5"><span class="check"></span></label><span class="leaf">Michael</span>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    

      </div>

      <!--##################-->
      <!--###  Calendar ####-->
      <!--##################-->

      <div class="col-md-6 remove_padding">
    
        <div class="tabcontrol2" data-role="tabcontrol"  data-role="tabcontrol" data-on-tab-change="tab_change">>
   <ul class="tabs" id="teamsList">
       
       
       <?php 
       $test =  require('../modules/databaseio/calendarDatabaseOutput.php');
       
       $teamList = $test -> getTeamListStatic();
       
       //personal calendar tab - >
               session_start();
        $uID = $_SESSION['user']['uID'];
       
       echo '<li class=""><a href="#frame_static" id="teamClick" name = "personal">Personal Calendar</a></li>';
       
       
       foreach($teamList as $team){
       
       //echo '<li class="active"><a href="#frame_static">Team1</a></li>';
       
       echo '<li class=""><a href="#frame_static" id="teamClick" name = "'.$team->teamID.'">'.$team->teamName.'</a></li>';
       
       }
       
       
       ?>
   
      
      
   </ul>
   <div class="frames">
                               <!--CONTROL TAB 1-->
      <div class="frame" id="frame_static" style="display: none;">
          <div id='calendar'></div>
        </div>

   </div>
</div>
        
		

		


      </div>

      <!--#################################-->
      <!--### Div with meeting details ####-->
      <!--#################################-->


      <!--####################-->
      <!--###  Notes area ####-->
      <!--####################-->

      <div class="col-md-3">
        
        <br/>
        <br/>
        <br/>
        
<div class="tabcontrol2" data-role="tabcontrol">
   <ul class="tabs">
      <li class="active"><a href="#frame_1_1">Insert New Tasks</a></li>
      <li class=""><a href="#frame_1_2">Delete Tasks</a></li>
   </ul>
   <div class="frames">
     
     
                               <!--CONTROL TAB 1-->
                               
                               
      <div class="frame" id="frame_1_1" style="display: none;">
      <button type="button" id="newmeetingBtn" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#newmeeting">New meeting</button>

            <div id='external-events' style="max-width:200px padding:0">
            <div class="accordion" data-role="accordion" data-close-any="true">
                            <div class="frame" style="padding:7px">
                                <div class="heading">Actions</div>
                                <div class="content" style="display: none;">
                                    <span data-role="hint"
                                                        data-hint-background="bg-orange"
                                                        data-hint-color="fg-white"
                                                        data-hint-mode="2"
                                                        data-hint-position="top"
                                                        data-hint="Add new Meeting"
                                                    ><div class='fc-event' style="background-color:orange"> Personal meeting</div></span>
                                    <div class='fc-event' style="background-color:green"> Personal task</div>
                                    <div class='fc-event'> Team meeting</div>
                                    <div class='fc-event' style="background-color:purple"> Team task</div>
                                  
                                    
                                    
                                </div>
                            </div>
                            <div class="frame" style="padding:7px">
                                <div class="heading">Team Calendar 1</div>
                                <div class="content" style="display: none;">
                                    
                                </div>
                            </div>
                            <div class="frame" style="padding:7px">
                                <div class="heading">Team calendar 2</div>
                                <div class="content">
                                   
                                </div>
                            </div>
                        </div>
            </div>
        
        </div>
        
        
                                      <!--CONTROL TAB 2-->
        
      <div class="frame" id="frame_1_2" style="display: block;">
        
        <h2>Drag Task here to delete</h2>
      </div>
   </div>
</div>
        
            
            
            
            <!--Commenting out for now-->
            
        <!--<div class="panel" style="width: 200px; z-index: auto; top: 100px; left: 250px;" data-role="draggable">-->
        <!--  <div class="heading">-->
        <!--    <span class="icon mif-file-text"></span>-->
        <!--    <span class="title">Note1</span>-->
        <!--  </div>-->
        <!--  <div class="content">-->
        <!--    <p>-->
        <!--      remember-->
        <!--    </p>-->
        <!--    Kill Mr. president-->
        <!--    </br>-->

        <!--  </div>-->
        <!--</div>-->

        <!--<div class="panel" style="width: 200px; z-index: auto; top: 100px; left: 50px;" data-role="draggable">-->
        <!--  <div class="heading">-->
        <!--    <span class="icon mif-file-text"></span>-->
        <!--    <span class="title">Note2</span>-->
        <!--  </div>-->
        <!--  <div class="content">-->
        <!--    <p>Try not to go to the jail</p>-->
        <!--    <p></p>-->
        <!--    <p>Find out how to!</p>-->

        <!--  </div>-->
        <!--</div>-->
        
        
        
        
      </div>
    </div>


      <!--Dialog box for new meeting-->

      <div class="modal fade" id="newmeeting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">New meeting</h4>
            </div>
            
            
            <div class="modal-body">
                <div class="row">
                <label class="col-sm-2" control-label>Subject</label>
                <div class="col-sm-10">
                  <input type="text" name="title_text"id="m_subject" class="form-control" placeholder="Enter The Task Title here" required/>
                  

                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2" control-label>Participants</label>
                <div class="col-sm-10">
                    <select id="m_participants" class="js-example-basic-single js-states form-control" multiple="multiple" style="width: 100%;">
                        <?php include("../modules/getemails.php") ?>
                    </select>
                  
                </div>
              </div>
              
              <div class="row">
                <label htmlFor="inputCode" class="col-sm-2" control-label>Location</label>
                <div class="col-sm-10">
                  <input type="text"name="location_text" id="m_location" class="form-control" placeholder="Enter meeting location here" required/>
                </div>
              </div>
              
             <div class="row">
                <label htmlFor="inputName" class="col-sm-2" control-label>Details</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="m_details" placeholder="Enter meeting details here" rows="7"></textarea>
                </div>
              </div>
              
            <div class="row">
                <label htmlFor="inputDate" class="col-sm-2" control-label>Start date</label>
                <div class="col-sm-10">
                  <input type="text" id="m_from" name="date_text"class="form-control" placeholder="Choose date"  required/>
                  <script type="text/javascript">
                    $(function() {
                      $('#m_from').datetimepicker();
                      dateFormat: 'yy-mm-dd'
                    });
                    
                  </script>
                  
                </div>
              </div>
            <div class="row">
                <label htmlFor="inputDate" class="col-sm-2" control-label>End date</label>
                <div class="col-sm-10">
                  <input type="text" id="m_to" name="date_text"class="form-control" placeholder="Choose date" required/>
                  <script type="text/javascript">
                    $(function() {
                      $('#m_to').datetimepicker();
                      dateFormat: 'yy-mm-dd'
                    });
                    
                  </script>
                  
                </div>
              </div>
              <!-- end of toggle -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btnSaveNewMeeting" class="btn btn-primary">Save</button>
            </div>

          </div>
        </div>
        </div>
        
        
        
         <div class="modal fade" id="newteammeeting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">New meeting</h4>
            </div>
            
            
            <div class="modal-body">
                <div class="row">
                <label class="col-sm-2" control-label>Subject</label>
                <div class="col-sm-10">
                  <input type="text" name="title_text"id="m_subject" class="form-control" placeholder="Enter The Task Title here" required/>
                  

                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2" control-label>Participants</label>
                <div class="col-sm-10">
                    <select id="m_participants" class="js-example-basic-single js-states form-control" multiple="multiple" style="width: 100%;">
                        <?php include("../modules/getteams.php") ?>
                    </select>
                  
                </div>
              </div>
              
              <div class="row">
                <label htmlFor="inputCode" class="col-sm-2" control-label>Location</label>
                <div class="col-sm-10">
                  <input type="text"name="location_text" id="m_location" class="form-control" placeholder="Enter meeting location here" required/>
                </div>
              </div>
              
             <div class="row">
                <label htmlFor="inputName" class="col-sm-2" control-label>Details</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="m_details" placeholder="Enter meeting details here" rows="7"></textarea>
                </div>
              </div>
              
            <div class="row">
                <label htmlFor="inputDate" class="col-sm-2" control-label>Start date</label>
                <div class="col-sm-10">
                  <input type="text" id="m_from" name="date_text"class="form-control" placeholder="Choose date"  required/>
                  <script type="text/javascript">
                    $(function() {
                      $('#m_from').datetimepicker();
                      dateFormat: 'yy-mm-dd'
                    });
                    
                  </script>
                  
                </div>
              </div>
            <div class="row">
                <label htmlFor="inputDate" class="col-sm-2" control-label>End date</label>
                <div class="col-sm-10">
                  <input type="text" id="m_to" name="date_text"class="form-control" placeholder="Choose date" required/>
                  <script type="text/javascript">
                    $(function() {
                      $('#m_to').datetimepicker();
                      dateFormat: 'yy-mm-dd'
                      
                    });
                    
                  </script>
                  
                </div>
              </div>
              <!-- end of toggle -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btnSaveNewTeamMeeting" class="btn btn-primary">Save</button>
            </div>

          </div>
        </div>
        </div>
<script>retrieveFromDatabase(0);</script>

</body>
</html>