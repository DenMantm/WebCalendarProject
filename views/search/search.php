<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <title>Make your own Team</title>
 

   
       
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
            <h1>Create your own team</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Records:</h3>
 
            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->

<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="location">location</label>
                    <input type="text" id="location" placeholder="location" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="subject">subject</label>
                    <input type="text" id="subject" placeholder="subject" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="title">title Address</label>
                    <input type="text" id="title" placeholder="title Address" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="update_location">location</label>
                    <input type="text" id="update_location" placeholder="location" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_subject">subject</label>
                    <input type="text" id="update_subject" placeholder="subject" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_title">title Address</label>
                    <input type="text" id="update_title" placeholder="title Address" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->


<script>
    
    
// Add Record
function addRecord() {
    // get values
    var location = $("#location").val();
    location = location.trim();
    var subject = $("#subject").val();
    subject = subject.trim();
    var title = $("#title").val();
    title = title.trim();
 
    if (location == "") {
        alert("location field is required!");
    }
    else if (subject == "") {
        alert("subject field is required!");
    }
    else if (title == "") {
        alert("title field is required!");
    }
    else {
        // Add record
        $.post("createarezki", {
            location: location,
            subject: subject,
            title: title
        }, function (data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");
 
            // read records again
            readRecords();
            alert("record added");
 
            // clear fields from the popup
            $("#location").val("");
            $("#subject").val("");
            $("#title").val("");
        });
    }
}

// READ records
function readRecords() {
    $.get("readarezki", {}, function (data, status) {
        console.log(data);
        $(".records_content").html(data);
    });
}

function GetUserDetails(id) {
    // Add User ID to the hidden field
    $("#hidden_user_id").val(id);
    $.post("detailsarezki", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assign existing values to the modal popup fields
            $("#update_location").val(user.location);
            $("#update_subject").val(user.subject);
            $("#update_title").val(user.title);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}


function UpdateUserDetails() {
    // get values
    var location = $("#update_location").val();
    location = location.trim();
    var subject = $("#update_subject").val();
    subject = subject.trim();
    var title = $("#update_title").val();
    title = title.trim();
 
    if (location == "") {
        alert("location field is required!");
    }
    else if (subject == "") {
        alert("subject field is required!");
    }
    else if (title == "") {
        alert("title field is required!");
    }
    else {
        // get hidden field value
        var id = $("#hidden_user_id").val();
 
        // Update the details by requesting to the server using ajax
        $.post("updatearezki", {
                id: id,
                location: location,
                subject: subject,
                title: title
            },
            function (data, status) {
                // hide modal popup
                $("#update_user_modal").modal("hide");
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("deletearezki", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

$(document).ready(function () {
    // READ records on page load
    readRecords(); // calling function
});
</script>


 

 
</body>


</html>