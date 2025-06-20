<?php
/**
 * Template Name: About
 * Template Post Type: post, page
 */

get_header();
?>

<?php require get_template_directory() . '/template-parts/common/companiesTrustUs.php'; ?>

<div class="container flex flex-col gap-3 lg:flex-row items-center lg:items-center lg:justify-between 2xl:mt-[120px]">
    <div class="lg:w-full max-w-[391px]  text-center md:text-left md:block">
        <div class="md:title-text-2 mb-4 text-4 leading-5 font-semibold">Хмарні рішення <br> для захмарних ідей</div>
        <div class="leading-4 text-3">За роки нашої роботи ми здобули довіру у багатьох клієнтів, а наші послуги стали
            невід'ємною частиною їх успішних бізнесів</div>
    </div>
	 <div class="w-full max-w-[952px] mb-4 lg:mb-0 flex flex-col md:hidden gap-2">
        <img src='https://mccloud.global/wp-content/uploads/2024/10/rectangle-25993.png'>
		 <img src='https://mccloud.global/wp-content/uploads/2024/10/rectangle-26227.png'>
		 <img src='https://mccloud.global/wp-content/uploads/2024/10/rectangle-26228.png'>
		 <img src='https://mccloud.global/wp-content/uploads/2024/10/rectangle-26229.png'>
		 <img src='https://mccloud.global/wp-content/uploads/2024/10/rectangle-26230.png'>
    </div>
    <div class="w-full max-w-[952px] mb-4 lg:mb-0 hidden md:block">
        <picture>
            <source type="image/webp"
                srcset="/wp-content/themes/mccloud/image/about-cloud-banner-m.webp, /wp-content/themes/mccloud/image/about-cloud-banner-m-2x.webp 2x"
                media="(max-width: 768px)">
            <source type="image/webp"
                srcset="/wp-content/themes/mccloud/image/about-cloud-banner.webp, /wp-content/themes/mccloud/image/about-cloud-banner-2x.webp 2x"
                media="(min-width: 769px)">
            <source type="image/webp"
                srcset="/wp-content/themes/mccloud/image/about-cloud-banner.webp, /wp-content/themes/mccloud/image/about-cloud-banner-2x.webp 2x">
            <source
                srcset="/wp-content/themes/mccloud/image/about-cloud-banner-m.jpg, /wp-content/themes/mccloud/image/about-cloud-banner-m-2x.jpg 2x"
                media="(max-width: 768px)">
            <source
                srcset="/wp-content/themes/mccloud/image/about-cloud-banner.jpg, /wp-content/themes/mccloud/image/about-cloud-banner-2x.jpg 2x"
                media="(min-width: 769px)">
            <img width="926" height="440" src="/wp-content/themes/mccloud/image/about-cloud-banner.jpg" alt="About us">
        </picture>
    </div>
</div>

<div class="container 2xl:mb-6 mt-4 md:mt-8 2xl:mt-[160px]">
    <h2 class="title-text-2 2xl:mb-11 lg:mb-8 mb-6 font-bold text-center">Наш підхід</h2>

    <?php
    set_query_var('data', get_three_cards_data_about());

    require get_template_directory() . '/template-parts/common/threeRoundedCards.php'; ?>
</div>

<?php
set_query_var('title', 'Нам довіряють');
require get_template_directory() . '/template-parts/common/ourClients.php'; ?>

<div class="mb-8 ">

    <?php require get_template_directory() . '/template-parts/common/ourSuccessCases.php'; ?>
</div>

<?php set_query_var('consultFormTitle', "Контакти компанії");?>
<?php set_query_var('showContacts', 'true');?>
<?php set_query_var('consultFormSubTitle', "<p class='text-3 leading-4'>Маєте питання щодо хмарних сервісів?  Наша команда доступна з 9:00 до 18:00 у робочі дні.<br>Звертайтеся до нас, адже ми спеціалізуємося на наданні високоякісних послуг у сфері хмарних технологій.</p>") ?>

<?php require get_template_directory() . '/template-parts/common/consultFormBlock.php'; ?>

<?php get_footer() ?>