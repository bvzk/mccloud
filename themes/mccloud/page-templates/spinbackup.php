<?php
/**
 * Template Name: Products
 * Template Post Type: post, page
 */

get_header();
?>

<div class="container">
    <h2 class="title-text-2 font-bold lg:mb-11 mb-3 text-center"><?php echo get_field('second_screen_title') ?></h2>
    <div class="flex mb-5 2xl:mb-11">
        <div class="w-full lg:w-6/12 xl:w-7/12 lg:pr-[18px]">
        <div class='arrows-container my-4 flex flex-row justify-end rounded-2 w-full gap-2 lg:hidden'>
                <div class='default-arrow-prev arrow-button-container bg-white py-2 px-3 rounded-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/chevron-left.svg' ?>' class='arrow-img'>
                </div>
                <div class='default-arrow-next arrow-button-container bg-white py-2 px-3 rounded-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/chevron-right.svg' ?>' class='arrows-img'>
                </div>
            </div>
            <div class="default-slider slick-force-height lg:grid lg:grid-cols-1 lg:gap-[13px] w-full">
                <?php $initial_img = ''; ?>
                <?php while(have_rows('second_screen_list')) : the_row(); ?>
                <?php $initial_img = get_sub_field('item_big_image'); ?>
                <div class="lg:cursor-pointer border border-customlightGray hover:border-customlightGray p-2.5 xl:py-[20px] xl:pr-[20px] rounded-[22px] flex flex-col lg:flex-row lg:items-center"
                    data-spinback-usage-image="<?php echo get_sub_field('item_big_image') ?>">
                    <picture>
                        <source type="image/webp" srcset="<?php echo get_sub_field('item_big_image') ?>"
                            media="(max-width: 768px)">
                        <source type="image/webp"
                            srcset="<?php echo get_sub_field('item_big_image') ?>"
                            media="(min-width: 768px)">
                        <source srcset="<?php echo get_sub_field('item_big_image') ?>"
                            media="(max-width: 768px)">
                        <source
                            srcset="<?php echo get_sub_field('item_big_image') ?>"
                            media="(min-width: 768px)">
                        <img width="566" height="478" src="<?php echo get_sub_field('item_big_image') ?>"
                            alt="<?php echo get_sub_field('item_title') ?>"
                            class="aspect-[1/0.87] lg:hidden rounded-[12px] mb-[40px] w-full">
                    </picture>
                    <div class="mb-[26px] lg:mb-0 lg:mx-[20px] xl:mx-[45px] px-[14px] lg:px-0">
                        <img src='<?php echo get_sub_field('item_icon') ?>' class='max-width-unset'>

                    </div>
                    <div class="grow px-[14px] lg:px-0">
                        <h3 class="text-[18px] leading-5 font-bold mb-2"><?php echo get_sub_field('item_title') ?></h3>
                        <div class="text-[15px] leading-[23px] text-gray pb-[32px] lg:pb-0">
                        <?php echo get_sub_field('item_subtitle') ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>

            </div>
        </div>
        <div class="hidden lg:block w-6/12 xl:w-5/12 lg:ml-[18px] rounded-[22px] bg-cover"
            data-spinback-usage-image-preview
            style="background-image: url('<?php echo $initial_img; ?>');"></div>
    </div>

    <div class="bg-[#fcedd8] md:p-4 px-3 py-4 flex flex-col gap-3 xl:flex-row justify-between xl:items-center rounded-4">
        <div class="text-[#636366] text-3 leading-4 xl:text-[20px] xl:leading-5 text-left md:text-center xl:text-left font-medium">
            <?php echo get_field('second_screen_notion_text') ?>
        </div>
        <a href="<?php echo get_field('second_screen_notion_button')['url'] ?>" class="btn btn-lg btn-warning text-center"><?php echo get_field('second_screen_notion_button')['title'] ?></a>
    </div>
</div>

<div class="container mt-8 2xl:mt-[120px]">
    <h2 class="title-text-2 font-bold lg:mb-11 md:mb-4 text-center mb-6">
        <?php echo get_field('section_title') ?>
    </h2>
    <div class="default-second-slider slick-force-height lg:grid lg:grid-cols-4 gap-4">
        <?php while(have_rows('third_section_items_list')) : the_row();?>
        <div class="border border-customlightGray rounded-4 p-4 transition-shadow hover:shadow-lg w-full">
            <div class="mb-6">
            <img src='<?php echo get_sub_field('item_icon') ?>'>
            </div>
            <h3 class=" text-4 leading-5 font-bold mb-3"><?php echo get_sub_field('item_title') ?>
            </h3>
            <div class="text-3 text-gray leading-4">
                <?php echo get_sub_field('item_description') ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<div
    class="container mt-8 2xl:mt-11 text-[#170C37]">
    <div
        class="spinbackup-page-banner rounded-4 h-[424px] md:h-[300px] bg-callToActionBg bg-contain bg-no-repeat p-3 md:p-4 2xl:p-6">
        <div
            class="2xl:w-[801px] xl:w-[558px] lg:w-[422px] md:w-[251px] flex flex-col gap-2 md:gap-3 xl:gap-4 h-85p md:h-full justify-start md:justify-center">
            <div class="md:title-text-2 text-4  font-semibold"> <?php echo get_field('cta_title') ?></div>
                <div class="text-gray 
                xl:text-3 lg:text-[14px] text-[12px]
                xl:leading-4 lg:leading-[20px] leading-[18px]">
                    <?php echo get_field('cta_subtitle') ?>
                </div>
                <a href="<?php echo get_field('cta_button')['url']; ?>"
                    class="btn btn-success w-full md:w-fit mt-2 hidden md:flex w-full md:w-auto lg:!flex"><?php echo get_field('cta_button')['title']; ?></a>
            </div>
            <div>
                <a href="<?php echo get_field('cta_button')['url']; ?>"
                class="btn btn-success w-full md:w-fit mt-2 md:hidden flex w-full md:w-auto"><?php echo get_field('cta_button')['title']; ?></a>
            </div>
        </div>
    </div>
</div>

<div class="sr-only bg-callToActionBg md:bg-leftQuestionsBg"></div>


<!-- <?php require get_template_directory() . '/template-parts/common/latests-posts.php'; ?> -->

<?php
set_query_var('consultFormTitle', get_field('footer_form_title'));
set_query_var('consultFormSubTitle', get_field('footer_form_text'));
require get_template_directory() . '/template-parts/common/consultFormBlock.php'; ?>

<?php get_footer() ?>