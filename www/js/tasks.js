/*global $*/

function details(id) {
	var link = "taskdetails/" + id;

	jQuery.ajax({
		type: "GET", // HTTP method POST or GET
		url: link, //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		
		success:function(response){
			
			$("#details"+id).html(response); 
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	
};

function editname(id) {
    var value = $('#tn_' + id).text();
    var html = '<form class="form-inline">'+
                '<input type="text" id="t_name" class="form-control" value = "' + value.trim() + '" required/>' + 
                '<a href="#" onclick="changename(\'' + id + '\');"class="btn btn-default" aria-label="Left Align">' +
                            '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' + 
                    '</a>' +
                '<a href="#" onclick="details(\'' + id + '\');"class="btn btn-default" aria-label="Left Align">' +
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
                '<a href="#" onclick="changedetails(\'' + id + '\');"class="btn btn-default" aria-label="Left Align">' +
                            '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' + 
                    '</a>' +
                '<a href="#" onclick="details(\'' + id + '\');"class="btn btn-default" aria-label="Left Align">' +
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
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
}