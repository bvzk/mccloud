<?php
/**
 * Template Name: Case
 * Template Post Type: post, page
 */

get_header();
?>

<div class="container lg:flex lg:-my-[12px]">
    <?php the_content(); ?>

    <div class="lg:w-4/12 lg:px-[12px] mb-5">
        <div class="border border-customlightGray rounded-4 p-6">
            <div class="mb-6">
                <img src="/wp-content/themes/mccloud/image/logo.svg?v=2" alt="mcCloud" class="max-w-[200px]">
            </div>
            <div class="text-[20px] leading-[28px] font-semibold mb-3">Про mcCloud</div>
            <div class="text-3 leading-4 mb-6">
                mcCloud – це ІТ-команда, що надає послуги хмарної інтеграції для бізнесу. Компанія оснащує підприємства
                надійними інструментами та персоналізованими програмами, а також проводить ІТ-тренінги та консультації.
            </div>
            <img src="/wp-content/themes/mccloud/image/cloud-partner.png" alt="Google premier partner" class="h-[70px]">
        </div>
    </div>
</div>


<div class="container">
    <div class="flex justify-between items-center">
        <div class="title-text-2 font-bold mb-4 lg:mb-6">Подібні кейси</div>
    </div>
    <?php require get_template_directory() . '/template-parts/common/latests-cases.php'; ?>
</div>

<?php get_footer() ?>