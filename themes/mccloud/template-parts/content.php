<?php
/**
 * The default template for displaying content
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner thin">
		<div class="entry-content">
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

		</div>
	</div>
</article>
