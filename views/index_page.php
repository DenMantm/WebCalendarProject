<!doctype html>
<html>
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <!-- Bootstrap core CSS -->
    <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <!--<link href="navbar.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- head.ejs -->

    <title>Calendar Application</title>
    <meta charset="UTF-8">
    
    <script data-require="jquery@*" data-semver="2.1.4" src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script data-require="bootstrap@3.3.6" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
    <!--<script src="js/login_signup_validation.js"></script>-->
    <link rel="stylesheet" href="css/login_signup_form.css"/>
    
    <style>
        body        { padding-top:80px; }
    </style>



</head>
<body>



<div class="cta-mail">
    <div class="container text-center">
        <h2>Whant to login or Register Idiot !?</h2>
        <!--<a href="/logout" class="btn btn-default"><span class="fa fa-user"></span>SingUp</a>-->
		<!--<a href="/profile" class="btn btn-default"><span class="fa fa-user"></span>Login</a>-->
		 <a class="btn btn-info" href="#signup_modal" data-toggle="modal"><h4><i class="glyphicon glyphicon-eye-open"></i>Signup</h4></a>
		<a class="btn btn-success" href="#login_modal" data-toggle="modal"><h4><i class="glyphicon glyphicon-eye-open"></i>Login</h4></a>
        </div>
        <!-- End MailChimp Signup Form -->
    </div>


    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-login_modal">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">close</button>
                    <h2 style='float:left;'><i class="glyphicon glyphicon-user"></i>Login</h2>
                </div>
                <div class="modal-body">

                	
	<!-- LOGIN FORM -->
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
              <label class="control-label" for="username">Username</label>
              <div class="controls">
                <input type="text" id="r_user_name_ajax" name="username" placeholder="" class="form-control input-lg">
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
                <input type="password" id="password_confirm_signup" name="password_confirm" placeholder="" class="form-control input-lg">
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
    <!-- Modal -->
    <div class="modal fade" id="recover_modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-recover_modal">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">close</button>
                    <h2 style='float:left;'><i class="glyphicon glyphicon-lock"></i>Recover Password</h2>
                </div>
                <div class="modal-body">
                    
                    	<!-- LOGIN FORM -->
	<form action="/retrievePassword" method="post">
		<div class="form-group">
			<label>Email</label>
			<input id='retrieve_email_ajax' type="text" class="form-control input-lg" name="email">
		</div>
	</form>
	<div style='display:none;' id='message_retrieve' class="alert alert-danger"></div>
	<button id='ajax_retrieve_password' type="submit" class="btn btn-success">Send renewal link</button>
	<hr>
                    
	<p>Need to login? <a href="#login_modal" data-dismiss="modal"  data-toggle="modal">Login</a></p>
	<p>Need an account? <a href="#signup_modal" data-dismiss="modal"  data-toggle="modal">Signup</a></p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<script>

    //REQUEST FOR LOGIN
$("#ajax_login").click(function(){
    $.post("/login_ajax",
    {
        username: $('#l_user_name_ajax').val(),
        password: $('#l_password_ajax').val()
        //alert($('#user_name_ajax').val())
    },
    function(response, status,result){
      response = JSON.parse(response);
       
        if(response.key=="pass"){
          //CODE LOGIN SUCCESFULL
            window.location = '/main';
        }
        else{
          //CODE IF LOGIN UNSUCCESFULL
          console.log(response)
          console.log(response.key)
             alert("failed to login");
        }
        
    });
});

    //REQUEST FOR REGISTER
$("#ajax_register").click(function(){
    $.post("/register_ajax",
    {
        username: $('#r_user_name_ajax').val(),
        password: $('#r_password_ajax').val(),
        email: $('#r_email_ajax').val()
        //alert($('#user_name_ajax').val())
    },
    function(response, status,result){
      console.log(response);
      response = JSON.parse(response);
       console.log(response.key);
        if(response.key=="pass"){
          //CODE REGISTER SUCCESFULL
          alert("You have succesfully registered, please log in with your new credentials!");
          $('#signup_modal').modal('toggle');
          $('#login_modal').modal('toggle');
            //window.location = '/authorised_zone';
        }
        else if(response.key=="username_exists"){
          alert("username already exists");
        }
        else if(response.key=="email_exists"){
          alert("E-mail already taken");
        }
        else if(response.key=="email_fail"){
          alert("invalid e-mail");
        }
        else{
          //CODE DATABASE ERROR

             alert(response.key);
        }
        
    });
});


//request for e-mail recovery

$("#ajax_retrieve_password").click(function(){
  console.log("Res: "+ $('#r_email_ajax').val());
    $.post("/retrieve_password",
    {
        email: $('#retrieve_email_ajax').val()
        //alert($('#user_name_ajax').val())
    },
    function(response, status,result){
      console.log(response);
      response = JSON.parse(response);
      
       
        if(response.key=="p_recovery_success"){
          //CODE recovery succesful
            alert("E-mail sent, please check your e-mail");
        }
        else if (response.key=="p_recovery_fail"){
                    //CODE IF wrong e-mail
          console.log(response)
          console.log(response.key)
             alert("This e-mail have not been registered");
        }
        else{
            alert(response);
        }
        
    });
});



    
</script>


</body>
</html>