<?php get_header();?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h2 class="page-banner__title"><?php the_title(); ?></h2>
      <div class="page-banner__intro">
        <p>Latest News</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">

    <?php while(have_posts()) :?>

        <?php  the_post(); ?>
        <?php the_content(); ?>

    <?php endwhile; ?>   
       <button onClick="javascript:history.back()">Go Back</button>
  </div>
        
  <?php get_footer(); ?>