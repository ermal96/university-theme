<?php
/**
* Template Name: Past events
*/
?>

<?php get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg');?>);">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            Past Events
        </h1>
        <div class="page-banner__intro">
            <p>All Past Event Archive Page</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">

    <?php
                $today = date('Ymd');
                $pastEvents = new WP_Query(array(
                  'post_type'          => 'event',
                  'posts_per_page'     => -1,
                  'meta_key'           => 'event_date',
                  'orderby'            => 'meta_value',
                  'order'              => 'ASC',
                  'meta_query'         => array(
                    array(
                      'key'            => 'event_date',
                      'compare'        => '<',
                      'value'          => $today,
                      'type'           => 'numeric'
                    )
                  )
                ));

        while ($pastEvents->have_posts()) {
            $pastEvents->the_post();
            get_template_part('template-parts/event');
        }


?>
    <?php  echo paginate_links();?>
</div>

<?php get_footer();