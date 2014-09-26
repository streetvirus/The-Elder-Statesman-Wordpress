<?php

get_header(); 

      if ( have_posts() ) : ?>
        
        <div id="home-posts-list" class="home-posts-list">

          <div class="home-post home-post--affixed home-post--statement">
              <div class="home-post-wrapper" style="height: 100%;">
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
                                <?php has_excerpt() ? the_excerpt() : the_title(); ?>                          
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
        
        <?php if($wp_query->max_num_pages > 1):?>
          <div class="navigation" style="text-align: center;">
            <?php posts_nav_link( ' - ', '« Previous', 'Next »' ); ?> 
          </div>
        <?php endif; ?>

      <?php endif;

get_footer();