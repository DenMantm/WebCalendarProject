    
    
// Add Record
function addRecord() {
    // get values
    var location = $("#location").val();
    location = location.trim();
    var subject = $("#subject").val();
    subject = subject.trim();
    var description = $("#description").val();
    description = description.trim();
 
    if (location == "") {
        alert("location field is required!");
    }
    else if (subject == "") {
        alert("subject field is required!");
    }
    else if (description == "") {
        alert("description field is required!");
    }
    else {
        // Add record
        $.post("createarezki", {
            location: location,
            subject: subject,
            description: description
        }, function (data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");
 
            // read records again
            readRecords();
            alert("record added");
 
            // clear fields from the popup
            $("#location").val("");
            $("#subject").val("");
            $("#description").val("");
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
            $("#update_description").val(user.description);
            
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
    var description = $("#update_description").val();
    description = description.trim();
 
    if (location == "") {
        alert("location field is required!");
    }
    else if (subject == "") {
        alert("subject field is required!");
    }
    else if (description == "") {
        alert("description field is required!");
    }
    else {
        // get hidden field value
        var id = $("#hidden_user_id").val();
 
        // Update the details by requesting to the server using ajax
        $.post("updatearezki", {
                id: id,
                location: location,
                subject: subject,
                description: description
                
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