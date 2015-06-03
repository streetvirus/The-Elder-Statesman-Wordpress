(function($){

    function homePage(){

      $('.home-navigation').on('click', 'a', function(){
        $('.home-navigation').fadeTo(200, 0, function(){
          $(this).css('visibility', 'hidden');
        });
      });

      /*
       * Listens for the 'infiniteScrollAddPosts' event.
       * This event needs to be specified in the WP-Options for the infinite scroll plugin.
       * Removes the first element if it isn't an actual post, listens for images loaded and reloads masonry
       */
      $(window).on('infiniteScrollAddPosts', function(event, data){
        
        if(data.newElements.length === 0){
          return;
        }

        var $first = $(data.newElements[0]);

        if($first.is('.home-post--statement')){
          data.newElements.shift();
          $first.remove();
        }

        // Reset the css for the navigation since we hid it on click
        $('.home-navigation').css({
          visibility: 'visible',
          opacity: 1
        });
        
      });

    }

    /*
     * Kick off the JS for this page if the body has the correct class
     */

    if($('body').is('.home')) homePage();

})(jQuery)