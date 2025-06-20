<?php
$img_url = get_field('page_image');
set_query_var('heroLabel', get_field('page_label'));
set_query_var('heroTitle', get_field('page_title'));
set_query_var('heroSubtitle', get_field('page_subtitle'));
set_query_var('heroPicture', "
   <picture>
                <img width='566' height='540' src='$img_url' alt='Workspace'>
            </picture>
            ");

//             set_query_var('heroPicture', "
//    <picture>
//                 <source type='image/png' srcset='/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 
// , /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 2x' media='(max-width: 768px)'>
//                 <source type='image/png' srcset='/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 
// , /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 2x' media='(min-width: 769px)'>
//                 <source type='image/png' srcset='/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png, /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png  2x'>
//                 <source srcset='/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png, /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 2x' media='(max-width: 768px)'>
//                 <source srcset='/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png, /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 2x' media='(min-width: 769px)'>
//                 <img width='566' height='540' src='/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png' alt='Workspace'>
//             </picture>
//             ");

require get_template_directory() . '/template-parts/common/heroSection.php';