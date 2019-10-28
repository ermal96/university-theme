<?php get_header(); 

//Page Banner with args
pageBanner(array(
  'title' => 'Programs', 
  'subtitle' => 'Here you can see our programs we teach '
)); 
 ?>

<div class="container container--narrow page-section">
  <ul class="link-list min-list">
    <?php

    while (have_posts()): the_post() ?>

    <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>

    <?php endwhile; ?>
  </ul>
  <?php  echo paginate_links();?>
</div>

<?php get_footer();
