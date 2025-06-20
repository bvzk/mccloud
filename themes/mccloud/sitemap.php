<?php
// Встановлюємо правильний заголовок
header('Content-Type: application/xml; charset=UTF-8');

// Підключаємо ядро WordPress
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

// Визначаємо мову за URL sitemap
$request_uri = $_SERVER['REQUEST_URI'];
$language_prefix = '';

if (preg_match('#/(ua|kz|ro)/#', $request_uri, $matches)) {
    $language_prefix = $matches[1];
}

// Початок XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
// Отримуємо всі сторінки і записи
$args = [
    'post_type' => ['page', 'post'],
    'post_status' => 'publish',
    'posts_per_page' => -1,
];
$posts = get_posts($args);

if (!empty($posts)) {
    
        foreach ($posts as $post) {
            $permalink = get_permalink($post->ID);
            $parsed_url = parse_url($permalink);
        
            if (isset($parsed_url['path'])) {
                $path = ltrim($parsed_url['path'], '/');
        
                $path_parts = explode('/', $path);
                if (in_array($path_parts[0], ['ua', 'kz', 'ro'])) {
                    array_shift($path_parts);
                }
        
                $path = implode('/', $path_parts);
        		
                    // Якщо перша частина — мовний префікс, видаляємо її
                    if (in_array($path_parts[0], ['ua', 'kz', 'ro'])) {
                        array_shift($path_parts); // Видаляємо перший елемент
                    }
                    
                    // Склеюємо назад шлях без мовного префіксу
                    $path = implode('/', $path_parts);
        
                    // Формуємо правильний URL
                    $final_url = home_url('/' . $path);
        
                // Визначаємо базові значення
                $changefreq = 'weekly';
                $priority = '0.8';
        
                // Головна сторінка
                if (untrailingslashit($final_url) === untrailingslashit(home_url('/'))) {
                    $changefreq = 'weekly';
                    $priority = '1.0';
                }
                // Технічні сторінки (політики, умови)
                elseif (strpos($path, 'privacy') !== false || strpos($path, 'cookie') !== false || strpos($path, 'terms') !== false) {
                    $changefreq = 'yearly';
                    $priority = '0.6';
                }
                // Блог (пости)
                elseif ($post->post_type === 'post') {
                    $changefreq = 'weekly';
                    $priority = '0.7';
                }
                // Категорії та послуги
                else {
                    $depth = substr_count($path, '/');
                    if ($depth == 1) {
                        // Категорії (2 рівень)
                        $changefreq = 'monthly';
                        $priority = '0.9';
                    } elseif ($depth >= 2) {
                        // Товари/послуги (3 рівень+)
                        $changefreq = 'monthly';
                        $priority = '0.8';
                    }
                }
                ?>
                <url>
                    <loc><?php echo esc_url($final_url); ?></loc>
                    <lastmod><?php echo get_post_modified_time('Y-m-d', false, $post->ID); ?></lastmod>
                    <changefreq><?php echo $changefreq; ?></changefreq>
                    <priority><?php echo $priority; ?></priority>
                </url>
                <?php
            }
        }
    
    
}
?>
</urlset>
