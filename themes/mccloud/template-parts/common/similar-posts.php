<?php

    $categories = get_the_category();

    if($categories && sizeof($categories)) {
        $post_category = isset(array_reverse($categories)[0]) ? array_reverse($categories)[0] : null;
    }

    $posts = new WP_Query(array(
        'cat' => $post_category ? $post_category->term_id : 9,
        'post_type' => 'post',
        'orderby' => 'date',
        'post_status' => 'publish',
        'order' => 'DESC',
        'posts_per_page' => 6,
        'post__not_in' => array(get_the_ID()),
        'date_query' => array(
            array(
                'after'     => get_the_date(),
                'inclusive' => true,
            ),
        ),
    ));
?>

<?php if ( $posts-> have_posts() ) : ?>
<div class="my-default container mx-auto px-[16px]">
    <div class="flex justify-between items-center mb-[32px]">
        <h2 class="title-text-2 font-semibold xl:font-bold">Схожі статті</h2>
        <div class="similar-posts-slider-arrows slick-arrows flex"></div>
    </div>

    <div class="slick-force-height similar-posts-slider">
        <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="w-[284px] mr-[20px] bg-lightgreen hover:bg-white rounded-[22px] p-2">
                <?php if(get_the_post_thumbnail_url()) { ?>
                    <a href="<?php echo get_permalink(); ?>" class="block xl:mb-[30px] mb-[16px] aspect-[1.79/1] bg-cover bg-center rounded-[12px] overflow-hidden">
                        <picture>
                            <source srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail-m'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-m-2x'); ?> 2x" media="(max-width: 768px)">
                            <source srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-2x'); ?> 2x" media="(min-width: 769px)">
                            <img loading="lazy" src="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>" alt="<?php the_title(); ?>" class="w-full">
                        </picture>
                    </a>
                <?php } ?>
                <div class="xl:px-[32px] xl:py-[38px] px-[19px] py-[29px]">
                    <a href="<?php echo get_permalink(); ?>" class="block text-[22px] leading-[30px] font-bold mb-[25px] text-dark hover:text-blue"><?php the_title(); ?></a>
                    <div class="text-[15px] leading-[23px] text-gray mb-[43px] min-h-[71px]">
                        <?php if(get_post_meta(get_the_ID(), 'post_subtitle', true)) { ?>
                            <?php echo get_post_meta(get_the_ID(), 'post_subtitle', true); ?>
                        <?php } else { ?>
                            <?php echo mb_substr( strip_tags(preg_replace("~\[(.+?)\]~", '', get_the_content())), 0, 300) . '...'; ?>
                        <?php } ?>
                    </div>
                    <div class="text-sm leading-[22px] text-[#AEAEB2]"><?php echo get_the_date('d.m.Y'); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; wp_reset_postdata(); ?>