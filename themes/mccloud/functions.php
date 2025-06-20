<?php

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

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow($mimes)
{
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

	// WP 5.1 +
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>='))
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	else
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ($dosvg) {

		// разрешим
		if (current_user_can('manage_options')) {

			$data['ext'] = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

add_filter('wp_prepare_attachment_for_js', 'show_svg_in_media_library');

# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library($response)
{
	if ($response['mime'] === 'image/svg+xml') {
		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}

add_action('after_setup_theme', 'mccloud_theme_support');

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Telegram

require get_template_directory() . '/telegram.php';

// Custom page walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-twentytwenty-script-loader.php';

add_action('wp_print_scripts', function () {
	wp_dequeue_script('google-recaptcha');
});

function mccloud_register_styles()
{
	wp_enqueue_style('slick', get_template_directory_uri() . '/slick/slick.css', array(), 1);
	wp_enqueue_style('twentytwenty-style', get_stylesheet_uri(), array(), '1');
	wp_enqueue_style('mccloud-style', get_template_directory_uri() . '/dist/app.css', array(), '1.0.15');
	// wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/custom.css', array(), 1 );
	// wp_enqueue_style( 'media-style', get_template_directory_uri() . '/media.css', array(), 1 );
}
add_action('wp_enqueue_scripts', 'mccloud_register_styles');

function mccloud_register_scripts()
{
	wp_register_script('slick', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.0.1', false);
	wp_enqueue_script('slick');

	wp_register_script('mccloud-app-js', get_template_directory_uri() . '/dist/app.js', array('jquery'), '1.0.15', false);
	wp_enqueue_script('mccloud-app-js');

	//wp_register_script('maskedunput', get_template_directory_uri() .'/slick/jquery.maskedinput.min.js');
	//wp_enqueue_script('maskedunput');
}

add_action('wp_enqueue_scripts', 'mccloud_register_scripts');

function mccloud_menus()
{

	$locations = array(
		//		'primary'  => __( 'Desktop Horizontal Menu', 'twentytwenty' ),
		'mobile' => __('Mobile Menu', 'twentytwenty'),
		'header_left' => 'Меню до лого',
		'header_right' => 'Меню после лого',
		'language-switcher' => 'language switcher',
		'footer_decisions_1' => 'Підвал. Рішеня, 1 колонка',
		'footer_decisions_2' => 'Підвал. Рішеня, 2 колонка',
		'footer_menu' => 'Підвал. Меню',
		'footer_products' => 'Підвал. Продукти',
	);

	register_nav_menus($locations);
}

add_action('init', 'mccloud_menus');


function mccloud_get_custom_logo($html)
{

	$logo_id = get_theme_mod('custom_logo');

	if (!$logo_id) {
		return $html;
	}

	$logo = wp_get_attachment_image_src($logo_id, 'full');

	if ($logo) {
		// For clarity.
		$logo_width = esc_attr($logo[1]);
		$logo_height = esc_attr($logo[2]);

		// If the retina logo setting is active, reduce the width/height by half.
		if (get_theme_mod('retina_logo', false)) {
			$logo_width = floor($logo_width / 2);
			$logo_height = floor($logo_height / 2);

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if (strpos($html, ' style=') === false) {
				$search[] = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[] = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace($search, $replace, $html);

		}
	}

	return $html;

}

add_filter('get_custom_logo', 'twentytwenty_get_custom_logo');

if (!function_exists('wp_body_open')) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
}


function mccloud_sidebar_registration()
{

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title' => '<h2 class="widget-title subheading heading-size-3">',
		'after_title' => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget' => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name' => __('Footer #1', 'twentytwenty'),
				'id' => 'sidebar-1',
				'description' => __('Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty'),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name' => __('Footer #2', 'twentytwenty'),
				'id' => 'sidebar-2',
				'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty'),
			)
		)
	);

}

add_action('widgets_init', 'mccloud_sidebar_registration');




function mccloud_get_color_for_area($area = 'content', $context = 'text')
{
	return false;
}


function mccloud_get_customizer_color_vars()
{
	$colors = array(
		'content' => array(
			'setting' => 'background_color',
		),
		'header-footer' => array(
			'setting' => 'header_footer_background_color',
		),
	);
	return $colors;
}



// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function function_stones()
{
	$html = '';

	ob_start();
	get_template_part('template-parts/stone-items');
	$html = ob_get_contents();
	ob_clean();

	return $html;
}

add_shortcode('stones', 'function_stones');

add_action('wpcf7_submit', 'telegram_send');



function telegram_send($info)
{
	$telegram = new Telegram();

	$html = '';

	if ($_POST['your-number']) {
		$telegram->send($html);
	}

}


function add_post_subtitle()
{
	add_meta_box('post-subtitle', 'Подзаголовок', 'post_subtitle_callback', 'post', 'normal', 'high');
}

function post_subtitle_callback($post)
{
	wp_nonce_field(basename(__FILE__), 'post_subtitle_metabox');
	$html = 'Подзаголовок <input style="width: 100%; margin-top: 10px" type="text" value="' . get_post_meta($post->ID, 'post_subtitle', true) . '" name="post_subtitle"/>';

	echo $html;
}

add_action('admin_menu', 'add_post_subtitle');

function true_save_box_data($post_id)
{
	$post = get_post($post_id);
	if ($post->post_type == 'post') {
		update_post_meta($post_id, 'post_subtitle', esc_attr($_POST['post_subtitle']));
	}
	return $post_id;
}

add_action('save_post', 'true_save_box_data');

function sectionNews()
{
	$data = array(
		'post_type' => 'post',
		'orderby' => 'date',
		'post_status' => 'publish',
		'order' => 'DESC',
		'posts_per_page' => 3
	);
	$posts = new WP_Query($data);

	ob_start();
	require get_template_directory() . '/template-parts/section-news.php';
	$html = ob_get_contents();
	ob_clean();

	return $html;
}

add_shortcode('section-news', 'sectionNews');

add_filter('wpseo_robots', 'noindex_nofollow_page', 999);
function noindex_nofollow_page($string = "")
{
	global $wp;
	$current_url = home_url(add_query_arg(array(), $wp->request));
	$items = array(
		'https://mccloud.global/ua/author/mramor-admin',
		'https://mccloud.global/ro/author/mramor-admin',
		'https://mccloud.global/ua/category/novini',
		'https://mccloud.global/ro/category/novini',
		'https://mccloud.global/ua/blog/feed',
		'https://mccloud.global/ro/blog/feed',
	);

	// echo "<!-- " . $current_url . " -->";

	if (in_array($current_url, $items)) {
		$string = "noindex, nofollow";
	}

	return $string;
}

// add_filter('wpseo_robots', 'yoast_no_home_noindex', 999);
// function yoast_no_home_noindex($string= "") {
//    $term_id = get_the_category( $post->ID );
//    	echo "<!-- " . $term_id[0]->term_id . " -->";
//       if($term_id[0]->term_id == 9) {
//          $string= "noindex, nofollow";
//       }
//       return $string;
// }

function add_this_script_footer()
{ ?>
	<script type="text/javascript" src='https://crm.zoho.com/crm/javascript/zcga.js'> </script>
<?php }

add_action('wp_footer', 'add_this_script_footer');


function mccloud_get_page_banner()
{
	if (is_home()) {
		$page_template = 'home';
	} else {
		$type = get_page_template();
		$page_template = basename($type, '.php');
	}

	return get_template_directory() . '/page-templates/header-banners/' . $page_template . '-header-banner.php';
}

function mccloud_get_preload_banner()
{

	if (is_front_page()) {
		return '<link rel="preload" as="image" href="/wp-content/themes/mccloud/video/11_VP9.webp">';
	} else {
		$type = get_page_template();
		$page_template = basename($type, '.php');
		switch ($page_template) {
			case 'workspace':
				return '<link rel="preload" as="image" href="/wp-content/themes/mccloud/image/workspace-header-banner-m-2x.webp">';
			case 'enterprise':
				return '<link rel="preload" as="image" href="/wp-content/themes/mccloud/image/enterprise-header-banner-m-2x.webp">';


		}
	}

	return '';
}



//
//add_filter( 'post_link', function( $permalink, $post, $leavename ){
//    $posts = array(
//        835, //soglasovanie-dokumentov-v-google-docs
//        //898, //directory-sync
//        860, //500-google-meet
//        1259, //perevahy-vykorystannia-google-chat-dlia-biznesu
//        1262, //perevahy-roboty-z-partnerom-dlia-pidkliuchennia-google-workspace
//        998, //yak-perevagi-google-meet-v-por-vnyann-z-zoom
//        1028, //yaki-osnovni-perevahy-google-workspace-dlia-biznesu
//        1012, //yak-mozhlivost-nada-google-kalendar-dlya-b-znesu
//        981, //yak-stvoryty-korporativnu-poshtu-gmail
//        901, //directory-sync-ua
//        869, //500-meet
//        842, //uzgodzhennya-dokumentiv-u-google-docs
//        1036, //top-5-servisiv-dlia-onlain-zustrichei
//        1051, //chy-bezpechno-vykorystovuvaty-google-workspace
//        1061, //yak-orhanizuvaty-korporatyvne-khmarne-skhovyshche
//        1083, //yak-zrobyty-rezervne-kopiiuvannia-google-workspace
//        1107, //yak-obraty-taryfnyi-plan-google-workspace
//        1096, //shcho-take-khmarni-servisy
//    );
//    if(in_array($post->ID, $posts)) {
//        $permalink = trailingslashit( home_url('/'. $post->post_name . '/' ) );
//    }
//    return $permalink;
//}, 10, 3 );
//
add_action('generate_rewrite_rules', function ($wp_rewrite) {
	//    $new_rules['^ru/(soglasovanie-dokumentov-v-google-docs)/?$'] = 'index.php?name=soglasovanie-dokumentov-v-google-docs';
//    $new_rules['^ru/(500-google-meet)/?$'] = 'index.php?name=500-google-meet';
//    $new_rules['^(perevahy-vykorystannia-google-chat-dlia-biznesu)/?$'] = 'index.php?name=perevahy-vykorystannia-google-chat-dlia-biznesu';
//    $new_rules['^(perevahy-roboty-z-partnerom-dlia-pidkliuchennia-google-workspace)/?$'] = 'index.php?name=perevahy-roboty-z-partnerom-dlia-pidkliuchennia-google-workspace';
//    $new_rules['^(yak-perevagi-google-meet-v-por-vnyann-z-zoom)/?$'] = 'index.php?name=yak-perevagi-google-meet-v-por-vnyann-z-zoom';
//    $new_rules['^(yaki-osnovni-perevahy-google-workspace-dlia-biznesu)/?$'] = 'index.php?name=yaki-osnovni-perevahy-google-workspace-dlia-biznesu';
//    $new_rules['^(yak-mozhlivost-nada-google-kalendar-dlya-b-znesu)/?$'] = 'index.php?name=yak-mozhlivost-nada-google-kalendar-dlya-b-znesu';
//    $new_rules['^(yak-stvoryty-korporativnu-poshtu-gmail)/?$'] = 'index.php?name=yak-stvoryty-korporativnu-poshtu-gmail';
//    $new_rules['^(directory-sync-ua)/?$'] = 'index.php?name=directory-sync-ua';
//    $new_rules['^(500-meet)/?$'] = 'index.php?name=500-meet';
//    $new_rules['^(uzgodzhennya-dokumentiv-u-google-docs)/?$'] = 'index.php?name=uzgodzhennya-dokumentiv-u-google-docs';
//    $new_rules['^(top-5-servisiv-dlia-onlain-zustrichei)/?$'] = 'index.php?name=top-5-servisiv-dlia-onlain-zustrichei';
//    $new_rules['^(chy-bezpechno-vykorystovuvaty-google-workspace)/?$'] = 'index.php?name=chy-bezpechno-vykorystovuvaty-google-workspace';
//    $new_rules['^(yak-orhanizuvaty-korporatyvne-khmarne-skhovyshche)/?$'] = 'index.php?name=yak-orhanizuvaty-korporatyvne-khmarne-skhovyshche';
//    $new_rules['^(yak-zrobyty-rezervne-kopiiuvannia-google-workspace)/?$'] = 'index.php?name=yak-zrobyty-rezervne-kopiiuvannia-google-workspace';
//    $new_rules['^(yak-obraty-taryfnyi-plan-google-workspace)/?$'] = 'index.php?name=yak-obraty-taryfnyi-plan-google-workspace';
//    $new_rules['^(shcho-take-khmarni-servisy)/?$'] = 'index.php?name=shcho-take-khmarni-servisy';

	$new_rules['^cases/([^/]+)/?$'] = 'index.php?pagename=cases&term_id=$1';
	$new_rules['^blog/([^/]+)/?$'] = 'index.php?pagename=blog&term_id=$1';

	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;

	return $wp_rewrite;
});

add_filter('paginate_links', function ($link) {
	//Remove link page/1/ from the first element and prev element
	if (is_paged()) {
		$link = str_replace('page/1/', '', $link);
	}

	return $link;
});


add_filter('wpseo_exclude_from_sitemap_by_post_ids', 'exclude_posts_from_xml_sitemaps');

/* Exclude One Taxonomy From Yoast SEO Sitemap */
function sitemap_exclude_taxonomy($value, $taxonomy)
{
	//echo $value . ' - ' . $taxonomy . '<br>';
	if ($taxonomy == 'category')
		return true;
}
add_filter('wpseo_sitemap_exclude_taxonomy', 'sitemap_exclude_taxonomy', 10, 2);

if (!function_exists('add_defer_to_cf7')) {
	function add_defer_to_cf7($url)
	{
		if ( // comment the following line out add 'defer' to all scripts
			FALSE === strpos($url, 'contact-form-7') or
			FALSE === strpos($url, '.js')
		) { // not our file
			return $url;
		}
		// Must be a ', not "!
		return "$url' defer='defer";
	}
	add_filter('clean_url', 'add_defer_to_cf7', 11, 1);
}

// Meta title for cases
function filter_wpseo_title($title)
{
	if (is_page('cases') && isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) {
		return "Кейси для яких використали пакети Google Workspace " . $category->name . " | mcCloud";
	}
	return $title;
}
add_filter('wpseo_title', 'filter_wpseo_title');


// Meta description for cases
function filter_wpseo_metadesc($description)
{
	if (is_page('cases') && isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) {
		return "Історії успіху компаній, які завдяки потужному набору інструментів пакету Google Workspace "
			. $category->name . " змогли оптимізувати свої процеси, покращити співпрацю та досягти нових висот разом з
            mcCloud";
	}
	return $description;
}
add_filter('wpseo_metadesc', 'filter_wpseo_metadesc');

function get_nopaging_url()
{

	global $wp;

	$current_url = home_url($wp->request);
	$position = strpos($current_url, '/page');
	$nopaging_url = ($position) ? substr($current_url, 0, $position) : $current_url;

	return trailingslashit($nopaging_url);
}

/*
 * Get post views count using post meta
 */
function getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return 0;
	}
	return $count;
}

