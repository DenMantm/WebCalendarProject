
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Main</title>
<?php include('partials/head.php') ?>


</head>

<body>
  
<?php include('partials/navbar.php'); ?>

<h1 id = "m_calendar_name">Team Calendar - International Flinstones</h1>
<hr/>
    <div class="row">

      <!--##################-->
      <!--Left handside menu-->
      <!--##################-->

      <div class="col-md-2 remove_right_padding" style="min-width:250px; margin-left:10px">

        <!--<div class="cell">-->
        <!--  <ul class="sidebar" id="sidebar">-->
        <!--    <li>-->
        <!--      <a href="#">-->
        <!--        <span class="mif-calendar icon"></span>-->
        <!--        <span class="title">Events</span>-->
        <!--        <span class="counter">0</span>-->
        <!--      </a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--      <a href="#">-->
        <!--        <span class="mif-event-available icon"></span>-->
        <!--        <span class="title">Meetings</span>-->
        <!--        <span class="counter">0</span>-->
        <!--      </a>-->
        <!--    </li>-->
        <!--    <li class="active">-->
        <!--      <a href="#">-->
        <!--        <span class="mif-list icon"></span>-->
        <!--        <span class="title">Tasks</span>-->
        <!--        <span class="counter">0</span>-->
        <!--      </a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--      <a href="#">-->
        <!--        <span class="mif-file-text icon"></span>-->
        <!--        <span class="title">Notes</span>-->
        <!--        <span class="counter">0</span>-->
        <!--      </a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--      <a href="#">-->
        <!--        <span class="mif-cogs icon"></span>-->
        <!--        <span class="title">Settings</span>-->
        <!--        <span class="counter">0</span>-->
        <!--      </a>-->
        <!--    </li>-->

            
        <!--  </ul>-->
        <!--</div>-->
        
        <div class="cell">
                        <h5>TreeView</h5>
                        <div class="treeview" data-role="treeview">
                            <ul>
                                <li class="node" >
                                    <span class="leaf">MiniCalendar</span>
                                    <span class="node-toggle"></span>
                                    <ul>
                                        <li style="padding: 0;"><span class="leaf">
                                          
   <div data-role="calendar" class="calendar">
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
                                <!--<li class="node">-->
                                <!--  <span class="node-toggle"></span>-->
                                <!--    <span class="leaf">My Calendars</span>-->
                                    
                                <!--    <ul>-->
                                <!--        <li class="node collapsed">-->
                                <!--            <span class="leaf">International Flinstones</span>-->
                                <!--            <span class="node-toggle"></span>-->
                                <!--            <ul style="display: none;">-->
                                <!--                <li><span class="leaf">Deniss</span></li>-->
                                <!--                <li><span class="leaf">Kamil</span></li>-->
                                <!--                <li><span class="leaf">Arezki</span></li>-->
                                <!--                <li><span class="leaf">Maurice</span></li>-->
                                <!--                <li><span class="leaf">Michael</span></li>-->
                                <!--            </ul>-->
                                <!--        </li>-->
                                <!--        <li><span class="leaf">My Calendar</span></li>-->
                                <!--        <li><span class="leaf">Team Calendar 1</span></li>-->
                                <!--        <li><span class="leaf">Team Calendar 2</span></li>-->
                                <!--        <li><span class="leaf">Team Calendar 3</span></li>-->
                                <!--    </ul>-->
                                <!--</li>-->
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="cell">
                        <h5>Filter Calendars</h5>
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
	<div id='wrap'>

		<div id='calendar'></div>

		

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
                                <div class="heading">International Flinstones</div>
                                <div class="content" style="display: none;">
                                    <span data-role="hint"
                                                        data-hint-background="bg-orange"
                                                        data-hint-color="fg-white"
                                                        data-hint-mode="2"
                                                        data-hint-position="top"
                                                        data-hint="Presenting|Wo is this guy?"
                                                    ><div class='fc-event' style="background-color:orange">Deniss</div></span>
                                    <div class='fc-event' style="background-color:red">Kamil</div>
                                    <div class='fc-event' style="background-color:green">Arezki</div>
                                    <div class='fc-event'>Maurice</div>
                                    <div class='fc-event' style="background-color:purple">Michael</div>
                                  
                                    
                                    
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
                <label class="col-sm-2" control-label>Participants</label>
                <div class="col-sm-10">
                  <input type="text" name="participants_text"id="m_to" class="form-control" placeholder="Enter participants here" required/>
                  
                  
                  
                </div>
              </div>
              
              <div class="row">
                <label htmlFor="inputName" class="col-sm-2" control-label>Subject</label>
                <div class="col-sm-10">
                  <input type="text" name="subject_text" id="m_subject" class="form-control" placeholder="Enter meeting subject here" required/>
                </div>
              </div>
              
              <div class="row">
                <label htmlFor="inputCode" class="col-sm-2" control-label>Location</label>
                <div class="col-sm-10">
                  <input type="text"name="location_text" id="m_location" class="form-control" placeholder="Enter meeting location here" required/>
                </div>
              </div>
              
              <div class="row">
                <label htmlFor="inputDate" class="col-sm-2" control-label>Date</label>
                <div class="col-sm-10">
                  
                  <!--<input type="text" id="m_date" name="date_text"class="form-control" placeholder="Enter date" required/>-->
                 <div class="input-control text" data-role="datepicker" id="m_date" data-preset="2015-05-01">
   <input type="text" readonly="readonly">
   <button class="button" type="button"><span class="mif-calendar"></span></button>
   <div class="calendar calendar-dropdown" style="position: absolute; display: none; max-width: 220px; z-index: 1000; top: 100%; left: 0px;">
      <div class="calendar-grid">
         <div class="calendar-row no-margin calendar-header">
            <div class="calendar-cell align-center"><a class="btn-previous-year" href="#">-</a></div>
            <div class="calendar-cell align-center"><a class="btn-previous-month" href="#">〈</a></div>
            <div class="calendar-cell sel-month align-center"><a class="btn-select-month" href="#">May 2015</a></div>
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
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell align-center day selected">
               <div><a href="#">1</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">2</a></div>
            </div>
         </div>
         <div class="calendar-row">
            <div class="calendar-cell align-center day">
               <div><a href="#">3</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">4</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">5</a></div>
            </div>
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
         </div>
         <div class="calendar-row">
            <div class="calendar-cell align-center day">
               <div><a href="#">10</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">11</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">12</a></div>
            </div>
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
         </div>
         <div class="calendar-row">
            <div class="calendar-cell align-center day">
               <div><a href="#">17</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">18</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">19</a></div>
            </div>
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
         </div>
         <div class="calendar-row">
            <div class="calendar-cell align-center day">
               <div><a href="#">24</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">25</a></div>
            </div>
            <div class="calendar-cell align-center day">
               <div><a href="#">26</a></div>
            </div>
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
         </div>
         <div class="calendar-row">
            <div class="calendar-cell align-center day">
               <div><a href="#">31</a></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
            <div class="calendar-cell empty">
               <div class="other-day" style="visibility: hidden;"></div>
            </div>
         </div>
      </div>
   </div>
</div>
        
                  
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btnSaveNewMeeting" class="btn btn-primary">Save fund</button>
            </div>

          </div>
        </div>
        </div>
                              
                              


<!--<div class="content_wrapper">-->
	
<!--<ul id="responds">-->

<!--</ul>-->
<!--    <div class="form_style">-->
<!--    <textarea name="subject_text1" id="m_subject1" cols="45" rows="5" placeholder="Enter some text"></textarea>-->
<!--    <button id="btnSaveNewMeeting1">Add record</button>-->
<!--    <img src="images/loading.gif" id="LoadingImage" style="display:none" />-->
<!--    </div>-->
<!--</div>-->


</body>
</html>