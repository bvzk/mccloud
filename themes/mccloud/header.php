<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Google Tag Manager -->
  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NN5K2ZK');</script>
  <!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if (is_404()) : ?>
                    <link rel="canonical" href="<?php echo esc_url( home_url( add_query_arg( array(), $_SERVER['REQUEST_URI'] ) ) ); ?>" />
					
					<?php $current_url = $_SERVER['REQUEST_URI']; 
						if (strpos($current_url, '/ro') !== false): ?>
					     	<meta name="robots" content="noindex, nofollow">
							<meta name="description" content="Cel mai probabil, această pagină a fost mutată sau ștearsă. Acest posibil să fi făcut o greșeală când ați introdus adresa. Vă rugăm să verificați din nou.">
					<?php elseif (strpos($current_url, '/kz') !== false): ?>
				        	<meta name="robots" content="noindex, nofollow">
							<meta name="description" content="Скорее всего, эта страница была перемещена или удалена. Возможно, вы ошиблись при вводе адреса. Проверьте еще раз.">
					<?php else: ?>
							<meta name="robots" content="noindex, nofollow">
							<meta name="description" content="Швидше за все, ця сторінка була переміщена або вилучена. Можливо, ви помилилися при введенні адреси. Перевірте, будь ласка, ще раз.">
					 
					<?php endif; ?>
				<?php endif; ?>
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--<link rel="alternate" href="https://mccloud.ua" hreflang="uk-UA">-->
  <?= mccloud_get_preload_banner(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>


  <?php /*<script src="https://www.google.com/recaptcha/api.js" async defer></script>*/ ?>
  <?php if (is_paged()): ?>
    <link rel="canonical" href="<?php echo get_pagenum_link(get_query_var('paged')); ?>" />
  <?php endif; ?>
  <?php if (is_page('contacts')): ?>
    <script type="application/ld+json">
                            {
                              "@context": "https://schema.org",
                              "@type": "LocalBusiness",
                              "name": "McCloud",
                              "image": "http://mccloud.global/wp-content/themes/mccloud/image/logo.png", 
                              "url": "https://mccloud.global/kontakti/",
                              "telephone": "+380 44 123 4567",
                              "address": {
                                "@type": "PostalAddress",
                                "streetAddress": "ул. Пушкинская, 23",
                                "addressLocality": "Киев",
                                "addressRegion": "Киевская область",
                                "postalCode": "01001",
                                "addressCountry": "UA"
                              },
                              "openingHours": "Mo-Fr 09:00-18:00",
                              "priceRange": "$$",
                              "geo": {
                                "@type": "GeoCoordinates",
                                "latitude": "50.4501",
                                "longitude": "30.5234"
                              },
                              "contactPoint": {
                                "@type": "ContactPoint",
                                "telephone": "+380 44 123 4567",
                                "contactType": "Customer Service",
                                "areaServed": "UA"
                              },
                              "sameAs": [
                                "https://www.facebook.com/mccloud",
                                "https://www.instagram.com/mccloud",
                                "https://www.linkedin.com/company/mccloud"
                              ]
                            }
                            </script>
  <?php endif; ?>

  <?php if (is_single()): ?>
    <script type="application/ld+json">
                        {
                          "@context": "https://schema.org",
                          "@type": "Article",
                          "mainEntityOfPage": {
                            "@type": "WebPage",
                            "@id": "<?php echo get_permalink(); ?>"
                          },
                          "headline": "<?php echo get_the_title(); ?>",
                          "image": "<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>",
                          "datePublished": "<?php echo get_the_date('c'); ?>",
                          "dateModified": "<?php echo get_the_modified_date('c'); ?>",
                          "author": {
                            "@type": "Person",
                            "name": "<?php the_author_meta('display_name'); ?>"
                          },
                          "publisher": {
                            "@type": "Organization",
                            "name": "mcCloud",
                            "logo": {
                              "@type": "ImageObject",
                              "url": "<?php echo get_template_directory_uri(); ?>/path-to-your-logo.png"
                            }
                          },
                          "description": "<?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>",
                          "articleBody": "<?php echo wp_strip_all_tags(get_the_content()); ?>"
                        }
                        </script>
  <?php endif; ?>

</head>

<body <?php body_class(); ?>>
  <?php $bi = 1; ?>
<?php if (!is_front_page()) { ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": <?= $bi++; ?>,
                "name": "mcCloud",
                "item": "<?= home_url(); ?>"
            },<?php if ($cateogries = get_the_category(get_the_ID())) {
                foreach (array_reverse($cateogries) as $cateogry) { ?>
                    {
                        "@type": "ListItem",
                        "position": <?= $bi++; ?>,
                        "name": "<?= str_replace('Новини', 'Блог', $cateogry->name); ?>",
                        "item": "<?= str_replace('category/novini/', 'blog/', get_category_link($cateogry->term_id)); ?>"
                    },
                <?php }
            } ?>{
                "@type": "ListItem",
                "position": <?= $bi++; ?>,
                "name": "<?php the_title(); ?>",
                "item": "<?php the_permalink(get_the_ID()); ?>"
            }]
        }
    </script>
