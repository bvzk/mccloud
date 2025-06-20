<?php

/**

 * McCloud Custom Title

 *

 * @param array $block The block settings and attributes.

 */

?>

<div class="container 2xl:mb-6 mt-4 md:mt-8 2xl:mt-[80px]">
    <h2 class="title-text-2 2xl:mb-11 lg:mb-8 mb-6 font-bold text-center"><?php echo get_field('steps_title') ?></h2>

    <div class="grid md:grid-cols-3 gap-4">
        <?php $counter = 1; ?>
        <?php while (have_rows('steps_list')) : the_row();?>
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