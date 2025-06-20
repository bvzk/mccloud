<?php

$post_categories = get_the_category(get_the_ID());
$labels = [];  // Initialize an array to hold category names

if ($post_categories) {
    foreach ($post_categories as $post_category) {
        if ($post_category->category_parent > 0) {
            $labels[] = $post_category->name;  // Only add category name to the labels array
        }
    }
}

set_query_var('heroLabel', $labels ?: '');
set_query_var('heroTitle', the_title("", "", false));
set_query_var('heroSubtitle', get_post_meta(get_the_ID(), 'post_subtitle', true));
set_query_var('heroCustomHtml', "
<div class=\"flex\">
<a href=\"#consultForm\" class=\"btn btn-lg btn-success\">Замовити послугу</a>
</div>
");

$thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
$post_title = get_the_title();

// Create the HTML string for the hero picture
$heroPicture = "
    <img src=\"{$thumbnail_url}\" alt=\"{$post_title}\" class=\"rounded-[22px] max-w-full\" width=\"517\" height=\"517\">
";

// Set the query variable
set_query_var('heroPicture', $heroPicture);
require get_template_directory() . '/template-parts/common/heroSection.php';