/*
 * Set post views count using post meta
 */
function setPostViews($postID)
{
	$countKey = 'post_views_count';
	$count = get_post_meta($postID, $countKey, true);
	if ($count == '') {
		delete_post_meta($postID, $countKey);
		add_post_meta($postID, $countKey, '0');
	} else {
		$count++;
		update_post_meta($postID, $countKey, $count);
	}
}


// CF7 forbid *@[*.].edu.ua emails
add_filter('wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2);

function custom_email_confirmation_validation_filter($result, $tag)
{

	if ($tag->name == 'your-email') {
		$your_email = isset($_POST['your-email']) ? trim($_POST['your-email']) : '';

		if (strpos($your_email, 'edu.ua')) {
			$result->invalidate($tag, "Виникла помилка. Спробуйте пізніше.");
		}
	}

	return $result;
}

// add_filter('wpseo_canonical', 'custom_remove_yoast_canonical_for_blog_pages');

// function custom_remove_yoast_canonical_for_blog_pages($canonical)
// {
// 	// Check if the current page is a blog page or a paginated page
// 	if (is_home() || is_paged()) {
// 		return false; // Return false to prevent Yoast from adding a canonical tag
// 	}
// 	return $canonical; // Return the default canonical URL for other pages
// }


add_filter('wpseo_metadesc', 'custom_paged_description_yoast', 10, 1);

function custom_paged_description_yoast($description)
{
	if (is_paged()) {
		global $paged;
		$page_number = (int) $paged;
		$description .= " - Сторінка $page_number";
	}
	return $description;
}

add_filter('wpseo_title', 'custom_paged_title_yoast', 10, 1);

function custom_paged_title_yoast($title)
{
	if (is_paged()) {
		global $paged;
		$page_number = (int) $paged;
		$title .= " - Сторінка $page_number";
	}
	return $title;
}


// First block - Enterprise Packages
function get_enterprise_plan_data()
{
	return [
		'title' => 'Пакети Enterprise',
		'plans' => [
			[
				'name' => 'Enterprise Essentials',
				'price' => '9.60',
				'button_text' => 'Обрати пакет',
				'highlight' => true,
				'features' => [
					'1 ТБ для зберігання даних на кожну ліцензію та Загальний Диск для команди',
					'До 250 користувачів y Meet',
					'Удосконалена підтримка',
					'Drive, Editors, Meet, Chat, Keep, Tasks, Sites (без Gmail)',
					'Сеанси підгруп i можливість підняття руки в Meet, QA, Polls, Whiteboarding, відстеження відвідуваності',
				]
			],
			[
				'name' => 'Enterprise Standard',
				'price' => '26.10',
				'button_text' => 'Замовити',
				'highlight' => false,
				'features' => [
					'Необмежена кількість пам’яті на диску *',
					'Функціонал пакета Essentials',
					'Захищена корпоративна пошта з власним доменом',
					'До 500 користувачів в Meet, онлайн трансляція (10к), Meet Rooms',
					'Покращені інструменти управління i кастомізації',
					'Сейф, поліпшений захист від втрати даних, Cloud Identity Premium, AppSheet Core, розширений DLP, Cloud Search',
				]
			],
			[
				'name' => 'Enterprise Plus',
				'price' => '33.80',
				'button_text' => 'Обрати пакет',
				'highlight' => true,
				'features' => [
					'Необмежена кількість пам’яті на диску *',
					'Функціонал пакета Standard, а також ',
					'До 1000 користувачів в Meet,  онлайн трансляція (100к), безшумний режим',
					'Drive, Editors, Meet, Chat, Keep,  Tasks, Sites (без Gmail)',
					'Покращені інструменти управління і кастомізації',
					'Шифрування ключами клієнта, шифрування по стандарту S/MIME, розширений експорт даних, вибір регіонів зберігання даних, Work insights',
				]
			]
		]
	];
}


function get_business_plan_data() {
    return [
        'title' => 'Пакети Business',
        'plans' => [
            [
                'name' => 'Business Starter',
                'price' => '6.12',
                'button_text' => 'Обрати пакет',
                'highlight' => true,
                'features' => [
                    '3 користувачiв Google Meet',
					'До 100 користувачів в Google Meet',
                    '30 ГБ для зберігання даних на кожну ліцензію',
                    'Пакет професійних бізнес-додатків',

                    'Безпечна корпоративна електронна пошта',
                    'Drive, Editors, Meet, Chat, Keep, Tasks, Sites',
                    'Сеанси підгруп і можливість підняття руки в Meet',
                ]
            ],
            [
                'name' => 'Business Standard',
                'price' => '12.24',
                'button_text' => 'Замовити',
                'highlight' => false,
                'features' => [
                    '2 ТБ для зберігання даних на кожну ліцензію',
                    'До 150 користувачів в Google Meet',
                    'Пакет професійних бізнес-додатків',
                    'Безпечна корпоративна електронна пошта',
                    'Drive, Editors, Meet, Chat, Keep, Tasks, Sites',
                    'Сеанси підгруп і можливість підняття руки в Meet',
                ]
            ],
            [
                'name' => 'Business Plus',
                'price' => '21.10',
                'button_text' => 'Обрати пакет',
                'highlight' => true,
                'features' => [
                    '5 ТБ для зберігання даних на кожну ліцензію',
                    'До 500 користувачів в Google Meet',
                    'Пакет професійних бізнес-додатків',
                    'Безпечна корпоративна електронна пошта',
                    'Drive, Editors, Meet, Chat, Keep, Tasks, Sites',
                    'Сеанси підгруп і можливість підняття руки в Meet',
                ]
            ]
        ]
    ];
}


function load_plans_template(string $plan_type)
{
	if ($plan_type === 'enterprise') {
        $plans = get_enterprise_plan_data();
    } elseif ($plan_type === 'business') {
        $plans = get_business_plan_data();
    } else {
        return; // Exit if an invalid plan type is provided
    }

	set_query_var('planData', $plans); // Set the data as a query var for the template
	get_template_part('template-parts/common/pricing-table', null);
}






function get_enterprise_packageFeatures_data()
{
	return [
		'title' => 'Особливості пакетів Enterprise',
		'subtitle' => 'Унікальні можливості та функціонал пакетів Enterprise для вашого бізнесу',
		'variants' => [
			[
				'title' => 'Essentials',
				'subtitle' => 'Пакет Enterprise Essentials підійде середнім  і великим підприємствам, яким потрібна платформа для спільної роботи, але вони хочуть зберегти вже наявний поштовий сервіс.',
				'desc' => "З Enterprise Essentials ви отримуєте набір інструментів для спільної роботи та відеоконференцій, включаючи Google Диск, Google Документи, Google Meet і Google Чат.  Він пропонує вашій організації розширені засоби керування політиками, об'єднане сховище, а також безпеку та керування корпоративного рівня.",
			],

			[
				'title' => 'Standard',
				'subtitle' => 'Пакет Enterprise Standard – це оптимальне рішення для великих компаній, у яких більше вимог до налаштувань безпеки і яким потрібні просунуті інструменти для управління і контролю.',
				'desc' => 'Крім всіх характеристик Essentials, пакет Enterprise Standard містити Gmail, Calendar, Сейф, поліпшений захист від втрати даних, Cloud Identity Premium, розширений DLP і не тільки. Що також важливо, на кожного користувача виділяється необмежена кількість пам’яті на диску',
			],

			[
				'title' => 'Plus',
				'subtitle' => 'Enterprise Plus надає розширені можливості  в сферах безпеки, адміністрування та аналітики, і може бути вигідним для організацій, які потребують додаткового функціоналу для оптимізації своїх бізнес-процесів.',
				'desc' => 'Розширений функціонал Enterprise Plus включає  в себе всі властивості пакетів Essentials і Standard, а також сертифікат відповідності, центр безпеки, пошук в Хмарі, AppSheet PRO та  можливість інтеграції зі сторонніми інструментами архівування.',
			],

		]
	];
}



function get_business_packageFeatures_data()
{
	return [
		'title' => 'Особливості пакетів Business',
		'subtitle' => 'Зручна співпраця та ефективна комунікація: інструменти для вашого успіху',
		'variants' => [
			[
				'title' => 'Starter',
				'subtitle' => 'Пакет Business Starter підійде невеликому бізнесу, який тільки починає розвиватися.',
				'desc' => 'Оформивши даний тарифний план, ви зможете оцінити доступність, надійність інструментів Google Workspace, а також усі переваги забезпечення. Gmail, Drive, Meet, Calendar, Chat, Docs, Sheets, Slides, Keep, Sites, Forms, допоможуть оптимізувати бізнес, зробити роботу більш ефективною і продуктивною. У міру розширення свого бізнесу ви зможете перейти на більш просунутий тарифний план.',
			],


			[
				'title' => 'Standard',
				'subtitle' => 'Найоптимальніший тарифний план, який найбільш часто вибирають користувачі.',
				'desc' => 'Підійде для малого та середнього бізнесу, як в разі невеликої кількості людей, які працюють в одному офісі, так і для великої інтернаціональної команди. Переваги цього пакета перед Starter полягають в більш просунутих функціях додатків Meet і Chat, розширені функції аудиту й звітності для Диска, а також в можливості створювати спільні диски для команди, що особливо актуально в режимі віддаленої роботи.',
			],


			[
				'title' => 'Plus',
				'subtitle' => 'Цей пакет відмінно підійде для середнього бізнесу.',
				'desc' => 'Business Plus – це покращений пакет бізнес-додатків з 5 ТБ сховищем на кожного користувача, а також вдосконаленими засобами контролю безпеки і управління. Додатково до основного функціонала Business Standard ви отримуєте Сейф і розширені функції управління кінцевими точками. ',
			],

		]
	];
}



function load_packageFeatures_template(string $plan_type)
{
	if ($plan_type === 'enterprise') {
        $packageFeatures = get_enterprise_packageFeatures_data();
    } elseif ($plan_type === 'business') {
        $packageFeatures = get_business_packageFeatures_data();
    } else {
        return; // Exit if an invalid plan type is provided
    }

	set_query_var('packageFeatures', $packageFeatures); // Set the data as a query var for the template
	get_template_part('template-parts/common/packageFeatures', null);
}


function get_three_cards_data_about()
{
	return  [
			[
				'title' => 'Найкращі рішення',
				'subtitle' => 'Ми підбираємо рішення індивідуально під ваш запит так, щоб досягти співвідношення функціонала/ціни та щоб наші клієнти не платили за зайві опції.',
				'srcset' => '/wp-content/themes/mccloud/image/setting-1.jpg, /wp-content/themes/mccloud/image/setting-1-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-1.jpg',

			],

			[
				'title' => 'Повний супровід',
				'subtitle' => 'Як прямий партнер Google ми надаємо допомогу в налаштуваннях хмарної платформи Google Wokrspace та інших продуктів.',
				'srcset' => '/wp-content/themes/mccloud/image/setting-2.jpg, /wp-content/themes/mccloud/image/setting-2-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-2.jpg',
			],

			[
				'title' => 'Навчання та консалтинг',
				'subtitle' => 'За необхідності проводимо консалтинг та тренінги для ІТ-персоналу та співробітників вашої компанії.',
				'srcset' => '/wp-content/themes/mccloud/image/setting-3.jpg, /wp-content/themes/mccloud/image/setting-3-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-3.jpg',
			],

	];
}

function get_three_cards_data_acordion()
{
	return [
			[
				'title' => 'Обраний план',
				'subtitle' => 'Google Workspace пропонує кілька різних планів, таких як Enterprise Essentials, Enterprise Standard, Enterprise Plus, кожен план має свої функціональні можливості та обмеження, які впливають на ціну.',
				'srcset' => '/wp-content/themes/mccloud/image/price-package-1.jpg, /wp-content/themes/mccloud/image/price-package-1-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/price-package-1.jpg',
			],

			[
				'title' => 'Кількість користувачів',
				'subtitle' => 'Ціна плану залежить від кількості користувачів, яким будуть надані доступи до сервісів Google Workspace. Зазвичай чим більше користувачів, тим нижча вартість на одного користувача.',
				'srcset' => '/wp-content/themes/mccloud/image/price-package-2.jpg, /wp-content/themes/mccloud/image/price-package-2-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/price-package-2.jpg',
			],

			[
				'title' => 'Додаткові функції та сервіси',
				'subtitle' => 'Деякі плани можуть містити додаткові функції або сервіси, такі як розширена безпека, архівація  даних, підтримка користувачів тощо. Додаткові  можливості можуть впливати на ціну тарифу.',
				'srcset' => '/wp-content/themes/mccloud/image/price-package-3.jpg, /wp-content/themes/mccloud/image/price-package-3-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/price-package-3.jpg',
			],

	];
}


function get_three_cards_data_implementation()
{
	return [
			[
				'title' => 'Консультація',
				'subtitle' => "Заповніть онлайн-заявку щоб з вами оперативно зв'язався наш фахівець. Разом ви зможете вибрати оптимальний пакет Google Workspace, який якнайкраще підходить саме для ваших цілей та задач.",
				'srcset' => '/wp-content/themes/mccloud/image/setting-1.jpg, /wp-content/themes/mccloud/image/setting-1-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-1.jpg',
			],

			[
				'title' => 'Налаштування та реалізація',
				'subtitle' => 'Команда mcCloud допоможе налаштувати такі сервіси, як корпоративна пошта Гугл, Meet, Google Диск та інші, а також надасть необхідну кількість кількість облікових записів для співробітників.',
				'srcset' => '/wp-content/themes/mccloud/image/setting-2.jpg, /wp-content/themes/mccloud/image/setting-2-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-2.jpg',
			],

			[
				'title' => 'Підтримка',
				'subtitle' => 'Після перенесення (міграції) даних і налаштувань ви отримаєте постійну техпідтримку та безплатне навчання, яке необхідне, щоб скористатися в повному обсязі всіма доступними опціями Google Workspace.',
				'srcset' => '/wp-content/themes/mccloud/image/setting-3.jpg, /wp-content/themes/mccloud/image/setting-3-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-3.jpg',
			],

	];
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Header Options',
        'menu_title'    => 'Header Options',
        'menu_slug'     => 'header-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

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
add_action( 'init', 'mccloud_register_acf_blocks' );

// function add_custom_canonical() {
//     if (is_singular()) { // Додає canonical тільки для постів і сторінок
//         echo '<link rel="canonical" href="' . get_permalink() . '" />' . "\n";
//     }
// }
// add_action('wp_head', 'add_custom_canonical');


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


function custom_trp_hreflang_tag($hreflang, $language_code) {
    switch ($language_code) {
        case 'ru-RU':
            return 'kz'; // або 'ru-RU', якщо тобі так треба
        case 'ro_RO':
            return 'ro'; // без дублювання 'ro-RO'
        case 'uk':
            return 'ua';
        default:
            return $hreflang;
    }
}


add_filter('wpseo_metadesc', '__return_false');
add_filter('wpseo_title', '__return_false');

add_filter('wpseo_canonical', 'trp_fix_yoast_canonical');
function trp_fix_yoast_canonical($canonical) {
    if (function_exists('trp_get_url_for_language')) {
        $current_lang = get_locale(); // Або тримай trp_get_current_language() якщо треба короткий код
        $canonical = trp_get_url_for_language($current_lang, false, true);
    }
    return $canonical;
}

add_filter('wpseo_title', 'custom_acf_seo_title');
add_filter('wpseo_metadesc', 'custom_acf_seo_description');

function custom_acf_seo_title($title) {
    if (!is_singular()) return $title;

    switch (get_locale()) {
        case 'ru_RU':
            $lang = 'kz';
            break;
        case 'ro_RO':
            $lang = 'ro';
            break;
        case 'uk':
        case 'uk_UA':
            $lang = 'ua';
            break;
        default:
            $lang = 'ua'; // fallback на українську
            break;
    }

    $field = get_field("meta_title_$lang");
    return $field ?:  $title;
}


function custom_acf_seo_description($desc) {
    if (!is_singular()) return $desc;

    switch (get_locale()) {
        case 'ru_RU':
            $lang = 'kz';
            break;
        case 'ro_RO':
            $lang = 'ro';
            break;
        case 'uk':
        case 'uk_UA':
            $lang = 'ua';
            break;
        default:
            $lang = 'ua'; // fallback на українську
            break;
    }

    $field = get_field("meta_desc_$lang");
    return $field ?: $desc;
}



function mccloud_default_acf_meta_value( $value, $post_id, $field ) {
    if ( ! $value ) {
        $post_title = get_the_title( $post_id );

        switch ( $field['name'] ) {
            case 'meta_title_kz':
            case 'meta_title_ro':
            case 'meta_title_ua':
                return $post_title;

           case 'meta_desc_kz':
                return $post_title . ' — McCloud блогында оқыңыз! Google Workspace экожүйесі туралы көптеген қызықты және пайдалы мақалалар ✅ Тек мамандардан өзекті ақпарат ➡️ mcCloud';

            case 'meta_desc_ro':
                return $post_title . ' – Citiți pe blogul McCloud! Multe articole interesante și utile despre ecosistemul Google Workspace ✅ Doar informații actuale de la specialiști ➡️ mcCloud';

            case 'meta_desc_ua':
                return $post_title . ' – читайте в блозі компанії McCloud! Багато цікавих та корисних статей про екосистему Google Workspace ✅ Тільки актуальна інформація від фахівців компанії ➡️ mcCloud';
        }
    }

    return $value;
}
add_filter( 'acf/load_value/name=meta_title_kz', 'mccloud_default_acf_meta_value', 10, 3 );
add_filter( 'acf/load_value/name=meta_title_ro', 'mccloud_default_acf_meta_value', 10, 3 );
add_filter( 'acf/load_value/name=meta_title_ua', 'mccloud_default_acf_meta_value', 10, 3 );
add_filter( 'acf/load_value/name=meta_desc_kz', 'mccloud_default_acf_meta_value', 10, 3 );
add_filter( 'acf/load_value/name=meta_desc_ro', 'mccloud_default_acf_meta_value', 10, 3 );
add_filter( 'acf/load_value/name=meta_desc_ua', 'mccloud_default_acf_meta_value', 10, 3 );


// Реєструємо власний endpoint для sitemap.xml
add_action('init', function() {
    add_rewrite_rule('^sitemap\.xml$', 'index.php?sitemap_custom=1', 'top');
    add_rewrite_rule('^ua/sitemap\.xml$', 'index.php?sitemap_custom=1&lang=ua', 'top');
    add_rewrite_rule('^kz/sitemap\.xml$', 'index.php?sitemap_custom=1&lang=kz', 'top');
    add_rewrite_rule('^ro/sitemap\.xml$', 'index.php?sitemap_custom=1&lang=ro', 'top');
});

// Додаємо новий query var
add_filter('query_vars', function($vars) {
    $vars[] = 'sitemap_custom';
    $vars[] = 'lang';
    return $vars;
});

// Виводимо sitemap.xml
add_action('template_redirect', function() {
    if (get_query_var('sitemap_custom')) {
        header('Content-Type: application/xml; charset=UTF-8');
        include get_template_directory() . '/sitemap.php';
        exit;
    }
});

