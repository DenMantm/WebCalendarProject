/*global $*/

$(document).ready(function() {
    var $loading = $('#modal').hide();
// 			$(document)
// 			  .ajaxStart(function () {
// 			    $loading.show();
// 			  })
// 			  .ajaxStop(function () {
// 			    $loading.hide();
// 			  });


});
	
function populate_tbc(){
	jQuery.ajax({
		type: "GET", // HTTP method POST or GET
		url: "show_tbc", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		
		success:function(response){
			$("#to_be_completed").html(response); 
			
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
}

function details(id) {
	var link = "taskdetails/" + id;

	jQuery.ajax({
		type: "GET", // HTTP method POST or GET
		url: link, //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		
		success:function(response){
		    $(".details").html(''); 
			$("#details"+id).html(response); 
			
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	
};

function tbc_details(id) {
	var link = "tbc_details/" + id;

	jQuery.ajax({
		type: "GET", // HTTP method POST or GET
		url: link, //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		
		success:function(response){
		    $(".tbc_details").html(''); 
			$("#tbc_details"+id).html(response); 
			
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	
};

function close_tbc_details() {
    $(".tbc_details").html(''); 
}

function close_details() {
    $(".details").html(''); 
}
close_tbc_details

function delete_task(id) {
    var conf = confirm("Are you sure you want to remove this task??");
    
    if(conf) {
        jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "delete_task", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:{task_id:id},
		
		success:function(response){
			window.open("/showtasks","_self")
			$.Notify({
                caption: 'Deleted',
                content: 'Task has been succesfuly deleted',
                type: 'alert'
            });
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
        }

    
}

function editname(id) {
    var value = $('#tn_' + id).text();
    var html = '<form class="form-inline">'+
                '<input type="text" id="t_name" class="form-control" value = "' + value.trim() + '" required/>' + 
                '<a href="#" onclick="changename(\'' + id + '\'); return false;"class="btn btn-default" aria-label="Left Align">' +
                            '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' + 
                    '</a>' +
                '<a href="#" onclick="details(\'' + id + '\'); return false;"class="btn btn-default" aria-label="Left Align">' +
                            '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' + 
                    '</a>' +
                '</form>';
    $("#tn_"+id).html(html); 
    
    var buttons = '';
    $("#tnc_"+id).html(buttons); 
    
}

function editdetails(id) {
    var value = $('#td_' + id).text();
    
    var html = '<form >'+
                '<textarea class="form-control" id="t_details" rows="7">' + value.trim() + '</textarea>' + 
                '<a href="#" onclick="changedetails(\'' + id + '\'); return false;"class="btn btn-default" aria-label="Left Align">' +
                            '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' + 
                    '</a>' +
                '<a href="#" onclick="details(\'' + id + '\'); return false;"class="btn btn-default" aria-label="Left Align">' +
                            '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' + 
                    '</a>' +
                '</form>';
    $("#td_"+id).html(html); 
    
    var buttons = '';
    $("#tdc_"+id).html(buttons); 
    
}

function changename(id) {

    jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "change_task_name", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:{task_id:id,
			    new_name:$("#t_name").val()
			},
		
		success:function(response){
			details(id);
			$.Notify({
                caption: 'Changed',
                content: 'Task name has been upated successfully.',
                type: 'success',
                timeout: 7000
            });
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
}

function changedetails(id) {

    jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "change_task_details", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:{task_id:id,
			    new_details:$("#t_details").val()
			},
		
		success:function(response){
			details(id);
			$.Notify({
                caption: 'Changed',
                content: 'Task details have been upated successfully.',
                type: 'success',
                timeout: 7000
            });
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
}

function completionToSingle(id) {
    jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "change_completion_by", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:{task_id:id,
			  state:'single'
			},
		
		success:function(response){
			details(id);
			$.Notify({
                caption: 'Changed',
                content: 'Task completion rules has been changed to single user.',
                type: 'success',
                timeout: 7000
            });
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
}

function completionToAll(id) {
    jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "change_completion_by", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:{task_id:id,
			  state:'everyone'
			},
		
		success:function(response){
			details(id);
			$.Notify({
                caption: 'Changed',
                content: 'Task completion rules has been changed to all users.',
                type: 'success',
                timeout: 7000
            });
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
}

function complete_task(id){
	jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "complete_task", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:{task_id:id},
		
		success:function(response){
			populate_tbc();
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
	});
}