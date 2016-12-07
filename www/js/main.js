/*global $*/

    $.fn.followTo = function (pos) {
    var $this = this,
        $window = $(window);

    $window.scroll(function (e) {
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'absolute',
                top: pos
            });
        } else {
            $this.css({
                position: 'fixed',
                top: 0
            });
        }
    });
};

$('#calendar').followTo(250);
    


var events = [];


	$(document).ready(function() {
		$("#btnSaveNewTeamMeeting").click(function (e) {
			e.preventDefault();

			$("#btnSaveNewTeamMeeting").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "addteammeeting", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:
			{details:$("#tm_details").val(),
			    participants:$("#tm_participants").val(),
			    subject:$("#tm_subject").val(),
			    location:$("#tm_location").val(),
			    from:$("#tm_from").val(),
			    to:$("#tm_to").val()
			},
			success:function(response){
				$("#tm_details").val(''); 
				$("#tm_participants").val(''); 
				$("#tm_subject").val(''); 
				$("#tm_location").val(''); 
				$("#tm_from").val(''); 
				$("#tm_to").val(''); 
				$("#btnSaveNewTeamMeeting").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				$('#newteammeeting').modal('hide');
				
				//window.open("/main","_self")
				retrieveFromDatabase(selectedTeam);
				
				//alert(response);
			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});
	
$("#btnSaveNewTeamTask").click(function (e) {
			e.preventDefault();

			$("#btnSaveNewTeamTask").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
			var selectedVal = "";
			var selected = $("input[type='radio'][name='compleeted']:checked");
			if (selected.length > 0) {
			    selectedVal = selected.val();
			}
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "addteamtask", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:
			{details:$("#tt_details").val(),
			    team:$("#tt_team").val(),
			    name:$("#tt_name").val(),
			    completed:selectedVal,
			    to:$("#tt_to").val()
			},
			
			success:function(response){
				$("#tt_details").val(''); 
				$("#tt_team").val(''); 
				$("#tt_name").val(''); 
				$("#tt_to").val(''); 
				$("#btnSaveNewTeamTask").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				$('#newteamtask').modal('hide');
				
				
				
			//	window.open("/main","_self")
				
				retrieveFromDatabase(selectedTeam);
				
				//alert(response);
			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewTeamTask").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});
	
$("#btnSaveNewMeeting").click(function (e) {
			e.preventDefault();

			$("#btnSaveNewMeeting").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "addmeeting", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:
			{details:$("#m_details").val(),
			    participants:$("#m_participants").val(),
			    subject:$("#m_subject").val(),
			    location:$("#m_location").val(),
			    from:$("#m_from").val(),
			    to:$("#m_to").val()
			},
			
			success:function(response){
				$("#m_details").val(''); 
				$("#m_participants").val(''); 
				$("#m_subject").val(''); 
				$("#m_location").val(''); 
				$("#m_from").val(''); 
				$("#m_to").val(''); 
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				$('#newmeeting').modal('hide');
				
				
				
				//window.open("/main","_self")
				
				retrieveFromDatabase(selectedTeam);
				
				
				
				//alert(response);
			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			droppable: true,
			    eventReceive: function(event, delta, revertFunc) {
			        
        events = $('#calendar').fullCalendar( 'clientEvents');

        
    },
	    eventClick: function(calEvent, jsEvent, view) {
        var start=moment(calEvent._start).format('MM/DD/YYYY H:mm A');
        var end=moment(calEvent._end).format('MM/DD/YYYY H:mm A');
        // change the border color just for fun
        $(this).css('border-color', 'red');
        
	    switch(calEvent.title) {
		    case "Team meeting":
		        $("#tm_subject").val(calEvent.title); 
		        $("#tm_from").val(start); 
				$("#tm_to").val(end); 
				$("#tm_location").val(calEvent._id); 
		        $('#newteammeeting').modal('show');
		        break;
		    case "Team task":
		        $("#tt_name").val(calEvent.title); 
				$("#tt_to").val(moment(calEvent._start).format('DD/MM/YYYY')); 
				$("#tt_details").val(calEvent._id); 
		        $('#newteamtask').modal('show');
		        break;
		    default:
		        $("#m_subject").val(calEvent.title); 
		        $("#m_from").val(start); 
				$("#m_to").val(end); 
				$("#m_location").val(calEvent._id); 
		        $('#newmeeting').modal('show');
		} 
        
       //updateDatabase();

    },

			// this allows things to be dropped onto the calendar
			drop: function() {
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
					
				}
				
				
			}
		});
		
		
		$('#external-events .fc-event').each(function() {

			
			// store data so the calendar knows to render an event upon drop

			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true, // maintain when user navigates (see docs on the renderEvent method)
				color: $(this).css("background-color")
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/



// function updateDatabase(){
    
//     var convertedEvents=[];
//     for (var i = 0; i< events.length;i++){
//         var _convertedEvent={};
        
//         _convertedEvent['title'] = events[i].title;
//         _convertedEvent['start'] = events[i]._start._d;
//         _convertedEvent['allDay'] = events[i]._allDay;
//         _convertedEvent['owner_calendar_id'] = 0;
//         _convertedEvent['color'] = events[i].color;
//         try{
//             _convertedEvent['end'] = events[i].end._d;
//         }
//         catch(Exception){
//             _convertedEvent['end'] = null;
//         }
        
//         convertedEvents.push(_convertedEvent); 
//     }

//     $.ajax({
//         type: "POST",
//         dataType: "json",
//         url: "/database/Tasks/create",
//         data: {json : JSON.stringify(convertedEvents)},
//         success: function(data){
//             console.log(data);
//         },
//         error: function(e){
//             console.log(e.message);
//         }
// });
  
// }




	});
	
	function retrieveFromDatabase(teamId){
    
    
        $.ajax({
        type: "GET",
        dataType: "json",
        url: "database/Teams/meetings/"+teamId,
        data: {owner_calendar_id : 0},
        success: function(data){
            $('#calendar').fullCalendar( 'removeEvents');
            $('#calendar').fullCalendar('addEventSource', data);
            $('#calendar').fullCalendar( 'refresh' );
            events = $('#calendar').fullCalendar( 'clientEvents');
            console.log(data);
        },
        error: function(e){
            console.log(e.message);
        }
});
    
    
}
function day_click(short, full) {
                                
                                $('#calendar').fullCalendar( 'gotoDate', short );
                                $('#calendar').fullCalendar( 'changeView', 'agendaDay' );
    
                                //alert("You click on day!\nShort: "+short+"\nFull: " + full);
                            }

    $(function(){
        $('select').select2({
        placeholder: 'Email address'
        });
        
        $('#tt_team').select2({
        placeholder: 'Select team'
        });

    });



//this is for now in global scope in case if we need ajax call for teamlist

var selectedTeam = 'personal';
var teamList = [];

function getTeamList(){
    
            $.ajax({
        type: "GET",
        dataType: "json",
        url: "/database/Teams/list/0",
        data: {},
        success: function(data){
            
            //assigning team list to variable
            console.log(data);
            teamList = data;
            
            
        },
        error: function(e){
            console.log(e.message);
        }
});
}
    //when selecting other team, loading calendar entries acordingly
    function tab_change(tab){
        
       selectedTeam = $(tab).attr('name');
       
       if(selectedTeam=='personal'){
           
           retrieveFromDatabase(0);
           
       }
       else{
           retrieveFromDatabase(selectedTeam);
           
       }
      
        
    }