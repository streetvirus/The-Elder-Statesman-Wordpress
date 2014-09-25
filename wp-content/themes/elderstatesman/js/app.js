(function($){

    //mobile nav
    $(".nav-button").on('click', function() {
      $(".left-nav > ul").slideToggle();
    });

    
    function imagesLoadedCallback(){
      $('#home-posts-list').masonry({
        gutter: 40,
        itemSelector: '.home-post',
        columnWidth: 30
      });      
    }

    $('body').imagesLoaded( imagesLoadedCallback );

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

    })

})(jQuery)