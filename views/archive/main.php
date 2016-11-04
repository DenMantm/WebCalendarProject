
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Main</title>
<?php include('partials/head.php') ?>
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

      <div class="col-md-3 remove_padding">
        <div id="calendar" class="dragscroll borderless_cal" style="height: 500px;">
          <table class="border bordered striped hovered cell-hovered table remove_margin">



            <?php
    
          for($i=-20 ; $i<20 ; $i++){
             $date = date("d", time() + 60 * 60 * 24 * $i) ;
             $weekday = date("D", time() + 60 * 60 * 24 * $i);
             $month = date("F", time() + 60 * 60 * 24 * $i);
             if ($date == "01"){
               echo("<tr><td>".$month."</td></tr><tr><td>".$date." ".$weekday."</td><td></td></tr>");
             } elseif ($date == date("d")) {
              echo("<tr id='today'><td><b>".$date." ".$weekday."</b></td><td></td></tr>");
             } else {
              echo("<tr><td>".$date." ".$weekday."</td><td></td></tr>");
             }
          }
          ?>
          </table>
        </div>
      </div>

      <!--#########################-->
      <!--###  Daily drilldown ####-->
      <!--#########################-->

      <div class="col-md-3 remove_padding">
        <!--Wrap div to allow draggable scroll TODO: size of the window will have to scale to the size of the browser-->
        <div class="dragscroll borderless_cal" style="height: 500px;">

          <!--Table itself.-->
          <table class="border bordered striped hovered cell-hovered table remove_margin">
            <?php
    
          for($i=-12 ; $i<12 ; $i++){
             $hour = date("H", time() + 60 * 60 * $i) ;
              if ($hour == date("H")){
                echo("<tr><td><b>".$hour.":00</b></td><td></td></tr>");
              } else {
                echo("<tr><td>".$hour.":00</td><td></td></tr>");
              }
              
              
             
          }
          ?>

              <tr>
                <td>
                  08:00
                </td>
                <td onclick="$('#dialog').data('dialog').toggle()">Meeting
                </td>
              </tr>
          </table>
        </div>
      </div>

      <!--#################################-->
      <!--### Div with meeting details ####-->
      <!--#################################-->

      <div id="dialog" data-role="dialog,draggable" class="dialog container" data-close-button="true" style="width: auto; height: auto; visibility: visible; left: 427px; top: 320.5px; cursor: auto; z-index: 1050;">
        <h1>Meeting with famous hitman</h1>
        <p>Discuss the details of the kidnapping and killing various people as and day to day exercise.</p>

      </div>

      <!--####################-->
      <!--###  Notes area ####-->
      <!--####################-->

      <div class="col-md-4">
        <button type="button" id="newmeetingBtn" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#newmeeting">
            New meeting</button>
        <div class="panel" style="width: 200px; z-index: auto; top: -2px; left: 50px;" data-role="draggable">
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

        <div class="panel" style="width: 200px; z-index: auto; top: -2px; left: 50px;" data-role="draggable">
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