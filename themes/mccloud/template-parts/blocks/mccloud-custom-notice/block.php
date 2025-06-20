<?php
/**
 * McCloud Custom Notice
 *
 * @param array $block The block settings and attributes.
 */
?>
<div class="max-w-[830px] flex self-center w-full">
    <div class="pl-3 border-l-4 border-green flex py-2 flex-col gap-3">
      <?php echo get_field('notice_text') ?>
    </div>
</div>