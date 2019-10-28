<?php get_header();?>

<?php pageBanner(); ?>
<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link"
        href="<?php  echo get_post_type_archive_link('campus'); ?>">
        <i class="fa fa-home" aria-hidden="true"></i> Back to Campuses</a>
    
    </p>
  </div>

  <?php while (have_posts()) :?>

  <?php  the_post(); ?>
  <?php the_content(); ?>
  <div class="acf-map">
    <?php $mapLocation = get_field('map_location');?>

   <div class="marker" data-lat="<?php  echo $mapLocation['lat']; ?>" data-lng="<?php  echo $mapLocation['lng']; ?>">
     <h4><?php the_title(); ?></h4>
     <?php echo $mapLocation['address'] ?>
   </div>
  </div> 
  <?php
        $relatedPrograms = new WP_Query(array(
          'post_type'          => 'program',
          'posts_per_page'     => -1,
          'orderby'            => 'meta_value',
          'order'              => 'ASC',
          'meta_query'         => array(
            array(
              'key'            => 'related_campus',
              'compare'        => 'LIKE',
              'value'          => '"'. get_the_ID() . '"'
            )
          )
        ));
?>
  <?php if ($relatedPrograms->have_posts()) :?>
  <hr class="section-break">
  <h3>Programs Available At This Campus</h3>
  <br>
  <ul class="min-list link-list">
    <?php while ($relatedPrograms->have_posts()): $relatedPrograms->the_post()  ?>
    <li>
      <a href="<?php the_permalink()?>">
          <?php the_title() ?>
      </a>
    </li>
  <?php endwhile; ?>
  </ul>
  <?php  wp_reset_postdata()?>
  <?php endif;?>
  <?php endwhile; ?>


</div>

<?php get_footer();
