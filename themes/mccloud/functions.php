<?php

define('MCCLD_DIR', get_template_directory());
define('MCCLD_URL', get_template_directory_uri());

//require_once MCCLD_DIR . '/inc/polylang-custom.php';
require_once MCCLD_DIR . '/inc/after-theme-setup.php'; // all hooks that needs to be done on after_theme_setup
require_once MCCLD_DIR . '/inc/theme-customizer.php'; // Customizer additions
require_once MCCLD_DIR . '/inc/admin-panel.php'; // Admin Customizer additions
require_once MCCLD_DIR . '/inc/template-tags.php'; // Tags customizer additions
require_once MCCLD_DIR . '/telegram.php'; // telegram
require_once MCCLD_DIR . '/classes/class-twentytwenty-walker-page.php';
require_once MCCLD_DIR . '/classes/class-twentytwenty-script-loader.php';
require_once MCCLD_DIR . '/inc/scripts-styles.php'; // All scripts and styles enqueue | dequeue


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


function add_post_subtitle() {
	add_meta_box('post-subtitle', 'Подзаголовки для стран', 'post_subtitle_callback', 'post', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_post_subtitle');

function post_subtitle_callback($post) {
	wp_nonce_field(basename(__FILE__), 'post_subtitle_metabox');

	$languages = ['ua' => 'UA', 'kz' => 'KZ', 'ro' => 'RO'];

	foreach ($languages as $code => $label) {
		$value = get_post_meta($post->ID, 'post_subtitle_' . $code, true);
		echo '<label><strong>Подзаголовок (' . $label . '):</strong></label>';
		echo '<input type="text" style="width: 100%; margin-bottom: 10px" name="post_subtitle_' . $code . '" value="' . esc_attr($value) . '" />';
	}
}

function save_post_subtitle($post_id) {

	if (!isset($_POST['post_subtitle_metabox']) || !wp_verify_nonce($_POST['post_subtitle_metabox'], basename(__FILE__))) {
		return $post_id;
	}


	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}


	if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	$languages = ['ua', 'kz', 'ro'];

	foreach ($languages as $code) {
		if (isset($_POST['post_subtitle_' . $code])) {
			update_post_meta($post_id, 'post_subtitle_' . $code, sanitize_text_field($_POST['post_subtitle_' . $code]));
		}
	}
}
add_action('save_post', 'save_post_subtitle');


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
    'https://mccloud-ro.test-ocean.com.ua/ua/author/mramor-admin',
    'https://mccloud-ro.test-ocean.com.ua/ru/author/mramor-admin',
    'https://mccloud-ro.test-ocean.com.ua/ua/category/novini',
    'https://mccloud-ro.test-ocean.com.ua/ru/category/novini',
    'https://mccloud-ro.test-ocean.com.ua/ua/blog/feed',
    'https://mccloud-ro.test-ocean.com.ua/ru/blog/feed',
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
        'title' => pll__('Пакети Enterprise'),
        'plans' => [
            [
                'name' => pll__('Enterprise Essentials'),
                'price' => '9.60',
                'button_text' => pll__('Обрати пакет'),
                'highlight' => true,
                'features' => [
                    pll__('1 ТБ для зберігання даних на кожну ліцензію та Загальний Диск для команди'),
                    pll__('До 250 користувачів y Meet'),
                    pll__('Удосконалена підтримка'),
                    pll__('Drive, Editors, Meet, Chat, Keep, Tasks, Sites (без Gmail)'),
                    pll__('Сеанси підгруп i можливість підняття руки в Meet, QA, Polls, Whiteboarding, відстеження відвідуваності'),
                ]
            ],
            [
                'name' => pll__('Enterprise Standard'),
                'price' => '26.10',
                'button_text' => pll__('Замовити'),
                'highlight' => false,
                'features' => [
                    pll__('Необмежена кількість пам’яті на диску *'),
                    pll__('Функціонал пакета Essentials'),
                    pll__('Захищена корпоративна пошта з власним доменом'),
                    pll__('До 500 користувачів в Meet, онлайн трансляція (10к), Meet Rooms'),
                    pll__('Покращені інструменти управління i кастомізації'),
                    pll__('Сейф, поліпшений захист від втрати даних, Cloud Identity Premium, AppSheet Core, розширений DLP, Cloud Search'),
                ]
            ],
            [
                'name' => pll__('Enterprise Plus'),
                'price' => '33.80',
                'button_text' => pll__('Обрати пакет'),
                'highlight' => true,
                'features' => [
                    pll__('Необмежена кількість пам’яті на диску *'),
                    pll__('Функціонал пакета Standard, а також '),
                    pll__('До 1000 користувачів в Meet, онлайн трансляція (100к), безшумний режим'),
                    pll__('Drive, Editors, Meet, Chat, Keep, Tasks, Sites (без Gmail)'),
                    pll__('Покращені інструменти управління і кастомізації'),
                    pll__('Шифрування ключами клієнта, шифрування по стандарту S/MIME, розширений експорт даних, вибір регіонів зберігання даних, Work insights'),
                ]
            ]
        ]
    ];
}


