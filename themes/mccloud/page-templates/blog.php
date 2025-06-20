<?php
/**
 * Template Name: Blog
 * Template Post Type: post, page
 */

get_header();

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

$category_id = false;
if (isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) {
    $category_id = $category->term_id;
}
if (!$category_id) {
    $category_id = 9;
}

$args = array(
    'cat' => $category_id,
    'post_type' => 'post',
    'orderby' => 'date',
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => 9,
    'paged' => $paged
);

if ($search = get_query_var('search')) {
    $args['s'] = get_query_var('search');
}

$posts = new WP_Query($args);

$categories = get_categories(array('parent' => 9, 'hide_empty' => false));

?>

<main class="my-7 2xl:my-[120px] container" id="site-content" role="main">
    <?php if ( $categories ) { ?>
        <div class="flex items-center mb-[70px] overflow-x-auto">
            <a href="<?=get_permalink( 1157 );?>" class="btn text-nowrap text-black mr-5
            <?php if($category_id == 36) { ?>
                btn-light-success
            <?php } else { ?>
                btn-light border-[#F2F2F7]
            <?php } ?>
        ">Усі категорії</a>
            <?php foreach( $categories as $_category ) { ?>
                <a href="<?=get_permalink( 1157 ) . $_category->slug; ?>/"
                   class="btn text-nowrap text-black mr-5
                <?php if($category_id == $_category->term_id) { ?>
                    btn-light-success
                <?php } else { ?>
                    btn-light border-[#F2F2F7]
                <?php } ?>
            "><?=$_category->name;?></a>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="posts-slider lg:grid lg:grid-cols-3 gap-4 mb-5 2xl:mb-11">
        <?php if ( $posts-> have_posts() ) : ?>
            <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                <div class="w-[284px] lg:w-auto mr-4 lg:mr-0 border border-customlightGray rounded-4 p-2 transition-shadow hover:shadow-lg">
                    <?php if(has_post_thumbnail()) { ?>
                        <a href="<?php echo get_permalink(); ?>" class="block rounded-[12px] overflow-hidden">
                            <picture>
                                <source srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail-m'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-m-2x'); ?> 2x" media="(max-width: 768px)">
                                <source srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-2x'); ?> 2x" media="(min-width: 769px)">
                                <img <?php if($posts->current_post > 2) { echo 'loading="lazy"'; } ?> loading="lazy" src="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>" alt="<?php the_title(); ?>"  class="w-full">
                            </picture>
                        </a>
                    <?php } ?>
                    <div class="px-3 lg:px-5 py-4 lg:py-6">
                        <a href="<?php echo get_permalink(); ?>" class="block mb-[25px] text-dark hover:text-blue text-[22px] leading-[30px] font-bold">
                            <?php the_title(); ?>
                        </a>
                        <div class="text-3 leading-4 text-gray min-h-10">
                            <?php if(get_post_meta(get_the_ID(), 'post_subtitle', true)) { ?>
                                <?php echo get_post_meta(get_the_ID(), 'post_subtitle', true); ?>
                            <?php } else { ?>
                                <?php echo mb_substr( strip_tags(preg_replace("~\[(.+?)\]~", '', get_the_content())), 0, 300) . '...'; ?>
                            <?php } ?>
                        </div>
                        <!-- <div class="text-sm leading-[22px] text-[#AEAEB2]"><?php echo get_the_date('d.m.Y'); ?></div> -->
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
    </div>

    <div class="hidden lg:flex justify-center">
        <div class="pagination flex">
            <?php
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $posts->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => 'Назад', //sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                'next_text'    => 'Вперед', //sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
                'add_args'     => false,
                'add_fragment' => '',
            ) );
            ?>
        </div>
        <?php /*
        <a href="#" class="w-4/12 bg-[#F8F8F8] text-[14px] leading-[22px] py-[14px] rounded-lg text-center text-black">
            Показати ще
        </a>
        */ ?>
    </div>

    <!-- <?php echo do_shortcode('[contact-form-7 id="35a07df" title="Підписатись на новини"]'); ?> -->
</main>

<?php get_footer(); ?>


