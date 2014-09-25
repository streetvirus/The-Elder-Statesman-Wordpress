<?php

if(WP_DEBUG){

  // Hide admin bar while developing
  add_filter('show_admin_bar', '__return_false');
  
}

/**
 * Elder Statesman Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 */
function elderstatesman_setup(){

  // Enable support for Post Thumbnails, and declare two sizes.
  add_theme_support( 'post-thumbnails' );

  add_image_size( 'home-thumb', 360);

}
add_action( 'after_setup_theme', 'elderstatesman_setup' );

/**
 * Enqueue scripts and styles for the front end.
 */
function elderstatesman_scripts() {

  // Load our main stylesheet.
  wp_enqueue_style( 'elderstatesman-style', get_stylesheet_uri() );

  if(is_home()){
    wp_enqueue_script( 'masonry-script', get_template_directory_uri() . '/js/libs/jquery.masonry.2.1.08.min.js', array( 'jquery' ), '20140616', true );
  }

  wp_enqueue_script( 'images-loaded-script', get_template_directory_uri() . '/js/libs/images.loaded.pkgd.min.js', array( 'jquery' ), '20140616', true );

  wp_enqueue_script( 'elderstatesman-script', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '20140616', true );

}
add_action( 'wp_enqueue_scripts', 'elderstatesman_scripts' );


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function elderstatesman_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() ) {
    return $title;
  }

  // Add the site name in front
  $title = get_bloginfo( 'name', 'display' ) . " $title";

  return $title;
}
add_filter( 'wp_title', 'elderstatesman_wp_title', 10, 2 );
