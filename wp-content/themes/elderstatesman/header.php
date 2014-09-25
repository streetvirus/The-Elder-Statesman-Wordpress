<?php
/**
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title( '|', true, 'left' ); ?></title>

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/libs/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>
  <div class="wrapper">
    <div class="page grid">

      <div class="header-container">
        <header>
          <h1 class="logo">
              <span style="display:none">The Elder Statesman</span>
              <a href="/" class="linked-logo" title="The Elder Statesman"></a>
          </h1>
        </header>
      </div>

      <div class="main-container col2-left-layout">
        <div class="main">
        
          <div class="col-left sidebar col-2-12">
            <div class="left-nav">
              <div class="nav-button">
                <div class="nav-button-inner">
                  <div class="menu-icon">
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
                  Navigation
                </div>
              </div>
              <ul>
                <li>
                  <a href="http://elder-statesman.com/shop/">Shop</a>
                </li>
                <li class="current">
                  <a href="/">Journal</a>
                </li>
                <li>
                  <a href="http://elder-statesman.com/custom/">Custom</a>
                </li>
                <li>
                  <a href="http://elder-statesman.com/about-us/">About Us</a>
                </li>
              <ul>
            </div>
          </div>

          <div class="col-main col-10-12">

