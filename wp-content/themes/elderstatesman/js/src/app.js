;(function($){

    //mobile nav
    $(".mobile-nav-button").on('click', function() {
      $(".left-nav").find("ul.menu").slideToggle();
    });

    $('.desktop-nav-button').on('click', function(){
      var $sidebarMenuContainer = $('.sidebar-menu-container');

      var isOpen = ($sidebarMenuContainer.data('is-open') || false);

      if(isOpen){
        $sidebarMenuContainer.animate({
          opacity: '0',
          top: '-=10px'
        }, 200, function(){
          $sidebarMenuContainer.css({
            'visibility': 'invisible'
          }).data('is-open', !isOpen);
        });
      }
      else {
        $sidebarMenuContainer.css({
          'visibility': 'visible'
        }).animate({
          opacity: '1',
          top: '+=10px'
        }, 200, function(){
          $sidebarMenuContainer.data('is-open', !isOpen);
        });
      }

    });



})(jQuery);