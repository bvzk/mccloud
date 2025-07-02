<?php

/**
 * Admin panel customization
 *
 * @package mccloud
 */

/**
 * Fixes the MIME type for SVG files and restricts upload access to admins only.
 *
 * @param array  $data       File data array (ext, type, proper_filename).
 * @param string $file       Full path to the uploaded file.
 * @param string $filename   Name of the uploaded file.
 * @param array  $mimes      Allowed MIME types.
 * @param string $real_mime  The actual detected MIME type (since WP 5.1.0).
 *
 * @return array Modified file data array.
 */
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '') {
	$is_svg = version_compare($GLOBALS['wp_version'], '5.1.0', '>=')
		? in_array($real_mime, ['image/svg', 'image/svg+xml'], true)
		: ('.svg' === strtolower(substr($filename, -4)));
	
	if ($is_svg) {
		if (current_user_can('manage_options')) {
			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		} else {
			$data['ext']  = false;
			$data['type'] = false;
		}
	}
	
	return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

/**
 * Adds SVG to the list of allowed MIME types for uploads.
 *
 * @param array $mimes Allowed MIME types.
 *
 * @return array Modified list with SVG support.
 */
function svg_upload_allow($mimes) {
	// Allow only for administrators
	if (current_user_can('manage_options')) {
		$mimes['svg'] = 'image/svg+xml';
	}
	return $mimes;
}
add_filter('upload_mimes', 'svg_upload_allow');

/**
 * Ensures SVG files are properly displayed in the Media Library.
 *
 * @param array $response The attachment response data.
 *
 * @return array Modified response with SVG image preview.
 */
function show_svg_in_media_library($response) {
	if (!empty($response['mime']) && $response['mime'] === 'image/svg+xml') {
		$response['image'] = [
			'src' => $response['url'],
		];
	}
	return $response;
}
add_filter('wp_prepare_attachment_for_js', 'show_svg_in_media_library');


/**
 * Register navigation menu locations for the theme.
 *
 * This function sets up various menu locations used across the site,
 * including mobile, header, footer, and language switcher areas.
 *
 * @return void
 */
function mccloud_register_menus(): void
{
	register_nav_menus([
//		'mobile'               => __('Mobile Menu', 'twentytwenty'),
		'header_left'          => __('Меню до лого', 'twentytwenty'),
		'header_right'         => __('Меню после лого', 'twentytwenty'),
		'language-switcher'    => __('Language Switcher', 'twentytwenty'),
		'footer_decisions_1'   => __('Підвал. Рішення, 1 колонка', 'twentytwenty'),
		'footer_decisions_2'   => __('Підвал. Рішення, 2 колонка', 'twentytwenty'),
		'footer_menu'          => __('Підвал. Меню', 'twentytwenty'),
		'footer_products'      => __('Підвал. Продукти', 'twentytwenty'),
	]);
}
add_action('init', 'mccloud_register_menus');

/**
 * Filter the custom logo HTML to support retina logos by adjusting the dimensions.
 *
 * If the 'retina_logo' theme setting is enabled, this function reduces the logo's
 * width and height by half and adjusts the output HTML accordingly.
 *
 * @param string $html The HTML output for the custom logo.
 * @return string Modified logo HTML.
 */
function mccloud_get_custom_logo(string $html): string
{
	$logo_id = get_theme_mod('custom_logo');
	
	if (!$logo_id) {
		return $html;
	}
	
	$logo = wp_get_attachment_image_src($logo_id, 'full');
	
	if (!$logo) {
		return $html;
	}
	
	$logo_width = (int) $logo[1];
	$logo_height = (int) $logo[2];
	
	if (get_theme_mod('retina_logo', false)) {
		$logo_width = floor($logo_width / 2);
		$logo_height = floor($logo_height / 2);
		
		$search = [
			'/width="\d+"/i',
			'/height="\d+"/i',
		];
		
		$replace = [
			"width=\"{$logo_width}\"",
			"height=\"{$logo_height}\"",
		];
		
		if (strpos($html, ' style=') === false) {
			$search[]  = '/(src=)/';
			$replace[] = "style=\"height: {$logo_height}px;\" src=";
		} else {
			$search[]  = '/(style="[^"]*)/';
			$replace[] = "$1 height: {$logo_height}px;";
		}
		
		$html = preg_replace($search, $replace, $html);
	}
	
	return $html;
}

add_filter('get_custom_logo', 'mccloud_get_custom_logo');

