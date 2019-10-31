<!DOCTYPE html>
<html <?php language_attributes()?>>

<head>
  <meta charset="<?php bloginfo('charset')?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left"><a
          href="<?php echo esc_url(site_url()) ?>"><strong>Fictional</strong>University</a></h1>
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <ul class="nav-list min-list">
            <?php
          wp_nav_menu(array(
          'theme_location' => 'headerMenuLocation'
          ))
          ?>
          </ul>
        </nav>
        <div class="site-header__util">
          <?php if(is_user_logged_in()): ?>
            <a href="<?php echo esc_url(site_url('/my-notes')) ?>" class="btn btn--small btn--orange float-left push-right">My Notes</a>
            <a href="<?php echo esc_url(wp_logout_url()) ?>" class="btn btn--small  btn--dark-orange float-left">log Out</a>
            
          <?php else: ?>

            <a href="<?php echo esc_url(wp_login_url()) ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="<?php echo esc_url(wp_registration_url()) ?>" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
 
          <?php endif; ?>

          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>