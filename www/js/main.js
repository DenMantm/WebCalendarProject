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
	    eventClick: function(calEvent, jsEvent, view) {

        // change the border color just for fun
        //$(this).css('border-color', 'red');
       //alert('clicked');
       updateDatabase();

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
    
    var convertedEvents=[];
    for (var i = 0; i< events.length;i++){
        var _convertedEvent={};
        
        _convertedEvent['title'] = events[i].title;
        _convertedEvent['start'] = events[i]._start._d;
        _convertedEvent['allDay'] = events[i]._allDay;
        _convertedEvent['owner_calendar_id'] = 0;
        _convertedEvent['color'] = events[i].color;
        try{
            _convertedEvent['end'] = events[i].end._d;
        }
        catch(Exception){
            _convertedEvent['end'] = null;
        }
        
        convertedEvents.push(_convertedEvent); 
    }

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/database/Tasks/create",
        data: {json : JSON.stringify(convertedEvents)},
        success: function(data){
            console.log(data);
        },
        error: function(e){
            console.log(e.message);
        }
});
  
}

		




	});
	
	function retrieveFromDatabase(){
    
    
        $.ajax({
        type: "POST",
        dataType: "json",
        url: "/database/Tasks/retrieve",
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
                                $('#calendar').fullCalendar( 'changeView', 'agendaDay'  );
    
                                //alert("You click on day!\nShort: "+short+"\nFull: " + full);
                            }




	
	



