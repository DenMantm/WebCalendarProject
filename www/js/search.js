    
    
// Add Record
function addRecord() {
    // get values
    $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#start").datepicker();  
                $("#end").datepicker();  
           });  
    var subject = $("#subject").val();
    subject = subject.trim();
    
    
     var start = $("#start").val();
     
     var end = $("#end").val();
     var description = $("#description").val();
    description = description.trim();
 
   
     if (subject == "") {
        alert("subject field is required!");
    }
    else if (description == "") {
        alert("description field is required!");
    }
    else {
        // Add record
        $.post("createarezki", {
   
            subject: subject,
            start:start,
            end:end,
            description: description
        }, function (data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");
 
            // read records again
            readRecords();
            alert("record added");
 
            // clear fields from the popup
           
            $("#subject").val("");
            $("#start").val("");
            $("#end").val("");
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
          
            $("#update_subject").val(user.subject);
             $("#update_start").val(user.start);
              $("#update_end").val(user.end);
            $("#update_description").val(user.description);
            
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}


function UpdateUserDetails() {
    // get values
   
    var subject = $("#update_subject").val();
    subject = subject.trim();
     $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#update_start").datepicker();  
                $("#update_end").datepicker();  
           });  
     var start = $("#update_start").val();
     var end = $("#update_end").val();
  
    var description = $("#update_description").val();
    description = description.trim();
 
   
    if (subject == "") {
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
              
                subject: subject,
                 start: start,
                 end:end,
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