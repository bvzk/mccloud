<?php
$posts = new WP_Query(array(
    'cat' => '9,101,103',
    'post_type' => 'post',
    'orderby' => 'date',
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => 3,
    'lang' => pll_current_language()
));
?>

<?php if ($posts->have_posts()): ?>
    <div class="container mt-8 2xl:mt-[120px]">
        <div class="flex md:justify-between justify-center items-center mb-5 2xl:mb-9">
            <h2 class="md:title-text-2 text-4 leading-5 font-bold"><?php echo pll__('Останні матеріали'); ?></h2>
            <div class="hidden md:flex">
                <a href="<?= get_permalink(1157); ?>" class="btn btn-light-blue"><?php echo pll__('Усі публікації'); ?></a>
            </div>
        </div>
        <div class="slick-force-height cases-slider lg:grid lg:grid-cols-3 gap-4">
            <?php while ($posts->have_posts()):
                $posts->the_post(); ?>
                <div
                    class="w-[244px] lg:w-auto mr-3 lg:mr-0 border border-customlightGray rounded-3 p-2 transition-shadow hover:shadow-lg">
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php echo get_permalink(); ?>"
                            class="block xl:mb-6 mb-3 aspect-[1.79/1] bg-cover bg-center rounded-3 overflow-hidden">
                            <picture>
                                <source
                                    srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail-m'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-m-2x'); ?> 2x"
                                    media="(max-width: 768px)">
                                <source
                                    srcset="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>, <?php the_post_thumbnail_url('mccloud-post-thumbnail-2x'); ?> 2x"
                                    media="(min-width: 769px)">
                                <img loading="lazy" class="w-full" src="<?php the_post_thumbnail_url('mccloud-post-thumbnail'); ?>"
                                    alt="<?php the_title(); ?>">
                            </picture>
                        </a>
                    <?php } ?>
                    <div class="md:p-3 p-2 xl:p-5">
                        <a href="<?php echo get_permalink(); ?>"
                            class="block md:text-4 md:leading-5 text-[20px] leading-[28px] font-bold md:mb-3 mb-2 text-dark hover:text-blue"><?php the_title(); ?></a>
                        <div class="text-3 leading-4 text-gray min-h-10 md:mb-4 mb-2">
                            <?php if (get_post_meta(get_the_ID(), 'post_subtitle', true)) { ?>
                                <?php echo get_post_meta(get_the_ID(), 'post_subtitle', true); ?>
                            <?php } else { ?>
                                <?php echo mb_substr(strip_tags(preg_replace("~\[(.+?)\]~", '', get_the_content())), 0, 300) . '...'; ?>
                            <?php } ?>
                        </div>
                        <div class="text-sm leading-[22px] text-[#AEAEB2]"><?php echo get_the_date('d.m.Y'); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata(); ?>