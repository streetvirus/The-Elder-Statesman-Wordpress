<?php

get_header();

    if ( have_posts() ) :
      // Start the Loop.
      while ( have_posts() ) : the_post();?>
        
        <article <?php post_class(); ?>>
          
          <h2 class="post-title"><?php the_title(); ?></h2>

          <div class="post-meta">
            <?php the_date() ?>
          </div>
          
          <div class="post-content">
            <?php the_content(); ?>
          </div>
        
        </article>

      <?php endwhile;

    endif;

get_footer();