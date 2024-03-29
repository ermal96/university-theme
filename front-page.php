<?php get_header() ?>

<?php pageBanner(); ?>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Eventss</h2>
            <?php
        $today = date('Ymd');
        $homeEvents = new WP_Query(array(
          'post_type'          => 'event',
          'posts_per_page'     => 2,
          'meta_key'           => 'event_date',
          'orderby'            => 'meta_value',
          'order'              => 'ASC',
          'meta_query'         => array(
            array(
              'key'            => 'event_date',
              'compare'        => '>=',
              'value'          => $today,
              'type'           => 'numeric'
            )
          )
        ));

        while ($homeEvents->have_posts()) {
            $homeEvents->the_post();
            get_template_part('template-parts/event');
        }


        wp_reset_postdata()?>

            <p class="t-center no-margin"><a
                    href="<?php echo site_url('/events') ?>"
                    class="btn btn--blue">View All Events</a></p>
        </div>
    </div>

    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
            <?php

            $homePosts = new WP_Query(array(
              'posts_per_page' => 2,
            ));

            while ($homePosts->have_posts()) : $homePosts->the_post() ?>

            <div class="event-summary">
                <a class="event-summary__date event-summary__date--beige t-center"
                    href="<?php the_permalink() ?>">
                    <span class="event-summary__month"><?php the_time('M') ?></span>
                    <span class="event-summary__day"><?php the_time('d') ?></span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a
                            href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                    <p>
                        <?php echo wp_trim_words(get_the_content(), 10) ?>
                    </p>
                    <a href="<?php the_permalink() ?>"
                        class="nu gray">Read more</a>
                </div>
            </div>

            <?php endwhile;?>
            <?php  wp_reset_postdata()?>

            <p class="t-center no-margin"><a
                    href="<?php echo site_url('/blog') ?>"
                    class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
    </div>

</div>

<div class="hero-slider">
    <div class="hero-slider__slide"
        style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg') ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Transportation</h2>
                <p class="t-center">All students have free unlimited bus fare.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide"
        style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg') ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                <p class="t-center">Our dentistry program recommends eating apples.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide"
        style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg') ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Food</h2>
                <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ;
