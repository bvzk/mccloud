<div class="px-[16px] md:px-0 max-w-[806px] mx-auto
<?php if (get_post_type() == 'post') { ?> pb-[85px] <?php } else { ?> pb-[34px] <?php } ?> pt-[54px]
">
    <nav aria-label="Breadcrumb" class="mb-4" <?php if (is_404()) { ?> style="padding-left: 35%" <?php }  ?> >
        <ul class="flex text-[#8E8E93] text-3" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?= home_url(); ?>/" class="text-[#8E8E93]" itemprop="item">
                   <?php echo pll__('Головна'); ?>
               </a>
                <meta itemprop="position" content="1" />
            </li>
            <li><span class="mx-2 inline-block">/</span></li>

            <?php if (get_post_type() == 'post') {  ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" >
                    <a href="<?= get_permalink(1157); ?>" class="text-[#8E8E93]" itemprop="item"><?php echo pll__('Блог'); ?></a>
         
                    <meta itemprop="item" content="<?= get_permalink(); ?>" />
                    <meta itemprop="position" content="2" />
                </li>
                <li><span class="mx-2 inline-block">/</span></li>
            <?php } ?>
            <?php if (is_404()) { ?>
                 <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="truncate">
                    <span itemprop="name" aria-current="page"><?php echo pll__('Сторінку не знайдено'); ?></span>
                    <meta itemprop="position" content="3" />
                 </li>

            <?php  } else { ?>
                 <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="truncate">
                    <span itemprop="name" aria-current="page"><?php   the_title(); ?></span>
                    <meta itemprop="position" content="3" />
                </li>
                <?php } ?>

        </ul>
    </nav>
    <h1 class="mb-3 2xl:mb-6 2xl:text-8 2xl:leading-9"><?php the_title(); ?></h1>
    <?php if (get_post_type() == 'post') { ?>
        <div class="text-[12px] leading-[16px] text-[#AEAEB2]"><?php echo get_the_date('d.m.Y'); ?></div>
    <?php } ?>
</div>