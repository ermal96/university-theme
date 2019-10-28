<?php get_header();

// Get Page Banner with args
pageBanner(array(
    'title' => 'Events', 
    'subtitle' => 'Here you can see our latest Events '
)); 

?>

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
