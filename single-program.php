<?php get_header();?>

<?php pageBanner(); ?>
<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link"
        href="<?php  echo get_post_type_archive_link('program'); ?>">
        <i class="fa fa-home" aria-hidden="true"></i> Back to Programs</a>
      <span class="metabox__main"> Posted on <?php the_time('Y'); ?></span>
    </p>
  </div>

  <?php while (have_posts()) :?>

  <?php  the_post(); ?>
  <?php the_content(); ?>
  <?php
        $relatedProfessors = new WP_Query(array(
          'post_type'          => 'professor',
          'posts_per_page'     => -1,
          'orderby'            => 'meta_value',
          'order'              => 'ASC',
          'meta_query'         => array(
            array(
              'key'            => 'related_program',
              'compare'        => 'LIKE',
              'value'          => '"'. get_the_ID() . '"'
            )
          )
        ));
?>
  <?php if ($relatedProfessors->have_posts()) :?>
  <hr class="section-break">
  <h3><?php the_title() ?> Professors</h3>
  <br>
  <ul class="professor-cards">
    <?php while ($relatedProfessors->have_posts()): $relatedProfessors->the_post()  ?>
    <li class="professor-card__list-item">
      <a class="professor-card" href="<?php  the_permalink()?>">
        <img class="professor-card__img"
          src="<?php the_post_thumbnail_url('professorLandscape') ?>"
          alt="">
        <span class="professor-card__name">
          <?php the_title() ?>
        </span>
      </a>
    </li>
  <?php endwhile; ?>
  </ul>
  <?php  wp_reset_postdata()?>
  <?php endif;?>
  <?php endwhile; ?>


</div>

<?php get_footer();
