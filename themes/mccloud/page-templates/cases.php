<?php
/**
 * Template Name: Cases
 * Template Post Type: post, page
 */

get_header();
?>

<?php
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

$category_id = false;
if (isset($_GET['term_id'])) {
    $category = get_category_by_slug($_GET['term_id']);
    $category_id = $category->term_id;
}
if (!$category_id) {
    $category_id = 36;
}

$args = array(
    'cat' => $category_id,
    'post_type' => 'post',
    'orderby' => 'date',
    'post_status' => 'publish',
    'posts_per_page' => 120,
    'paged' => $paged
);
$posts = new WP_Query($args);

$categories = get_categories(array('parent' => 36, 'hide_empty' => false));
?>

<div class="my-[50px] mb-default container mx-auto px-[16px] xl:px-0">
    <?php if ($categories) { ?>
        <div class="flex items-center mb-[70px] overflow-x-auto">
            <a href="<?= get_permalink(1147); ?>" class="btn text-nowrap text-black mr-3 !rounded-8
            <?php if ($category_id == 36) { ?>
                btn-light-blue
            <?php } else { ?>
                btn-light border-[#F2F2F7]
            <?php } ?>
        ">Усі категорії</a>
            <?php foreach ($categories as $_category) { ?>
                <a href="<?= get_permalink(1147) . $_category->slug; ?>/" class="btn text-nowrap text-black mr-3 !rounded-8
                <?php if ($category_id == $_category->term_id) { ?>
                    btn-light-blue
                <?php } else { ?>
                    btn-light border-[#F2F2F7]
                <?php } ?>
            "><?= $_category->name; ?></a>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="posts-slider lg:grid lg:grid-cols-3 lg:gap-4 mb-5 2xl:mb-11 -m-[12px]">
        <?php if ($posts->have_posts()): ?>
            <?php while ($posts->have_posts()):
                $posts->the_post(); ?>
                <div
                    class="w-[284px] lg:w-auto mr-4 lg:mr-0 hover:bg-white rounded-4 p-2 border border-customlightGray transition-shadow hover:shadow-lg">
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php echo get_permalink(); ?>" class="block">
                            <picture>
                                <source
                                    srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail-m'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-m-2x'); ?> 2x"
                                    media="(max-width: 768px)">
                                <source
                                    srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-2x'); ?> 2x"
                                    media="(min-width: 769px)">
                                <img <?php if ($posts->current_post > 0) {
                                    echo 'loading="lazy"';
                                } ?>
                                    src="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>" alt="<?php the_title(); ?>"
                                    class="rounded-3 w-full">
                            </picture>
                        </a>
                    <?php } ?>
                    <div class="px-3 lg:px-5 py-5 lg:py-6">
                        <?php if ($post_categories = get_the_category(get_the_ID())) { ?>
                            <?php foreach ($post_categories as $post_category) { ?>
                                <?php if ($post_category->category_parent > 0) { ?>
                                    <div class="badge badge-case inline-block border border-[#F08A01] text-orange font-medium mb-4 mr-2">
                                        <?= $post_category->name; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <a href="<?php echo get_permalink(); ?>"
                            class="block text-4 leading-5 font-bold mb-3 text-dark hover:text-blue">
                            <h2 class="font-bold"><?php the_title(); ?></h2>
                        </a>
                        <div class="text-3 leading-4 text-gray min-h-10">
                            <?php 
                                $lang  = pll_current_language();
                                echo get_post_meta(get_the_ID(), 'post_subtitle_'.$lang, true); 
                            ?>
                        </div>
                        <?php /*<div>svg picture</div>*/ ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>

    <?php /*<div class="hidden lg:flex justify-center mt-[19px] px-[18px]">
<a href="#" class="w-4/12 bg-[#F8F8F8] text-[14px] leading-[22px] py-[14px] rounded-lg text-center text-black">
Показати ще
</a>
</div>*/ ?>
</div>

<?php get_footer() ?>