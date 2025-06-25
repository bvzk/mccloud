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
