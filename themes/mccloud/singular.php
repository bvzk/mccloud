<?php
/**
 * The template for displaying single posts and pages.
 */

get_header();
?>

<main id="site-content">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); ?>
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <div class="post-inner thin">
                    <div class="entry-content">
                        <?php the_content( __( 'Continue reading', 'twentytwenty' ) );?>
                    </div>
                </div>
            </article>
		<?php }
	}
	?>

</main>
<?php get_footer(); ?>
