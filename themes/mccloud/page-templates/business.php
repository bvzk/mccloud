<?php
/**
 * Template Name: Business
 * Template Post Type: post, page
 */

get_header();
?>

<?php require get_template_directory() . '/template-parts/common/googleWorkspaceBenefitsForBusiness.php'; ?>

<?php load_plans_template('business'); ?>

<?php
set_query_var('title', 'Вперше підключаєте Google Workspace?');
set_query_var('subtitle', 'mcCloud допоможе отримати знижку до 50% на обраний пакет!');
set_query_var('bgClass', 'workspace-banner-business');
require get_template_directory() . '/template-parts/common/callToActionBlock.php'; ?>

<?php load_packageFeatures_template('business'); ?>

<?php require get_template_directory() . '/template-parts/common/leftQuestions.php'; ?>

<?php require get_template_directory() . '/template-parts/common/accordion.php'; ?>



<?php
set_query_var('consultFormTitle', 'Дізнайтеся, як Google Workspace може підвищити продуктивність вашої команди');
set_query_var('consultFormSubTitle', 'Заповніть заявку і почніть свій шлях до використання безпечних хмарних рішень для спільної роботи!');
require get_template_directory() . '/template-parts/common/consultFormBlock.php'; ?>

<?php get_footer() ?>