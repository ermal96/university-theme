<?php
/*
 Template Name: page-title
 */
?>


<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h2 class="page-banner__title"><?php the_title(); ?></h2>
      <div class="page-banner__intro">
        <p>Lorem ipsum</p>
      </div>
    </div>  
  </div>
