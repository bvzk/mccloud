<?php
set_query_var('heroLabel', 'Google Workspace');
set_query_var('heroTitle', pll__('Google Workspace Enterprise: <br> Масштабні рішення для <br> великих підприємств'));
set_query_var('heroSubtitle', pll__('Google Workspace Enterprise пропонує розширений набір інструментів та функцій, які відповідають вимогам найбільших компаній. Збільште продуктивність, забезпечте безпеку даних та підвищте спільну роботу вашої команди.'));
set_query_var('heroPicture', "
<picture>
                <source type='image/webp' srcset='/wp-content/themes/mccloud/assets/image/enterprise-header-banner-m.webp, /wp-content/themes/mccloud/assets/image/enterprise-header-banner-m-2x.webp 2x' media='(max-width: 768px)'>
                <source type='image/webp' srcset='/wp-content/themes/mccloud/assets/image/enterprise-header-banner.webp, /wp-content/themes/mccloud/assets/image/enterprise-header-banner-2x.webp 2x' media='(min-width: 769px)'>
                <source type='image/webp' srcset='/wp-content/themes/mccloud/assets/image/enterprise-header-banner.webp, /wp-content/themes/mccloud/assets/image/enterprise-header-banner-2x.webp 2x'>
                <source srcset='/wp-content/themes/mccloud/assets/image/enterprise-header-banner-m.png, /wp-content/themes/mccloud/assets/image/enterprise-header-banner-m-2x.png 2x' media='(max-width: 768px)'>
                <source srcset='/wp-content/themes/mccloud/assets/image/enterprise-header-banner.png, /wp-content/themes/mccloud/assets/image/enterprise-header-banner-2x.png 2x' media='(min-width: 769px)'>
                <img width='566' height='540' src='/wp-content/themes/mccloud/assets/image/enterprise-header-banner.png' alt='Enterprise'>
            </picture>
            ");

require get_template_directory() . '/template-parts/common/heroSection.php';
