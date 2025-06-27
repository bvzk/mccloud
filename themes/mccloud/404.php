<?php
/**
 * Template Name: 404
 * Template Post Type: post, page
 */
?>

<?php get_header();?>
<!--<main id="site-content" role="main">-->
<!--	<div class="section-inner thin error404-content">-->
<!--		<h1 class="entry-title"><?php _e( 'Page Not Found', 'twentytwenty' ); ?></h1>-->
<!--		<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'twentytwenty' ); ?></p></div>-->
<!--	</div>-->
<!--</main>-->

<!--<main id="site-content" role="main">-->
<!--	<div class="section-inner thin error404-content" style="text-align: center;">-->
		
		<!-- Зображення 404 -->
		<!--<img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.png" alt="404 - Не знайдено" style="max-width: 100%; height: auto; margin-bottom: 30px;">-->

<!--		<h1 class="entry-title"><?php _e( 'Сторінку не знайдено', 'twentytwenty' ); ?></h1>-->
		
<!--		<div class="intro-text">-->
<!--			<p><?php _e( 'Сторінка, яку ви шукаєте, не знайдена. Можливо, її було видалено, перейменовано або вона ніколи не існувала.', 'twentytwenty' ); ?></p>-->
<!--			<p><a href="<?php echo home_url('/ua/'); ?>" class="button">Повернутися на головну</a></p>-->
<!--		</div>-->
		
<!--	</div>-->
<!--</main>-->

<!--<div class="px-[16px] md:px-0 max-w-[806px] mx-auto">-->
<!--    <nav aria-label="Breadcrumb" class="mb-4" style="padding-left: 35%">-->
<!--        <ul class="flex text-[#8E8E93] text-3">-->
<!--            <li><a href="--><?php //= home_url(); ?><!--/" class="text-[#8E8E93]">Головна</a></li>-->
<!--            <li><span class="mx-2 inline-block">/</span></li>-->
<!--            --><?php //if (get_post_type() == 'post') { ?>
<!--                <li><a href="--><?php //= get_permalink(1157); ?><!--/" class="text-[#8E8E93]">Блог</a></li>-->
<!--                <li><span class="mx-2 inline-block">/</span></li>-->
<!--            --><?php //} ?>
<!--            --><?php //if (is_404()) { echo '404'; } else { the_title(); } ?>
<!--            <li class="truncate"><span aria-current="page">--><?php //the_title(); ?><!--</span></li>-->
<!--        </ul>-->
<!--    </nav>-->
<!--    <h1 class="mb-3 2xl:mb-6 2xl:text-8 2xl:leading-9">--><?php //the_title(); ?><!--</h1>-->
<!--    --><?php //if (get_post_type() == 'post') { ?>
<!--        <div class="text-[12px] leading-[16px] text-[#AEAEB2]">--><?php //echo get_the_date('d.m.Y'); ?><!--</div>-->
<!--    --><?php //} ?>
<!--</div>-->

<main id="site-content" role="main">
    <div class="error404-wrapper" style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap; padding: 5px 20px; text-align: center;">

        <div class="error404-image" style="flex: 1 1 300px; max-width: 400px; ">
             <img src="/wp-content/themes/mccloud/assets/image/404.png" alt="404"/>
        </div>


        <?php
        $current_url = $_SERVER['REQUEST_URI'];
        if (strpos($current_url, '/ro') !== false): ?>
            <div class="error404-content" style="flex: 1 1 300px; max-width: 600px; padding: 20px;   text-align: left;">
                <h1 class="entry-title" style="font-size: 56px;font-weight: 700;margin-bottom: 20px; line-height: 64px;">Ne pare rău, pagina nu a fost găsită.</h1>
                <div class="intro-text" style="font-size: 18px; line-height: 1.6;">
                    <p>Cel mai probabil, această pagină a fost mutată sau ștearsă. Este posibil să fi făcut o greșeală când ați introdus adresa. Vă rugăm să verificați din nou.</p>
                    <p><a href="<?php echo home_url('/ua/'); ?>" class="button" style="display: inline-block; margin-top: 20px; padding: 12px 24px; background-color: #E8F0FE; color: #4285F4; border-radius: 6px; text-decoration: none;">Pe cea principală</a></p>
                </div>
            </div>

        <?php elseif (strpos($current_url, '/kz') !== false): ?>
            <div class="error404-content" style="flex: 1 1 300px; max-width: 600px; padding: 20px;   text-align: left;">
                <h1 class="entry-title" style="font-size: 56px;font-weight: 700;margin-bottom: 20px; line-height: 64px;">К сожалению, страница не найдена</h1>
                <div class="intro-text" style="font-size: 18px; line-height: 1.6;">
                    <p>Скорее всего, эта страница была перемещена или удалена. Возможно, вы ошиблись при вводе адреса. Проверьте еще раз.</p>
                    <p><a href="<?php echo home_url('/ua/'); ?>" class="button" style="display: inline-block; margin-top: 20px; padding: 12px 24px; background-color: #E8F0FE; color: #4285F4; border-radius: 6px; text-decoration: none;">На главную</a></p>
                </div>
            </div>

        <?php else: ?>
            <div class="error404-content" style="flex: 1 1 300px; max-width: 600px; padding: 20px;   text-align: left;">
                <h1 class="entry-title" style="font-size: 56px;font-weight: 700;margin-bottom: 20px; line-height: 64px;"><?php _e( 'На жаль, сторінку не знайдено', 'twentytwenty' ); ?></h1>
                <div class="intro-text" style="font-size: 18px; line-height: 1.6;">
                    <p><?php _e( 'Скоріш за все, ця сторінка була переміщена або вилучена. Можливо, ви помилилися при вводі адреси. Перевірте, будь ласка, ще раз.', 'twentytwenty' ); ?></p>
                    <p><a href="<?php echo home_url('/ua/'); ?>" class="button" style="display: inline-block; margin-top: 20px; padding: 12px 24px; background-color: #E8F0FE; color: #4285F4; border-radius: 6px; text-decoration: none;">На головну</a></p>
                </div>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer();


