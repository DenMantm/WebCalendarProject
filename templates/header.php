<?php require("registration/common.php"); 
             
            // At the top of the page we check to see whether the user is logged in or not 
            if(empty($_SESSION['user'])) 
            { 
                // If they are not, we redirect them to the login page. 
                header("Location: registration/login.php"); 
                 
                // Remember that this die statement is absolutely critical.  Without it, 
                // people can view your members-only content without logging in. 
                die("Redirecting to registration/login.php"); 
            } 
            
            ?>
            
 



<!DOCTYPE html>
<html>
 
<head>
    <!--to enable responsivebrowsing on mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--needs to be at the top of the head to work-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--needed the secure cdn links for mini menu-->
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    

	<div class="navbar-static-top navbar-inverse">

		  <div class="container" id="nav">
		      <div class = "navbar-brand navbar-left">
    			<p href="#" style="color:white;font-weight:bold"> Online Scheduling</p>
			     <!--<a href="#" class="pull-left"><img src="../img/hotelFront.png" class="img-responsive" id="logo" alt="logo"></img></a>-->
			</div>
                <div class="navbar-brand navbar-right headerSocH">
                    <!--add name of user in session to navbar brand-->
                   	<p href="#" style="color:white;font-weight:bold">Welcome <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>:
			        </p>
		       </div>
		<button id="mini" class = "navbar-toggle" data-toggle = "collapse" data-target=".navHeaderCollapse" style ="color:white; border-color:white; margin-right:0px">
			Menu
			
		</button>
    	
    		<div class = "collapse navbar-collapse navHeaderCollapse" >
    		    <nav id="nav1">
    	     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
                // $(document).ready(function () {
                // $('mini').click(function () {
                // document.getElementById('logo').style.visibility='hidden';
                // });
                // });
                // $(document).ready(function(){
                // $("mini").click(function(){
                // $("logo").toggle();
                // });
                // });
			</script>
    			<ul class = "nav navbar-nav navbar-right">
    				<li class = "items"><a href="?page=home"       style="color:white">Home       </a></li>
    				<li class = "items"><a href="?page=attraction" style="color:white"> Today</a></li>
    				<li class = "items"><a href="?page=chat"       style="color:white"> Calendar       </a></li>
    				<li class = "items"><a href="?page=discover"   style="color:white">Discover   </a></li>
    				<li class = "items"><a href="?page=currency"   style="color:white">Currency   </a></li>
    				<li class = "items"><a href="../logout.php"     style="color:white">Logout     </a></li>
    				
    			    
    			</ul>
    			</nav>
		   </div>
		       
	</div>
    </div>
    