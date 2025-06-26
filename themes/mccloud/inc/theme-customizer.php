<?php
/**
 * Theme customization
 *
 * @package mccloud
 */


/**
 * Get the path to the page-specific header banner template.
 *
 * This function determines the current page template and constructs the corresponding
 * path to the header banner template located in `page-templates/header-banners/`.
 * If the current page is the blog home, it uses 'home' as the template name.
 *
 * @return string Full path to the header banner template.
 */
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


/**
 * Get preload link tag for the banner image depending on page template.
 *
 * This function returns a `<link rel="preload">` HTML tag for the banner image based
 * on the current page template. It's useful for optimizing Largest Contentful Paint (LCP).
 *
 * @return string HTML preload tag or empty string if no specific image is defined.
 */
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

/**
 * Get the current URL without pagination (removes "/page/X/" from the end).
 *
 * This function checks if the current request URI contains "/page"
 * (e.g., /blog/page/2/) and returns the base URL without pagination.
 *
 * @global WP $wp WordPress global request object.
 * @return string URL without the "/page" segment, always ending with a slash.
 */
function get_nopaging_url()
{
	global $wp;
	
	$current_url = home_url($wp->request);
	$position = strpos($current_url, '/page');
	$nopaging_url = ($position) ? substr($current_url, 0, $position) : $current_url;
	
	return trailingslashit($nopaging_url);
}


if (!function_exists('wp_body_open')) {
	
	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
}


/**
 * Register sidebars used in the theme footer.
 *
 * This function registers multiple widget areas (sidebars) for the footer,
 * using shared HTML structure for consistency.
 *
 * @return void
 */
function mccloud_sidebar_registration(): void
{
	$shared_args = [
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	];
	
	$sidebars = [
		[
			'name'        => __('Footer #1', 'twentytwenty'),
			'id'          => 'sidebar-1',
			'description' => __('Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty'),
		],
		[
			'name'        => __('Footer #2', 'twentytwenty'),
			'id'          => 'sidebar-2',
			'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty'),
		],
	];
	
	foreach ($sidebars as $sidebar) {
		register_sidebar(array_merge($shared_args, $sidebar));
	}
}

add_action('widgets_init', 'mccloud_sidebar_registration');


/**
 * Get a color value for a given area and context.
 *
 * Currently returns false. Can be extended to retrieve theme color settings dynamically.
 *
 * @param string $area    The area of the theme (e.g., 'content', 'header-footer').
 * @param string $context The usage context (e.g., 'text', 'background').
 * @return false|string False if not implemented, or the color value.
 */
function mccloud_get_color_for_area(string $area = 'content', string $context = 'text')
{
	return false;
}

/**
 * Get Customizer color variable mappings.
 *
 * Returns an array of theme areas and the corresponding Customizer setting keys.
 *
 * @return array<string, array{setting: string}>
 */
function mccloud_get_customizer_color_vars(): array
{
	return [
		'content'        => [
			'setting' => 'background_color',
		],
		'header-footer'  => [
			'setting' => 'header_footer_background_color',
		],
	];
}

/**
 * Shortcode callback to render stone items template.
 *
 * Loads the 'template-parts/stone-items' template and returns the HTML.
 *
 * Usage: [stones]
 *
 * @return string Rendered HTML output of the template part.
 */
function mccloud_render_stones_shortcode(): string
{
	ob_start();
	get_template_part('template-parts/stone-items');
	return ob_get_clean(); // Cleaner than ob_get_contents() + ob_clean()
}

add_shortcode('stones', 'mccloud_render_stones_shortcode');

/**
 * Register a custom meta box for multilingual post subtitles.
 *
 * @return void
 */
