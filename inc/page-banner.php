<?php

function pageBanner($args = null)
{
    $subtitle = get_field('page_banner_subtitle');
    $backImg = get_field('page_banner_background_image');
    $title = get_the_title(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php
    echo $backImg['url']
    ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
        <h2 class="page-banner__title"><?php echo $title ?>
        </h2>
        <div class="page-banner__intro">
            <p><?php echo $subtitle ?>
            </p>
        </div>
    </div>
</div>

<?php
}
