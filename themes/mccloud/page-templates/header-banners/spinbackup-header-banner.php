<?php
$img_url = get_field("page_image");
set_query_var("heroLabel", get_field("page_label"));
set_query_var("heroTitle", get_field("page_title"));
set_query_var("heroSubtitle", get_field("page_subtitle"));
set_query_var("heroPicture", "
   <picture>
                <img width='566' height='540' src='$img_url' alt='Workspace'>
            </picture>
            ");

//             set_query_var("heroPicture", "
//    <picture>
//                 <source type="image/png" srcset="/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 
// , /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 2x" media="(max-width: 768px)">
//                 <source type="image/png" srcset="/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 
// , /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 2x" media="(min-width: 769px)">
//                 <source type="image/png" srcset="/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png, /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png  2x">
//                 <source srcset="/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png, /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 2x" media="(max-width: 768px)">
//                 <source srcset="/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png, /wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png 2x" media="(min-width: 769px)">
//                 <img width="566" height="540" src="/wp-content/uploads/2024/07/yaki-buvaiut-versii-google-workspace-1200x673-optimized.png" alt="Workspace">
//             </picture>
//             ");
if (!empty(get_field("submission_link")) && !empty(get_field("demo_link"))) {
set_query_var("heroCustomHtml", '
    <div class="flex gap-3 flex-col md:flex-row">
        <a href="' . get_field("submission_link")['url'] . '" class="btn btn-customLightGreen md:hidden text-center btn-light-success bg-customLightGreen w-full md:w-auto min-w-[200px] md:mr-[21.5px] mr-0">
            ' . get_field("submission_link")["title"] . '
        </a>
        <a href="' . get_field("demo_link")['url'] . '" class="btn btn-lg text-center btn-success w-full md:w-auto min-w-[200px] md:mr-[21.5px] mr-0">
            ' . get_field("demo_link")["title"] . '
        </a>
        <a class="hidden xl:block" href="' . get_field("submission_link")['url'] . '">
            <div class="btn btn-lg btn-light-success">
                ' . get_field("submission_link")['title'] . '
            </div>
        </a>
    </div>
');
} elseif (!empty(get_field("submission_link")) && empty(get_field("demo_link"))) {
    set_query_var("heroCustomHtml", '
    <div class="flex gap-3 flex-col md:flex-row">
        <a href="' . get_field("submission_link")['url'] . '" class="btn btn-customLightGreen md:hidden text-center btn-light-success bg-customLightGreen w-full md:w-auto min-w-[200px] md:mr-[21.5px] mr-0">
            ' . get_field("submission_link")["title"] . '
        </a>
        <a class="hidden xl:block" href="' . get_field("submission_link")['url'] . '">
            <div class="btn btn-lg btn-light-success">
                ' . get_field("submission_link")['title'] . '
            </div>
        </a>
    </div>
');
} elseif (empty(get_field("submission_link")) && !empty(get_field("demo_link"))) {
    set_query_var("heroCustomHtml", '
    <div class="flex gap-3 flex-col md:flex-row">
        <a href="' . get_field("demo_link")['url'] . '" class="btn btn-lg text-center btn-success w-full md:w-auto min-w-[200px] md:mr-[21.5px] mr-0">
            ' . get_field("demo_link")["title"] . '
        </a>
    </div>
');
}


require get_template_directory() . "/template-parts/common/heroSection.php";