<?php } ?>
	
	<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SiteNavigationElement",
  "name": "Обладнання",
  "url": "https://mccloud.global/obladnannya",
  "potentialAction": [
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/chromebook",
      "name": "Chromebook"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/monoblok",
      "name": "Моноблоки"
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SiteNavigationElement",
  "name": "Продукти",
  "url": "https://mccloud.global/products",
  "potentialAction": [
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/workspace",
      "name": "Google Workspace"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-vault-safe",
      "name": "Google Vault (сейф)"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/cloud-identity",
      "name": "Cloud Identity"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/appsheet",
      "name": "AppSheet"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/gemini",
      "name": "Gemini"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/chrome-enterprise",
      "name": "Chrome Enterprise"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/spinbackup",
      "name": "Spinbackup"
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SiteNavigationElement",
  "name": "Рішення",
  "url": "https://mccloud.global/solutions",
  "potentialAction": [
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-workspace-for-human-resourses",
      "name": "For human resources"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-workspace-for-legal",
      "name": "For legal services"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-workspace-for-healthcare",
      "name": "For healthcare"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-workspace-for-entrepreneurs",
      "name": "For entrepreneurs"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-workspace-for-education",
      "name": "For education"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-workspace-for-it-industry",
      "name": "For IT-industry"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-workspace-for-finance",
      "name": "For finance"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/google-workspace-for-marketing",
      "name": "For marketing"
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SiteNavigationElement",
  "name": "Прайс",
  "url": "https://mccloud.global/price",
  "potentialAction": [
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/paketi-business",
      "name": "Пакети Google Workspace Business"
    },
    {
      "@type": "ViewAction",
      "target": "https://mccloud.global/paketi-enterprise",
      "name": "Пакети Google Workspace Enterprise"
    }
  ]
}
</script>


  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NN5K2ZK" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <?php wp_body_open(); ?>

  <div class="hidden md:flex">
    <div class="w-1/5 h-1 bg-blue"></div>
    <div class="w-1/5 h-1 bg-yellow"></div>
    <div class="w-1/5 h-1 bg-green"></div>
    <div class="w-1/5 h-1 bg-yellow"></div>
    <div class="w-1/5 h-1 bg-blue"></div>
  </div>

  <div class="hidden md:flex justify-center leading-6 py-3">
    Як обрати тарифний план Google Workspace - <a href="<?php echo get_permalink(1107); ?>">Дізнатися більше</a>
  </div>

  <div class="max-w-[1920px] xl:px-4 md:px-2 mx-auto">
    <div
      class="header-wrapper <?= (1 == 1 ? 'is-home' : ''); ?> bg-lightgreen relative md:rounded-5 mb-5 <?php if (!is_404()) { ?> 2xl:mb-[120px] <?php }  ?>">
      <div class="md:p-3 !pb-0 z-20 relative">
        <?php require get_template_directory() . '/template-parts/common/header.php'; ?>
      </div>
      <?php
      if (mccloud_get_page_banner() && file_exists(mccloud_get_page_banner())) { ?>
        <div class="relative <?= (1 == 1 ? 'overflow-x-hidden' : ''); ?>">
          <div class="z-10 relative">
            <?php require mccloud_get_page_banner(); ?>
          </div>
        </div>
      <?php } ?>
    </div>