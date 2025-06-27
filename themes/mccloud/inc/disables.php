<?php

// ---------------------------------------------------------
// Disable Emoji scripts and styles for cleaner frontend
// ---------------------------------------------------------

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


add_filter('wpseo_exclude_from_sitemap_by_post_ids', 'exclude_posts_from_xml_sitemaps');