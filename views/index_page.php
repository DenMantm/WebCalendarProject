
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

   <link rel="stylesheet" href="css/login_signup_form.css"/>

	<title></title>
</head>
<body id="m-loadFade">

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
              <li class="nav-item active"><a class="nav-link" href="#" id="homeDiv" onclick="scrollToTop.js">Home<span></span></a></li>
              <li type="nav-item"><a href="#" id="videoDiv">Demo</a></li>
              <li type="nav-item"><a href="#" id="featThree">Features</a></li>
              <li type="nav-item" class="nav-item"><a  data-toggle="modal"  href="#signup_modal"><span></span>Sign Up</a></li>
              <li type="nav-item" class="nav-item"><a  data-toggle="modal" href="#login_modal"><span></span> Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <br/>
      <br/>
    <div id="stage">
      <div id="stage-caption">
        <h1 class="display-3 main-header" id="autoText">It's your Team Planner App</h1>
        <p class="m-fade">Make it work for YOU!</p>
        <a href="#signup_modal" class="btn btn-lg btn-success m-fade" data-toggle="modal" id="regNow">
          Register now!
        </a>
      </div>
    </div>
    <div class="container">
      <hr class="thickOne" id="nasaVid"/>
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
              <h2 class="p-fade">Watch this video...</h2>
              <p class="p-fade">...and be amazed as Nasa's astronauts schedule their EVA with our Team Planner Application in SPACE!!!</p>
            </div>
            <!-- one column of space between the left and right column of divs -->
            <div class="col-lg-offset-1">
              
            </div>
          </div>
        </div>
      </div>
      
    </section>
    <br id="scrollToMe"/>
    <section id="feature-two" class="feature-dark">
      <div class="container">
        <div class="row">
          <div class="feature-content">
            <div class="col-lg-4 feature-caption">
              <h6>Simple, functional features</h6>
              <p>Team Planner is a functional, fresh and free to use application aimed at small teams and SME's
              who need a solution to organise their tasks and communicate to their teammates. New users have the ability to create
              a new team and add/remove members, assign them tasks and send out communications to them.</p>
            </div>
            <!-- for responsive when scaled, "hidden-sm-down" div will hide on small screens and below -->
            <div class="col-lg-6 text-sm-center hidden-sm-down">
              <img class="img-responsive p-fade" src="img/cal1.png" width="300" align="right"/>
            </div>
            <div class="col-lg-offset-2" id="off-one">
            </div>
          </div>
        </div>
      </div>
    </section>
    <br/>
    <br/>
    <br/>
    <section id="feature-three">
      <div class="container">
        <div class ="row">
          <div class="feature-content">
            <div class="col-lg-6">
              <img src="img/calendar.png" class="img-responsive center-block p-fade">
            </div>
            <div class="col-lg-6">
              <h6 class="p-fade">Plan your tasks and schedule a meeting</h6>
              <p class = "p-fade lead">Never miss a meeting again, plan your next presidential assassination and be confident with the fact that your team will be prepared for the outcome</p>
            </div>
          </div>
        </div>
      </div>
    </section>
        
    <nav class="navbar navbar-default">
      <div class="container-fluid">
                <ul class="navbar">
                  <li><a href="https://github.com/DenMantm/WebCalendarProject">Github Repository</a></li>
                  <li><a href="https://fatreeframework.com/3.6/home">FatFree</a></li>
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
            
            <!--<div class="modal fade" id="myModal_LOGIN" role="dialog">-->
            <!--    <div class="modal-dialog">-->
                
                <!--*******************-->
                <!--***Modal content***-->
                <!--*******************-->
            <!--        <div class="modal-content">-->
            <!--            <div class="modal-header">-->
            <!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--                <h4 class="modal-title">Login</h4>-->
            <!--            </div>-->
            <!--            <div class="modal-body">-->
            <!--                <p>Login</p>-->
            <!--                <form action="modules/login_ajax.php" method="post">-->
            <!--                    Username:<br /> -->
            <!--                    <input type="text" id="l_user_name_ajax" name="username"/> -->
            <!--                    <br /><br /> -->
            <!--                    Password:<br /> -->
            <!--                    <input type="password" id="l_password_ajax"  name="password" value="" />-->
            <!--                    <br /><br /> -->
            <!--                </form> -->
            <!--                <br/>-->
            <!--                <button type="button" class="btn btn-info btn-lg" id="ajax_login">Login</button>-->
            <!--            </div>-->
            <!--            <div class="modal-footer">-->
            <!--              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
            <!--            </div>-->
            <!--        </div>-->
          
            <!--    </div>-->
            <!--</div>-->
  
            <!-- Modal REGISTER -->
  <!--          <div class="modal fade" id="myModal_register" role="dialog">-->
  <!--              <div class="modal-dialog">-->
                
                <!-- Modal content-->
  <!--              <div class="modal-content">-->
  <!--                  <div class="modal-header">-->
  <!--                      <button type="button" class="close" data-dismiss="modal">&times;</button>-->
  <!--                          <h4 class="modal-title">Register</h4>-->
  <!--                  </div>-->
  <!--              <div class="modal-body">-->

  <!--              <h1>Register</h1>-->
  <!--              <form action="register.php" method="post">-->
  <!--                  Username:-->
  <!--                  <br />-->
  <!--                  <input type="text" id="r_user_name_ajax" name="username" value="" />-->
  <!--                  <br />-->
  <!--                  <br /> E-Mail:-->
  <!--                  <br />-->
  <!--                  <input type="text" id="r_email_ajax"name="email" value="" />-->
  <!--                  <br />-->
  <!--                  <br /> Password:-->
  <!--                  <br />-->
  <!--                  <input type="password" id="r_password_ajax" name="password" value="" />-->
  <!--                  <br />-->
  <!--                  <br />-->
  <!--              </form><br/>-->
          
          
  <!--        <button type="button" class="btn btn-info btn-lg" id="ajax_register">Register</button>-->
  <!--      </div>-->
  <!--      <div class="modal-footer">-->
  <!--        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
  <!--      </div>-->
  <!--    </div>-->
      
  <!--  </div>-->
  <!--</div>-->
  
  
              <!--LOGIN-->

  
   <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-login_modal">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">close</button>
                    <h2 style='float:left;'><i class="glyphicon glyphicon-user"></i>Login</h2>
                </div>
                <div class="modal-body">
	<div id='login_content'>
	<form action="/login" method="post">
		<div class="form-group">
			<label style='float:left;'>Username</label>
			<input id='l_user_name_ajax' type="text" class="form-control input-lg" name="text">
		</div>
		<div class="form-group">
			<label style='float:left;' >Password</label>
			<input id='l_password_ajax' type="password" class="form-control input-lg" name="password">
		</div>
			</form>
