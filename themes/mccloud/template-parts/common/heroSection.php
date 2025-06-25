<?php
$label = get_query_var('heroLabel', "");
$title = get_query_var('heroTitle', "");
$subtitle = get_query_var('heroSubtitle', "");
$picture = get_query_var('heroPicture', "");
$customHtml = get_query_var('heroCustomHtml', "");
$heroLabelContent = "";

// Check if label is a string and not empty
if (is_string($label) && $label != "") {
    $heroLabelContent = "
      <div class=\"badge inline-block border border-orange text-orange font-medium mb-2 md:mb-[19px]\">
                $label
            </div>
    ";
} elseif (is_array($label) && !empty($label)) {
    // Handle case when label is an array
    ob_start();
    foreach ($label as $text) {
        if (is_string($text)) { // Ensure the array contains strings
            ?>
            <div class="badge inline-block border border-orange text-orange font-medium mb-2 md:mb-[19px]">
                <?= esc_html($text); ?>
            </div>
            <?php
        }
    }
    $heroLabelContent = ob_get_clean();
} else {
    // Handle unexpected types or empty label
    $heroLabelContent = "";
}


if (empty($title)) {
    $title = pll__("Про компанію mcCloud", "");
}

if (empty($subtitle)) {
    $subtitle = pll__("mcCloud - офіційний партнер Google Cloud в Україні. Ми підвищуємо ефективність роботи наших клієнтів через впровадження хмарних рішень.", "");
}

if (empty($picture)) {
    $picture = "
      <picture>
          <source type='image/webp'
              srcset='/wp-content/themes/mccloud/image/about-banner-m.webp, /wp-content/themes/mccloud/image/about-banner-m-2x.webp 2x'
              media='(max-width: 768px)'>
          <source type='image/webp'
              srcset='/wp-content/themes/mccloud/image/about-banner.webp, /wp-content/themes/mccloud/image/about-banner-2x.webp 2x'
              media='(min-width: 769px)'>
          <source type='image/webp'
              srcset='/wp-content/themes/mccloud/image/about-banner.webp, /wp-content/themes/mccloud/image/about-banner-2x.webp 2x'>
          <source
              srcset='/wp-content/themes/mccloud/image/about-banner-m.png, /wp-content/themes/mccloud/image/about-banner-m-2x.png 2x'
              media='(max-width: 768px)'>
          <source
              srcset='/wp-content/themes/mccloud/image/about-banner.png, /wp-content/themes/mccloud/image/about-banner-2x.png 2x'
              media='(min-width: 769px)'>
          <img width='566' height='540' src='/wp-content/themes/mccloud/image/about-banner.png' alt='About us'>
      </picture>
    ";
}


?>

<div class="max-w-[806px] mx-auto text-center overflow-hidden" style="padding-top: 60px;">
    <nav aria-label="Breadcrumb" class="mb-[18px] md:block" >


        <ul class="flex text-[#8E8E93] justify-center text-[14px]" itemscope itemtype="https://schema.org/BreadcrumbList">

            <!-- Головна -->
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?= home_url(); ?>/" class="text-[#8E8E93]" itemprop="item">
                    <span itemprop="name"><?php echo pll__('Головна'); ?></span>
                </a>
                <meta itemprop="position" content="1" />
            </li>


            <li><span class="mx-2 inline-block">/</span></li>

            <?php if( is_page( 'blog' ) && isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) { ?>

                <!-- Сторінка блогу -->
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="<?= get_permalink(1157); ?>" class="text-[#8E8E93]" itemprop="item">
                        <span itemprop="name"><?php the_title(); ?></span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>
                <li><span class="mx-2 inline-block">/</span></li>

                <!-- Категорія блогу (остання крихта, без посилання) -->
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="truncate">
                    <span itemprop="name" aria-current="page"><?= $category->name; ?></span>
                    <meta itemprop="item" content="<?= get_term_link($category); ?>" />
                    <meta itemprop="position" content="3" />
                </li>
            <?php } else { ?>
                <!-- Поточна сторінка (остання крихта, без посилання) -->
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="truncate">
                    <span itemprop="name" aria-current="page"><?php the_title(); ?></span>
                    <meta itemprop="item" content="<?= get_permalink(); ?>" />
                    <meta itemprop="position" content="2" />
                </li>
            <?php } ?>
        </ul>
    </nav>


</div>

<div class="xl:py-[120px] lg:py-7 md:py-6 py-5">
    <div class="container flex flex-col-reverse md:flex-row md:items-center">
        <div class="w-full z-20 bg-lightgreen md:pr-7">
            <!-- <div class="badge inline-block border border-orange text-orange font-medium mb-4"> -->
            <?php echo $heroLabelContent; ?>
            <!-- </div> -->
            <h1 class="2xl:text-8 lg:text-5 md:text-4 2xl:leading-9 lg:leading-6 md:leading-5 text-5 leading-6 md:mb-4 mb-3 2xl:mb-6 font-bold">
                <?php echo $title; ?>
            </h1>
            <div class="text-3 xl:text-[20px] leading-4 xl:leading-[28px] font-medium mb-6">
                <?php echo $subtitle; ?>
            </div>

            <?php
            if (empty($customHtml)) { ?>
                <div class="flex">
                    <a href="<?php echo get_field('header_link') ? home_url()  . get_field('header_link') : '#consultForm'?>" class="btn btn-lg btn-success md:w-auto w-full text-center"><?php echo pll__('Замовити'); ?></a>
                </div>
                <?php
            } else { ?>
                <?php echo $customHtml; ?>
                <?php
            }
            ?>
        </div>
        <div class="md:w-full max-w-[566px] mb-6 md:mb-0">
            <?php echo $picture; ?>
        </div>
    </div>
</div>