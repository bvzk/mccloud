<?php
/**
 * Template Name: Gallery Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main id="site-content" role="main">
    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); ?>
                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <div class="post-inner thin">
                        <div class="entry-content" style="margin-top: 30px;">
                            <h1 class="t-center mb30"><?php the_title(); ?></h1>
                            <?php the_content( __( 'Continue reading', 'twentytwenty' ) ); ?>
                        </div>
                    </div>
                </article>
            <?php }
        }
    ?>
</main>
<?php get_footer(); ?>
