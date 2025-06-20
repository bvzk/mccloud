<?php
/**
 * Template Name: Solution
 * Template Post Type: post, page
 */

get_header();
?>

<div class="container">
    <h2 class="title-text-2 font-bold lg:mb-11 mb-3 text-center"><?php echo get_field('first_section_title') ?></h2>
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
                <?php while(have_rows('first_section_repeater')) : the_row(); ?>
                <div class="lg:cursor-pointer border border-customlightGray hover:border-customlightGray p-2.5 xl:py-[20px] xl:pr-[20px] rounded-[22px] flex flex-col lg:flex-row lg:items-center"
                    data-spinback-usage-image="/wp-content/themes/mccloud/image/spinbackup-usage-1.jpg">
                    <picture>
                        <source type="image/webp" srcset="/wp-content/themes/mccloud/image/spinbackup-usage-1.webp"
                            media="(max-width: 768px)">
                        <source type="image/webp"
                            srcset="/wp-content/themes/mccloud/image/spinbackup-usage-1.webp, /wp-content/themes/mccloud/image/spinbackup-usage-1-2x.webp 2x"
                            media="(min-width: 768px)">
                        <source srcset="/wp-content/themes/mccloud/image/spinbackup-usage-1.jpg"
                            media="(max-width: 768px)">
                        <source
                            srcset="/wp-content/themes/mccloud/image/spinbackup-usage-1.jpg, /wp-content/themes/mccloud/image/spinbackup-usage-1-2x.jpg 2x"
                            media="(min-width: 768px)">
                        <img width="566" height="478" src="/wp-content/themes/mccloud/image/spinbackup-usage-1.jpg"
                            alt="Моніторинг шкідливих програм"
                            class="aspect-[1/0.87] lg:hidden rounded-[12px] mb-[40px] w-full">
                    </picture>
                    <div class="mb-[26px] lg:mb-0 lg:mx-[20px] xl:mx-[45px] px-[14px] lg:px-0">
                        <img src='<?php echo get_sub_field('select_image') ?>' style='min-width: 60px'>

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
            style="background-image: url('<?php echo get_field('first_section_image') ?>');"></div>
    </div>
</div>
<div class="container flex flex-col md:mt-[120px] mt-8 md:mb-[160px] mb-5">
    <div class="text-center mb-5 xl:mb-11">
        <div class="title-text-2 mb-3 font-bold">
            <?php echo get_field('second_section_title') ?>
        </div>
        <?php if(get_field('second_section_subtitle')) : ?>
        <div class="text-3 leading-4 xl:text-[20px] md:leading-[28px]">
            <?php echo get_field('second_section_subtitle') ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="">
    <div class='arrows-container my-4 flex flex-row justify-end rounded-2 w-full gap-2 lg:hidden'>
                <div class='arrow-prev arrow-button-container bg-white py-2 px-3 rounded-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/chevron-left.svg' ?>' class='arrow-img'>
                </div>
                <div class='arrow-next arrow-button-container bg-white py-2 px-3 rounded-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/chevron-right.svg' ?>' class='arrows-img'>
                </div>
            </div>
        <div class="advantages-slider lg:grid lg:grid-cols-3 lg:gap-4">
            <?php while(have_rows('second_section_gallery')) : the_row(); ?>
            <div class="border border-customlightGray p-4 rounded-4 flex flex-col transition-shadow hover:shadow-lg">
                <img src='<?php echo get_sub_field('item_image') ?>' class='svg-icon-60'>
                <p class="text-[18px] leading-5 font-bold mb-4 mt-5"><?php echo get_sub_field('item_title') ?></p>
                <p class="text-gray leading-4">
                    <?php echo get_sub_field('item_subtitle') ?>
                </p>
            </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>

<?php if(get_field('pricing_plans') == 'both') : ?>

