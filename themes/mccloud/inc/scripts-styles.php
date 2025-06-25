<?php

/**
 * Include scripts and styles into theme
 *
 * @link https://developer.wordpress.org/reference/functions/wp_register_style/
 * @link https://developer.wordpress.org/reference/functions/wp_register_script/
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_style/
 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_script/
 *
 * @package mccloud
 */


/**
 * Dequeue unnecessary scripts.
 */
add_action('wp_print_scripts', function () {
	wp_dequeue_script('google-recaptcha');
});

/**
 * Register and enqueue theme styles.
 */
function mccloud_register_styles(): void
{
	wp_register_style(
		'slick',
		get_template_directory_uri() . '/slick/slick.css',
		[],
		'1.8.1'
	);
	
	wp_register_style(
		'twentytwenty-style',
		get_stylesheet_uri(),
		[],
		'1.0.0'
	);
	
	wp_register_style(
		'mccloud-style',
		get_template_directory_uri() . '/dist/app.css',
		[],
		'1.0.15'
	);
	
	// Enqueue registered styles
	wp_enqueue_style('slick');
	wp_enqueue_style('twentytwenty-style');
	wp_enqueue_style('mccloud-style');
	
	// Optional styles (uncomment to use)
	// wp_enqueue_style('custom-style', get_template_directory_uri() . '/custom.css', [], '1.0');
	// wp_enqueue_style('media-style', get_template_directory_uri() . '/media.css', [], '1.0');
}

add_action('wp_enqueue_scripts', 'mccloud_register_styles');

/**
 * Register and enqueue theme scripts.
 */
function mccloud_register_scripts(): void
{
	wp_register_script(
		'slick',
		get_template_directory_uri() . '/slick/slick.min.js',
		['jquery'],
		'1.8.1',
		true // Load in footer
	);
	
	wp_register_script(
		'mccloud-app-js',
		get_template_directory_uri() . '/dist/app.js',
		['jquery'],
		'1.0.15',
		true
	);
	
	// Enqueue registered scripts
	wp_enqueue_script('slick');
	wp_enqueue_script('mccloud-app-js');
	
	// Optional scripts (uncomment to use)
	// wp_register_script('maskedinput', get_template_directory_uri() . '/slick/jquery.maskedinput.min.js', ['jquery'], '1.0.0', true);
	// wp_enqueue_script('maskedinput');
}

add_action('wp_enqueue_scripts', 'mccloud_register_scripts');
