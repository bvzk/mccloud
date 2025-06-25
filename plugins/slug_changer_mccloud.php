<?php
/*
Plugin Name: Polylang Slug Updater from UA
Description: Обновляет post_name для языков kz и ro на основе ua версии, с логом в textarea.
Version: 1.3
Author: Alex
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
add_action('admin_menu', function () {
    add_menu_page(
        'Slug Updater',
        'Slug Updater',
        'manage_options',
        'slug-updater',
        'render_slug_updater_page'
    );
});

function render_slug_updater_page()
{
    $log_output = '';

    if (isset($_POST['slug_update_action']) && check_admin_referer('slug_updater_nonce_action')) {
        $log_output = run_slug_update_process();
        echo '<div class="updated"><p>Обновление завершено. Лог выведен ниже.</p></div>';
    }

    ?>
    <div class="wrap">
        <h1>Обновление Slug на основе UA</h1>
        <form method="post">
            <?php wp_nonce_field('slug_updater_nonce_action'); ?>
            <p>Это действие изменит <code>post_name</code> для всех страниц на языке:</p>
            <ul>
                <li><strong>KZ</strong> → <code>ua-slug-3</code></li>
                <li><strong>RO</strong> → <code>ua-slug-2</code></li>
            </ul>
            <p><input type="submit" class="button button-primary" name="slug_update_action" value="Запустить обновление"></p>
        </form>

        <?php if (!empty($log_output)) : ?>
            <h2>Лог изменений</h2>
            <textarea rows="20" style="width: 100%;"><?php echo esc_textarea($log_output); ?></textarea>
        <?php endif; ?>
    </div>
    <?php
}

function run_slug_update_process()
{
    if (!function_exists('pll_get_post_language') || !function_exists('pll_get_post')) {
        return "Polylang функции недоступны.";
    }

    $pages = get_posts([
        'post_type'      => ['page', 'post'],
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ]);

    $log = '';
    $count = 0;

    foreach ($pages as $page) {
        $lang = pll_get_post_language($page->ID);

        if ($lang !== 'kz' && $lang !== 'ro') {
            continue;
        }

        $ua_post_id = pll_get_post($page->ID, 'ua');

        if (!$ua_post_id) {
            $log .= "ID: {$page->ID}, Lang: {$lang}, UA версия не найдена\n";
            continue;
        }

        $ua_post = get_post($ua_post_id);
        if (!$ua_post) {
            $log .= "ID: {$page->ID}, Lang: {$lang}, UA пост не существует\n";
            continue;
        }

        $base_slug = $ua_post->post_name;
        $suffix = ($lang === 'kz') ? '-3' : '-2';
        $new_slug = sanitize_title($base_slug);

        if ($page->post_name === $new_slug) {
            $log .= "ID: {$page->ID}, Lang: {$lang}, Уже установлен slug: {$new_slug}\n";
            continue;
        }

        /*wp_update_post([
            'ID'        => $page->ID,
            'post_name' => $new_slug,
        ]);*/

        $log .= "ID: {$page->ID}, Lang: {$lang}, Slug обновлён: {$page->post_name} → {$new_slug}\n";
        $count++;
    }

    $log .= "\nВсего обновлено: {$count} страниц.";

    return $log;
}