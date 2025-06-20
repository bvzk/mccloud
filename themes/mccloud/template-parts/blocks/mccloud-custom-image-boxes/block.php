<?php
/**
 * McCloud Custom Image Boxes
 *
 * @param array $block The block settings and attributes.
 */
?>

<div class="w-full flex items-center justify-center">
  <div class="md:flex-row flex gap-3 w-full max-w-[830px] flex-col">
    <?php while(have_rows('list')) : the_row(); ?>
    <div class="border border-customlightGray pt-4 rounded-4 flex flex-col gap-3 transition-shadow hover:shadow-lg w-full items-center">
      <img src='<?php echo get_sub_field('image') ?>' class='w-full h-full max-h-[126px] object-cover max-w-[294px]'>
      <p class="text-4 leading-5 font-bold px-4 pb-4 text-center"><?php echo get_sub_field('title') ?></p>
    </div>
    <?php endwhile; ?>
  </div>
</div>