<?php
// set_query_var('heroLabel', 'Google Workspace');
$img_url = get_field('product_top_banner_image');
set_query_var('heroTitle', get_field('product_title'));
set_query_var('heroSubtitle', get_field('product_subtitle'));
set_query_var('heroPicture', "
   <picture>
                <img width='566' height='540' src='$img_url' alt='Workspace'>
            </picture>
            ");

require get_template_directory() . '/template-parts/common/heroSection.php';