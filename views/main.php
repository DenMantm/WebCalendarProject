
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Main</title>
<?php include('partials/head.php') ?>


<link href='calendarLib/fullcalendar.css' rel='stylesheet' />
<link href='calendarLib/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='calendarLib/lib/moment.min.js'></script>
<script src='calendarLib/lib/jquery.min.js'></script>
<script src='calendarLib/lib/jquery-ui.min.js'></script>
<script src='calendarLib/fullcalendar.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


  <script>
    /*global $*/

    $.fn.followTo = function (pos) {
    var $this = this,
        $window = $(window);

    $window.scroll(function (e) {
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'absolute',
                top: pos
            });
        } else {
            $this.css({
                position: 'fixed',
                top: 0
            });
        }
    });
};

$('#calendar').followTo(250);
    

  </script>
  <script type="text/javascript" src="../js/target.js"></script>

  
  
  <script>

	$(document).ready(function() {


		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true, // maintain when user navigates (see docs on the renderEvent method)
				color:$(this).css("background-color")
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar
			drop: function() {
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			}
		});


	});

</script>
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
      <!--###  Calendar ####-->
      <!--##################-->

      <div class="col-md-6 remove_padding">
	<div id='wrap'>

		<div id='calendar'></div>

		<div style='clear:both'></div>

	</div>
      </div>

      <!--#################################-->
      <!--### Div with meeting details ####-->
      <!--#################################-->


      <!--####################-->
      <!--###  Notes area ####-->
      <!--####################-->

      <div class="col-md-4">
        
        
        <button type="button" id="newmeetingBtn" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#newmeeting">
            New meeting</button>
            
            
                       <div id='external-events'>
			<h4>Draggable Events</h4>
			<div class='fc-event'>Event</div>
			<div class='fc-event' style="background-color:red">Important Meeting</div>
			<div class='fc-event' style="background-color:green">Scheduled Work</div>
			<div class='fc-event' style="background-color:orange">Important</div>
			<div class='fc-event'>My Event 5</div>
			<p>
				<input type='checkbox' id='drop-remove' />
				<label for='drop-remove'>remove after drop</label>
			</p>
		</div>  
            
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
                  <input type="text" id="m_date" name="date_text"class="form-control" placeholder="Enter date" required/>
                  <script type="text/javascript">
                    $(function() {
                      $('#m_date').datetimepicker();
                      dateFormat: 'yy-mm-dd'
                    });
                    
                  </script>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btnSaveNewMeeting" class="btn btn-primary">Save fund</button>
            </div>
<ul id="responds">
		
		</ul>
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