<?php get_header(); ?>
<?php pageBanner(); ?>
<div class="container container--narrow page-section">

    <?php

        while (have_posts()) {
            the_post();
            get_template_part('template-parts/event');
        }


 ?>
    <?php  echo paginate_links();?>
</div>

<?php get_footer();
