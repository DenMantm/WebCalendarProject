


$(document).ready(function() {

	//##### send add record Ajax request to response.php #########
	$("#btnSaveNewMeeting").click(function (e) {
			e.preventDefault();
			if($("#m_subject").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#btnSaveNewMeeting").hide(); //hide submit button
		//	$("#LoadingImage").show(); //show loading image
			
		   // var myData = 'subject_text='+ $("#m_subject").val();//build a post data structur
		 //	var myData1 = 'location_text='+ $("#m_location").val();
		 //	var myData2 = 'date_text='+ $("#m_date").val();
		 
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "addtask", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:'location_text='+ $("#m_location").val()+'&subject_text='+ $("#m_subject").val()+'&date_text='+ $("#m_date").val(),//Form variables
			
			success:function(response){
				$("#responds").append(response);
				$("#m_subject").val(''); //empty text field on successful
				$("#m_date").val('');
				$("#m_location").val('');
				$("#btnSaveNewMeeting").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
			//	$( "#newmeeting" ).hide();
			
			

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewMeeting").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	

});
