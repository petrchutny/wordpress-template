// Show the scroll arrow only if hero image is big enough
$(window).resize(function(){
  if(($(".hero-background").height() / $(window).height()) > 0.9) {
    $("a.scroll-arrow").show();
    jQuery.getScript("http://cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js", function(){
      // Scroll arrow functionality
      $("a.scroll-arrow").click(function(){
        event.preventDefault();
        $(window).scrollTo($(".content"), {
          duration: 700,
          easing: 'swing'
        });
      })
    });
  } else {
    $("a.scroll-arrow").hide();
  }
})
$(window).resize();
