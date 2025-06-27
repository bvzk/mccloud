<?php

/**
 * SEO optimization
 *
 * @package mccloud
 */


/**
 * Filter Yoast SEO robots meta tag to set `noindex, nofollow` on specific full URLs.
 *
 * Dynamically constructs exclusion list using current site domain (home_url).
 *
 * @param string $robots The original robots meta value.
 * @return string Modified robots meta value.
 */
function mccloud_set_noindex_nofollow_for_specific_urls(string $robots = ''): string
{
	global $wp;
	
	$current_url = home_url(add_query_arg([], $wp->request));
	$base_url = home_url();
	
	$excluded_urls = [
		'/ua/author/mramor-admin',
		'/ru/author/mramor-admin',
		'/ua/category/novini',
		'/ru/category/novini',
		'/ua/blog/feed',
		'/ru/blog/feed',
	];
	
	$excluded_urls = array_map(
		fn($path) => rtrim($base_url, '/') . $path,
		$excluded_urls
	);
	
	if (in_array($current_url, $excluded_urls, true)) {
		return 'noindex, nofollow';
	}
	
	return $robots;
}
add_filter('wpseo_robots', 'mccloud_set_noindex_nofollow_for_specific_urls', 999);


/**
 * Exclude specific taxonomy from Yoast XML sitemap.
 *
 * @param bool   $value    Whether to exclude the taxonomy (default false).
 * @param string $taxonomy Taxonomy name.
 * @return bool True to exclude, false to include.
 */
function mccloud_exclude_category_from_sitemap(bool $value, string $taxonomy): bool
{
	if ($taxonomy === 'category') {
		return true;
	}
	
	return $value;
}
add_filter('wpseo_sitemap_exclude_taxonomy', 'mccloud_exclude_category_from_sitemap', 10, 2);

/**
 * Dynamically modify the Yoast SEO meta title for the "cases" page based on the `term_id` query parameter.
 *
 * @param string $title The default title.
 * @return string Modified title if applicable.
 */
function mccloud_filter_wpseo_title(string $title): string
{
	if (
		is_page('cases') &&
		isset($_GET['term_id']) &&
		($category = get_category_by_slug(sanitize_title($_GET['term_id'])))
	) {
		return 'Кейси для яких використали пакети Google Workspace ' . esc_html($category->name) . ' | mcCloud';
	}
	
	return $title;
}
add_filter('wpseo_title', 'mccloud_filter_wpseo_title');

/**
 * Dynamically modify the Yoast SEO meta description for the "cases" page based on the `term_id` query parameter.
 *
 * @param string $description The default meta description.
 * @return string Modified meta description if applicable.
 */
function mccloud_filter_wpseo_metadesc(string $description): string
{
	if (
		is_page('cases') &&
		isset($_GET['term_id']) &&
		($category = get_category_by_slug(sanitize_title($_GET['term_id'])))
	) {
		return 'Історії успіху компаній, які завдяки потужному набору інструментів пакету Google Workspace ' .
			esc_html($category->name) .
			' змогли оптимізувати свої процеси, покращити співпрацю та досягти нових висот разом з mcCloud.';
	}
	
	return $description;
}
add_filter('wpseo_metadesc', 'mccloud_filter_wpseo_metadesc');


/**
 * Add custom rewrite rules for dynamic term_id routing on pages like /cases/{term} or /blog/{term}.
 */
add_action('generate_rewrite_rules', function ($wp_rewrite) {
	$new_rules = [
		// Example: /cases/marketing → index.php?pagename=cases&term_id=marketing
		'^cases/([^/]+)/?$' => 'index.php?pagename=cases&term_id=$1',
		
		// Example: /blog/analytics → index.php?pagename=blog&term_id=analytics
		'^blog/([^/]+)/?$'  => 'index.php?pagename=blog&term_id=$1',
	];
	
	// Add new rules to the top of existing rules
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
	
	return $wp_rewrite;
});


/**
 * Append page number to Yoast meta description on paginated pages.
 *
 * @param string $description The original meta description.
 * @return string Modified meta description with page number.
 */
function mccloud_append_page_number_to_metadesc(string $description): string
{
	if (is_paged()) {
		global $paged;
		$description .= ' – Сторінка ' . (int) $paged;
	}
	
	return $description;
}
add_filter('wpseo_metadesc', 'mccloud_append_page_number_to_metadesc', 10, 1);

/**
 * Append page number to Yoast meta title on paginated pages.
 *
 * @param string $title The original title.
 * @return string Modified title with page number.
 */
function mccloud_append_page_number_to_title(string $title): string
{
	if (is_paged()) {
		global $paged;
		$title .= ' – Сторінка ' . (int) $paged;
	}
	
	return $title;
}
add_filter('wpseo_title', 'mccloud_append_page_number_to_title', 10, 1);

/**
 * Redirects any request with uppercase letters in the URL path to the same path in lowercase.
 *
 * This function checks the current request URI and performs a 301 redirect to the lowercase version
 * if it contains any uppercase letters. The query string is preserved during the redirect.
 * Useful for SEO to avoid duplicate content issues caused by case-sensitive URLs.
 *
 * Example:
 *   /Some/Upper/Case/?id=123 → /some/upper/case/?id=123
 *
 * Hooked to 'template_redirect' to run before WordPress renders the page.
 *
 * @return void
 */
function redirect_uppercase_urls() {
	$request_uri = $_SERVER['REQUEST_URI'];
	
	// Split the URL into path and query parts
	$parsed_url = parse_url($request_uri);
	$path = $parsed_url['path'] ?? '';
	$query = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
	
	// Redirect only if the path contains uppercase letters
	if (preg_match('/[A-Z]/', $path)) {
		$lowercase_path = strtolower($path);
		$new_url = $lowercase_path . $query;
		
		wp_redirect($new_url, 301);
		exit;
	}
}

add_action('template_redirect', 'redirect_uppercase_urls');
