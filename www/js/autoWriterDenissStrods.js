

//####################RUNNING TEXT SCRIPT###########################
//Code snippet from: http://jsfiddle.net/ARTsinn/RED9H/2/
$( document ).ready(function() {
$.fn.typer = function (text, options) {
    options = $.extend({}, {
        delay: 500,
        duration: 5000,
        easing: 'linear',
        endless: false
    }, options);
    var elem = $(this);
    (function loop(i) {
        var e = typeof text === 'string' ? text : text[i];
        // strip html tags, might be helpful
         e.replace(/(<.*?>)/ig,"")
        $({len: 0}).delay(options.delay).animate({len: e.length}, {
            duration: options.duration,
            easing: options.easing,
            step: function (now) {
                var pos = Math.ceil(now),
                    char = e.substr(pos, 0);
                elem.html(e.substr(0, pos));
            },
            complete: function () {
                i++;
                if (i === text.length && !options.endless) {
                    return;
                } else if (i === text.length) {
                    i = 0;
                }
                loop(i);
            }
        });
    })(0);
};
$('#autoText').typer(['<h1 style="color: white;">    Its Your Team Planner App!    </h1>']);
setInterval(function(){ $('#autoText').typer(['<h1 style="color: white;>    Its Your Team Planner App!    </h1>']); }, 25000);
});
