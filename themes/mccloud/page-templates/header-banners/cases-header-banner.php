<div class="max-w-[806px] mx-auto pb-[85px] pt-[54px] 2xl:py-[120px] text-center">
       <nav aria-label="Breadcrumb" class="mb-[18px]">
        <ul class="flex text-[#8E8E93] justify-center text-[14px]">
            <li><a href="<?= home_url(); ?>/" class="text-[#8E8E93]">Головна</a></li>
            <li><span class="mx-2 inline-block mx-2">/</span></li>
            <?php if (is_page('cases') && isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) { ?>
                <li><a href="<?= get_permalink(1147); ?>/" class="text-[#8E8E93]"><?php the_title(); ?></a></li>
                <li><span class="mx-2 inline-block mx-2">/</span></li>
                <li class="truncate"><span aria-current="page"><?= $category->name; ?></span></li>
            <?php } else { ?>
                <li class="truncate"><span aria-current="page"><?php the_title(); ?></span></li>
            <?php } ?>
        </ul>
    </nav> 
    <h1 class="mb-4"><?php
    if (is_page('cases') && isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) {
        echo "Кейси для яких використали пакети " . $category->name;
    } else {
        echo "Наші Кейси";
    }
    ?></h1>
    <div class="text-[20px] leading-[28px] font-medium">
        Оптимізуйте свої бізнес-процеси з Google Workspace: <br>
        Підвищуйте продуктивність і співпрацю.
    </div>
    
        <form action="<?=get_nopaging_url();?>" method="get">
        <div class="border border-customlightGray bg-white rounded-lg flex grow w-[450px] max-w-full mx-auto mt-5 2xl:mt-11">
            <input type="search" class="text-3 text-[#848484] grow border-0 p-3 rounded-2 focus:border-transparent focus:ring-0"
                   name="search" value="<?=htmlspecialchars(get_query_var('search'));?>" placeholder="Пошуковий запит">
            <button class="border-0 bg-none py-0 px-[14px]">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.7603 14.6033L12.1815 11.0246C13.0928 9.86515 13.637 8.40415 13.637 6.81851C13.637 3.05875 10.5782 0 6.81845 0C3.05875 0 0 3.05875 0 6.81851C0 10.5782 3.05875 13.6369 6.81845 13.6369C8.40409 13.6369 9.86509 13.0928 11.0245 12.1816L14.6033 15.7603C14.763 15.9201 14.9724 16 15.1818 16C15.3912 16 15.6006 15.9201 15.7603 15.7603C16.0799 15.4409 16.0799 14.9228 15.7603 14.6033ZM1.63636 6.81851C1.63636 3.96104 3.96104 1.63636 6.81845 1.63636C9.67593 1.63636 12.0006 3.96104 12.0006 6.81845C12.0006 9.67587 9.67593 12.0005 6.81845 12.0005C3.96104 12.0005 1.63636 9.67587 1.63636 6.81851Z" fill="#170C37"/>
                    <path d="M15.7603 14.6033L12.1815 11.0246C13.0928 9.86515 13.637 8.40415 13.637 6.81851C13.637 3.05875 10.5782 0 6.81845 0C3.05875 0 0 3.05875 0 6.81851C0 10.5782 3.05875 13.6369 6.81845 13.6369C8.40409 13.6369 9.86509 13.0928 11.0245 12.1816L14.6033 15.7603C14.763 15.9201 14.9724 16 15.1818 16C15.3912 16 15.6006 15.9201 15.7603 15.7603C16.0799 15.4409 16.0799 14.9228 15.7603 14.6033ZM1.63636 6.81851C1.63636 3.96104 3.96104 1.63636 6.81845 1.63636C9.67593 1.63636 12.0006 3.96104 12.0006 6.81845C12.0006 9.67587 9.67593 12.0005 6.81845 12.0005C3.96104 12.0005 1.63636 9.67587 1.63636 6.81851Z" fill="black" fill-opacity="0.2"/>
                </svg>
            </button>
        </div>
    </form>
</div>