<?php

/**
 * Register a custom ACF options page for header settings.
 *
 * This will add a new admin page under "Header Options" for configuring global header fields.
 * Requires Advanced Custom Fields (ACF) plugin to be active.
 *
 * @link https://www.advancedcustomfields.com/resources/acf_add_options_page/
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title'  => 'Header Options',
		'menu_title'  => 'Header Options',
		'menu_slug'   => 'header-options',
		'capability'  => 'edit_posts',
		'redirect'    => false
	]);
}

/**
 * Registers all custom ACF blocks used by the mcCloud theme.
 *
 * This function loads block definitions from the /template-parts/blocks/ directory.
 * Each block should include its own block.json configuration file and template.php.
 * These blocks extend the Gutenberg editor and are defined using ACF's block registration method.
 * You can activate this function by uncommenting the add_action() line at the bottom.
 *
 * Blocks being registered:
 * - mccloud-custom-list
 * - mccloud-custom-notice
 * - mccloud-custom-paragraph
 * - mccloud-custom-title
 * - mccloud-custom-page-links
 * - mccloud-custom-icon-boxes
 * - mccloud-custom-image-boxes
 * - mccloud-custom-services-list
 * - mccloud-custom-pricing
 * - mccloud-custom-steps
 * - mccloud-custom-cta
 *
 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
 *
 * @return void
 */
function mccloud_register_acf_blocks() {
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-list' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-notice' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-paragraph' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-title' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-page-links' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-icon-boxes' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-image-boxes' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-services-list' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-pricing' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-steps' );
	register_block_type( __DIR__ . '/template-parts/blocks/mccloud-custom-cta' );
}

// add_action( 'init', 'mccloud_register_acf_blocks' );
