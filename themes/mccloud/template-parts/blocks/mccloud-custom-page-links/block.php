<?php
/**
 * McCloud Custom Page Links
 *
 * @param array $block The block settings and attributes.
 */
?>

<div class="bg-customLightGreen md:rounded-4 flex flex-col self-center w-full py-11 gap-11">
    <div class="container flex flex-col">
        <div class='flex gap-4 flex-col md:flex-row md:justify-between w-full'>
            <div class='flex flex-col gap-3 md:gap-4 w-full'>
                <h3 class=" text-6 leading-7 font-semibold text-center"><?php echo get_field('title')?></h3>
            </div>
        </div>
    </div>
    <div class='container plans-container active' data-item='business'>
        <div class="plans-slider -mx-4 lg:mx-0 lg:grid lg:grid-cols-3 lg:gap-4">
            <?php while (have_rows('list')) : the_row(); ?>
                <div class="px-4 lg:px-0 flex w-full">
                    <div class="bg-white rounded-4 enterprise-price-shadow w-full">
                        <div class="pt-4 px-4 2xl:p-6 wxl:px-6 pb-4 flex flex-col items-center">
                            <div class='max-w-[300px] max-h-[100px] pb-11 w-full'>
                              <img src='<?php echo get_sub_field('image') ?>' class='w-full height-full object-cover'>
                            </div>
                            <h5 class='font-bold text-4 leading-5 text-center pb-4'><?php echo get_sub_field('title') ?></h5>

                            <div
                                class="!p-0 btn btn-light-success w-full box-border flex"><a href='<?php echo get_permalink(get_sub_field('page_link')) ?>' class='p-3 color-green text-center box-border w-full h-full'>Дізнатися більше</a></div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>