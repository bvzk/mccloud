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
		get_template_directory_uri() . '/assets/slick/slick.css',
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
		get_template_directory_uri() . '/assets/dist/app.css',
		[],
		filemtime(get_template_directory() . '/assets/dist/app.css'),
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
		get_template_directory_uri() . '/assets/slick/slick.min.js',
		['jquery'],
		'1.8.1',
		true
	);
	
	wp_register_script(
		'mccloud-app-js',
		get_template_directory_uri() . '/assets/dist/app.js',
		['jquery'],
		filemtime(get_template_directory() . '/assets/dist/app.css'),
		true
	);
	
	// Zoho CRM tracking script
	wp_register_script(
		'zoho-crm',
		'https://crm.zoho.com/crm/javascript/zcga.js',
		[],
		null,
		true
	);
	
	// Enqueue registered scripts
	wp_enqueue_script('slick');
	wp_enqueue_script('mccloud-app-js');
	wp_enqueue_script('zoho-crm');
	
	// Optional scripts (uncomment to use)
	// wp_register_script('maskedinput', get_template_directory_uri() . '/assets/slick/jquery.maskedinput.min.js', ['jquery'], '1.0.0', true);
	// wp_enqueue_script('maskedinput');
}

add_action('wp_enqueue_scripts', 'mccloud_register_scripts');

/**
 * Output Zoho SalesIQ chat widget script in the footer.
 *
 * This function injects the Zoho SalesIQ live chat tracking script
 * into the WordPress footer using `wp_footer` hook.
 *
 * @return void
 */
function add_zoho_salesiq() {
	echo '<script type="text/javascript">
        (function(w, d, s, u) {
            w.ZohoSalesIQ = w.ZohoSalesIQ || function() {
                (w.ZohoSalesIQ.q = w.ZohoSalesIQ.q || []).push(arguments)
            };
            var h = d.getElementsByTagName(s)[0],
                j = d.createElement(s);
            j.async = true;
            j.src = u;
            h.parentNode.insertBefore(j, h);
        })(window, document, "script", "https://salesiq.zohopublic.com/widget?wc=siq7f40f81f1c934d04f44f08472a029f8088a6db57e44ee7943fb211d4b330d5bd");
    </script>';
}
add_action('wp_footer', 'add_zoho_salesiq');


/**
 * Enqueue the cookie banner script and optionally pass translated strings.
 *
 * This function enqueues a JavaScript file (`cookie-banner.js`) from the theme's `js` directory.
 * It also includes an optional `wp_localize_script()` block (commented out) to pass translated strings
 * for multilingual support using the `pll__()` function from Polylang.
 *
 * @return void
 */
function enqueue_cookie_banner_script() {
	wp_enqueue_script('cookie-banner', get_template_directory_uri() . '/js/cookie-banner.js', [], null, true);
	
	// If needed, uncomment to pass translation strings to the JS
	// wp_localize_script('cookie-banner', 'cookieBannerLang', [
	//     'message' => pll__('Ми використовуємо cookies для покращення роботи сайту.'),
	//     'accept'  => pll__('Прийняти'),
	// ]);
}
add_action('wp_enqueue_scripts', 'enqueue_cookie_banner_script');
