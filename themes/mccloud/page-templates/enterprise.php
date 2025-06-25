<?php
/**
 * Template Name: Enterprise
 * Template Post Type: post, page
 */

get_header();
?>


<?php require get_template_directory() . '/template-parts/common/googleWorkspaceBenefitsForBusiness.php'; ?>

<?php load_plans_template('enterprise'); ?>

<?php
set_query_var('title', pll__('Вперше підключаєте Google Workspace?'));
set_query_var('subtitle', pll__('mcCloud допоможе отримати знижку до 50% на обраний пакет!'));
set_query_var('bgClass', 'workspace-banner-enterprise');
require get_template_directory() . '/template-parts/common/callToActionBlock.php'; ?>

<?php load_packageFeatures_template('enterprise'); ?>

<?php require get_template_directory() . '/template-parts/common/leftQuestions.php'; ?>

<?php require get_template_directory() . '/template-parts/common/accordion.php'; ?>

<?php require get_template_directory() . '/template-parts/common/latests-posts.php'; ?>

<?php
set_query_var('consultFormTitle', pll__('Відкрийте нові можливості для вашої команди завдяки Google Workspace Enterprise'));
set_query_var('consultFormSubTitle', pll__('Заповніть заявку і почніть свій шлях до використання безпечних хмарних рішень для спільної роботи!'));
require get_template_directory() . '/template-parts/common/consultFormBlock.php'; ?>

<?php get_footer() ?>