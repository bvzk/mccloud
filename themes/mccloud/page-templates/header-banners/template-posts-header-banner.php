<div class="px-[16px] md:px-0 max-w-[806px] mx-auto pb-[85px] pt-[54px] text-center">
    <nav aria-label="Breadcrumb" class="mb-[18px]">
        <ul class="flex text-[#8E8E93] justify-center text-[14px]" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?=home_url();?>/" class="text-[#8E8E93]" itemprop="item">
                <span itemprop="name">    <?php echo pll__('Головна'); ?></span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li>
                <span class="mx-2 inline-block mx-2">/</span>
            </li>
            <li class="truncate" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span aria-current="page" itemprop="name">
                    <?php echo pll__('Блог'); ?>
                </span>
                <meta itemprop="position" content="3" />
            </li>
        </ul>
    </nav>

    <h1><?php echo pll__('Наш блог'); ?></h1>
    <div class="text-[18px] leading-[28px] font-medium">
        <?php echo pll__('Інсайти та історії: Занурення у світ наших думок та досвіду'); ?>
    </div>
</div>
