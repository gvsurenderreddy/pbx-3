(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();


    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 50) {
        $(".navbar-fixed").addClass("small-header");
      } else {
        $(".navbar-fixed").removeClass("small-header");
      }
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
