<?php
/**
 * McCloud Custom Icon Boxes
 *
 * @param array $block The block settings and attributes.
 */
?>

<div class="flex flex-col items-center">
  <div class='arrows-container my-4 flex flex-row justify-end rounded-2 w-full gap-2 lg:hidden max-w-[830px]'>
    <div class='adv-arrow-prev arrow-button-container bg-white py-2 px-3 rounded-2'>
      <img src='<?php echo get_template_directory_uri() . '/image/chevron-left.svg' ?>' class='arrow-img'>
    </div>
    <div class='adv-arrow-next arrow-button-container bg-white py-2 px-3 rounded-2'>
      <img src='<?php echo get_template_directory_uri() . '/image/chevron-right.svg' ?>' class='arrows-img'>
    </div>
  </div>
  <div class="advantages-slider lg:grid lg:grid-cols-<?php echo get_field('kilkist_kolonok') ?> lg:gap-4 w-full">
    <?php while(have_rows('list')) : the_row(); ?>
    <div class="border border-customlightGray p-4 rounded-4 flex flex-col transition-shadow hover:shadow-lg">
      <img src='<?php echo get_sub_field('image') ?>' class='svg-icon-60'>
      <p class="text-[18px] leading-5 font-bold mb-3 mt-6"><?php echo get_sub_field('title') ?></p>
      <p class="text-gray leading-4">
        <?php echo get_sub_field('subtitle') ?>
      </p>
    </div>
    <?php endwhile; ?>
  </div>
</div>