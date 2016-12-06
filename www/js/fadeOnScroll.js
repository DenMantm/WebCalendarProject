$(window).on("load",function() {
  $(window).scroll(function() {
    $(".p-fade").each(function() {
      /* Check the location of each desired element */
      var objectBottom = $(this).offset().top + $(this).outerHeight();
      var windowBottom = $(window).scrollTop() + $(window).innerHeight();
      
      /* If the element is completely within bounds of the window, fade it in */
      if (objectBottom < windowBottom) { //object comes into view (scrolling down)
        if ($(this).css("opacity")==0) {$(this).fadeTo(800,1);}
      } else { //object goes out of view (scrolling up)
        if ($(this).css("opacity")==1) {$(this).fadeTo(800,0);}
      }
    });
  }); $(window).scroll(); //invoke scroll-handler on page-load
});

// found at http://stackoverflow.com/questions/26694385/fade-in-on-scroll-down-fade-out-on-scroll-up-based-on-element-position-in-win