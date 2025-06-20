<?php

/**

 * McCloud Custom Title

 *

 * @param array $block The block settings and attributes.

 */

?>

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

<?php endif; ?>

