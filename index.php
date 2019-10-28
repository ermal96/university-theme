<?php get_header(); 

// Get Page Banner with args
 pageBanner(array('title' => 'Blog', 'subtitle' => 'Welcome To Your Blog')); 
 
 ?>

<div class="container container--narrow page-section">

  <?php  while (have_posts()):  the_post();?>

  <div class="post-item">
    <h2 class="headline headline--medium headline--post-title"><a
        href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_post_thumbnail() ?>
  </div>
  <div class="metabox">
    <p>Posted by: <?php the_author_posts_link(); ?> on <?php the_time('Y'); ?> / Category: <?php echo  get_the_category_list('&'); ?>
      <p>
  </div>

  <div class="generic-content">
    <?php
          
          if (has_excerpt()) {
              the_excerpt();
          } else {
              echo wp_trim_words(get_the_content(), 20);
          }
          
           ?>
  </div>
  <div style="margin:20px 0px 50px 0px">

    <a class="btn btn--blue"
      href="<?php echo the_permalink(); ?>">Read More</a>

  </div>

  <?php endwhile;?>

  <?php

echo paginate_links();

?>
</div>








<?php get_footer();
