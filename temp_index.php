<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--adding jquerry-->
  <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
            
            
            
          <p>Login</p>
            <form action="modules/login_ajax.php" method="post">
                    Username:<br /> 
                    <input type="text" id="user_name_ajax" name="username"/> 
                    <br /><br /> 
                    Password:<br /> 
                    <input type="password" id="password_ajax"  name="password" value="" />
                    <br /><br /> 
            </form> <br/>
          
          
          <button type="button" class="btn btn-info btn-lg" id="ajax_login">Login</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script>
    $("#ajax_login").click(function(){
      
    $.post("modules/login_ajax.php",
    {
        username: $('#user_name_ajax').val(),
        password: $('#password_ajax').val()
        //alert($('#user_name_ajax').val())
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });
});
    
</script>
</body>
</html>