<div style='display:none;' id='message' class="alert alert-danger"></div>
                
    <button id='ajax_login' type="submit" class="btn btn-success">Login</button>
	<hr>
	<p>Forgot password? <a href="#recover_modal" data-dismiss="modal"  data-toggle="modal">Recovere password</a></p>
	<p>Need an account? <a href="#signup_modal" data-dismiss="modal"  data-toggle="modal">Signup</a></p>
	<!--<a class="btn btn-success" href="#signup_modal" data-dismiss="modal"  data-toggle="modal"><h4><i class="glyphicon glyphicon-eye-open"></i>Login</h4></a>-->
    </div>     

        </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal -->
       <br />
    
    
    
      <!--REGISTER-->
    
    
    <!-- Modal -->
    
    <div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-signup_modal">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">close</button>
                    <h2 style='float:left;'><i class="glyphicon glyphicon-plus"></i>Signup</h2>
                </div>
                <div class="modal-body">
                    
                    	<!-- LOGIN FORM -->
	          <form class="form-horizontal" action="/signup" method="POST">
          <fieldset>
            <div id="legend">
              <legend class="">Registration details:</legend>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="fname">First name</label>
              <div class="controls">
                <input type="text" id="r_fname_ajax" name="fname" placeholder="Your name" class="form-control input-lg"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="sname">Surname</label>
              <div class="controls">
                <input type="text" id="r_sname_ajax" name="sname" placeholder="Your surname" class="form-control input-lg"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="username">Username</label>
              <div class="controls">
                <input type="text" id="r_user_name_ajax" name="username" placeholder="" class="form-control input-lg"/>
                <p class="help-block">Username can contain any letters or numbers, without spaces</p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="email" id="r_email_ajax" name="email" placeholder="" class="form-control input-lg">
                <p class="help-block">Please provide your E-mail</p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" id="r_password_ajax" name="password" placeholder="" class="form-control input-lg">
                <p class="help-block">Password should be at least 6 characters</p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="password_confirm_signup">Password (Confirm)</label>
              <div class="controls">
                <input type="password" id="password_confirm_signup" name="password_confirm" placeholder="" class="form-control input-lg"/>
                <p class="help-block">Please confirm password</p>
              </div>
            </div>
         
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                
              </div>
            </div>
          </fieldset>
        </form>
        <div style='display:none;' id='message_signup' class="alert alert-danger"></div>
        <button id='ajax_register' type="submit" class="btn btn-success">Register</button>
	<hr>
    
    <p>Need to login? <a href="#login_modal" data-dismiss="modal"  data-toggle="modal">Login</a></p>                
	<p>Forgot password? <a href="#recover_modal" data-dismiss="modal"  data-toggle="modal">Recovere password</a></p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    
    
    
      <!--FORGOT PASSWORD-->
  
    
    
    <div class="modal fade" id="recover_modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-recover_modal">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">close</button>
                    <h2 style='float:left;'><i class="glyphicon glyphicon-user"></i>Recover Password</h2>
                </div>
                <div class="modal-body">
	<div id='login_content'>
	<form action="/retrievePassword" method="post">
		            <div class="control-group">
              <label class="control-label" for="password">Email</label>
              <div class="controls">
                <input type="text" id='retrieve_email_ajax' name="email" placeholder="" class="form-control input-lg"/>
                <p class="help-block">Please input your e-mai ladress</p>
              </div>
            </div>
	</form>
<div style='display:none;' id='message' class="alert alert-danger"></div>
                
    <button id='ajax_login' type="submit" class="btn btn-success">Login</button>
	<hr>
	<p>Need to login? <a href="#login_modal" data-dismiss="modal"  data-toggle="modal">Login</a></p>
	<p>Need an account? <a href="#signup_modal" data-dismiss="modal"  data-toggle="modal">Signup</a></p>
	<!--<a class="btn btn-success" href="#signup_modal" data-dismiss="modal"  data-toggle="modal"><h4><i class="glyphicon glyphicon-eye-open"></i>Login</h4></a>-->
    </div>     
        </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal -->
</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	      <!--AJAX LOGIN SCRIPT-->
  <script src="js/registration_ajax.js"></script>
  <!--scroll back to top of page-->
  <script src="js/m-scrollToTop.js"></script>
  <!--smooth scroll 1 page navigation-->
  <script src="js/featureScroll.js"></script>
  <!--fade in text in modal-->
  <script src="js/show.js"></script>
  <!--flashing registration button-->
  <script src="js/bounceyReg.js"></script>
  <!--fade in text when page scrolls-->
  <script src="js/fadeOnScroll.js"></script>
  <script src="js/autoWriterDenissStrods.js"></script>
  
  
  
  
  
  


</body>

	
</html>