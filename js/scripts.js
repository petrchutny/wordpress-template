// This allows safe use of jQuery's $()

jQuery(document).ready(function($){

  // Responsive menu overlay
  $("button.mobile-menu").click(function(){
    $(".mobile-menu-overlay").show();
    $(".mobile-menu-overlay .close-cross").click(function(){
      $(".mobile-menu-overlay").hide();
    })
  });

  // Menu button changing colour on scroll
  var button = $('button.mobile-menu svg:last-child'),
      button_bg = $('button.mobile-menu svg:first-child'),
      buttonCenterDistance = 88,
      responsiveMenuBreakpoint = 630,
      newColor = "#2A3D4A",
      newBgColor = "#FFF7EE",
      defaultColor = button.css("fill"),
      defaultBgColor = button_bg.css("fill");
  if($(window).width() < responsiveMenuBreakpoint) {
    $(window).scroll(function(){
      var   scrollPos = $(window).scrollTop(),
            headerHeight = $('#header').outerHeight();
      // Button is over white content background
      if(scrollPos > (headerHeight - buttonCenterDistance)) {
        button.css({fill : newColor});
        button_bg.css({fill : newBgColor});
      } else {
        button.css({fill : defaultColor});
        button_bg.css({fill : defaultBgColor});
      }
    });
  }

});
