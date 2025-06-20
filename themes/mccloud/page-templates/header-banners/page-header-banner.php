<div class="px-[16px] md:px-0 max-w-[806px] mx-auto
<?php if (get_post_type() == 'post') { ?> pb-[85px] <?php } else { ?> pb-[34px] <?php } ?> pt-[54px]
">
    <nav aria-label="Breadcrumb" class="mb-4">
        <ul class="flex text-[#8E8E93] text-3">
            <li><a href="<?= home_url(); ?>/" class="text-[#8E8E93]">Головна</a></li>
            <li><span class="mx-2 inline-block">/</span></li>
            <?php if (get_post_type() == 'post') { ?>
                <li><a href="<?= get_permalink(1157); ?>/" class="text-[#8E8E93]">Блог</a></li>
                <li><span class="mx-2 inline-block">/</span></li>
            <?php } ?>
            <li class="truncate"><span aria-current="page"><?php the_title(); ?></span></li>
        </ul>
    </nav>
    <h1 class="mb-3 2xl:mb-6 2xl:text-8 2xl:leading-9"><?php the_title(); ?></h1>
    <?php if (get_post_type() == 'post') { ?>
        <div class="text-[12px] leading-[16px] text-[#AEAEB2]"><?php echo get_the_date('d.m.Y'); ?></div>
    <?php } ?>
</div>