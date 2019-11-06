<?php

if (!is_user_logged_in()) {
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
    <div class="create-note">
        <h2>Create New Note</h2>
        <input placeholder="Title" class="new-note-title">
        <textarea placeholder="Content Here" class="new-note-body">
        </textarea>
        <span class="submit-note">Create Note</span>
    </div>
    <ul class="min-list link-list" id="my-notes">

        <?php while ($userNotes->have_posts()): $userNotes->the_post() ?>
        <?php $title = get_post(get_the_ID());?>
        <li data-id="<?php the_ID() ?>">
            <span contentEditable='false' class="note-title-field" type="text">
                <?php echo esc_attr($title->post_title) ?>
            </span>
            <span class="edit-note"><i class="fa fa-pencil"></i> Edit</span>
            <span class="delete-note"><i class="fa fa-trash-o"></i> Delete</span>
            <span contentEditable="false" class="note-body-field">
                <?php echo the_content() ?>
            </span>
            <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right"></i> Save</span>
        </li>
        <?php endwhile; ?>

    </ul>
</div>

<?php endwhile;

get_footer();
