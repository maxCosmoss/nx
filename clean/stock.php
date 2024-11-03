<!-- /index.php -->
<?php
/**
 * Template Name: Акции
 */

get_header();
?>

<main>
    <div class="stock">
        <img class="stock__img" src="<?= get_the_post_thumbnail_url(); ?>" alt="<?=the_title();?>">
        <div class="stock__title">
            <?=the_title();?>

        </div>
        <div class="stock__txt">
            <?=get_the_content();?>
        </div>

    </div>


</main>


<?php
get_footer();
