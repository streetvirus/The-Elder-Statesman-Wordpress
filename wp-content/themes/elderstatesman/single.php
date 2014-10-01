<?php

get_header();

    if ( have_posts() ) :
      // Start the Loop.
      while ( have_posts() ) : the_post();?>
        
        <article <?php post_class(); ?>>
          
          <h2 class="post-title"><?php the_title(); ?></h2>

          <div class="post-meta">
            <?php elder_linkable_date(); ?>

            <?php $category = get_the_category(); ?>

            <?php if($category): ?>
              |
              <a href="<?php echo esc_url(get_category_link( $category[0]->term_id )); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $category[0]->name ); ?>">
                <?php echo $category[0]->name; ?>
              </a>

            <?php endif; ?>
          </div>
          
          <div class="post-content">
            <?php the_content(); ?>
          </div>

          <?php the_tags('<div class="post-tags">Tagged: ', ' • ', '</div>'); ?>
        
        </article>

        <?php elder_post_siblings_links(); ?>

      <?php endwhile;

    endif;

get_footer();