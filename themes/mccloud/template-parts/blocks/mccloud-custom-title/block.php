<?php
/**
 * McCloud Custom Title
 *
 * @param array $block The block settings and attributes.
 */
?>
<?php
$tag = get_field('select_tag');
$heading_text = get_field('heading_text');
$is_full_width = get_field('is_full_width');
$class = ($is_full_width == 'no') ? 'max-w-[830px]' : 'justify-center';

?>
<div class="flex self-center w-full <?php echo $class ?>">
  <?php if ($tag == 'h1') : ?>
    <h1 class="2xl:text-8 lg:text-5 md:text-4 2xl:leading-9 lg:leading-6 md:leading-5 text-5 leading-6 md:mb-4 mb-3 2xl:mb-6 font-bold"><?php echo $heading_text; ?></h1>
  <?php elseif ($tag == 'h2') : ?>
    <h2 class="title-text-2 font-bold xl:mb-4 mb-3 text-5 leading-6"><?php echo $heading_text; ?></h2>
  <?php elseif ($tag == 'h3') : ?>
    <h3 class="md:title-text-2 text-4 font-semibold"><?php echo $heading_text; ?></h3>
  <?php elseif ($tag == 'h4') : ?>
    <h4 class="text-5 leading-6 font-semibold"><?php echo $heading_text; ?></h4>
  <?php elseif ($tag == 'h5') : ?>
    <h5 class="text-4 leading-5 font-semibold"><?php echo $heading_text; ?></h5>
  <?php elseif ($tag == 'h6') : ?>
    <h6 class="text-3 leading-4 font-semibold"><?php echo $heading_text; ?></h6>
  <?php endif; ?>
</div>
