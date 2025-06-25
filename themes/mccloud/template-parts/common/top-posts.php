<?php
    $posts = new WP_Query(array(
        'post_type' => 'post',
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
        'order'      => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        
        'post__not_in' => array(get_the_ID()),
    ));
?>
<?php if ( $posts-> have_posts() ) : ?>
    <div class="bg-lightgreen rounded-[22px] p-4">
        <h2 class="title-text-2 font-semibold xl:font-bold mb-3"><?php echo pll__('Топові статті'); ?></h2>
        <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <a href="<?php echo get_permalink(); ?>" class="block mb-4 text-black text-3 leading-4 
                hover:text-blue" data-views-count="<?=getPostViews(get_the_ID());?>"><?php the_title(); ?></a>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>