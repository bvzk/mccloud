<?php
/**
 * Template Name: Posts Page
 * Template Post Type: post, page
 */

get_header();
?>

<?php
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

$args = array(
    'post_type'=> 'post',
    'orderby'    => 'date',
    'post_status' => 'publish',
    'order'    => 'DESC',
//    'posts_per_page' => -1,
    'posts_per_page' => 5,
    'paged' => $paged
);

$posts = new WP_Query($args);

?>

<main class="my-[50px] mb-default container mx-auto px-[16px] xl:px-0" id="site-content" role="main">
    <div class="flex items-center mb-[70px] overflow-x-auto">
        <a href="#" class="btn text-nowrap btn-light-success mr-5">Усі категорії</a>
        <a href="#" class="btn text-nowrap btn-light border-[#F2F2F7] text-black mr-5">Google</a>
        <a href="#" class="btn text-nowrap btn-light border-[#F2F2F7] text-black mr-5">Google Workspace</a>
        <a href="#" class="btn text-nowrap btn-light border-[#F2F2F7] text-black mr-5">Team</a>
        <a href="#" class="btn text-nowrap btn-light border-[#F2F2F7] text-black mr-5">Zoom</a>
        <a href="#" class="btn text-nowrap btn-light border-[#F2F2F7] text-black mr-5">Enterprize</a>
        <a href="#" class="btn text-nowrap btn-light border-[#F2F2F7] text-black mr-5">Поради та інсайти</a>
        <a href="#" class="btn text-nowrap btn-light border-[#F2F2F7] text-black mr-5">Корпаротивні плани</a>
    </div>
    <div class="posts-slider lg:grid lg:grid-cols-3 lg:gap-[34px] mb-[32px] m-[-10px]">
        <?php if ( $posts-> have_posts() ) : ?>
            <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                <div class="w-[284px] lg:w-auto mr-[20px] lg:mr-0 bg-lightgreen hover:bg-white rounded-[22px] p-2 card-shadow">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="block rounded-[12px]">
                    <div class="px-[12px] lg:px-[32px] py-[29px] lg:py-[38px]">
                        <a href="<?php echo get_permalink(); ?>" class="block mb-[25px] text-dark hover:text-blue">
                            <h2 class="text-[22px] leading-[30px] font-bold"><?php the_title(); ?></h2>
                        </a>

                        <div class="text-[15px] leading-[23px] text-gray mb-[43px] min-h-[71px]">
                            <?php echo get_post_meta(get_the_ID(), 'post_subtitle', true); ?>
                        </div>
                        <div class="text-sm leading-[22px] text-[#AEAEB2]"><?php echo get_the_date('d.m.Y'); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
    </div>

    <div class="hidden lg:flex justify-between mt-[19px] px-[18px]">
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
        <a href="#" class="w-4/12 bg-[#F8F8F8] text-[14px] leading-[22px] py-[14px] rounded-lg text-center text-black">
            Показати ще
        </a>
    </div>
</main>

<?php /*
 <main class="site-main" id="site-content" role="main">
    <div class="post-inner thin">
        <div class="entry-content">
            <div class="posts_container maxwidth1024">
                <?php if ( $posts-> have_posts() ) : ?>
                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <div class="post_item">
                            <div class="post_item_image">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="post_item_content">
                                <div class="post_item_content_bg">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                    <hr>
                                    <span class="date">
                                        <?php echo get_the_date('d.m.Y'); ?>
                                    </span>
                                    <p>
                                        <?php echo get_post_meta(get_the_ID(), 'post_subtitle', true); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</main>
*/ ?>
<?php get_footer(); ?>


