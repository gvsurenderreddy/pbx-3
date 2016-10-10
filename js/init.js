(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

    // $(window).off();
    $(window).on('scroll', function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 50) {
        $('.navbar-fixed').addClass("small-header");
      } else {
        $('.navbar-fixed').removeClass("small-header");
      }

      if ($('.track-image').length > 0) {
        var el = $('.track-image');
        el.css({opacity: 0});
        var wh = $(window).height();
        var elView  = wh - (el.offset().top - scroll);

        if (elView > 0) {
          el.css({opacity: Math.min(1 / (wh) * elView, 1)});
        }
      }
    });

    //Highlight active menu item
    $(function() {
      $('.nav-wrapper a[href="' + location.pathname.split("/")[location.pathname.split("/").length-1] + '"]').parent().addClass('active');
    });

    // Google maps no zoom on scrolling
    $('.maps').off();

    $('.maps').on('click', function () {
      $('.maps iframe').css("pointer-events", "auto");
    });

    $( ".maps" ).on('mouseleave', function() {
      $('.maps iframe').css("pointer-events", "none");
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
