<div class="container mx-auto md:py-[120px] py-8">
    <div id="accordion-open" data-accordion="collapse">
        <div class="border border-customlightGray rounded-4 mb-5">
            <h2 id="accordion-open-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-4 md:p-6 gap-3 md:text-5 text-4 md:leading-6 leading-5 text-left"
                    data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                    aria-controls="accordion-open-body-1">
                    <span class="flex items-center font-semibold"><?php echo pll__('Як формується ціна на пакет?'); ?></span>
                    <svg data-accordion-icon class="min-w-[44px] min-h-[44px] rotate-180" width="44" height="44"
                        viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="44" height="44" rx="22" transform="matrix(1 0 0 -1 0 44)" fill="#F3F5F2" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.2921 17.7569L14.2211 24.828C13.8305 25.2186 13.8305 25.8517 14.2211 26.2423C14.6116 26.6328 15.2447 26.6328 15.6353 26.2423L21.9992 19.8783L28.3632 26.2423C28.7537 26.6328 29.3869 26.6328 29.7774 26.2423C30.1679 25.8517 30.1679 25.2186 29.7774 24.828L22.7063 17.7569C22.3158 17.3664 21.6827 17.3664 21.2921 17.7569Z"
                            fill="#170C37" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.2921 17.7569L14.2211 24.828C13.8305 25.2186 13.8305 25.8517 14.2211 26.2423C14.6116 26.6328 15.2447 26.6328 15.6353 26.2423L21.9992 19.8783L28.3632 26.2423C28.7537 26.6328 29.3869 26.6328 29.7774 26.2423C30.1679 25.8517 30.1679 25.2186 29.7774 24.828L22.7063 17.7569C22.3158 17.3664 21.6827 17.3664 21.2921 17.7569Z"
                            fill="black" fill-opacity="0.2" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                <div class="pb-6 px-3 md:px-8">
                    <?php
                    set_query_var('data', get_three_cards_data_acordion());

                    require get_template_directory() . '/template-parts/common/threeRoundedCards.php'; ?>
                </div>
            </div>
        </div>
        <div class="border border-customlightGray rounded-4 mb-5">
            <h2 id="accordion-open-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-4 md:p-6 gap-3 md:text-5 text-4 md:leading-6 leading-5 text-left"
                    data-accordion-target="#accordion-open-body-2" aria-expanded="true"
                    aria-controls="accordion-open-body-2">
                    <span class="flex items-center font-semibold"><?php echo pll__('Які наступні кроки після оформлення заявки?'); ?></span>
                    <svg data-accordion-icon class="min-w-[44px] min-h-[44px] rotate-180" width="44" height="44"
                        viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="44" height="44" rx="22" transform="matrix(1 0 0 -1 0 44)" fill="#F3F5F2" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.2921 17.7569L14.2211 24.828C13.8305 25.2186 13.8305 25.8517 14.2211 26.2423C14.6116 26.6328 15.2447 26.6328 15.6353 26.2423L21.9992 19.8783L28.3632 26.2423C28.7537 26.6328 29.3869 26.6328 29.7774 26.2423C30.1679 25.8517 30.1679 25.2186 29.7774 24.828L22.7063 17.7569C22.3158 17.3664 21.6827 17.3664 21.2921 17.7569Z"
                            fill="#170C37" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.2921 17.7569L14.2211 24.828C13.8305 25.2186 13.8305 25.8517 14.2211 26.2423C14.6116 26.6328 15.2447 26.6328 15.6353 26.2423L21.9992 19.8783L28.3632 26.2423C28.7537 26.6328 29.3869 26.6328 29.7774 26.2423C30.1679 25.8517 30.1679 25.2186 29.7774 24.828L22.7063 17.7569C22.3158 17.3664 21.6827 17.3664 21.2921 17.7569Z"
                            fill="black" fill-opacity="0.2" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
    <div class="pt-[10px] pb-6 px-3 md:px-8">
        <?php
        $steps = [
            [
                'color' => 'bg-blue',
                'number' => '01',
                'text' => pll__("Наш менеджер зв'яжеться з вами упродовж 30 хвилин після залишення заявки") .
                          '<br><span class="text-[#8E8E93]">' .
                          pll__('(якщо ви заповнили форму після 18:00, вам передзвонять о 09:00 наступного робочого дня).') .
                          '</span>',
            ],
            [
                'color' => 'bg-green',
                'number' => '02',
                'text' => pll__('Під час дзвінка менеджер деталізує ваш запит, надасть відповіді на ваші питання та допоможе підібрати найбільш відповідний пакет <strong>Google Workspace</strong> під ваші потреби.'),
            ],
            [
                'color' => 'bg-yellow',
                'number' => '03',
                'text' => pll__('Щоб ви могли перевірити та запевнитись у відповідності пакета до ваших потреб, ми налаштуємо та підключимо обраний тариф на пробний <strong>30 денний період.</strong>'),
            ],
            [
                'color' => 'bg-orange',
                'number' => '04',
                'text' => pll__('Після тестування та підтвердження того що пакет відповідає вашому запиту наші спеціалісти підключать вам повну версію тарифу <strong>(зі знижкою до 50% для нових користувачів Google Workspace).</strong>'),
            ],
            [
                'color' => 'bg-red',
                'number' => '05',
                'text' => pll__('Команда mcCloud буде залишатись на звʼязку та надавати професійну підтримку на етапі налаштувань та подальшого використання тарифу. <strong>Ви завжди можете звертатись до нашої команди по допомогу!</strong>'),
            ],
        ];

        foreach ($steps as $step) {
            echo '<div class="px-[34px] flex flex-col md:flex-row mb-5 items-start md:items-center">';
            echo '<div class="rounded-full min-w-[60px] min-h-[60px] flex items-center justify-center ' . $step['color'] . ' text-white text-4 font-bold mr-[29px] mb-[28px] md:mb-0">' . $step['number'] . '</div>';
            echo '<div class="text-3 leading-4">' . $step['text'] . '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
        </div>
    </div>
    <div class="border border-customlightGray rounded-4 p-4 md:p-6 flex flex-col xl:flex-row justify-between xl:items-center">
    <div>
        <div class="md:text-5 text-4 md:leading-6 leading-5 font-semibold mb-2">
            <?php echo pll__('Не можете вирішити який пакет підійде саме вам?'); ?>
        </div>
        <div class="text-3 leading-4 md:text-3 md:leading-4 font-medium">
            <?php echo pll__('Команда mcCloud допоможе обрати тариф під ваш запит та надасть професійну консультацію!'); ?>
        </div>
    </div>
    <a href="#consultForm" class="btn btn-success mt-4 xl-mt-0"><?php echo pll__("Зв'язатись"); ?></a>
</div>
</div>