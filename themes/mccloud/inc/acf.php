<?php

add_action('init', function () {
	error_log('ACF Blocks init');
});

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
	$blocks = [
		'mccloud-custom-list',
		'mccloud-custom-notice',
		'mccloud-custom-paragraph',
		'mccloud-custom-title',
		'mccloud-custom-page-links',
		'mccloud-custom-icon-boxes',
		'mccloud-custom-image-boxes',
		'mccloud-custom-services-list',
		'mccloud-custom-pricing',
		'mccloud-custom-steps',
		'mccloud-custom-cta',
	];
	
	foreach ($blocks as $block) {
		$path = get_template_directory() . "/template-parts/blocks/{$block}";
		$block_json = $path . '/block.json';
		
		if (file_exists($block_json)) {
			error_log("✅ Registering block: $block");
			register_block_type($path);
		} else {
			error_log("❌ Missing block.json for: $block");
		}
	}
}

add_action('init', 'mccloud_register_acf_blocks');