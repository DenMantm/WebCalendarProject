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
    
    
    

    
    <!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Chnage your Username, Email or Password Here </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-middle">
                <button class="btn btn-success" data-toggle="modal" data-target="#update_user_modal">Click To Begin</button>
            </div>
        </div>
    </div>
   
</div>
<!-- /Content Section -->



<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-Email" id="myModalLabel">Update</h4>
                </div>
                
                
                <div class="modal-body">
     
     
                    <div class="form-group">
                        <label for="update_Username">New Username</label>
                        <input type="text" id="update_Username" placeholder="Username" class="form-control"/>
                    </div>
     
                    <div class="form-group">
                        <label for="update_Email">New Email</label>
                        <input type="text" id="update_Email" placeholder="Email" class="form-control"/>
                    </div>
                      <div class="form-group">
                        <label for="update_Password">New Password</label>
                        <input type="password" id="update_Password" placeholder="Password" class="form-control"/>
                    </div>
                     <div class="form-group">
                        <label for="update_Password">Confirm New Password</label>
                        <input type="password" id="update_Password1" placeholder="Password" class="form-control"/>
                    </div>
     
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                 
                </div>
            
        </div>
    </div>
</div>
<!-- // Modal -->


<script >


function UpdateUserDetails() {
    // get values
    var Password = $("#update_Password").val();
    Password = Password.trim();
    var Password1 = $("#update_Password1").val();
    Password1 = Password1.trim();
    var Username = $("#update_Username").val();
    Username = Username.trim();
    var Email = $("#update_Email").val();
    Email = Email.trim();
 
    if (Password == "") {
        alert("Password field is required!");
    }
      if (Password1 == "") {
        alert("Confirm Password field is required!");
    }
    else if (Username == "") {
        alert("Username field is required!");
    }
    else if (Email == "") {
        alert("Email field is required!");
    }
     else if (Password!=Password1) {
        alert("Oops! Password did not match! Try again. ");
    }
    else {
       
        // Update the details by requesting to the server using ajax
        $.post("updatesettings", {
               
                Password: Password,
                Username: Username,
                Email: Email
            },
            function (data, status) {
                // hide modal popup
                $("#update_user_modal").modal("hide");
                // reload Users by using readRecords();
                alert(data);
          alert("Successfully uodated your details");
            }
        );
    }
}



</script>


 

 
</body>


</html>