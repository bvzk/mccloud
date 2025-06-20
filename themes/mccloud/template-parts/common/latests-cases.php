<?php
$posts = new WP_Query(array(
    'cat' => 36,
    'post_type' => 'post',
    'orderby' => 'date',
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => 3
));
?>
<?php if ( $posts-> have_posts() ) : ?>
<div class="slick-force-height cases-slider lg:grid lg:grid-cols-3 gap-4 mb-6">
    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
        <div class="w-[284px] lg:w-auto mr-[20px] lg:mr-0 bg-white rounded-[22px] p-2 transition-shadow hover:shadow-lg">
            <?php if(has_post_thumbnail()) { ?>
                <a href="<?php echo get_permalink(); ?>" class="block xl:mb-[30px] mb-[16px]">
                    <picture>
                        <source srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail-m'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-m-2x'); ?> 2x" media="(max-width: 768px)">
                        <source srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-2x'); ?> 2x" media="(min-width: 769px)">
                        <img loading="lazy" width="430" height="240" src="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>" alt="<?php the_title(); ?>" class="rounded-[12px] w-full">
                    </picture>
                </a>
            <?php } ?>
            <div class="px-2 py-2 md:px-3 md:pb-3 md:px-5 md:pb-5">
                <?php if($post_categories = get_the_category(get_the_ID())) { ?>
                    <?php foreach($post_categories as $post_category) { ?>
                        <?php if($post_category->category_parent > 0) { ?>
                            <div class="badge inline-block border border-orange text-orange font-medium md:mb-[19px] mb-2">
                                <?=$post_category->name;?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <a href="<?php echo get_permalink(); ?>" class="block text-[18px] md:text-[22px] leading-[26px] md:leading-[30px] font-bold
                mb-[14px] md:mb-[37px] text-dark"><?php the_title(); ?></a>
                <div class="text-[14px] md:text-[16px] leading-4 text-gray min-h-[60px] md:min-h-[90px]">
                    <?php echo get_post_meta(get_the_ID(), 'post_subtitle', true); ?>
                </div>
                <?php /*<svg></svg>*/ ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php endif; wp_reset_postdata(); ?>