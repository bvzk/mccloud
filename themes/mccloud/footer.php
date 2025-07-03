    <footer class="footer bg-[#2C2C2E] md:rounded-[30px] md:pt-[92px] pt-[6px] md:mt-[34px] xl:px-[59px] lg:px-[40px] md:px-[22px] mb-4">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="footer__collapse px-[18px] md:px-0 xl:w-3/12 lg:w-4/12 md:w-1/2 w-full md:mb-[48px] lg:mb-0">
                    <div class="footer__collapse-toggle text-white text-[15px] leading-4 md:h-4 md:mb-[31px] py-[18px] md:py-0"><?php echo pll__('Продукти'); ?></div>
                    <div class="footer__collapsed">
                        <?php
                        wp_nav_menu([
                            'menu' => 38, // 'footer_decisions_1'
                            'container' => false,
                            'menu_class' => false,
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ]);
                        ?>
                        <div class="md:hidden">
                            <?php
                                wp_nav_menu([
                                    'menu' => 39, // 'footer_decisions_2'
                                    'container' => false,
                                    'menu_class' => false,
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                ]);
                            ?>
                        </div>
                    </div>
                     <div class=" flex ">
                <a href="https://www.linkedin.com/company/5310980/admin/dashboard/" class="mr-5 " target="_blank" rel="noopener noreferrer nofollow">
                    <svg width="31" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="15" cy="15" r="15" fill="#636366"/>
                        <path d="M10.74 7.76C10.74 8.24889 10.5628 8.66444 10.2083 9.00667C9.8539 9.3489 9.39556 9.52 8.83333 9.52C8.29556 9.52 7.85556 9.3489 7.51333 9.00667C7.17111 8.66444 7 8.24889 7 7.76C7 7.24667 7.17111 6.825 7.51333 6.495C7.85556 6.165 8.30777 6 8.87 6C9.43223 6 9.87833 6.165 10.2083 6.495C10.5383 6.825 10.7156 7.24667 10.74 7.76ZM7.11 22.2433V10.9133H10.63V22.2433H7.11ZM12.72 14.5433C12.72 13.4922 12.6956 12.2822 12.6467 10.9133H15.69L15.8733 12.49H15.9467C16.68 11.2678 17.8411 10.6567 19.43 10.6567C20.6522 10.6567 21.6361 11.0661 22.3817 11.885C23.1272 12.7039 23.5 13.92 23.5 15.5333V22.2433H19.98V15.9733C19.98 14.3356 19.3811 13.5167 18.1833 13.5167C17.3278 13.5167 16.7289 13.9567 16.3867 14.8367C16.3133 14.9833 16.2767 15.2767 16.2767 15.7167V22.2433H12.72V14.5433Z" fill="#2C2C2E"/>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/@McCloud-ua/featured" class="mr-5 " target="_blank" rel="noopener noreferrer nofollow">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#636366"/>
                            <path d="M15 9C7.629 9 7.5 9.6555 7.5 14.775C7.5 19.8945 7.629 20.55 15 20.55C22.371 20.55 22.5 19.8945 22.5 14.775C22.5 9.6555 22.371 9 15 9ZM17.4037 15.0255L14.0363 16.5975C13.7415 16.734 13.5 16.581 13.5 16.2555V13.2945C13.5 12.9697 13.7415 12.816 14.0363 12.9525L17.4037 14.5245C17.6985 14.6625 17.6985 14.8875 17.4037 15.0255Z" fill="#2C2C2E"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/mccloud.ua?igsh=MTZxd3B3OHhjaWRqdA==" class="mr-5 " target="_blank" rel="noopener noreferrer nofollow">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#636366"/>
                            <path d="M18.2083 6.75H11.7917C10.4545 6.75 9.17217 7.28117 8.22667 8.22667C7.28117 9.17217 6.75 10.4545 6.75 11.7917V18.2083C6.75 19.5455 7.28117 20.8278 8.22667 21.7733C9.17217 22.7188 10.4545 23.25 11.7917 23.25H18.2083C19.5455 23.25 20.8278 22.7188 21.7733 21.7733C22.7188 20.8278 23.25 19.5455 23.25 18.2083V11.7917C23.25 10.4545 22.7188 9.17217 21.7733 8.22667C20.8278 7.28117 19.5455 6.75 18.2083 6.75ZM21.875 18.2083C21.8739 19.1805 21.4872 20.1124 20.7998 20.7998C20.1124 21.4872 19.1805 21.8739 18.2083 21.875H11.7917C10.8195 21.8739 9.88755 21.4872 9.20016 20.7998C8.51276 20.1124 8.1261 19.1805 8.125 18.2083V11.7917C8.12609 10.8195 8.51275 9.88754 9.20015 9.20015C9.88754 8.51275 10.8195 8.12609 11.7917 8.125H18.2083C19.1805 8.12609 20.1125 8.51275 20.7999 9.20015C21.4873 9.88754 21.8739 10.8195 21.875 11.7917V18.2083Z" fill="#2C2C2E"/>
                            <path d="M15 10.875C14.1842 10.875 13.3866 11.1169 12.7083 11.5702C12.0299 12.0234 11.5012 12.6677 11.189 13.4214C10.8768 14.1752 10.7951 15.0046 10.9543 15.8047C11.1134 16.6049 11.5063 17.3399 12.0832 17.9168C12.6601 18.4937 13.3951 18.8866 14.1953 19.0457C14.9954 19.2049 15.8248 19.1232 16.5786 18.811C17.3323 18.4988 17.9766 17.9701 18.4298 17.2917C18.8831 16.6134 19.125 15.8158 19.125 15C19.125 13.906 18.6904 12.8568 17.9168 12.0832C17.1432 11.3096 16.094 10.875 15 10.875ZM15 17.75C14.4561 17.75 13.9244 17.5887 13.4722 17.2865C13.0199 16.9844 12.6675 16.5549 12.4593 16.0524C12.2512 15.5499 12.1967 14.9969 12.3028 14.4635C12.409 13.9301 12.6709 13.4401 13.0555 13.0555C13.4401 12.6709 13.9301 12.4089 14.4635 12.3028C14.997 12.1967 15.5499 12.2512 16.0524 12.4593C16.5549 12.6675 16.9844 13.0199 17.2865 13.4722C17.5887 13.9244 17.75 14.4561 17.75 15C17.7492 15.7291 17.4592 16.4281 16.9436 16.9436C16.4281 17.4592 15.7291 17.7492 15 17.75Z" fill="#2C2C2E"/>
                            <path d="M19.3073 11.6087C19.8136 11.6087 20.224 11.1983 20.224 10.6921C20.224 10.1858 19.8136 9.77539 19.3073 9.77539C18.801 9.77539 18.3906 10.1858 18.3906 10.6921C18.3906 11.1983 18.801 11.6087 19.3073 11.6087Z" fill="#2C2C2E"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/mcCloud.com.ua/" class="mr-5" target="_blank" rel="noopener noreferrer nofollow">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#636366"/>
                            <path d="M19.6663 9.61854H17.0481C16.7379 9.61854 16.3931 10.0268 16.3931 10.5693V12.4599H19.6681L19.1728 15.156H16.3931V23.25H13.3032V15.156H10.5V12.4599H13.3032V10.8741C13.3032 8.59886 14.8817 6.75 17.0481 6.75H19.6663V9.61854Z" fill="#2C2C2E"/>
                        </svg>
                    </a>
                </div>
                </div>
                <div class="footer__collapse hidden md:block px-[18px] md:px-0 xl:w-3/12 lg:w-4/12 md:w-1/2 w-full md:mb-[48px] lg:mb-0">
                    <div class="footer__collapse-toggle text-white text-[15px] leading-4 md:h-4 md:mb-[31px] py-[18px] md:py-0"><span class="md:hidden"><?php echo pll__('Рішення'); ?></span></div>
                    <div class="footer__collapsed">
                        <?php
                        wp_nav_menu([
                            'menu' => 39, // 'footer_decisions_2'
                            'container' => false,
                            'menu_class' => false,
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ]);
                        ?>
                    </div>
                </div>
                <div class="footer__collapse px-[18px] md:px-0 xl:w-2/12 lg:w-2/12 md:w-1/2 w-full md:mb-[60px] xl:mb-0">
                    <div class="footer__collapse-toggle text-white text-[15px] leading-4 md:h-4 md:mb-[31px] py-[18px] md:py-0"><?php echo pll__('Меню'); ?></div>
                    <div class="footer__collapsed">
                        <?php
                        wp_nav_menu([
                            'menu' => 40, // 'footer_menu'
                            'container' => false,
                            'menu_class' => false,
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ]);
                        ?>
                    </div>
                </div>
                <div class="footer__collapse px-[18px] md:px-0 xl:w-2/12 lg:w-2/12 md:w-1/2 w-full md:mb-[60px] xl:mb-0">
                    <!-- <div class="footer__collapse-toggle text-white text-[15px] leading-4 md:h-4 md:mb-[31px] py-[18px] md:py-0">Продукти</div>
                    <div class="footer__collapsed">
                        <?php
                        wp_nav_menu([
                            'menu' => 41, // 'footer_products'
                            'container' => false,
                            'menu_class' => false,
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ]);
                        ?>
                    </div> -->
                </div>
                <div class="footer__collapse md:hidden px-[18px] md:px-0 xl:w-2/12 lg:w-2/12 md:w-1/2 w-full md:mb-[60px] xl:mb-0">
                    <div class="footer__collapse-toggle text-white text-[15px] leading-4 md:h-4 md:mb-[31px] py-[18px] md:py-0">Сервіси</div>
                    <div class="footer__collapsed">
                        <ul>
                            <li>
                                <a href="<?=get_permalink( 1133 ); ?>">Google workspace</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex xl:flex-col xl:w-2/12 w-full px-[18px] md:px-0 mt-[40px] md:mt-0">

                        <div class="footer__collapse-toggle text-white text-[15px] leading-4 md:h-4 md:mb-[31px] py-[18px] md:py-0"><?php echo pll__('Контакти'); ?></div>
                        
                        
                      

                    <div class="flex flex-col md:flex-row xl:flex-col md:w-1/2 lg:w-[40%] xl:w-full">
                        <div class="md:mr-[50px] xl:mr-0">
                            <a href="tel:+380443902077" class="text-white text-sm leading-4 font-bold block mb-3 hover:text-white">Ukraine: tel. +380443902077</a>
                             <a href="mailto:ua-cloud@mccloud.global" class="text-[#848484] text-sm leading-4 font-medium block mb-3 hover:text-white">e-mail: ua-cloud@mccloud.global</a>
                            <a href="tel:+77773549461" class="text-white text-sm leading-4 font-bold block mb-3 hover:text-white">Kazakhstan: tel. +77773549461</a>
                            <a href="mailto:kz-cloud@mccloud.global" class="text-[#848484] text-sm leading-4 font-medium block mb-3 hover:text-white">e-mail: kz-cloud@mccloud.global</a>
                            <a href="tel:+40755745082" class="text-white text-sm leading-4 font-bold block mb-3 hover:text-white">Romania: tel. +40755745082</a>
                            <a href="mailto:ro-cloud@mccloud.global" class="text-[#848484] text-sm leading-4 font-medium block mb-3 hover:text-white">e-mail: ro-cloud@mccloud.global</a>
                        </div>
                        <!--<div class="">-->
                        <!--    <a href="https://maps.app.goo.gl/tr9qaCCdV188a35G8" target="_blank" class="text-[#848484] text-sm leading-4 font-medium block mb-3 hover:text-white">Київ, вул. Михайлівська, 14</a>-->
                        <!--    <a href="mailto:saas@mcсloud.ua" class="text-[#848484] text-sm leading-4 font-medium block mb-3 hover:text-white">saas@mcCloud.ua</a>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="border-t border-[#EDEDED] mt-[28px] md:mt-[76px] pt-[32px] md:pt-[44px] pb-[37px] px-[18px] md:px-0 flex flex-col md:flex-row md:items-center">
                <div class="order-2 md:order-1 text-[12px] xl:text-sm text-[#848484] leading-7 2xl:mr-[197px] xl:mr-[94px] lg:mr-[68px] md:mr-4 mb-[5px] md:mb-0">
                    © mcCloud 2025. <br class="lg:hidden"> Copyright® All right reserved
                </div>
                <div class="order-3 md:order-2">
                   <?php	$current_url = $_SERVER['REQUEST_URI']; 
                    if (strpos($current_url, '/ro') !== false): ?>
    
                        <a href="/ro/terms-conditions/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Terms & Conditions</a>
                        <a href="/ro/privacy-policy/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Privacy Policy</a>
                        <a href="/ro/cookie-policy/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Cookie Policy</a>
                           
                    <?php elseif (strpos($current_url, '/kz') !== false): ?>
    
                        <a href="/kz/terms-conditions/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Terms & Conditions</a>
                        <a href="/kz/privacy-policy/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Privacy Policy</a>
                        <a href="/kz/cookie-policy/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Cookie Policy</a>
                    <?php else: ?>
    				    <a href="/ua/terms-conditions/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Terms & Conditions</a>
                        <a href="/ua/privacy-policy/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Privacy Policy</a>
                        <a href="/ua/cookie-policy/" class="inline-block text-[12px] xl:text-sm text-[#848484] leading-3 mr-4 lg:mr-[50px] hover:text-white">Cookie Policy</a>
                <?php endif; ?>
                </div>

            </div>
        </div>
    </footer>
