<?php
$title = get_query_var('consultFormTitle', "");
$subtitle = get_query_var('consultFormSubTitle', "");
$show_contacts = get_query_var('showContacts', '');

if (empty($title)) {
    $title = __("Отримати <br> консультацію", "");
}

if (empty($subtitle)) {
    $subtitle = __("Якщо вам потрібна консультація, скористайтеся формою зворотного зв'язку.", "");
}

?>

<div class="consult-form-wrapper bg-customLightBlue p-3 2xl:p-4 rounded-4 md:rounded-5 mt-8 2xl:mt-[120px] flex md:flex-row flex-col md:justify-center "
    id="consultForm">
    <div class="get-consult-form flex flex-col md:flex-row justify-center relative w-full md:w-auto">
        <div class="2xl:max-w-[465px] xl:max-w-[385px] md:max-w-[280px] min-w-[206px] lg:mr-4 w-full">
            <div class="xl:text-5 xl:leading-6 2xl:mt-8 lg:mt-5 md:mt-4 mt-3 mb-4 text-4 leading-5 font-bold">
                <?php echo $title; ?>
            </div>
            <div class="xl:text-4 font-medium md:mb-6 mb-3">
                <?php echo $subtitle; ?>
            </div>
            <?php if($show_contacts) : ?>
			            <div class="text-3 2xl:text-4 mb-6 flex flex-col gap-3">
			<div class='flex flex-row gap-3 md:gap-5'>
				<svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="22.5" cy="22.5" r="22.5" fill="white"></circle>
                <path d="M30.0786 26.3123C28.7496 25.1756 27.4008 24.4871 26.0881 25.6221L25.3043 26.308C24.7307 26.806 23.6644 29.1327 19.5417 24.39C15.4198 19.6534 17.8727 18.9159 18.447 18.4223L19.2352 17.7354C20.541 16.5979 20.0482 15.1658 19.1064 13.6917L18.538 12.7988C17.5919 11.3281 16.5617 10.3622 15.2524 11.4981L14.5449 12.1162C13.9663 12.5378 12.3488 13.908 11.9564 16.5111C11.4842 19.6345 12.9738 23.2113 16.3865 27.1357C19.7949 31.0618 23.1321 33.0339 26.2933 32.9996C28.9205 32.9712 30.5071 31.5615 31.0033 31.0489L31.7133 30.4299C33.0192 29.2949 32.2078 28.1393 30.8779 27L30.0786 26.3123Z" fill="#34A853"></path>
            </svg>
            
             <?php
                    $current_url = $_SERVER['REQUEST_URI']; 
                if (strpos($current_url, '/ro') !== false): ?>
                
                <div class="text-3 2xl:text-4 font-bold mb-2 ">+40 31 2295907</div>
                
             <?php elseif (strpos($current_url, '/kz') !== false): ?>
             
              <div class="text-3 2xl:text-4 font-bold mb-2 ">+77 71 7999822<br>+77 71 7999773<br>+77 77 3549461</div>
 
             <?php else: ?>
              
               <div class="text-3 2xl:text-4 font-bold mb-2 ">067 911 58 68 <br>050 468 05 65 <br> 044 390 20 77</div>
  
             <?php endif; ?> 
                
                
                
                
           
			</div>

				<div class='flex flex-row gap-3 items-center  md:gap-5'>
					<svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="22.5" cy="22.5" r="22.5" fill="white"></circle>
                <path d="M23.5043 24.0278C23.0565 24.3264 22.5363 24.4842 22 24.4842C21.4637 24.4842 20.9436 24.3264 20.4957 24.0278L13.1198 19.1104C13.0789 19.0831 13.0391 19.0547 13 19.0254V27.0831C13 28.007 13.7497 28.7402 14.657 28.7402H29.3429C30.2668 28.7402 31 27.9904 31 27.0831V19.0254C30.9608 19.0547 30.9209 19.0832 30.8799 19.1105L23.5043 24.0278Z" fill="#34A853"></path>
                <path d="M13.7049 18.2337L21.0808 23.1511C21.36 23.3373 21.68 23.4304 22 23.4304C22.32 23.4304 22.64 23.3373 22.9192 23.1511L30.2951 18.2337C30.7365 17.9396 31 17.4474 31 16.9162C31 16.0028 30.2569 15.2598 29.3435 15.2598H14.6565C13.7431 15.2598 13 16.0029 13 16.9171C13 17.4474 13.2635 17.9396 13.7049 18.2337Z" fill="#34A853"></path>
            </svg>
                	<p class='font-semibold'>м. Київ, вул. Михайлівська, 14</p>
				</div>
<div class='flex flex-row gap-3 items-center  md:gap-5'>
	<svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="22.5" cy="22.5" r="22.5" fill="white"></circle>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.3766 12C27.003 12 30.7532 15.7503 30.7532 20.3766C30.7532 25.0028 22.3766 34 22.3766 34C22.3766 34 14 25.0028 14 20.3766C14 15.7503 17.7503 12 22.3766 12ZM22.3766 17.0485C24.1306 17.0485 25.5531 18.4709 25.5531 20.2251C25.5531 21.9791 24.1306 23.4016 22.3766 23.4016C20.6226 23.4016 19.2002 21.9791 19.2002 20.2251C19.2002 18.4709 20.6226 17.0485 22.3766 17.0485Z" fill="#34A853"></path>
            </svg>
                <a href="mailto:saas@mcCloud.com.ua">saas@mcCloud.com.ua</a>
				</div>
            </div>

            </div>
            <?php else : ?>
            <div class='flex flex-col adv-list gap-3 mb-4'>
                <div class='adv-item flex flex-row gap-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/tick.svg' ?>' class='h-[24px]'>
                    <p class='text-3 leading-4'>Індивідуальний підхід</p>
                </div>
                <div class='adv-item flex flex-row gap-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/tick.svg' ?>' class='h-[24px]'>
                    <p class='text-3 leading-4'>Технічна підтримка</p>
                </div>
                <div class='adv-item flex flex-row gap-2'>
                    <img src='<?php echo get_template_directory_uri() . '/image/tick.svg' ?>' class='h-[24px]'>
                    <p class='text-3 leading-4'>Швидка інтеграція</p>
                </div>
            </div>
            <?php endif;?>
        </div>

        <div class="bg-white w-full max-w-[1144px] rounded-4 2xl:p-11 xl:p-6 lg:p-5 md:p-4 p-3">
            <div class="text-4 font-bold mb-6">Потрібна допомога? Залиште нам повідомлення!</div>
            <?php echo do_shortcode('[contact-form-7 id="2179689" title="Отримати консультацію"]'); ?>
        </div>
    </div>
    <?php require get_template_directory() . '/template-parts/common/footer-form-success.php'; ?>
</div>