/*global $*/
$(document).ready(function() {
$("#btnSaveNewTeam").click(function (e) {
			e.preventDefault();
			if($("#t_name").val()==='')
			{
				alert("Please provide team name!");
				return false;
			}
			
			$("#btnSaveNewMeeting").hide(); //hide submit button
		//	$("#LoadingImage").show(); //show loading image
			
		   // var myData = 'subject_text='+ $("#m_subject").val();//build a post data structur
		 //	var myData1 = 'location_text='+ $("#m_location").val();
		 //	var myData2 = 'date_text='+ $("#m_date").val();
		 
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "addTeam", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:'team_name='+ $("#t_name").val(),//Form variable
			
			success:function(response){
				$("#responds").append(response);
				$("#t_name").val(''); //empty text field on successful
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	

});