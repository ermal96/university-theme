<?php get_header();?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h2 class="page-banner__title"><?php the_title(); ?></h2>
     
    </div>  
  </div>

  <div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php  echo get_post_type_archive_link('event'); ?>">
      <i class="fa fa-home" aria-hidden="true"></i> Back to Events</a> 
      <span class="metabox__main"> Posted on <?php the_time('Y'); ?></span>
      </p>
    </div>

  <div class="row">
    <div class="col-12 col-sm-6 col-md-8">
    <?php while(have_posts()) :?>

        <?php  the_post(); ?>
        <?php the_content(); ?>

    <?php endwhile; ?>
    </div>
    <div style="background:#ededed; padding: 20px" class="col-6 col-md-4 col-sm-12">
    <?php if ( is_active_sidebar( 'blog_right_1' ) ) : ?>
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
          <?php dynamic_sidebar( 'blog_right_1' ); ?>
        </div><!-- #primary-sidebar -->
    <?php endif; ?>
    </div>
    
  </div>
       

    

       <button onClick="javascript:history.back()">Go Back</button>
  </div>
        
  <?php get_footer(); ?>