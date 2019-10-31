<?php

if(!is_user_logged_in()){
    wp_redirect(esc_url(site_url()));
    exit;
}

get_header();

while (have_posts()): the_post(); ?>

<?php 

$userNotes = new WP_Query(array(
    'post_type'        => 'notes',
    'posts_per_page'   => -1,
    'author'           => get_current_user_id()

));

?>

    <?php pageBanner(); ?>

    <div class="container container--narrow page-section">
        <ul class="min-list link-list" id="my-notes">

        <?php while($userNotes->have_posts()): $userNotes->the_post() ?>
                <li class="">
                    <input class="note-title-field" type="text" value="<?php echo esc_attr(get_the_title()) ?>">
                    <span class="edit-note"><i class="fa fa-pencil"></i> Edit</span>
                    <span class="delete-note"><i class="fa fa-trash-o"></i> Delete</span>
                    <textarea class="note-body-field" cols="30" rows="10">
                        <?php echo esc_attr(the_content()) ?>
                    </textarea>
                </li>
        <?php endwhile; ?>

        </ul>
    </div>

<?php endwhile;

get_footer();
