<?php
$title = get_query_var('title', "");
$subtitle = get_query_var('subtitle', "");
$bgClass = get_query_var('bgClass', "");
$buttonText = get_query_var('CallToACtionBtnText', "");
$slideTop = get_query_var('callToActionSlideTop', true);
$backGroundColor = get_query_var('callToActionBackgroundColor', "callToActionBg");
$buttonLink = get_query_var('callToActionBtnLink', "#consultForm");
$allTextWhite = get_query_var('callToActionAllTextWhite', false);


if (empty($title)) {
    $title = __("Business Standard", "");
}

if (empty($subtitle)) {
    $subtitle = __("Найоптимальніший тариф для малого та середнього бізнесу, як в разі невеликої кількості людей, які працюють в одному офісі, так і для великої інтернаціональної команди. Розширені функції Meet і Chat, аудит та звіти для Диска, можливість створювати спільні диски для команди.", "");
}

if (empty($bgClass)) {
    $bgClass = __("workspace-banner", "");
}

if (empty($buttonText)) {
    $buttonText = __("Замовити", "");
}

if ($slideTop === null) {
    $slideTop = true;
}

if (empty($backGroundColor)) {
    $backGroundColor = __("callToActionBg", "");
}

if (empty($buttonLink)) {
    $buttonLink = __("#consultForm", "");
}

if ($allTextWhite === null) {
    $allTextWhite = false;
}

?>

<div
    class="container <?php echo $slideTop ? "xl:mt-[-100px] lg:mt-[-136px] mt-[-188px] md:mt-[-115px] mb-11 xl:mb-[160px]" : "mt-8 2xl:mt-11"; ?> <?php echo $allTextWhite ? "text-white" : "text-[#170C37]"; ?> ">
    <div
        class="<?php echo $bgClass; ?> rounded-4 h-[424px] md:h-[300px] bg-<?php echo $backGroundColor; ?> bg-contain bg-no-repeat p-3 md:p-4 2xl:p-6">
        <div
            class="2xl:w-[801px] xl:w-[558px] lg:w-[422px] md:w-[251px] flex flex-col gap-2 md:gap-3 xl:gap-4 h-85p md:h-full justify-start md:justify-center">
            <div class="md:title-text-2 text-4  font-semibold"> <?php echo $title; ?></div>
            <div class="<?php echo $allTextWhite ? "" : "text-gray"; ?> 
            xl:text-3 lg:text-[14px] text-[12px]
            xl:leading-4 lg:leading-[20px] leading-[18px]">
                <?php echo $subtitle; ?>
            </div>
            <a href="<?php echo $buttonLink; ?>"
                class="btn btn-success w-full md:w-fit mt-2 hidden md:flex w-full md:w-auto lg:!flex"><?php echo $buttonText; ?></a>
</div>
<div>
            <a href="<?php echo $buttonLink; ?>"
                class="btn btn-success w-full md:w-fit mt-2 md:hidden flex w-full md:w-auto"><?php echo $buttonText; ?></a>
</div>
        </div>
    </div>
</div>

<div class="sr-only bg-callToActionBg md:bg-leftQuestionsBg"></div>