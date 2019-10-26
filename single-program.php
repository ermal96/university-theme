<?php get_header();?>

<?php get_template_part( '/templates/page-title', 'page-title'); ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php  echo get_post_type_archive_link('program'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Back to Programs</a>
                <span class="metabox__main"> Posted on <?php the_time('Y'); ?></span>
            </p>
        </div>

                <?php while(have_posts()) :?>

                    <?php  the_post(); ?>
                        <?php the_content(); ?>
                        <?php 
        $today = date('Ymd');
        $homeEvents = new WP_Query(array(
          'post_type'          => 'event',
          'posts_per_page'     => -1,
          'meta_key'           => 'event_date',
          'orderby'            => 'meta_value',
          'order'              => 'ASC',
          'meta_query'         => array(
            array(
              'key'            => 'event_date',
              'compare'        => '>=',
              'value'          => $today,
              'type'           => 'numeric'
            ),
            array(
              'key'            => 'related_program',
              'compare'        => 'LIKE',
              'value'          => '"'. get_the_ID() . '"'
            )
          )
        ));
?>
   <?php if($homeEvents->have_posts()) :?>
        <hr class="section-break">
          <h3>Upcoming <?php the_title() ?> Events</h3>
            <br>
              <?php while($homeEvents->have_posts()): $homeEvents->the_post()  ?>

                  <div class="event-summary">

                    <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
                          <span class="event-summary__month"><?php 
                              $eventDate = new DateTime(get_field('event_date'));
                              echo $eventDate->format('M'); ?></span>
                                  <span class="event-summary__day"><?php echo $eventDate->format('d',);?></span>
                    </a>

                          <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                              <p> <?php echo wp_trim_words(get_the_content(), 10) ?> </p>
                                <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
                          </div>
                  </div>

                <?php endwhile; ?>
                <?php  wp_reset_postdata()?>
                <?php endif;?>
                <?php endwhile; ?>


    </div>

    <?php get_footer(); ?>