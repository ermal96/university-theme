<?php get_header();?>
<?php get_template_part('/templates/page-title', 'page-title'); ?>
<div class="container container--narrow page-section">


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
