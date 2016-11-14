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
var clone;

	$(document).ready(function() {


		/* initialize the external events
		-----------------------------------------------------------------*/

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
    eventMouseout : function( event, jsEvent, view ) { 
    	
    //	console.log(jsEvent);
    
    	
    	
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
		

function updateDatabase(){
    $.post("/database/",
    {
        data: events

    },
    function(response, status,result){
      console.log(response);
      response = JSON.parse(response);
       console.log(response.key);
        if(response.key=="pass"){
          //CODE REGISTER SUCCESFULL
          alert("You have succesfully registered, please log in with your new credentials!");
          $('#signup_modal').modal('toggle');
          $('#login_modal').modal('toggle');
            //window.location = '/authorised_zone';
        }
        else if(response.key=="username_exists"){
          alert("username already exists");
        }
        else if(response.key=="email_exists"){
          alert("E-mail already taken");
        }
        else if(response.key=="email_fail"){
          alert("invalid e-mail");
        }
        else{
          //CODE DATABASE ERROR

             alert(response.key);
        }
    });
}
		




	});
	
	
	
	



