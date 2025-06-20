<?php if ( $posts-> have_posts() ) : ?>
    <h2 class="section_news_title">Новости</h2>
    <div class="container_section_news">
        <div class="section_news_items">
            <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                <div class="section_news_item">
                    <div class="section_news_item_container_img">
                        <a href="<?php echo get_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        </a>
                    </div>
                    <div class="section_news_item_container_info">
                        <a href="<?php echo get_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                        <hr>
                        <span class="date"><?php echo get_the_date('d.m.Y'); ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; wp_reset_postdata(); ?>