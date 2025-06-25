<?php
/*
Plugin Name: ACF Field ID Sync for Translations (Polylang)
Description: Заменяет ACF field IDs в блоках Gutenberg на актуальные в переводах.
Author: OpenAI / Alexander Zahrebaiev
Version: 1.0
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
add_action('admin_menu', function () {
    add_management_page(
        'ACF Field Sync',
        'Синхронизация ACF полей',
        'manage_options',
        'acf-field-id-sync',
        'acf_field_id_sync_page'
    );
});

function acf_field_id_sync_page() {
    if (isset($_POST['acf_field_id_sync'])) {
        acf_sync_all_translated_pages();
        echo '<div class="updated"><p>Синхронизация выполнена успешно.</p></div>';
    }

    echo '<div class="wrap">';
    echo '<h1>Синхронизация ACF Field ID</h1>';
    echo '<p>Этот инструмент пройдёт по всем страницам и заменит ACF Field IDs в переводах.</p>';
    echo '<form method="post">';
    echo '<input type="submit" class="button button-primary" name="acf_field_id_sync" value="Запустить синхронизацию">';
    echo '</form>';
    echo '</div>';
}

function acf_sync_all_translated_pages() {
       /* $pages = get_posts([
    'post_type'      => 'page',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'lang'           => 'ro', // язык Polylang
]);

foreach ($pages as $post) {
    if (strpos($post->post_content, '<!-- wp:acf/') !== false) {
        $url = get_permalink($post->ID);
        echo "<a href='$url' target='_blank'>{$post->post_title}</a><br>";
    }
}*/
    $pages = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'numberposts' => -1,
        /*'include' => [3019], */
   
    ]);

    foreach ($pages as $page) {
        $langs = pll_get_post_translations($page->ID);
        if (!$langs || count($langs) < 2) continue;

        $default_lang = pll_default_language();
        $source_post_id = $langs[$default_lang] ?? null;
        if (!$source_post_id) continue;

        foreach ($langs as $lang_code => $post_id) {
            if ($lang_code === $default_lang || $lang_code == 'kz') continue;

            acf_replace_field_ids_for_translation($source_post_id, $post_id, $default_lang, $lang_code);
        }
    }
}

function sanitize_acf_block_values(string $new_content): string {
    return preg_replace_callback(
        '/<!-- wp:acf\/([^ ]+) ({.+?}) \/-->/',
        function ($matches) {
            $block_name = $matches[1];
            $block_data = json_decode($matches[2], true);
            if (!isset($block_data['data'])) return $matches[0];

            $data = $block_data['data'];

            foreach ($data as $key => $val) {
                // Не трогаем field ID (_fieldname)
                if (strpos($key, '_') === 0 || !is_string($val)) continue;

                // Очищаем
                $val = preg_replace('/(?<=\w)n(?=[A-Z])/', "\n", $val);
                $val = preg_replace('/([a-zășțîâ])\.([A-ZĂȘȚÎÂ])/', '$1.\n$2', $val);
                $val = str_replace(["\r\n", "\r"], "\n", $val);               // normalize line breaks
                $val = str_replace("rnrn", "\n", $val);                       // remove "rnrn"
                $val = preg_replace('/\\\u003c\/?[a-z]+\\\u003e/i', '', $val); // remove \u003c/b\u003e, etc.
                $val = preg_replace('/[ \t]+/', ' ', $val);                  // remove multiple spaces/tabs
                $val = trim(html_entity_decode($val, ENT_QUOTES, 'UTF-8')); // decode &nbsp;, &amp;, etc.
                $val = json_decode('["' . $val . '"]')[0] ?? $val;           // decode any remaining \uXXXX

                $data[$key] = $val;
            }

            $block_data['data'] = $data;
            return '<!-- wp:acf/' . $block_name . ' ' . json_encode($block_data, JSON_UNESCAPED_UNICODE) . ' /-->';
        },
        $new_content
    );
}

