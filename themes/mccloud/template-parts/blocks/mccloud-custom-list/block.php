<?php
/**
 * McCloud Custom List
 *
 * @param array $block The block settings and attributes.
 */
?>

<div class="max-w-[830px] flex self-center w-full">
    <div class="rounded-4">
      <?php if (!empty(get_field('text_before_list'))) : ?>
        <h3 class="text-3 mb-3"><?php echo get_field('text_before_list') ?></h3>
        <?php endif; ?>
        <ul class="flex flex-col gap-3">
          <?php $counter = 1; ?>
          <?php while (have_rows('list')) : the_row(); ?>
            <li class="flex items-center gap-3">
                <span
                    class="rounded-full bg-green w-[44px] h-[44px] text-white flex justify-center items-center aspect-square"><?php echo $counter; ?></span>
                <span><?php echo get_sub_field('list_item') ?></span>
            </li>
            <?php $counter++; ?>
            <?php endwhile; ?>
        </ul>
    </div>
</div>