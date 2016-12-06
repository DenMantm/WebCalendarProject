/*global $*/
$(document).ready(function() {
	$(function(){
        $('select').select2();

    });
	
$("#btnSendInvite").click(function (e) {
			e.preventDefault();
			if($("#i_email").val()==='')
			{
				alert("Please provide an valid email address!");
				return false;
			}
			
			$("#btnSendInvite").hide(); //hide submit button
			var selectedVal = "";
			var selected = $("input[type='radio'][name='role']:checked");
			if (selected.length > 0) {
			    selectedVal = selected.val();
			}
		//	$("#LoadingImage").show(); //show loading image
			
		   // var myData = 'subject_text='+ $("#m_subject").val();//build a post data structur
		 //	var myData1 = 'location_text='+ $("#m_location").val();
		 //	var myData2 = 'date_text='+ $("#m_date").val();
		 
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "inviteOK", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:{email:$("#i_email").val(), role:selectedVal},//Form variable
			
			success:function(response){
				$("#responds").append(response);
				$("#i_email").val(''); //empty text field on successful
				$("#btnSendInvite").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				$('#invite').modal('hide');
				$("#landing2").html(response); 
            	showDialog("#dialog8");
            	
			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#btnSendInvite").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

$("#btnSaveNewTeam").click(function (e) {
			e.preventDefault();
			if($("#t_name").val()==='')
			{
				alert("Please provide team name!");
				return false;
			}
			
			$("#btnSaveNewTeam").hide(); //hide submit button
	
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "addTeam", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:'team_name='+ $("#t_name").val(),//Form variable
			
			success:function(response){
				$("#t_name").val(''); //empty text field on successful
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				window.open("/team","_self")

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});
});


function leave(id) {
	var conf = confirm("Are you sure?");
	var link = "leaveteam/" + id;

	if (conf) {
	jQuery.ajax({
		type: "GET", // HTTP method POST or GET
		url: link, //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		
		success:function(response){
			if(response == "NO") {
				alert("You are the last editor. Please promote another user to the editor role before leaving.")
			} else {
				window.open("/team","_self")
			}
            	
			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#btnSendInvite").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	}
};

    function showDialog(id){
        var dialog = $(id).data('dialog');
        dialog.open();
    }

function showusers(id) {
	
	var link = "/showusers/" + id;
	
         
	$.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: link,             
        dataType: "html",   //expect html to be returned                
        success: function(response){   
        	//alert(link);
        	$("#landing").html(response); 
            showDialog("#dialog9");
		
        }
	});
}

function invite(id) {
	var link = "/invite/" + id;
	
		$.ajax({    //create an ajax request to load_page.php
        type: "POST",
        url: link,             
        dataType: "HTML",   //expect html to be returned                
        success: function(response){  
        	$("#i_email").html(response);
        }
	});
}

function edit(id) {
	
	var link = "/editteam/" + id;
	
         
	$.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: link,             
        dataType: "html",   //expect html to be returned                
        success: function(response){   
        	//alert(link);
        	$("#landing3").html(response); 
            showDialog("#dialog7");
        },
        error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
	});
}

function remove(user , team) {
	var confirmation = confirm("Are you sure?");
	if (confirmation) {
		var link = "/removeuser/" + team + "/" + user;
		
		$.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: link,             
        dataType: "html",   //expect html to be returned                
        success: function(response){  
        	$("#landing3").html(response); 
            showDialog("#dialog7");
        	edit(team);
        },
        error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert("Error: " + thrownError);
			}
	});
	}
}

function changerole(user , team, role) {

		var link = "/changerole/" + team + "/" + user + "/" + role;
		
		$.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: link,             
        dataType: "html",   //expect html to be returned                
        success: function(response){   
        	//alert(response); 
            
        	edit(team);
        },
        error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert("Error: " + thrownError);
			}
	});
	
}

function checkIfCompleted(id) {
	jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "check_if_completed", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:{task_id:id},
		
		success:function(response){
		
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
	});
}