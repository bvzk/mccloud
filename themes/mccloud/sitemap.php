<?php
// Встановлюємо правильний заголовок
header('Content-Type: application/xml; charset=UTF-8');

// Підключаємо ядро WordPress
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

// Визначаємо мову за URL sitemap
$request_uri = $_SERVER['REQUEST_URI'];
$language_prefix = '';

if (preg_match('#/(ua|kz|ro)/sitemap\.xml$#', $request_uri, $matches)) {
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
    // Отримуємо ID перекладу поста потрібною мовою
    $translated_id = pll_get_post($post->ID, $language_prefix);
    
    if (!$translated_id) {
        continue; // Пропускаємо, якщо немає перекладу на цю мову
    }

    $permalink = get_permalink($translated_id);

    // Переконуємося, що URL починається з потрібного префікса
    if (strpos($permalink, '/' . $language_prefix . '/') === false) {
        continue;
    }

// Значення для sitemap
$changefreq = 'weekly';
$priority = '0.8';

// Отримаємо URL без слеша в кінці
$normalized_permalink = untrailingslashit($permalink);

// Визначаємо головну сторінку
if ($normalized_permalink === untrailingslashit(home_url('/' . $language_prefix))) {
    $priority = '1.0';
}
// Якщо це запис блогу (тип post)
elseif ($post->post_type === 'post') {
    $priority = '0.7';
}
// Якщо це технічна сторінка (можна визначити по slug або ID)
elseif (in_array($post->post_name, ['privacy-policy', 'terms-of-service', '404', 'sitemap'])) {
    $priority = '0.6';
}
// Можна також використовувати масив ID:
elseif (in_array($post->ID, [3177, 2905, 3178, 2903])) { // приклад для ID технічних сторінок
    $priority = '0.6';
}
    ?>
    <url>
        <loc><?php echo esc_url($permalink); ?></loc>
        <lastmod><?php echo get_post_modified_time('Y-m-d', false, $translated_id); ?></lastmod>
        <changefreq><?php echo $changefreq; ?></changefreq>
        <priority><?php echo $priority; ?></priority>
    </url>
    <?php
}
    
    
}
?>
</urlset>
