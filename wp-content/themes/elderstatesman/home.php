<?php

get_header(); 

      if ( have_posts() ) : ?>
        
        <div id="home-posts-list">

          <?php while ( have_posts() ) : the_post();?>


              <?php if(has_post_thumbnail()):?>

              <div class="home-post">
                <a href="<?php the_permalink(); ?>" class="home-post-link" title="<?php the_title(); ?>">
                  <?php $home_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-thumb' ); ?>
                  <img src="<?php echo $home_thumb[0]; ?>" class="home-post-image" style="max-width:100%;">
                </a>
              </div>

            <?php endif; ?>

          <?php endwhile; ?>

        </div>

      <?php endif;

get_footer();