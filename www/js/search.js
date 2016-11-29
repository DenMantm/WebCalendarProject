    
    
// Add Record
function addRecord() {
    // get values
   
    var Completed = $("#Completed").val();
    Completed = Completed.trim();
    var description = $("#description").val();
    description = description.trim();
 
   
     if (Completed == "") {
        alert("Completed field is required!");
    }
    else if (description == "") {
        alert("description field is required!");
    }
    else {
        // Add record
        $.post("createarezki", {
   
            Completed: Completed,
            description: description
        }, function (data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");
 
            // read records again
            readRecords();
            alert("record added");
 
            // clear fields from the popup
           
            $("#Completed").val("");
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
          
            $("#update_Completed").val(user.Completed);
            $("#update_description").val(user.description);
            
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}


function UpdateUserDetails() {
    // get values
   
    var Completed = $("#update_Completed").val();
    Completed = Completed.trim();
    var description = $("#update_description").val();
    description = description.trim();
 
   
    if (Completed == "") {
        alert("Completed field is required!");
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
              
                Completed: Completed,
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