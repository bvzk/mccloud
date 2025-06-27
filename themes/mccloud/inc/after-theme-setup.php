<?php

/**
 * Functions which will be called on after_setup_theme
 *
 * @link https://developer.wordpress.org/reference/hooks/after_setup_theme/
 *
 * @package mccloud
 */


function mccloud_theme_support()
{
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	
	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);
	
	// Set content-width.
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 580;
	}
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');
	
	// Set post thumbnail size.
	set_post_thumbnail_size(1200, 9999);
	
	
	// Add custom image size used in Cover Template.
	add_image_size('twentytwenty-fullscreen', 1980, 9999);
	
	// Custom logo.
	$logo_width = 120;
	$logo_height = 90;
	
	// If the retina setting is active, double the recommended width and height.
	if (get_theme_mod('retina_logo', false)) {
		$logo_width = floor($logo_width * 2);
		$logo_height = floor($logo_height * 2);
	}
	
	add_theme_support(
		'custom-logo',
		array(
			'height' => $logo_height,
			'width' => $logo_width,
			'flex-height' => true,
			'flex-width' => true,
		)
	);
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'twentytwenty' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('twentytwenty');
	
	// Add support for full and wide align images.
	add_theme_support('align-wide');
	
	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if (is_customize_preview()) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support('starter-content', mccloud_get_starter_content());
	}
	
	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');
	
	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new TwentyTwenty_Script_Loader();
	add_filter('script_loader_tag', array($loader, 'filter_script_loader_tag'), 10, 2);
	
}
add_filter('upload_mimes', 'svg_upload_allow');

add_image_size('mccloud-post-thumbnail', 420, 235, true);
add_image_size('mccloud-post-thumbnail-2x', 840, 470, true);
add_image_size('mccloud-post-thumbnail-m', 268, 150, true);
add_image_size('mccloud-post-thumbnail-m-2x', 536, 300, true);