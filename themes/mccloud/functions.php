<?php

define('MCCLD_DIR', get_template_directory());
define('MCCLD_URL', get_template_directory_uri());

require_once MCCLD_DIR . '/inc/polylang-custom.php';
require_once MCCLD_DIR . '/inc/after-theme-setup.php'; // all hooks that needs to be done on after_theme_setup
require_once MCCLD_DIR . '/inc/acf.php'; // Seo optimization
require_once MCCLD_DIR . '/inc/theme-customizer.php'; // Customizer additions
require_once MCCLD_DIR . '/inc/admin-panel.php'; // Admin Customizer additions
require_once MCCLD_DIR . '/inc/scripts-styles.php'; // All scripts and styles enqueue | dequeue
require_once MCCLD_DIR . '/inc/disables.php'; // Disables functions
require_once MCCLD_DIR . '/inc/seo-optimization.php'; // Seo optimization
require_once MCCLD_DIR . '/inc/cf7.php'; // Seo optimization
require_once MCCLD_DIR . '/inc/classes/class-twentytwenty-walker-page.php';
require_once MCCLD_DIR . '/inc/classes/class-twentytwenty-script-loader.php';
require_once MCCLD_DIR . '/inc/classes/_class-twentytwenty-svg-icons.php';
require_once MCCLD_DIR . '/inc/template-tags.php'; // Tags customizer additions
require_once MCCLD_DIR . '/inc/telegram.php'; // telegram