function get_business_plan_data() {
    return [
        'title' => pll__('Пакети Business'),
        'plans' => [
            [
                'name' => pll__('Business Starter'),
                'price' => '6.12',
                'button_text' => pll__('Обрати пакет'),
                'highlight' => true,
                'features' => [
                    pll__('3 користувачiв Google Meet'),
                    pll__('До 100 користувачів в Google Meet'),
                    pll__('30 ГБ для зберігання даних на кожну ліцензію'),
                    pll__('Пакет професійних бізнес-додатків'),
                    pll__('Безпечна корпоративна електронна пошта'),
                    pll__('Drive, Editors, Meet, Chat, Keep, Tasks, Sites'),
                    pll__('Сеанси підгруп і можливість підняття руки в Meet'),
                ]
            ],
            [
                'name' => pll__('Business Standard'),
                'price' => '12.24',
                'button_text' => pll__('Замовити'),
                'highlight' => false,
                'features' => [
                    pll__('2 ТБ для зберігання даних на кожну ліцензію'),
                    pll__('До 150 користувачів в Google Meet'),
                    pll__('Пакет професійних бізнес-додатків'),
                    pll__('Безпечна корпоративна електронна пошта'),
                    pll__('Drive, Editors, Meet, Chat, Keep, Tasks, Sites'),
                    pll__('Сеанси підгруп і можливість підняття руки в Meet'),
                ]
            ],
            [
                'name' => pll__('Business Plus'),
                'price' => '21.10',
                'button_text' => pll__('Обрати пакет'),
                'highlight' => true,
                'features' => [
                    pll__('5 ТБ для зберігання даних на кожну ліцензію'),
                    pll__('До 500 користувачів в Google Meet'),
                    pll__('Пакет професійних бізнес-додатків'),
                    pll__('Безпечна корпоративна електронна пошта'),
                    pll__('Drive, Editors, Meet, Chat, Keep, Tasks, Sites'),
                    pll__('Сеанси підгруп і можливість підняття руки в Meet'),
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
        'title' => pll__('Особливості пакетів Enterprise'),
        'subtitle' => pll__('Унікальні можливості та функціонал пакетів Enterprise для вашого бізнесу'),
        'variants' => [
            [
                'title' => pll__('Essentials'),
                'subtitle' => pll__('Пакет Enterprise Essentials підійде середнім  і великим підприємствам, яким потрібна платформа для спільної роботи, але вони хочуть зберегти вже наявний поштовий сервіс.'),
                'desc' => pll__('З Enterprise Essentials ви отримуєте набір інструментів для спільної роботи та відеоконференцій, включаючи Google Диск, Google Документи, Google Meet і Google Чат. Він пропонує вашій організації розширені засоби керування політиками, об\'єднане сховище, а також безпеку та керування корпоративного рівня.'),
            ],
            [
                'title' => pll__('Standard'),
                'subtitle' => pll__('Пакет Enterprise Standard – це оптимальне рішення для великих компаній, у яких більше вимог до налаштувань безпеки і яким потрібні просунуті інструменти для управління і контролю.'),
                'desc' => pll__('Крім всіх характеристик Essentials, пакет Enterprise Standard містити Gmail, Calendar, Сейф, поліпшений захист від втрати даних, Cloud Identity Premium, розширений DLP і не тільки. Що також важливо, на кожного користувача виділяється необмежена кількість пам’яті на диску'),
            ],
            [
                'title' => pll__('Plus'),
                'subtitle' => pll__('Enterprise Plus надає розширені можливості в сферах безпеки, адміністрування та аналітики, і може бути вигідним для організацій, які потребують додаткового функціоналу для оптимізації своїх бізнес-процесів.'),
                'desc' => pll__('Розширений функціонал Enterprise Plus включає в себе всі властивості пакетів Essentials і Standard, а також сертифікат відповідності, центр безпеки, пошук в Хмарі, AppSheet PRO та  можливість інтеграції зі сторонніми інструментами архівування.'),
            ],
        ]
    ];
}




function get_business_packageFeatures_data()
{
	return [
		'title'    => pll__('Особливості пакетів Business'),
		'subtitle' => pll__('Зручна співпраця та ефективна комунікація: інструменти для вашого успіху'),
		'variants' => [
			[
				'title'    => pll__('Starter'),
				'subtitle' => pll__('Пакет Business Starter підійде невеликому бізнесу, який тільки починає розвиватися.'),
				'desc'     => pll__('Оформивши даний тарифний план, ви зможете оцінити доступність, надійність інструментів Google Workspace, а також усі переваги забезпечення. Gmail, Drive, Meet, Calendar, Chat, Docs, Sheets, Slides, Keep, Sites, Forms, допоможуть оптимізувати бізнес, зробити роботу більш ефективною і продуктивною. У міру розширення свого бізнесу ви зможете перейти на більш просунутий тарифний план.'),
			],
			[
				'title'    => pll__('Standard'),
				'subtitle' => pll__('Найоптимальніший тарифний план, який найбільш часто вибирають користувачі.'),
				'desc'     => pll__('Підійде для малого та середнього бізнесу, як в разі невеликої кількості людей, які працюють в одному офісі, так і для великої інтернаціональної команди. Переваги цього пакета перед Starter полягають в більш просунутих функціях додатків Meet і Chat, розширені функції аудиту й звітності для Диска, а також в можливості створювати спільні диски для команди, що особливо актуально в режимі віддаленої роботи.'),
			],
			[
				'title'    => pll__('Plus'),
				'subtitle' => pll__('Цей пакет відмінно підійде для середнього бізнесу.'),
				'desc'     => pll__('Business Plus – це покращений пакет бізнес-додатків з 5 ТБ сховищем на кожного користувача, а також вдосконаленими засобами контролю безпеки і управління. Додатково до основного функціонала Business Standard ви отримуєте Сейф і розширені функції управління кінцевими точками.'),
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
				'title' => pll__('Найкращі рішення'),
				'subtitle' => pll__('Ми підбираємо рішення індивідуально під ваш запит так, щоб досягти співвідношення функціонала/ціни та щоб наші клієнти не платили за зайві опції.'),
				'srcset' => '/wp-content/themes/mccloud/image/setting-1.jpg, /wp-content/themes/mccloud/image/setting-1-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-1.jpg',

			],

			[
				'title' => pll__('Повний супровід'),
				'subtitle' => pll__('Як прямий партнер Google ми надаємо допомогу в налаштуваннях хмарної платформи Google Wokrspace та інших продуктів.'),
				'srcset' => '/wp-content/themes/mccloud/image/setting-2.jpg, /wp-content/themes/mccloud/image/setting-2-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-2.jpg',
			],

			[
				'title' => pll__('Навчання та консалтинг'),
				'subtitle' => pll__('За необхідності проводимо консалтинг та тренінги для ІТ-персоналу та співробітників вашої компанії.'),
				'srcset' => '/wp-content/themes/mccloud/image/setting-3.jpg, /wp-content/themes/mccloud/image/setting-3-2x.jpg 2x',
				'src' => '/wp-content/themes/mccloud/image/setting-3.jpg',
			],

	];
}

function get_three_cards_data_acordion()
{
	return [
		[
			'title'    => pll__('Обраний план'),
			'subtitle' => pll__('Google Workspace пропонує кілька різних планів, таких як Enterprise Essentials, Enterprise Standard, Enterprise Plus, кожен план має свої функціональні можливості та обмеження, які впливають на ціну.'),
			'srcset'   => '/wp-content/themes/mccloud/image/price-package-1.jpg, /wp-content/themes/mccloud/image/price-package-1-2x.jpg 2x',
			'src'      => '/wp-content/themes/mccloud/image/price-package-1.jpg',
		],
		[
			'title'    => pll__('Кількість користувачів'),
			'subtitle' => pll__('Ціна плану залежить від кількості користувачів, яким будуть надані доступи до сервісів Google Workspace. Зазвичай чим більше користувачів, тим нижча вартість на одного користувача.'),
			'srcset'   => '/wp-content/themes/mccloud/image/price-package-2.jpg, /wp-content/themes/mccloud/image/price-package-2-2x.jpg 2x',
			'src'      => '/wp-content/themes/mccloud/image/price-package-2.jpg',
		],
		[
			'title'    => pll__('Додаткові функції та сервіси'),
			'subtitle' => pll__('Деякі плани можуть містити додаткові функції або сервіси, такі як розширена безпека, архівація даних, підтримка користувачів тощо. Додаткові можливості можуть впливати на ціну тарифу.'),
			'srcset'   => '/wp-content/themes/mccloud/image/price-package-3.jpg, /wp-content/themes/mccloud/image/price-package-3-2x.jpg 2x',
			'src'      => '/wp-content/themes/mccloud/image/price-package-3.jpg',
		],
	];
}


function get_three_cards_data_implementation()
{
	return [
		[
			'title'    => pll__('Консультація'),
			'subtitle' => pll__("Заповніть онлайн-заявку щоб з вами оперативно зв'язався наш фахівець. Разом ви зможете вибрати оптимальний пакет Google Workspace, який якнайкраще підходить саме для ваших цілей та задач."),
			'srcset'   => '/wp-content/themes/mccloud/image/setting-1.jpg, /wp-content/themes/mccloud/image/setting-1-2x.jpg 2x',
			'src'      => '/wp-content/themes/mccloud/image/setting-1.jpg',
		],
		[
			'title'    => pll__('Налаштування та реалізація'),
			'subtitle' => pll__('Команда mcCloud допоможе налаштувати такі сервіси, як корпоративна пошта Гугл, Meet, Google Диск та інші, а також надасть необхідну кількість кількість облікових записів для співробітників.'),
			'srcset'   => '/wp-content/themes/mccloud/image/setting-2.jpg, /wp-content/themes/mccloud/image/setting-2-2x.jpg 2x',
			'src'      => '/wp-content/themes/mccloud/image/setting-2.jpg',
		],
		[
			'title'    => pll__('Підтримка'),
			'subtitle' => pll__('Після перенесення (міграції) даних і налаштувань ви отримаєте постійну техпідтримку та безплатне навчання, яке необхідне, щоб скористатися в повному обсязі всіма доступними опціями Google Workspace.'),
			'srcset'   => '/wp-content/themes/mccloud/image/setting-3.jpg, /wp-content/themes/mccloud/image/setting-3-2x.jpg 2x',
			'src'      => '/wp-content/themes/mccloud/image/setting-3.jpg',
		],
	];
}

//pll_register_string('not_found_text', 'Сторінку не знайдено');


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
//add_action( 'init', 'mccloud_register_acf_blocks' );



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

add_action('template_redirect', 'redirect_uppercase_urls');
function redirect_uppercase_urls() {
    $request_uri = $_SERVER['REQUEST_URI'];
    if (preg_match('/[A-Z]/', $request_uri)) {
        $lowercase_url = strtolower($request_uri);
        wp_redirect($lowercase_url, 301);
        exit;
    }
}


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

add_action('wp_head', 'add_x_default_hreflang', 2);

function add_x_default_hreflang() {
    // Задаємо x-default URL (наприклад, українська версія як дефолт)
    $default_url = home_url('/ua/'); // змінити, якщо інша структура

    echo '<link rel="alternate" hreflang="x-default" href="' . esc_url($default_url) . '" />' . "\n";
}

add_filter( 'wpseo_og_locale', function( $locale ) {
    if ( function_exists('pll_current_language') ) {
        $lang = pll_current_language();
        switch ( $lang ) {
            case 'ua': return 'ua_UA';
            case 'ro': return 'ro_RO';
            case 'kz': return 'kk_KZ';
            case 'en': return 'en_US';
        }
    }
    return $locale;
});

// Реєструємо строки перекладу один раз
//add_action('init', function () {
//    pll_register_string('cookie_accept', 'Прийняти');
//    pll_register_string('cookie_text', 'Ми використовуємо cookies для покращення роботи сайту.');
//    pll_register_string('about_mc', 'Про mcCloud');
//    pll_register_string('about_mc_it', "mcCloud – це ІТ-команда, що надає послуги хмарної інтеграції для бізнесу. Компанія оснащує підприємства надійними інструментами та персоналізованими програмами, а також проводить ІТ-тренінги та консультації.");
//    pll_register_string('about_cases', 'Подібні кейси');
//    pll_register_string('cases', 'Кейси');
//    pll_register_string('blog', 'Блог');
//    pll_register_string('about', 'Про нас');
//    pll_register_string('contact', 'Контакти');
//});

// Підключаємо скрипт та передаємо перекладені строки
function enqueue_cookie_banner_script() {
    wp_enqueue_script('cookie-banner', get_template_directory_uri() . '/js/cookie-banner.js', [], null, true);

//    wp_localize_script('cookie-banner', 'cookieBannerLang', [
//        'message' => pll__('Ми використовуємо cookies для покращення роботи сайту.'),
//        'accept'  => pll__('Прийняти'),
//    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_cookie_banner_script');


function add_custom_canonical() {
    // Для окремих постів/сторінок — стандартний permalink
    if (is_singular() && !is_home() && get_query_var('paged') == 1) {
        echo '<link rel="canonical" href="' . esc_url(get_permalink()) . '">' . "\n";
        return;
    } else {
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $canonical_url = get_pagenum_link($paged);

        echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">' . "\n";
    }
}
add_action('wp_head', 'add_custom_canonical', 1);

