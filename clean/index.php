<!-- /index.php -->
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<main>
    <div class="container">
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
