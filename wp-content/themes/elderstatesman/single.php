<?php

get_header();

    if ( have_posts() ) :
      // Start the Loop.
      while ( have_posts() ) : the_post();?>
        
        <article <?php post_class(); ?>>
          <h2><?php the_title(); ?></h2>
          
          <div style="margin: 20px 0;">
            <?php the_content(); ?>
          </div>
        </article>

      <?php endwhile;

    endif;

get_footer();