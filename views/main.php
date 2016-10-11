<!DOCTYPE html>
<html lang="en">

<head>
  <title>Main</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--Styling for Metro: responsible for floading notes menus etc-->
  <link rel="stylesheet" href="/css/metro.min.css">
  <!--Metro icons used in lefthandside menu-->
  <link rel="stylesheet" href="/css/metro-icons.min.css">
  <!--Metro js-->
  <script type='text/javascript' src="/js/metro.min.js"></script>
  <!--Knockout used to ling input and output in realtime-->
  <script type='text/javascript' src='/js/knockout-3.4.0.debug.js'></script>
  <script type='text/javascript' src="/js/bindings.js"></script>
  <!--Dragscroll used in calendar allowing scroll items by dragging them-->
  <script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>
  <!--adding jquerry-->
  <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
  <script>
  /*global $*/
    function scrollIntoView(element, container) {
      var containerTop = $(container).scrollTop(); 
      var containerBottom = containerTop + $(container).height(); 
      var elemTop = element.offsetTop;
      var elemBottom = elemTop + $(element).height(); 
      if (elemTop < containerTop) {
        $(container).scrollTop(elemTop);
      } else if (elemBottom > containerBottom) {
        $(container).scrollTop(elemBottom - $(container).height());
      }
    }
    
    scrollIntoView('#today','#calendar')
    
    
    
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
</head>

<body>
<?php
require('partials/navbar.php');
?>
  
  <!--Top menu holder temporary used for testing knockout-->
  <div class="row">
    <div class="col-md-11">
      <input data-bind="value: firstName" />
      <span data-bind="text: firstName"></span>
    </div>
  </div>

  <div class="row">
    
    <!--##################-->
    <!--Left handside menu-->
    <!--##################-->
    
    <div class="col-md-1">
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
    
      <div class="col-md-3">
        <div id="calendar" class="dragscroll" style="height: 500px; overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;">
        <table class="border bordered striped hovered cell-hovered table">
          


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

      <div class="col-md-3">
        <!--Wrap div to allow draggable scroll TODO: size of the window will have to scale to the size of the browser-->
         <div class="dragscroll" style="height: 500px; overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;">
           
          <!--Table itself.-->
        <table class="border bordered striped hovered cell-hovered table">
                    <?php
    
          for($i=-12 ; $i<12 ; $i++){
             $hour = date("H", time() + 60 * 60 * $i) ;
             $weekday = date("D", time() + 60 * 60 * 24 * $i);
             $month = date("M", time() + 60 * 60 * 24 * $i);

              echo("<tr><td>".$hour.":00</td><td></td></tr>");
             
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
    

  </div>






</body>