<div class="bg-customLightGreen md:rounded-4 2xl:pt-11 md:py-11 pt-4  flex flex-col gap-6">
    <div class="container flex flex-col">
        <div class='flex gap-4 flex-col md:flex-row md:justify-between w-full'>
            <div class='flex flex-col gap-3 md:gap-4 w-full md:w-1/2'>
                <h2 class="title-text-2 text-center font-bold md:text-left"><?php echo get_field('pricing_title')?></h2>
                <?php if (get_field('pricing_subtitle')) : ?>
                    <p class='text-3 leading-4 text-gray text-center md:text-left'><?php echo get_field('pricing_subtitle') ?></p>
                <?php endif; ?>
            </div>
            <div class='toggler w-full md:width-30 p-1 flex flex-row gap-2 !height-fit-content bg-white rounded-2'>
                <p class='toggler-item w-full height-fit-content text-center rounded-2 py-2 button-active' data-target='business'>Business</p>
                <p class='toggler-item w-full height-fit-content text-center rounded-2 py-2' data-target='enterprise'>Enterprise</p>
            </div>
        </div>
    </div>
    <div class='container plans-container active' data-item='business'>
        <?php $data = get_business_plan_data(); 
              $plans = $data['plans'];
            ?>
        <div class="plans-slider -mx-4 lg:mx-0 lg:grid lg:grid-cols-3 lg:gap-4">
            <?php foreach ($plans as $plan) { ?>

                <div class="px-4 lg:px-0 flex">
                    <div class="bg-white rounded-4 enterprise-price-shadow">
                        <div class="pt-4 px-4 2xl:pt-6 wxl:px-6 pb-4 border-b border-customlightGray">
                            <div class="text-4 leading-5 mb-3 font-bold"><?php echo $plan['name']; ?></div>
                            <div class="text-[20px] leading-4 font-bold">
                                від <span class="text-6 leading-7">€<?php echo $plan['price']; ?></span>
                            </div>
                            <div class="text-grayText text-[12px] leading-3 mb-4">*за користувача на місяць</div>

                            <a href="#consultForm"
                                class="btn <?php echo $plan['highlight'] ? 'btn-light-success' : 'btn-success'; ?> w-full"><?php echo $plan['button_text']; ?></a>
                        </div>
                        <div class="pt-4 xl:px-6 px-4 pb-4 2xl:pb-6">

                            <?php foreach ($plan['features'] as $feature) { ?>

                                <div class="flex mb-3 xl:mb-4 text-3 leading-4">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mt-[3px] mr-[11px] min-w-[18px]">
                                        <rect width="18" height="18" rx="9" fill="#34A853" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.12902 11.8062L5.25818 9.93541C4.99988 9.6771 4.99988 9.2583 5.25818 8.99999C5.51649 8.74168 5.93529 8.74168 6.1936 8.99999L7.59673 10.4031L11.8061 6.19373C12.0644 5.93542 12.4832 5.93542 12.7415 6.19373C12.9998 6.45204 12.9998 6.87084 12.7415 7.12915L8.06478 11.8059C8.06466 11.806 8.06455 11.8061 8.06444 11.8062C7.80613 12.0646 7.38733 12.0646 7.12902 11.8062Z"
                                            fill="white" />
                                    </svg>
                                    <div class=" leading-5 xl:leading-4"><?php echo $feature; ?></div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class='container plans-container active' data-item='enterprise'>
    <?php $data = get_enterprise_plan_data(); 
              $plans = $data['plans'];
            ?>
        <div class="plans-slider -mx-4 lg:mx-0 lg:grid lg:grid-cols-3 lg:gap-4">
            <?php foreach ($plans as $plan) { ?>

                <div class="px-4 lg:px-0 flex">
                    <div class="bg-white rounded-4 enterprise-price-shadow">
                        <div class="pt-4 px-4 2xl:pt-6 wxl:px-6 pb-4 border-b border-customlightGray">
                            <div class="text-4 leading-5 mb-3 font-bold"><?php echo $plan['name']; ?></div>
                            <div class="text-[20px] leading-4 font-bold">
                                від <span class="text-6 leading-7">€<?php echo $plan['price']; ?></span>
                            </div>
                            <div class="text-grayText text-[12px] leading-3 mb-4">*за користувача на місяць</div>

                            <a href="#consultForm"
                                class="btn <?php echo $plan['highlight'] ? 'btn-light-success' : 'btn-success'; ?> w-full"><?php echo $plan['button_text']; ?></a>
                        </div>
                        <div class="pt-4 xl:px-6 px-4 pb-4 2xl:pb-6">

                            <?php foreach ($plan['features'] as $feature) { ?>

                                <div class="flex mb-3 xl:mb-4 text-3 leading-4">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mt-[3px] mr-[11px] min-w-[18px]">
                                        <rect width="18" height="18" rx="9" fill="#34A853" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.12902 11.8062L5.25818 9.93541C4.99988 9.6771 4.99988 9.2583 5.25818 8.99999C5.51649 8.74168 5.93529 8.74168 6.1936 8.99999L7.59673 10.4031L11.8061 6.19373C12.0644 5.93542 12.4832 5.93542 12.7415 6.19373C12.9998 6.45204 12.9998 6.87084 12.7415 7.12915L8.06478 11.8059C8.06466 11.806 8.06455 11.8061 8.06444 11.8062C7.80613 12.0646 7.38733 12.0646 7.12902 11.8062Z"
                                            fill="white" />
                                    </svg>
                                    <div class=" leading-5 xl:leading-4"><?php echo $feature; ?></div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php elseif (get_field('pricing_plans') == 'business') : ?>

<div class="bg-customLightGreen md:rounded-4 2xl:pt-11 md:py-11 pt-4  flex flex-col gap-6">
    <div class="container flex flex-col">
        <div class='flex gap-4 flex-col md:flex-row md:justify-between w-full'>
            <div class='flex flex-col gap-3 md:gap-4 w-full md:w-1/2'>
                <h2 class="title-text-2 text-center font-bold md:text-left"><?php echo get_field('pricing_title')?></h2>
                <?php if (get_field('pricing_subtitle')) : ?>
                    <p class='text-3 leading-4 text-gray text-center md:text-left'><?php echo get_field('pricing_subtitle') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class='container plans-container active' data-item='business'>
        <?php $data = get_business_plan_data(); 
              $plans = $data['plans'];
            ?>
        <div class="plans-slider -mx-4 lg:mx-0 lg:grid lg:grid-cols-3 lg:gap-4">
            <?php foreach ($plans as $plan) { ?>

                <div class="px-4 lg:px-0 flex">
                    <div class="bg-white rounded-4 enterprise-price-shadow">
                        <div class="pt-4 px-4 2xl:pt-6 wxl:px-6 pb-4 border-b border-customlightGray">
                            <div class="text-4 leading-5 mb-3 font-bold"><?php echo $plan['name']; ?></div>
                            <div class="text-[20px] leading-4 font-bold">
                                від <span class="text-6 leading-7">€<?php echo $plan['price']; ?></span>
                            </div>
                            <div class="text-grayText text-[12px] leading-3 mb-4">*за користувача на місяць</div>

                            <a href="#consultForm"
                                class="btn <?php echo $plan['highlight'] ? 'btn-light-success' : 'btn-success'; ?> w-full"><?php echo $plan['button_text']; ?></a>
                        </div>
                        <div class="pt-4 xl:px-6 px-4 pb-4 2xl:pb-6">

                            <?php foreach ($plan['features'] as $feature) { ?>

                                <div class="flex mb-3 xl:mb-4 text-3 leading-4">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mt-[3px] mr-[11px] min-w-[18px]">
                                        <rect width="18" height="18" rx="9" fill="#34A853" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.12902 11.8062L5.25818 9.93541C4.99988 9.6771 4.99988 9.2583 5.25818 8.99999C5.51649 8.74168 5.93529 8.74168 6.1936 8.99999L7.59673 10.4031L11.8061 6.19373C12.0644 5.93542 12.4832 5.93542 12.7415 6.19373C12.9998 6.45204 12.9998 6.87084 12.7415 7.12915L8.06478 11.8059C8.06466 11.806 8.06455 11.8061 8.06444 11.8062C7.80613 12.0646 7.38733 12.0646 7.12902 11.8062Z"
                                            fill="white" />
                                    </svg>
                                    <div class=" leading-5 xl:leading-4"><?php echo $feature; ?></div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
    
<?php elseif (get_field('pricing_plans') == 'enterprise') : ?>

    <div class="bg-customLightGreen md:rounded-4 2xl:pt-11 md:py-11 pt-4  flex flex-col gap-6">
    <div class="container flex flex-col">
        <div class='flex gap-4 flex-col md:flex-row md:justify-between w-full'>
            <div class='flex flex-col gap-3 md:gap-4 w-full md:w-1/2'>
                <h2 class="title-text-2 text-center font-bold md:text-left"><?php echo get_field('pricing_title')?></h2>
                <?php if (get_field('pricing_subtitle')) : ?>
                    <p class='text-3 leading-4 text-gray text-center md:text-left'><?php echo get_field('pricing_subtitle') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class='container plans-container active' data-item='enterprise'>
    <?php $data = get_enterprise_plan_data(); 
              $plans = $data['plans'];
            ?>
        <div class="plans-slider -mx-4 lg:mx-0 lg:grid lg:grid-cols-3 lg:gap-4">
            <?php foreach ($plans as $plan) { ?>

                <div class="px-4 lg:px-0 flex">
                    <div class="bg-white rounded-4 enterprise-price-shadow">
                        <div class="pt-4 px-4 2xl:pt-6 wxl:px-6 pb-4 border-b border-customlightGray">
                            <div class="text-4 leading-5 mb-3 font-bold"><?php echo $plan['name']; ?></div>
                            <div class="text-[20px] leading-4 font-bold">
                                від <span class="text-6 leading-7">€<?php echo $plan['price']; ?></span>
                            </div>
                            <div class="text-grayText text-[12px] leading-3 mb-4">*за користувача на місяць</div>

                            <a href="#consultForm"
                                class="btn <?php echo $plan['highlight'] ? 'btn-light-success' : 'btn-success'; ?> w-full"><?php echo $plan['button_text']; ?></a>
                        </div>
                        <div class="pt-4 xl:px-6 px-4 pb-4 2xl:pb-6">

                            <?php foreach ($plan['features'] as $feature) { ?>

                                <div class="flex mb-3 xl:mb-4 text-3 leading-4">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mt-[3px] mr-[11px] min-w-[18px]">
                                        <rect width="18" height="18" rx="9" fill="#34A853" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.12902 11.8062L5.25818 9.93541C4.99988 9.6771 4.99988 9.2583 5.25818 8.99999C5.51649 8.74168 5.93529 8.74168 6.1936 8.99999L7.59673 10.4031L11.8061 6.19373C12.0644 5.93542 12.4832 5.93542 12.7415 6.19373C12.9998 6.45204 12.9998 6.87084 12.7415 7.12915L8.06478 11.8059C8.06466 11.806 8.06455 11.8061 8.06444 11.8062C7.80613 12.0646 7.38733 12.0646 7.12902 11.8062Z"
                                            fill="white" />
                                    </svg>
                                    <div class=" leading-5 xl:leading-4"><?php echo $feature; ?></div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php elseif (get_field('pricing_plans') == 'none') : ?>
<?php endif; ?>

<div class="container md:mt-[120px] mt-8">
    <h2 class="title-text-2 font-bold mx-auto max-w-[935px] mb-3 text-center">
        <?php echo get_field('third_section_title') ?>
    </h2>
    <p class="text-center mx-auto lg:max-w-[50%]  mb-4 lg:mb-11 "><?php echo get_field('third_section_subtitle') ?>
    </p>

    <div class='arrows-container my-4 flex flex-row justify-end rounded-2 w-full gap-2 lg:hidden'>
                <div class='default-second-arrow-prev arrow-button-container bg-white py-2 px-3 rounded-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/chevron-left.svg' ?>' class='arrow-img'>
                </div>
                <div class='default-second-arrow-next arrow-button-container bg-white py-2 px-3 rounded-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/chevron-right.svg' ?>' class='arrows-img'>
                </div>
            </div>

    <div class="default-second-slider slick-force-height
        lg:grid lg:grid-cols-3 gap-4">
        <?php while (have_rows('third_section_gallery')) : the_row(); ?>

        <div class="border border-customlightGray rounded-4 p-4 transition-shadow hover:shadow-lg md:!h-full !h-auto">
            <div class="mb-6">
                <img src='<?php echo get_sub_field('item_image') ?>' class='svg-icon-50'>
            </div>
            <div class="text-4 leading-5 font-bold mb-3"><?php echo get_sub_field('item_title') ?></div>
            <?php if (get_sub_field('item_subtitle')) : ?>
            <p class=" text-gray leading-4">
                <?php echo get_sub_field('item_subtitle') ?>
            </p>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php if (get_field('need_caption') == 'yes') : ?>
<div class="container mt-4 mb-9 2xl:mt-11 2xl:mb-[120px]">
    <div class="pl-3 border-l-4 border-green flex py-2 flex-col gap-3 lg:max-w-[50%] lg:mx-auto text-4 leading-5 font-medium">
        <?php echo get_field('third_section_caption') ?>
    </div>
</div>
<?php endif; ?>
<div class="container flex flex-col md:mt-[120px] mt-8 md:mb-[160px] mb-5">
    <div class="text-center mb-5 xl:mb-11">
        <div class="title-text-2 mb-3 font-bold">
            <?php echo get_field('fourth_section_title') ?>
        </div>
        <?php if(get_field('second_section_subtitle')) : ?>
        <div class="text-3 leading-4 xl:text-[20px] md:leading-[28px]">
            <?php echo get_field('fourth_section_subtitle') ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="h-auto">
    <div class='arrows-container my-4 flex flex-row justify-end rounded-2 w-full gap-2 lg:hidden'>
                <div class='arrow-prev arrow-button-container bg-white py-2 px-3 rounded-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/chevron-left.svg' ?>' class='arrow-img'>
                </div>
                <div class='arrow-next arrow-button-container bg-white py-2 px-3 rounded-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/chevron-right.svg' ?>' class='arrows-img'>
                </div>
            </div>
        <div class="advantages-slider lg:grid lg:grid-cols-3 lg:gap-4">
            <?php while(have_rows('fourth_section_gallery')) : the_row(); ?>
            <div class="border border-customlightGray p-4 rounded-4 flex flex-col transition-shadow hover:shadow-lg">
                <img src='<?php echo get_sub_field('item_image') ?>' class='svg-icon-60'>
                <p class="text-[18px] leading-5 font-bold mb-4 mt-5"><?php echo get_sub_field('item_title') ?></p>
                <p class="text-gray leading-4">
                    <?php echo get_sub_field('item_subtitle') ?>
                </p>
            </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>

<div class="container 2xl:mb-6 mt-4 md:mt-8 2xl:mt-[160px]">
    <h2 class="title-text-2 2xl:mb-11 lg:mb-8 mb-6 font-bold text-center"><?php echo get_field('fifth_section_title') ?></h2>

    <div class="grid md:grid-cols-3 gap-4">
        <?php $counter = 1; ?>
        <?php while (have_rows('fifth_section_gallery')) : the_row();?>
            <div class="h-auto">
                <div class="relative mb-4">
                    <picture>
                        <img loading="lazy" src="<?php echo get_sub_field('item_image') ?>" alt="<?php echo get_sub_field('item_title') ?>"
                            class="rounded-tl-[100px] rounded-br-[100px] rounded-tr-[12px] rounded-bl-[12px] w-full max-height-255">
                    </picture>
                    <div
                        class="absolute bottom-0 right-[-4px] rounded-full w-[60px] h-[60px] flex items-center justify-center text-white text-4 font-bold" style='background-color: <?php echo get_sub_field('item_color') ?>'>
                        <?php echo $counter; ?>
                    </div>
                </div>
                <div class='texting-part flex flex-col'>
                    <div class="text-4 font-bold mb-3"><?php echo get_sub_field('item_title')?></div>
                    <div class="text-3 leading-4"><?php echo get_sub_field('item_subtitle') ?></div>
                </div>
            </div>
            <?php $counter++; ?>
        <?php endwhile; ?>
    </div>
</div>

<?php set_query_var('consultFormTitle', "Користуєтеся послугою вперше?");?>
<?php 
// set_query_var('showContacts', 'true');
?>
<?php set_query_var('consultFormSubTitle', "<p class='text-3 leading-4'>Для всіх нових клієнтів діють спеціальні ціни зі знижками. Повідомте менеджера на консультації, що це ваш перший досвід підключення та отримайте унікальну пропозицію.</p>") ?>

<?php require get_template_directory() . '/template-parts/common/consultFormBlock.php'; ?>

<?php get_footer() ?>