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
        $.post("ajax/create.php", {
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
    $.get("readsearch", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function GetUserDetails(id) {
    // Add User ID to the hidden field
    $("#hidden_user_id").val(id);
    $.post("ajax/details.php", {
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
        $.post("ajax/update.php", {
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
        $.post("ajax/delete.php", {
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