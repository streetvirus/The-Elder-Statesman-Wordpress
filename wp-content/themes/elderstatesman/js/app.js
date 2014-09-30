;(function($){

    //mobile nav
    $(".nav-button").on('click', function() {
      $(".left-nav").find("ul.menu").slideToggle();
    });



})(jQuery);
(function($){

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function shufflePosts($posts, forceShuffle) {

      // Pass in true if you want shuffling to happen on the mobile size site
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

    function homeImagesLoadedCallback(){
      $('#home-posts-list').masonry({
        gutter: 50,
        itemSelector: '.home-post',
        columnWidth: 30
      });      

      shufflePosts( $('.home-post:not(.home-post--affixed)') );
      
    }

    function homePage(){

      $('body').imagesLoaded( homeImagesLoadedCallback );

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

    }

    if($('body').is('.home')) homePage();

})(jQuery)