function clean_acf_post_content($content, $replace_map = []) {
    // Шаг 1: Заменим переносы
    $content = mb_str_replace(["\r\n", "\r"], "\n", $content);

    // Шаг 2: Применим str_replace по маппингу ID
    if (!empty($replace_map)) {
        $content = str_replace(array_keys($replace_map), array_values($replace_map), $content);
    }

    // Шаг 3: Заменим одиночные `n` перед заглавной буквой (ошибка от Word/Docs)
    $content = preg_replace('/(?<=\w)n(?=[A-ZĂȘȚÎÂ])/', "\n", $content);

    // Шаг 4: Добавим перенос после точки, если за ней идёт заглавная
    $content = preg_replace('/\.([A-ZĂȘȚÎÂ])/', ".\n$1", $content);

    return $content;
}
function mb_str_replace($search, $replace, $subject, $encoding = 'UTF-8') {
    if (!is_array($search)) {
        $search = [$search];
    }
    if (!is_array($replace)) {
        $replace = array_fill(0, count($search), $replace);
    }

    foreach ($search as $key => $needle) {
        $replacement = $replace[$key] ?? '';
        $pos = mb_strpos($subject, $needle, 0, $encoding);
        while ($pos !== false) {
            $subject =
                mb_substr($subject, 0, $pos, $encoding) .
                $replacement .
                mb_substr($subject, $pos + mb_strlen($needle, $encoding), null, $encoding);
            $pos = mb_strpos($subject, $needle, $pos + mb_strlen($replacement, $encoding), $encoding);
        }
    }

    return $subject;
}
function acf_replace_field_ids_for_translation($source_post_id, $target_post_id, $from_lang = 'ua', $to_lang = null) {
    // Язык назначения, если не передан — определим через Polylang
    if (!$to_lang) {
        $to_lang = pll_get_post_language($target_post_id);
    }

    // ACF field map по блокам
$acf_field_map_by_language = [
    'mccloud-custom-paragraph' => [
        'paragraph_text' => [
            'ua' => 'field_6730c5d900899',
            'kz' => 'field_68344fd07df63',
            'ro' => 'field_68344fd544413',
        ],
    ],
    'mccloud-custom-paragraph2' => [
        'paragraph_text' => [
            'ua' => 'field_683454b6405fd',
            'kz' => 'field_68344fd07df63',
            'ro' => 'field_68344fd544413',
        ],
    ],
    'mccloud-custom-notice' => [
        'notice_text' => [
            'ua' => 'field_6730c2d8b196c',
            'kz' => 'field_68344f43494c0',
            'ro' => 'field_683454b63c16a',
        ],
    ],
    'mccloud-custom-title' => [
        'select_tag' => [
            'ua' => 'field_6730c7293ac7a',
            'kz' => 'field_683452d516a4d',
            'ro' => 'field_683454b68cbcb',
        ],
        'heading_text' => [
            'ua' => 'field_6730c74f3ac7b',
            'kz' => 'field_683452d516a98',
            'ro' => 'field_683454b68cc01',
        ],
        'is_full_width' => [
            'ua' => 'field_6765398aa50a4',
            'kz' => 'field_683452d516adc',
            'ro' => 'field_683454b68cc41',
        ],
    ],
    'mccloud-custom-icon-boxes' => [
        'icon' => [
            'ua' => 'field_6730de370a9e1',
            'kz' => 'field_6834489f076b0',
            'ro' => 'field_683454b5c8d8c',
        ],
        'title' => [
            'ua' => 'field_6730de7b0a9e2',
            'kz' => 'field_6834489f09711',
            'ro' => 'field_683454b5c8dc3',
        ],
        'text' => [
            'ua' => 'field_6730de8d0a9e3',
            'kz' => 'field_6834489f0974e',
            'ro' => 'field_683454b5cc399',
        ],
        'url' => [
            'ua' => 'field_6730de9a0a9e4',
            'kz' => 'field_6834489f09789',
            'ro' => 'field_683454b5cc3d7',
        ],
        'items' => [
            'ua' => 'field_6768696df8dcb',
            'kz' => 'field_6834489f076f4',
            'ro' => 'field_683454b5cc418',
        ],
    ],
    'mccloud-custom-list' => [
        'section_title' => [
            'ua' => 'field_6730b8ff4154c',
            'kz' => 'field_68344c3b2c5ec',
            'ro' => 'field_683454b5a51ff',
        ],
        'list_items' => [
            'ua' => 'field_6730ba044154d',
            'kz' => 'field_68344c3b2c63f',
            'ro' => 'field_683454b5a5243',
        ],
        'text_after' => [
            'ua' => 'field_6730ba164154e',
            'kz' => 'field_68344c3b32fac',
            'ro' => 'field_683454b5a5281',
        ],
    ],
    'mccloud-custom-page-links' => [
        'section_title' => [
            'ua' => 'field_6730d041cd4bb',
            'kz' => 'field_68344f8c78280',
            'ro' => 'field_683454b6136c5',
        ],
        'description' => [
            'ua' => 'field_6730d064cd4bc',
            'kz' => 'field_68344f8c782c2',
            'ro' => 'field_683454b6136f7',
        ],
        'image' => [
            'ua' => 'field_6730d0a6cd4be',
            'kz' => 'field_68344f8c7c0a5',
            'ro' => 'field_683454b616b6b',
        ],
        'title' => [
            'ua' => 'field_6730d0b8cd4bf',
            'kz' => 'field_68344f8c7c1aa',
            'ro' => 'field_683454b616bb3',
        ],
        'button' => [
            'ua' => 'field_6730d0c6cd4c0',
            'kz' => 'field_68344f8c7c1e9',
            'ro' => 'field_683454b616bf3',
        ],
    ],
    'mccloud-custom-pricing' => [
        'price_value' => [
            'ua' => 'field_6762a9afe1f09',
            'kz' => 'field_6834500504f3d',
            'ro' => 'field_683454b65bb33',
        ],
        'price_period' => [
            'ua' => 'field_6763079ec2051',
            'kz' => 'field_6834500504f8e',
            'ro' => 'field_683454b65bb7a',
        ],
        'price_items' => [
            'ua' => 'field_676307a7c2052',
            'kz' => 'field_6834500504fce',
            'ro' => 'field_683454b65bbb6',
        ],
    ],
    'mccloud-custom-services-list' => [
        'title' => [
            'ua' => 'field_6730ed0704feb',
            'kz' => 'field_6834504ebee22',
            'ro' => 'field_683454b60ff88',
        ],
        'list_items' => [
            'ua' => 'field_6730edcd04fec',
            'kz' => 'field_6834504ebee60',
            'ro' => 'field_683454b60ffcd',
        ],
        'text_after' => [
            'ua' => 'field_6730edeb04fed',
            'kz' => 'field_6834504ec26e1',
            'ro' => 'field_683454b61000a',
        ],
        'button_text' => [
            'ua' => 'field_6730ee0704fee',
            'kz' => 'field_6834504ec271d',
            'ro' => 'field_683454b61004d',
        ],
        'button_url' => [
            'ua' => 'field_6730ee1404fef',
            'kz' => 'field_6834504ec2758',
            'ro' => 'field_683454b610089',
        ],
    ],
    'mccloud-custom-steps' => [
        'icon' => [
            'ua' => 'field_6763052baa27d',
            'kz' => 'field_683450954d660',
            'ro' => 'field_683454b5fc6d5',
        ],
        'title' => [
            'ua' => 'field_6763055aaa27e',
            'kz' => 'field_683450954d6a5',
            'ro' => 'field_683454b5fc717',
        ],
        'text' => [
            'ua' => 'field_67630566aa27f',
            'kz' => 'field_683450955115d',
            'ro' => 'field_683454b5fc753',
        ],
        'url' => [
            'ua' => 'field_6763057eaa280',
            'kz' => 'field_683450955119a',
            'ro' => 'field_683454b5fc793',
        ],
        'color' => [
            'ua' => 'field_676305adaa282',
            'kz' => 'field_68345095511d9',
            'ro' => 'field_683454b5fc7d4',
        ],
        'items' => [
            'ua' => 'field_67630597aa281',
            'kz' => 'field_6834509551212',
            'ro' => 'field_683454b5fc816',
        ],
    ],
    'acf/mccloud-custom-icon-boxes2' => [
        'group' => [
            'ua' => 'field_6730e37b50f0e',
            'ro' => 'field_683448a246ea4',
            'kz' => 'field_68344832edad1',
        ],
    'image' => [
        'ua' => 'field_6730e39f50f0f',
        'ro' => 'field_6834489f09711',
        'kz' => 'field_68344832ef71f',
    ],
    'title' => [
        'ua' => 'field_6730e3b150f10',
        'ro' => 'field_6834489f0974e',
        'kz' => 'field_68344832ef761',
    ],
    'subtitle' => [
        'ua' => 'field_6730e3bd50f11',
        'ro' => 'field_68344832ef7a2',
        'kz' => 'field_6834489f09789',
    ],
],
];



    global $wpdb;
    $target_content = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT post_content FROM {$wpdb->posts} WHERE ID = %d LIMIT 1",
            $target_post_id
        )
    );
    
    $replace_map = [];

 foreach ($acf_field_map_by_language as $block => $fields) {
    foreach ($fields as $field_name => $langs) {
        if (!isset($langs[$from_lang], $langs[$to_lang])) continue;

        $old_id = $langs[$from_lang];
        $new_id = $langs[$to_lang];

        // Заменяем все вхождения field_id
        $replace_map['"' . $old_id . '"'] = '"' . $new_id . '"';
    }
}

    // Простое str_replace
    $new_content = mb_str_replace(array_keys($replace_map), array_values($replace_map), $target_content);
    //$new_content = sanitize_acf_block_values($new_content);
   // $new_content = clean_acf_post_content($new_content, $replace_map);
    //$new_content = mb_str_replace(["\r\n", "\r"], "\n", $new_content); // нормализуем переносы
    $new_content = mb_str_replace("rnrn", "\r\n", $new_content); // удаляем "rnrn"
    echo "<textarea style='width: 100%; height: 300px; font-family: monospace;'>" . htmlspecialchars($new_content) . "</textarea><br>";
    

    if ($new_content !== $target_content) {
        
        
        global $wpdb;
        /*$wpdb->update(
            $wpdb->posts,
            ['post_content' => $new_content],
            ['ID' => $target_post_id]
        );*/
    }
}


