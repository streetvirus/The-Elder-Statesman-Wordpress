<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 */

get_header();

    if ( have_posts() ) :
      // Start the Loop.
      while ( have_posts() ) : the_post();?>

        <h2><?php the_title(); ?></h2>
        
        <div style="margin: 20px 0;">
          <?php the_content(); ?>
        </div>

      <?php endwhile;

    endif;

get_footer();