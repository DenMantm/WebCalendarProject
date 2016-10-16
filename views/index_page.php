
<!DOCTYPE html>
<html>
<head>
<!-- https://www.youtube.com/watch?v=x8cpNLuwfWM based on Tutorial by Brad Hussey-->
<!-- back to top button http://webdesignerwall.com/tutorials/animated-scroll-to-top -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="css/m-style.css">
      <!-- scroll to top script -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->

    
  
  
  
  <script>
  // back to top of page with smooth scroll
    $(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});
  </script>

  <script type="text/javascript">
   // add script for div scroll here
  </script>
	<title></title>
</head>
<body>

	<!-- Static navbar -->
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/desktop.ico"/></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              
              
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item active"><a class="nav-link" href="index.html">Home<span></span></a></li>
              <li type="nav-item"><a href="#feature-three">Features</a></li>
              <li type="nav-item" class="nav-item"><a href="#" data-toggle="modal" data-target="#myModal_register"><span></span>Sign Up</a></li>
              <li type="nav-item" class="nav-item"><a href="#" data-toggle="modal" data-target="#myModal_LOGIN"><span></span> Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <br/>
      <br/>
    <div id="stage">
      <div id="stage-caption">
        <h1 class="display-3 main-header">It's your Team Planner App</h1>
        <p>Make it work for YOU!</p>
        <a href="" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal_register">
          Register now!
        </a>
      </div>
    </div>
    <div class="container">
      <hr class="thickOne"
    </div>
    <!-- Feature -->
    <section id="feature-one">
      <div class="container">
        <div class="row">
          <div class="feature-content">
            <div class="col-lg-6">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/UGPuEDyAsU8" frameborder="1" allowfullscreen id="vidMain"></iframe>
            </div>
            <div class="col-lg-5">
              <h6>Check it out!</h6>
              <h2>Watch this video...</h2>
              <p>...and be amazed as Nasa's astronauts schedule their EVA with our Team Planner Application in SPACE!!!</p>
            </div>
            <!-- one column of space between the left and right column of divs -->
            <div class="col-lg-offset-1">
              
            </div>
          </div>
        </div>
      </div>
      
    </section>

    <section id="feature-two" class="feature-dark">
      <div class="container">
        <div class="row">
          <div class="feature-content">
            <div class="col-lg-4 feature-caption">
              <h6>Simple, functional features</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <!-- for responsive when scaled, "hidden-sm-down" div will hide on small screens and below -->
            <div class="col-lg-6 text-sm-center hidden-sm-down">
            <!-- http://sweetclipart.com/multisite/sweetclipart/files/desktop_computer_line_art.png -->
              <img src="img/desktop_Line.png" width="600" align="center">
            </div>
            <div class="col-lg-offset-2" id="off-one">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="feature-three">
      <div class="container">
        <div class ="row">
          <div class="feature-content">
            <div class="col-lg-6">
              <img src="img/calendar.png" class="img-responsive center-block">
            </div>
            <div class="col-lg-6">
              <h6>Plan your tasks and schedule a meeting</h6>
              <p class = "lead">Never miss a meeting again, plan your next presidential assassination and be confident with the fact that your team will be prepared for the outcome</p>
            </div>
          </div>
        </div>
      </div>
    </section>
        
    <nav class="navbar navbar-default">
      <div class="container-fluid">
                <ul class="navbar">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
      </div>
    </nav>
            <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

    <div class="footer">
      <div class="row">
         Group E NCI &copy; 2016
      </div>
      <div class="row">
      <div class="col-sm-10">
      </div>
      <div class="col-sm-2">
      </div>
      </div>
    </div>

                                                  <!--*****************-->
                                                  <!--***Modal LOGIN***-->
                                                  <!--*****************-->
            
            <div class="modal fade" id="myModal_LOGIN" role="dialog">
                <div class="modal-dialog">
                
                <!--*******************-->
                <!--***Modal content***-->
                <!--*******************-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Login</h4>
                        </div>
                        <div class="modal-body">
                            <p>Login</p>
                            <form action="modules/login_ajax.php" method="post">
                                Username:<br /> 
                                <input type="text" id="l_user_name_ajax" name="username"/> 
                                <br /><br /> 
                                Password:<br /> 
                                <input type="password" id="l_password_ajax"  name="password" value="" />
                                <br /><br /> 
                            </form> 
                            <br/>
                            <button type="button" class="btn btn-info btn-lg" id="ajax_login">Login</button>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
          
                </div>
            </div>
  
            <!-- Modal REGISTER -->
            <div class="modal fade" id="myModal_register" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Register</h4>
                    </div>
                <div class="modal-body">

                <h1>Register</h1>
                <form action="register.php" method="post">
                    Username:
                    <br />
                    <input type="text" id="r_user_name_ajax" name="username" value="" />
                    <br />
                    <br /> E-Mail:
                    <br />
                    <input type="text" id="r_email_ajax"name="email" value="" />
                    <br />
                    <br /> Password:
                    <br />
                    <input type="password" id="r_password_ajax" name="password" value="" />
                    <br />
                    <br />
                </form><br/>
          
          
          <button type="button" class="btn btn-info btn-lg" id="ajax_register">Register</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	      <!--AJAX LOGIN SCRIPT-->
       <script src="js/registration_ajax.js"></script>


</body>

	
</html>