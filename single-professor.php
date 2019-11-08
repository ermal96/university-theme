<?php get_header();?>
<?php pageBanner(); ?>
<div class="container container--narrow page-section">


  <?php while (have_posts()): the_post()?>
  <div class="row">
    <div class="col">
      <?php the_post_thumbnail('professorPortrait') ?>
    </div>
    <div class="col">

      <?php
    
    $likeCount = new WP_Query(array(
      'post_type' => 'like',
      'meta_query' => array(
        array(
          'key' => 'professor_like_id',
          'compare' => '=',
          'value' => get_the_ID()
        )
      )
    ));

   
    $dataLike = 'no';
    if (is_user_logged_in()) {
        $likeExists = new WP_Query(array(
          'post_type' => 'like',
          'author' => wp_get_current_user()->data->ID,
          'meta_query' => array(
             array(
                'key' => 'professor_like_id',
                'compare' => '=',
                'value' => get_the_ID()
      )
    )
    ));
        if ($likeExists->found_posts) {
            $dataLike = 'yes';
        }
    }

    $user = wp_get_current_user()->data->user_nicename;
    ?>

      <span class="like-box" data-user="<?php echo $user ; ?>"
        data-post-id="<?php the_ID(); ?>"
        data-id="<?php echo $likeExists->posts[0]->ID; ?>"
        data-title="<?php the_title(); ?>"
        data-exists="<?php echo $dataLike; ?>">

        <i class=" fa fa-heart-o"></i>
        <i class="fa fa-heart"></i>
        <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
      </span>
      <?php
     print_pre(wp_get_current_user()->data->ID);
      the_content();?>
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
