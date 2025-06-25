<?php
set_query_var('title', pll__('Залишились питання по тарифах?'));
set_query_var('subtitle', pll__('Наші менеджери допоможуть підібрати оптимальний пакет, нададуть професійну консультацію та відповіді на  ваші питання.'));
set_query_var('bgClass', 'how-can-i-help-banner');
set_query_var('callToActionSlideTop', false);
set_query_var('callToActionBackgroundColor', "leftQuestionsBg");

require get_template_directory() . '/template-parts/common/callToActionBlock.php';
