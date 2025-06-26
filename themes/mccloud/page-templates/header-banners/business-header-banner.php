<?php
set_query_var('heroLabel', 'Google Workspace');
set_query_var('heroTitle', pll__('Google Workspace Business:<br>перший крок до трансформації вашого бізнесу'));
set_query_var('heroSubtitle', pll__('Google Workspace забезпечує надійне хмарне рішення, яке дає змогу вашій компанії працювати будь-де, будь-коли, з упевненістю в безпеці даних і доступом до спільної роботи в режимі реального часу.'));
// set_query_var('heroPicture', "
//      <picture>
//                 <source type='image/webp'
//                     srcset='/wp-content/themes/mccloud/assets/image/business-header-banner-m.webp, /wp-content/themes/mccloud/assets/image/business-header-banner-m-2x.webp 2x'
//                     media='(max-width: 768px)'>
//                 <source type='image/webp'
//                     srcset='/wp-content/themes/mccloud/assets/image/business-header-banner.webp, /wp-content/themes/mccloud/assets/image/business-header-banner-2x.webp 2x'
//                     media='(min-width: 769px)'>
//                 <source type='image/webp'
//                     srcset='/wp-content/themes/mccloud/assets/image/business-header-banner.webp, /wp-content/themes/mccloud/assets/image/business-header-banner-2x.webp 2x'>
//                 <source
//                     srcset='/wp-content/themes/mccloud/assets/image/business-header-banner-m.png, /wp-content/themes/mccloud/assets/image/business-header-banner-m-2x.png 2x'
//                     media='(max-width: 768px)'>
//                 <source
//                     srcset='/wp-content/themes/mccloud/assets/image/business-header-banner.png, /wp-content/themes/mccloud/assets/image/business-header-banner-2x.png 2x'
//                     media='(min-width: 769px)'>
//                 <img width='566' height='540' src='/wp-content/themes/mccloud/assets/image/business-header-banner.png'
//                     alt='Business'>
//             </picture>
//             ");


            $current_url = $_SERVER['REQUEST_URI']; 
                if (strpos($current_url, '/ro') !== false): 
                     set_query_var('heroPicture', "
                                <picture>
                                    <img width='566' height='540' src='/wp-content/uploads/2025/04/frame-35113.png' alt='Business'>
                                </picture>
                                "); 
                       
                 elseif (strpos($current_url, '/kz') !== false): 
                     
                      set_query_var('heroPicture', "
                                <picture>
                                    <img width='566' height='540' src='/wp-content/uploads/2025/04/frame-35113.png' alt='Business'>
                                </picture>
                                "); 
                else: 
                    set_query_var('heroPicture', "
                         <picture>
                                    <source type='image/webp'
                                        srcset='/wp-content/themes/mccloud/assets/image/business-header-banner-m.webp, /wp-content/themes/mccloud/assets/image/business-header-banner-m-2x.webp 2x'
                                        media='(max-width: 768px)'>
                                    <source type='image/webp'
                                        srcset='/wp-content/themes/mccloud/assets/image/business-header-banner.webp, /wp-content/themes/mccloud/assets/image/business-header-banner-2x.webp 2x'
                                        media='(min-width: 769px)'>
                                    <source type='image/webp'
                                        srcset='/wp-content/themes/mccloud/assets/image/business-header-banner.webp, /wp-content/themes/mccloud/assets/image/business-header-banner-2x.webp 2x'>
                                    <source
                                        srcset='/wp-content/themes/mccloud/assets/image/business-header-banner-m.png, /wp-content/themes/mccloud/assets/image/business-header-banner-m-2x.png 2x'
                                        media='(max-width: 768px)'>
                                    <source
                                        srcset='/wp-content/themes/mccloud/assets/image/business-header-banner.png, /wp-content/themes/mccloud/assets/image/business-header-banner-2x.png 2x'
                                        media='(min-width: 769px)'>
                                    <img width='566' height='540' src='/wp-content/themes/mccloud/assets/image/business-header-banner.png'
                                        alt='Business'>
                                </picture>
                                "); 
                    
                 endif; 

require get_template_directory() . '/template-parts/common/heroSection.php';


    