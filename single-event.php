<?php get_header();?>
<?php get_template_part('/templates/page-title', 'page-title'); ?>
<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p><a class="metabox__blog-home-link"
        href="<?php  echo get_post_type_archive_link('event'); ?>">
        <i class="fa fa-home" aria-hidden="true"></i> Back to Events</a>
      <span class="metabox__main"> Posted on <?php the_time('Y'); ?></span>
    </p>
  </div>


  <?php while (have_posts()) :?>

  <?php  the_post(); ?>
  <?php the_content();?>
  <ul class="link-list min-list">
    <?php
        $relatedPrograms = get_field('related_program');
        if ($relatedPrograms) : ?>
    <br>
    <hr>
    <h3>Related Program(s)</h3>
    <?php
          foreach ($relatedPrograms as $program) : ?>
    <li><a href="<?php echo get_the_permalink($program) ?>"><?php echo get_the_title($program); ?></a></li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
  <?php endwhile; ?>




</div>

<?php get_footer();
