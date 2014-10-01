(function($){

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }


    /*
     * Shuffles elements by adding or subtracting a small number of pixels from the top and left/right side
     * Shuffling is turned off for small screens, pass in 'true' as the 2nd arg to turn it on
     */
    function shufflePosts($posts, forceShuffle) {

      if( typeof forceShuffle == 'undefined') forceShuffle = false;

      if($(window).innerWidth() > 768 || forceShuffle){

        $posts.each(function(i, el){
          var newTop = getRandomInt(10, 60),
              newSide = getRandomInt(-50, 50),
              side = i % 2 ? 'left' : 'right',
              newCSS = {};

          newCSS['top'] = "+=" + newTop;
          newCSS[side]  = "+=" + newSide;

          $(el).css( newCSS );            

        });

      }

    }

    function homePage(){

      /*
       * Mouseover event for home posts.  
       * Since they are shuffled / overlapping, animate the z-index on hover to bring it forward 
       * Animate the z-index back into the original position on mouseout
       */

      $('#home-posts-list').on('mouseenter', '.home-post', function(){
        var $self = $(this);
        var ogZIndex = parseInt($self.css('z-index'), 10);

        $self.animate({
          'z-index' : ogZIndex + 10
        }, 300);

        $self.one('mouseleave', function(){
          $self.animate({
            'z-index' : ogZIndex
          }, 100);
        })

      });


      /*
       * First time images are loaded on the page, initialize masonry and shuffle the posts around
       */ 

      $('#home-posts-list').imagesLoaded( function(){

        $('#home-posts-list').masonry({
          gutter: 30,
          itemSelector: '.home-post',
          columnWidth: 30
        }); 

      });

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

        $('#home-posts-list').imagesLoaded( function(){
          $('#home-posts-list').masonry('appended', $(data.newElements));
        });

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