
<div class="max-w-[806px] mx-auto text-center overflow-hidden" style="padding-top: 60px;">
    <nav aria-label="Breadcrumb" class="mb-[18px] hidden md:block">
        <ul class="flex text-[#8E8E93] justify-center text-[14px]">
            <li><a href="<?=home_url();?>/" class="text-[#8E8E93]">Головна</a></li>
            <li><span class="mx-2 inline-block">/</span></li>
            <?php if( is_page( 'blog' ) && isset($_GET['term_id']) && $category = get_category_by_slug($_GET['term_id'])) { ?>
                <li><a href="<?= get_permalink(1157); ?>/" class="text-[#8E8E93]"><?php the_title(); ?></a></li>
                <li><span class="mx-2 inline-block">/</span></li>
                <li class="truncate"><span aria-current="page"><?= $category->name; ?></span></li>
            <?php } else { ?>
                <li class="truncate"><span aria-current="page"><?php the_title(); ?></span></li>
            <?php } ?>
        </ul>
    </nav>
 </div>
<div class="container flex flex-col lg:flex-row py-11 2xl:py-[120px]">
    <div class="lg:w-5/12 xl:pr-[144px]">
        <h1 class="title-text-2 mb-6 font-semibold">Контакти компанії</h1>
        <div class="text-3 mb-6">
            Маєте питання щодо хмарних сервісів? Наша команда доступна з 9:00 до 18:00 у робочі дні. Звертайтеся до нас,
            адже ми спеціалізуємося на наданні високоякісних послуг у сфері хмарних технологій.
        </div>
        <div class="flex items-top mb-3">
            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="22.5" cy="22.5" r="22.5" fill="white"/>
                <path d="M30.0786 26.3123C28.7496 25.1756 27.4008 24.4871 26.0881 25.6221L25.3043 26.308C24.7307 26.806 23.6644 29.1327 19.5417 24.39C15.4198 19.6534 17.8727 18.9159 18.447 18.4223L19.2352 17.7354C20.541 16.5979 20.0482 15.1658 19.1064 13.6917L18.538 12.7988C17.5919 11.3281 16.5617 10.3622 15.2524 11.4981L14.5449 12.1162C13.9663 12.5378 12.3488 13.908 11.9564 16.5111C11.4842 19.6345 12.9738 23.2113 16.3865 27.1357C19.7949 31.0618 23.1321 33.0339 26.2933 32.9996C28.9205 32.9712 30.5071 31.5615 31.0033 31.0489L31.7133 30.4299C33.0192 29.2949 32.2078 28.1393 30.8779 27L30.0786 26.3123Z" fill="#34A853"/>
            </svg>
            <div class="ml-[41px]">
               
                 <?php
                    $current_url = $_SERVER['REQUEST_URI']; 
                if (strpos($current_url, '/ro') !== false): ?>
                       <div class="text-[18px] leading-[28px] font-bold ">+40 31 2295907</div>
                       <div class="text-[18px] leading-[28px] font-bold ">+40 79 2249699</div>
                       
                       
               <?php elseif (strpos($current_url, '/kz') !== false): ?>
               
                     <div class="text-[18px] leading-[28px] font-bold ">+77717999822</div>
                      <div class="text-[18px] leading-[28px] font-bold ">+77717999773</div>
                       <div class="text-[18px] leading-[28px] font-bold ">+77773549461</div> 

                <?php else: ?>
                     <div class="text-[18px] leading-[28px] font-bold ">+067 911 58 68  </div>
                      <div class="text-[18px] leading-[28px] font-bold ">+050 468 05 65</div>
                       <div class="text-[18px] leading-[28px] font-bold ">+044 390 20 77</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex items-center mb-3">
            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="22.5" cy="22.5" r="22.5" fill="white"/>
                <path d="M23.5043 24.0278C23.0565 24.3264 22.5363 24.4842 22 24.4842C21.4637 24.4842 20.9436 24.3264 20.4957 24.0278L13.1198 19.1104C13.0789 19.0831 13.0391 19.0547 13 19.0254V27.0831C13 28.007 13.7497 28.7402 14.657 28.7402H29.3429C30.2668 28.7402 31 27.9904 31 27.0831V19.0254C30.9608 19.0547 30.9209 19.0832 30.8799 19.1105L23.5043 24.0278Z" fill="#34A853"/>
                <path d="M13.7049 18.2337L21.0808 23.1511C21.36 23.3373 21.68 23.4304 22 23.4304C22.32 23.4304 22.64 23.3373 22.9192 23.1511L30.2951 18.2337C30.7365 17.9396 31 17.4474 31 16.9162C31 16.0028 30.2569 15.2598 29.3435 15.2598H14.6565C13.7431 15.2598 13 16.0029 13 16.9171C13 17.4474 13.2635 17.9396 13.7049 18.2337Z" fill="#34A853"/>
            </svg>
            <div class="ml-[41px]">
               
                
              
                 <?php
                    $current_url = $_SERVER['REQUEST_URI']; 
                if (strpos($current_url, '/ro') !== false): ?>
                      <div class="text-[18px] leading-[28px] font-bold">ro-cloud@mccloud.global</div>
                <?php else: ?>
                    <div class="text-[18px] leading-[28px] font-bold">Saas@mccloud.ua</div>
                <?php endif; ?>
                
                
            </div>
        </div>
        <div class="flex items-center mb-3">
            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="22.5" cy="22.5" r="22.5" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.3766 12C27.003 12 30.7532 15.7503 30.7532 20.3766C30.7532 25.0028 22.3766 34 22.3766 34C22.3766 34 14 25.0028 14 20.3766C14 15.7503 17.7503 12 22.3766 12ZM22.3766 17.0485C24.1306 17.0485 25.5531 18.4709 25.5531 20.2251C25.5531 21.9791 24.1306 23.4016 22.3766 23.4016C20.6226 23.4016 19.2002 21.9791 19.2002 20.2251C19.2002 18.4709 20.6226 17.0485 22.3766 17.0485Z" fill="#34A853"/>
            </svg>
            <div class="ml-[41px]">
                
                <?php
                    $current_url = $_SERVER['REQUEST_URI']; 
                
                if (strpos($current_url, '/ro') !== false): ?>
                   
                    <div class="text-[18px] leading-[28px] font-bold ">Mccloud S.R.L. Bucureşti, <br> sector 3, cal Vitan, nr.23c, birou 13</div>
                <?php else: ?>
                    
                    <div class="text-[18px] leading-[28px] font-bold ">м. Київ, вул. Михайлівська, 14</div>
                <?php endif; ?>


                <a href="#">Як дістатися?</a>
            </div>
        </div>
    </div>
    <div class="lg:w-7/12">
        <div class="text-4 leading-5 font-bold mb-6">Задати питання</div>
        <?php echo do_shortcode('[contact-form-7 id="2179689" title="Отримати консультацію"]'); ?>
    </div>
</div>


