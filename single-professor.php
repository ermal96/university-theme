<?php get_header();?>
<?php pageBanner(); ?>
<div class="container container--narrow page-section">


  <?php while (have_posts()): the_post()?>
  <div class="row">
    <div class="col">
      <?php the_post_thumbnail('professorPortrait') ?>
    </div>
    <div class="col">
      <?php the_content();?>
    </div>
  </div>
  <ul class="link-list min-list">
    <?php
        $relatedPrograms = get_field('related_program');
        if ($relatedPrograms) : ?>
    <br>
    <hr>
    <h3>Subjects</h3>
    <?php
    foreach ($relatedPrograms as $program) : ?>
    <li>
      <a href="<?php echo get_the_permalink($program) ?>">
        <?php echo get_the_title($program); ?>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>


  <?php endif; ?>
  <?php endwhile; ?>




</div>

<?php get_footer();
