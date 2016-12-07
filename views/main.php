
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
                                    
                      
                      </div>
                
                      <!--##################-->
                      <!--###  Calendar ####-->
                      <!--##################-->
                
                      <div class="col-md-6 remove_padding">
                    
                        <div class="tabcontrol2" data-role="tabcontrol"  data-role="tabcontrol" data-on-tab-change="tab_change">
                            
                            
                            
         <ul class="tabs" id="teamsList">
                       
                       <li>
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
                   </li>
                    
                   <li>
                       <button type="button" id="newmeetingBtn"  class="btn btn-success" data-toggle="modal" data-target="#newmeeting">New meeting</button>
                   </li>      
                      
                   <li>
                       <button type="button" id="newmeetingBtn"class="btn btn-danger" data-toggle="modal" data-target="#newteammeeting">Team Tasks</button>
                   </li>      
                      
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
      

            <div id='external-events' style="max-width:200px padding:0">
        
                            <div class="frame" style="padding:7px">
                                <div class="heading">Drag and drop Actions:</div>
                                <br/>
                                <div class="content" id='user_drag_menu'>
                                    
                                    <span data-role="hint"
                                                        data-hint-background="bg-orange"
                                                        data-hint-color="fg-white"
                                                        data-hint-mode="2"
                                                        data-hint-position="top"
                                                        data-hint="Add new Meeting"
                                                    >
                                        
                                    </span>
                                    
                                  
                                    
                                    <div class='fc-event' style='background-color:orange'> Personal meeting</div></span>
                                    <div class='fc-event' style='background-color:green'> Personal task</div>
                                    
                                    <!--<div class='fc-event'> Team meeting</div>-->
                                    <!--<div class='fc-event' style='background-color:purple'> Team task</div>-->
                                  
                                
                                    
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

<?php include('partials/personal_meeting_modal.php') ?>
<?php include('partials/team_meeting_modal.php') ?>
<?php include('partials/team_task_modal.php') ?>
<?php include('partials/personal.task_modal.php') ?>

                  
        

        
<script>retrieveFromDatabase(0);</script>



</body>
</html>