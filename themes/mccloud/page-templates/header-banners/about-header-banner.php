<?php
set_query_var('heroCustomHtml', "
      <div class='flex gap-2 justify-start'>
                <img src='/wp-content/themes/mccloud/image/partner.png' alt='' class='w-[100px] rounded-3'>
                <img src='/wp-content/themes/mccloud/image/education-partner.png' alt='' class='w-[130px] rounded-3'>
                <img src='/wp-content/themes/mccloud/image/cloud.png' alt='' class='w-[100px] rounded-3'>
            </div>
");

require get_template_directory() . '/template-parts/common/heroSection.php';