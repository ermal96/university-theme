<?php get_header();?>

<?php get_template_part('/templates/page-title', 'page-title'); ?>

<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p><a class="metabox__blog-home-link"
        href="<?php  echo get_post_type_archive_link('post'); ?>">
        <i class="fa fa-home" aria-hidden="true"></i> Back to Blog</a>
      <span class="metabox__main"> Posted on <?php the_time('Y'); ?></span>
    </p>
  </div>

  <?php while (have_posts()) :?>

  <?php  the_post(); ?>
  <?php the_content(); ?>

  <?php endwhile; ?>


</div>

<?php get_footer();