function mccloud_add_post_subtitle_meta_box(): void
{
	add_meta_box(
		'post-subtitle',
		'Подзаголовки для країн',
		'mccloud_render_post_subtitle_meta_box',
		'post',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'mccloud_add_post_subtitle_meta_box');

/**
 * Render the custom meta box with input fields for each language subtitle.
 *
 * @param WP_Post $post The current post object.
 * @return void
 */
function mccloud_render_post_subtitle_meta_box(WP_Post $post): void
{
	wp_nonce_field(basename(__FILE__), 'post_subtitle_metabox');
	
	$languages = [
		'ua' => 'UA',
		'kz' => 'KZ',
		'ro' => 'RO',
	];
	
	foreach ($languages as $code => $label) {
		$value = get_post_meta($post->ID, 'post_subtitle_' . $code, true);
		?>
      <p>
          <label for="post_subtitle_<?php echo esc_attr($code); ?>"><strong>Подзаголовок (<?php echo esc_html($label); ?>):</strong></label><br>
          <input
                  type="text"
                  id="post_subtitle_<?php echo esc_attr($code); ?>"
                  name="post_subtitle_<?php echo esc_attr($code); ?>"
                  value="<?php echo esc_attr($value); ?>"
                  style="width: 100%; margin-bottom: 10px;"
          />
      </p>
		<?php
	}
}

/**
 * Save the post subtitle fields on post save.
 *
 * @param int $post_id The ID of the post being saved.
 * @return void
 */
function mccloud_save_post_subtitles(int $post_id): void
{
	// Verify nonce.
	if (
		!isset($_POST['post_subtitle_metabox']) ||
		!wp_verify_nonce($_POST['post_subtitle_metabox'], basename(__FILE__))
	) {
		return;
	}
	
	// Prevent autosave overwrite.
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	
	// Permission check.
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
	
	$languages = ['ua', 'kz', 'ro'];
	
	foreach ($languages as $code) {
		if (isset($_POST["post_subtitle_{$code}"])) {
			update_post_meta(
				$post_id,
				"post_subtitle_{$code}",
				sanitize_text_field($_POST["post_subtitle_{$code}"])
			);
		}
	}
}
add_action('save_post', 'mccloud_save_post_subtitles');

/**
 * Shortcode callback to render latest news section from posts.
 *
 * Loads the 'template-parts/section-news.php' template with the 3 most recent posts.
 *
 * @return string Rendered HTML of the news section.
 */
function mccloud_render_section_news_shortcode(): string
{
	$query = new WP_Query([
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'posts_per_page' => 3,
	]);
	
	// Make $posts available to the template
	$posts = $query;
	
	ob_start();
	require get_template_directory() . '/template-parts/section-news.php';
	return ob_get_clean();
}
add_shortcode('section-news', 'mccloud_render_section_news_shortcode');


/**
 * Clean up pagination links by removing 'page/1/' from the first and prev links.
 *
 * @param string $link The paginated link URL.
 * @return string Modified URL without 'page/1/'.
 */
add_filter('paginate_links', function (string $link): string {
	return str_replace('/page/1/', '/', $link);
});

/**
 * Add `defer` attribute to Contact Form 7 script only.
 *
 * @param string $tag    The original <script> tag.
 * @param string $handle The script handle.
 * @return string Modified <script> tag.
 */
function mccloud_defer_cf7_script(string $tag, string $handle): string
{
	if ($handle === 'contact-form-7') {
		return str_replace('<script ', '<script defer ', $tag);
	}
	
	return $tag;
}
add_filter('script_loader_tag', 'mccloud_defer_cf7_script', 10, 2);

/**
 * Get current URL without pagination segment (`/page/X/`).
 *
 * @return string The base URL without /page/X/.
 */
function mccloud_get_nopaging_url(): string
{
	global $wp;
	
	$current_url = home_url($wp->request);
	$position = strpos($current_url, '/page');
	
	$nopaging_url = ($position !== false) ? substr($current_url, 0, $position) : $current_url;
	
	return trailingslashit($nopaging_url);
}

/**
 * Get the number of views for a given post.
 *
 * @param int $post_id The ID of the post.
 * @return int Number of views.
 */
function mccloud_get_post_views(int $post_id): int
{
	$count_key = 'post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	
	if ($count === '') {
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
		return 0;
	}
	
	return (int) $count;
}

/**
 * Increment the view counter for a given post.
 *
 * @param int $post_id The ID of the post.
 * @return void
 */
function mccloud_set_post_views(int $post_id): void
{
	$count_key = 'post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	
	if ($count === '') {
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '1');
	} else {
		$count = (int) $count + 1;
		update_post_meta($post_id, $count_key, (string) $count);
	}
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