<?php
/**
 * The main template file
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		$i = 0;

		while ( have_posts() ) {
			$i++;
			if ( $i > 1 ) {
				echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
			}
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		}
	}?>
</main>
<?php
get_footer();
// <script type="text/javascript" src='https://crm.zoho.com/crm/javascript/zcga.js'></script>
