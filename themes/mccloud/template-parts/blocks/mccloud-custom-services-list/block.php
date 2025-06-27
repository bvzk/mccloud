<?php
/**
 * McCloud Custom Services List
 *
 * @param array $block The block settings and attributes.
 */
?>

<div class="flex flex-col items-center">
  <h2 class="title-text-2 font-bold mx-auto max-w-[830px] mb-3 text-center w-full">
    <?php echo get_field('title') ?>
  </h2>
  <div class='arrows-container my-4 flex flex-row justify-end rounded-2 w-full gap-2 lg:hidden'>
    <div class='default-second-arrow-prev arrow-button-container bg-white py-2 px-3 rounded-2'>
      <img src='<?php echo get_template_directory_uri() . '/assets/image/chevron-left.svg' ?>' class='arrow-img'>
    </div>
    <div class='default-second-arrow-next arrow-button-container bg-white py-2 px-3 rounded-2'>
      <img src='<?php echo get_template_directory_uri() . '/assets/image/chevron-right.svg' ?>' class='arrows-img'>
    </div>
  </div>
  <div class="default-second-slider slick-force-height lg:grid lg:grid-cols-3 gap-4 max-x-[830px] w-full">
    <?php while (have_rows('list')) : the_row(); ?>
    <div class="border border-customlightGray rounded-4 p-4 transition-shadow hover:shadow-lg md:!h-full !h-auto">
      <div class="mb-6">
        <img src='<?php echo get_sub_field('image'); ?>' class='svg-icon-50'>
      </div>
      <div class="text-4 leading-5 font-bold mb-3"><?php echo get_sub_field('title') ?></div>
        <?php if (get_sub_field('subtitle')) : ?>
        <p class=" text-gray leading-4">
          <?php echo get_sub_field('subtitle') ?>
        </p>
        <?php endif; ?>
      </div>
      <?php endwhile; ?>
    </div>
  </div>