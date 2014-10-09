<?php

get_header(); 

      if ( have_posts() ) : ?>
        
        <div id="home-posts-list" class="home-posts-list clearfix">

          <div class="home-post home-post--affixed home-post--statement">
              <div class="home-post-wrapper">
                <div class="home-post-overlay-excerpt">
                  <table class="post-excerpt-table">
                    <tbody>
                      <tr>
                        <td>
                          <?php echo preg_replace("/[\s_]/", "<br>", 'An exploration of all things good'); ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <img src="<?php echo get_template_directory_uri().'/images/home-blue-square.jpg'; ?>" class="home-post-image">
              </div>
          </div>

          <?php while ( have_posts() ) : the_post();?>


              <?php if(has_post_thumbnail()):?>

                <?php $home_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-thumb' ); ?>

                <div class="home-post">
                  <a href="<?php the_permalink(); ?>" class="home-post-link" title="<?php the_title(); ?>">
                    <div class="home-post-wrapper">
                      <div class="home-post-overlay-excerpt">
                        <table class="post-excerpt-table"> <?php // Use this for vertically centering the excerpt ?>
                          <tbody>
                            <tr>
                              <td>
                                <?php get_field('short_title') ? the_field('short_title') : (has_excerpt() ? the_excerpt() : the_title()); ?> 
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <img src="<?php echo $home_thumb[0]; ?>" class="home-post-image">
                    </div>
                  </a>
                </div>

            <?php endif; ?>

          <?php endwhile; ?>

        </div>
        
        <?php elder_home_nav(); ?>

      <?php endif;

get_footer();