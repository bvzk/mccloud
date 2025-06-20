<?php
/**
 * Template Name: Мой шаблон записи
 * Template Post Type: post, page
 */
?>

<?php get_header()?>


<div class="news_item">
    <div class="news-text">
        <div class="title"><?php the_title() ?></div>
        <div class="date"><?php echo get_the_date(); ?></div>
        <div class="descr"><?php the_excerpt() ?></div>
    </div>
</div>


<?php get_footer() ?>

