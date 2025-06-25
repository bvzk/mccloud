<?php
$title = get_query_var('title', "");

if (empty($title)) {
    $title = pll__("Наші клієнти", "");
}

?>

<div class="container">
    <div class="mt-6 mb:mt-11 border border-customlightGray rounded-5 p-3 md:p-6 mb-6 2xl:mb-11">
        <div class="flex justify-between items-center mb-4">
            <h2 class="title-text-2 font-semibold xl:font-bold"><?php echo $title; ?></h2>
            <div class="clients-slider-arrows slick-arrows flex"></div>
        </div>
        <div class="clients-slider slick-img-center slick-arrows-top">
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client1.jpeg" alt="ABK"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client2.jpeg" alt="Galvapno"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client3.jpeg" alt="Хлібодар"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client4.jpeg" alt="Olymp"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client5.jpeg" alt="Fomich"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client6.jpeg" alt="ChickenHUT"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client7.jpeg"
                    alt="Національний медичний університет" class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client8.jpeg" alt="aromateque"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client9.jpeg" alt="tickets.ua"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client10.jpeg" alt="ГалПідшипник"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client11.jpeg" alt="Klopotenko"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client12.jpeg" alt="Collar"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client13.jpeg" alt="DK"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client14.jpeg" alt="MagneticOne Group"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client15.jpeg" alt="Solvve"
                    class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client16.jpeg"
                    alt="Український ветеранський фонд" class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
            <div class="md:h-[64px] h-[57px]">
                <img loading="lazy" src="/wp-content/themes/mccloud/image/clients/client17.jpeg"
                    alt="Західна Консалтингова Група" class="max-w-[90px] md:max-w-[130px] max-h-[64px]">
            </div>
        </div>
    </div>

</div>