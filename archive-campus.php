<?php get_header(); 

//Page Banner with args
pageBanner(array(
  'title' => 'Campuses', 
  'subtitle' => 'Here you can see our Campuses'
)); 
 ?>

<div class="container container--narrow page-section">
<div class="acf-map">
    <?php
    while (have_posts()): the_post(); 
    $mapLocation = get_field('map_location');
    ?>

   <div class="marker" data-lat="<?php  echo $mapLocation['lat']; ?>" data-lng="<?php  echo $mapLocation['lng']; ?>">

   </div>

    <?php endwhile; ?>
  </div>
  <?php  echo paginate_links();?>
</div>

<?php get_footer();
