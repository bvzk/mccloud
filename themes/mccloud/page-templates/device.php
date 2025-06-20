<?php
/**
 * Template Name: Device
 * Template Post Type: post, page
 */

get_header();
?>

<div class='main w-full'>
    <div class='container flex flex-col gap-4'>
        
        <?php the_content() ?>
        <div class="container my-6 2xl:my-6 text-[#170C37]">
            <div class="spinbackup-page-banner rounded-4 h-[424px] md:h-[300px] bg-callToActionBg bg-contain bg-no-repeat p-3 md:p-4 2xl:p-6">
                <div class="2xl:w-[801px] xl:w-[558px] lg:w-[422px] md:w-[251px] flex flex-col gap-2 md:gap-3 xl:gap-4 h-85p md:h-full justify-start md:justify-center">
                    <div class="md:title-text-2 text-4  font-semibold">Потрібна консультація</div>
                    <div class="text-gray xl:text-3 lg:text-[14px] text-[12px] xl:leading-4 lg:leading-[20px] leading-[18px]">Якщо вам потрібна консультація фахівців платформи Spinbackup, скористайтеся формою зворотного зв'язку.</div>
                    <a href="#consultForm" class="btn btn-success w-full md:w-fit mt-2 hidden md:flex w-full md:w-auto lg:!flex">Отримати консультацію</a>
                </div>
                <div>
                    <a href="#consultForm" class="btn btn-success w-full md:w-fit mt-2 md:hidden flex w-full md:w-auto">Отримати консультацію</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php get_footer() ?>