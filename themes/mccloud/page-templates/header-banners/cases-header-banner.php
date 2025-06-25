<div class="max-w-[806px] mx-auto pb-[85px] pt-[54px] 2xl:py-[120px] text-center">
    <nav aria-label="Breadcrumb" class="mb-[18px]" itemscope itemtype="https://schema.org/BreadcrumbList">
        <ul class="flex text-[#8E8E93] justify-center text-[14px]">
            <!-- Головна -->
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?= home_url(); ?>/" class="text-[#8E8E93]" itemprop="item">
                    <span itemprop="name"><?php echo pll__('Головна'); ?></span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li><span class="mx-2 inline-block">/</span></li>
            
            <?php if (is_page('cases') && isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) { ?>
                <!-- Сторінка кейсів -->
<!--                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">-->
<!--                <a href="--><?php //= home_url(); ?><!--/cases/" class="text-[#8E8E93]" itemprop="item">-->
<!--                    <span itemprop="name">--><?php //echo pll__('Кейси'); ?><!--</span>-->
<!--                </a>-->
<!--                <meta itemprop="position" content="1" />-->
<!--            </li>-->
<!--            <li><span class="mx-2 inline-block">/</span></li>-->

                <!-- Категорія (остання крихта, без посилання) -->
<!--                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="truncate">-->
<!--                    <span itemprop="name" aria-current="page">--><?php //= $category->name; ?><!--</span>-->
<!--                    <meta itemprop="item" content="--><?php //= get_term_link($category); ?><!--" />-->
<!--                    <meta itemprop="position" content="3" />-->
<!--                </li>-->
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

    <h1 class="mb-4"><?php
    if (is_page('cases') && isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) {
        echo pll__("Кейси для яких використали пакети ") . $category->name;
    } else {
        echo pll__("Наші Кейси");
    }
    ?></h1>
    <div class="text-[20px] leading-[28px] font-medium">
        <?= pll__('Оптимізуйте свої бізнес-процеси з Google Workspace:<br>Підвищуйте продуктивність і співпрацю.'); ?>         
    </div>
</div>