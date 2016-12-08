<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <title>Asseign Tasks</title>
 

   
       
   <?php
   
  include('../views/partials/head.php')
   
   ?>
  <!--<script src="ajax/search.js"></script>-->
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
   
</head>
 
<body>
    
  <?php
 include('../views/partials/navbar.php');
 

?>
    
  
    

    
    
</br></br></br></br>
<div class="container">
  <h2>Change your credentials:</h2></br></br>
  <form class="form-horizontal">
     <div class="form-group">
      <label class="control-label col-sm-2" for="Firstname">New Firstname:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="update_Firstname" placeholder="Enter Firstname" required>
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" for="Surname">New Surname:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="update_Surname" placeholder="Enter Surname" required>
      </div>
    </div>
         
         
      
     <div class="form-group">
      <label class="control-label col-sm-2" for="username">New Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="update_Username" placeholder="Enter username" required>
      </div>
    </div>
         

    <div class="form-group">
      <label class="control-label col-sm-2" for="update_Email">New Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control"id="update_Email" placeholder="Enter email" required>
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-2" for="update_Password">New Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="update_Password" placeholder="Enter password" required>
      </div>
      <div id="id1"></div>
    </div>
  
     
     <div class="form-group">
      <label class="control-label col-sm-2" for="update_Password">Confirm New Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="update_Password1" placeholder="Enter password" required>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      
        <button type="submit" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
      </div>
    </div>
  </form>
</div>






<script >


function UpdateUserDetails() {
    // get values
    var Password = $("#update_Password").val();
    Password = Password.trim();
    
    var Password1 = $("#update_Password1").val();
    Password1 = Password1.trim();
    
    var Firstname = $("#update_Firstname").val();
    Firstname = Firstname.trim();
    
     var Username = $("#update_Username").val();
    Username = Username.trim();
    
     var Surname = $("#update_Surname").val();
    Surname = Surname.trim();
    
    var Email = $("#update_Email").val();
    Email = Email.trim();
 
    if (Password!=Password1) {
        alert("Oops! Password did not match! Try again. ");
    }
    else {
       
        // Update the details by requesting to the server using ajax
        $.post("updatesettings", {
               
                Password: Password,
                Username: Username,
                 Surname: Surname,
                  Firstname: Firstname,
                Email: Email
                
            }
            
           
        );alert("Saved your details !");
    }  
} 



</script>


 

 
</body>


</html>