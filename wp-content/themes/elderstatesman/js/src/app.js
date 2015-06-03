;(function($){

    //mobile nav
    $(".mobile-nav-button").on('click', function() {
      $(".left-nav").find("ul.menu").slideToggle();
    });

})(jQuery);