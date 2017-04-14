// This allows safe use of jQuery's $()

jQuery(document).ready(function($){

  // Responsive menu overlay
  $("button.mobile-menu").click(function(){
    $(".mobile-menu-overlay").show();
    $(".mobile-menu-overlay .close-cross").click(function(){
      $(".mobile-menu-overlay").hide();
    })
  });
  
});