</div>

<div class="consult-popup hidden absolute top-0 left-0 right-0 bottom-0 z-40 overflow-y-auto">
    <div class="consult-backdrop hidden z-10 fixed top-0 right-0 bottom-0 left-0 bg-black opacity-10" onclick="consult.close(this);"></div>
    <div class="mx-auto relative my-[100px] z-20 mx-[16px] min-w-[343px] lg:w-[926px] bg-white shadow-[0_15px_48px_-12px_#E5E5EA] p-2.5 rounded-[22px] flex justify-start">
        <div class="lg:py-[46px] py-4 lg:px-[36px] px-[18px] grow">
            <div class="title-text-2 mb-[17px]"><?php echo pll__('Отримати консультацію'); ?></div>
            <?php 
            $lang = pll_current_language();
            switch ($lang) {
                case 'ua':
                    echo do_shortcode('[contact-form-7 id="c54ac34" title="Отримати консультацію (Попап)"]');
                    break;
                case 'kz':
                    echo do_shortcode('[contact-form-7 id="d763db4" title="Получить консультацию (Попап)"]');
                    break;
                case 'ro':
                    echo do_shortcode('[contact-form-7 id="47dbb6e" title="Obțineți consultanță (Popap)"]');
                    break;
                default:
                    echo do_shortcode('[contact-form-7 id="c54ac34" title="Отримати консультацію (Попап)"]');
            }
            ?>   
        </div>
        <div class="hidden lg:block max-w-[435px] min-w-[435px] ml-[13px]">
            <div class="relative">
                <picture>
                    <source type="image/webp" srcset="/wp-content/themes/mccloud/assets/image/consult-banner.webp">
                    <img loading="lazy" src="/wp-content/themes/mccloud/assets/image/consult-banner.jpg" class="rounded-[12px]"
                         alt="Отримати консультацію">
                </picture>
                <div class="absolute text-white left-[43px] bottom-[41px] right-[51px]">
                    <div class="text-[32px] leading-[40px] mb-[28px]"><?php echo pll__('Запровадьте хмарні рішення для свого бізнесу'); ?></div>
                    <div class="text-[15px] leading-4">
                        <?php echo pll__('Створюйте власне онлайн-середовище швидко та зручно. Ми допоможемо обрати та інтегрувати Сервіси Google у ваш бізнес.'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /*
<script id='contact-form-7-js-extra'>
var wpcf7 = {"api":{"root":"\/wp-json\/","namespace":"contact-form-7\/v1"}};
</script>
<script src='/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.5.6' id='contact-form-7-js'></script>
*/ ?>




<script type="text/javascript">
    var $zoho = $zoho || {};
    $zoho.salesiq = $zoho.salesiq || {
        widgetcode: "7f40f81f1c934d04f44f08472a029f8088a6db57e44ee7943fb211d4b330d5bd",
        values: {},
        ready: function () {}
    };
    (function () {
        var d = document, s = d.createElement("script");
        s.type = "text/javascript";
        s.id = "zsiqscript";
        s.defer = true;
        s.src = "https://salesiq.zoho.com/widget";
       // var t = d.getElementsByTagName("script")[0];
       // t.parentNode.insertBefore(s, t);
    })();

 </script>


 

<script>
document.addEventListener("DOMContentLoaded", function () {
    if (!localStorage.getItem("cookieConsent")) {
        let cookieBanner = document.createElement("div");
        cookieBanner.innerHTML = `
            <div id="cookie-banner" style="position: fixed; bottom: 0; left: 0; width: 100%; background: rgba(0,0,0,0.8); z-index: 99999; color: white; text-align: center; padding: 10px;">
            ${cookieBannerLang.message}
            <button id="accept-cookies" style="margin-left: 10px; background: #0091ff; color: white; border: none; padding: 5px 10px; cursor: pointer;">${cookieBannerLang.accept}</button>
        </div>
        `;
        document.body.appendChild(cookieBanner);

        document.getElementById("accept-cookies").addEventListener("click", function () {
            localStorage.setItem("cookieConsent", "true");
            document.getElementById("cookie-banner").remove();
        });
    }
});

document.addEventListener("DOMContentLoaded", async function () {
    // console.log("Скрипт запустився");

    // Перевіряємо, чи користувач вже сам обрав мову (через localStorage)
    if (localStorage.getItem("userSelectedLanguage")) {
        console.log("Користувач сам вибрав мову, редирект не потрібен.");
        return;
    }

    try {
        let response = await fetch("https://ipinfo.io/json?token=b366382ce8af64");
        let data = await response.json();

        console.log("Отримані геодані:", data);

        let countryCode = data.country;
		let origin = window.location.origin;

		let langRedirects = {
			"UA": `${origin}/ua/`,
			"KZ": `${origin}/kz/`,
			"RO": `${origin}/ro/`
		};

        let currentUrl = window.location.href;

        if (langRedirects[countryCode] && !currentUrl.startsWith(langRedirects[countryCode])) {
            console.log("Редирект на:", langRedirects[countryCode]);
            window.location.href = langRedirects[countryCode];
        } else {
            console.log("Редірект не потрібен.");
        }
    } catch (error) {
        console.error("Помилка отримання геоданих:", error);
    }

    // 👇 Додаємо обробник кліку на мовні посилання Polylang
    document.querySelectorAll('.lang-item a').forEach(link => {
        link.addEventListener('click', function () {
            const url = new URL(link.href);
            const langCode = url.pathname.split('/')[1]; // "ua", "kz", "ro"
            localStorage.setItem('userSelectedLanguage', langCode);
            console.log("Користувач обрав мову:", langCode);
        });
    });
});

</script>


<?php wp_footer(); ?>


    <?php
    $lang = pll_current_language();

    switch ($lang) {
        case 'ua':
            $name = 'mcCloud – офіційний партнер Google в Україні';
            $region = 'Україна';
            $url = home_url() .'https://mccloud.global/ua/';
            break;
        case 'kz':
            $name = 'mcCloud – ресми Google серіктесі Қазақстанда';
            $region = 'Қазақстан';
            $url = 'https://mccloud.global/kz/';
            break;
        case 'ro':
            $name = 'mcCloud – partener oficial Google în România';
            $region = 'România';
            $url = 'https://mccloud.global/ro/';
            break;
        default:
            $name = 'mcCloud – офіційний партнер Google';
            $region = 'Україна';
            $url = home_url() . 'https://mccloud.global/ua/';
    }
    ?>

    <div itemscope itemtype="http://schema.org/Organization" style="display: none">
        <span itemprop="name"><?= esc_html($name) ?></span>

        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <span itemprop="streetAddress">вул. Михайлівська, 14</span>,
            <span itemprop="addressLocality">Київ</span>,
            <span itemprop="postalCode">02000</span>,
            <span itemprop="addressRegion"><?= esc_html($region) ?></span>.
        </div>

        <img itemprop="logo" src="<?= home_url(); ?>/wp-content/themes/mccloud/assets/image/logo.svg?v=2" alt="mcCloud logo" />
        <span itemprop="telephone">+38 (067) 911-58-68</span>
        <span itemprop="email">saas@mccloud.ua</span>
        <a itemprop="url" href="<?= home_url(); ?>/">mcCloud</a>
    </div>
</body>
</html>

</body>
</html><?php
    /*
   <footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__top">
                <a  class="to-top"></a>
                <div class="footer__top-networks">
                    <a target="_blank" href="https://www.facebook.com/mcCloud.com.ua/" class="footer__img-block"><img src="/wp-content/uploads/2020/12/facebook.svg" alt=""></a>
                    <a target="_blank" href="https://www.linkedin.com/in/gappsukraine" class="footer__img-block"><img src="/wp-content/uploads/2020/12/linkedin.svg" alt=""></a>
                    <a target="_blank" href="https://googleappsukraine.blogspot.com.tr/" class="footer__img-block"><img style="margin-top:2px; width:20px" src="/wp-content/uploads/2020/12/google-plus.svg" alt=""></a>
                </div>
                <div class="footer__top-text"><span>сайт создан и обслуживается</span><a href="https://seoport.com.ua/"> <img src="/wp-content/uploads/2020/12/seoportsmalllogo.png" alt=""></a></div>
            </div>
           
        </div>
    </div>
    <div class="footer__bot"></div>
  <div class="fixed-overlay">
    <div class="modal__inner">
    <div class="modal__window">
    <div class="modal__close"></div>
    <div class="modal__title">Заполните форму</div>
    <div class="modal__text">и мы свяжемся с вами для уточнения деталей</div>
    <?php  echo do_shortcode('[contact-form-7 id="142" title="form-modal"]');

    ?>

</div>
    </div>
    
</div>    
<div class="fixed-overlay-ua">
    <div class="modal__inner">
    <div class="modal__window-ua">
    <div class="modal__close-ua"></div>
    <div class="modal__title">Заповніть форму</div>
    <div class="modal__text">і ми зв'яжемося з вами для уточнення деталей</div>
    <?php  echo do_shortcode('[contact-form-7 id="623" title="form-modal-ua"]');

    ?>

</div>
    </div>
    
</div>    
</footer>
<?php wp_footer(); ?>

<script type="text/javascript">

    $(document).ready(function(){
        $('.tel').mask('+38(999) 99 99 999');
        $('.to-top').on('click', (e)=>{
            $('html').animate({scrollTop: 0},1000);
        })
        
        $('.accord_seo_btn').click(function(){
            $('.accord_seo_text').slideToggle(500);
        });
        
    });
    
    const textTitles = document.querySelectorAll('.title-text')
for(let i =0;i<textTitles.length;i++){
    if(i===1){
        textTitles[i].classList.add('text-title-second')
    }
}

const languageRU = document.querySelector('.lang-item-ru a')
const languageUA = document.querySelector('.lang-item-uk a')
const span = document.querySelector('.footer__top-text span')

if(document.location.href.includes('ru')||document.location.href.includes('%')){
    languageUA.style.fontWeight = 400
    languageRU.style.fontWeight = 700
    span.innerHTML = 'сайт создан и обслуживается'
}
else if(!(document.location.href.includes('ru')||document.location.href.includes('%'))){
    span.innerHTML = 'сайт створений і обслуговується'
    languageRU.style.fontWeight = 400
    languageUA.style.fontWeight = 700
}
languageRU.href = "https://mccloud-ro.test-ocean.com.ua/ru/"
languageUA.href = "https://mccloud-ro.test-ocean.com.ua"


    

    
    




    const productsText = document.querySelectorAll('.product-text')
    const productsTextEnt = document.querySelectorAll('.product-text-ent')
        function searchMaxHeight(mas1){
            let max = 0
           
                for(let i=0;i<mas1.length;i++){
                    let newMas = [mas1[i],mas1[i+8],mas1[i+16]]
                    for(let j =0;j<newMas.length;j++){
                        if(newMas[j].offsetHeight>max){
                            max = newMas[j].offsetHeight
                            
                        }
                        
                    }
                    for(let k =0;k<newMas.length;k++){
                        
                        newMas[k].style.height = max +'px'
                        
                    }
                    max = 0
                   
                   
                    if(i===7){
                        break
                    }
                    
                   
                }
           
          
        }
        window.addEventListener('resize',()=>{
            if(window.innerWidth>=768){
                searchMaxHeight(productsText)
                searchMaxHeight(productsTextEnt)
            }
        })
        if(window.innerWidth>=768){
                searchMaxHeight(productsText)
                searchMaxHeight(productsTextEnt)
            }
</script>
    */ ?>
    
    