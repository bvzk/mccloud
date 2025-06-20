<?php
$cardsData = get_query_var('data', "");

?>

<div class="grid md:grid-cols-3 gap-4">
    <?php foreach ($cardsData as $index => $card) { ?>
        <?php
        $color = $index === 0 ? "yellow" : ($index === 1 ? "green" : "blue");
        ?>
        <div class="">
            <div class="relative mb-4">
                <picture>
                    <source srcset="<?php echo $card["srcset"]; ?>">
                    <img loading="lazy" src="<?php echo $card["src"]; ?>" alt="<?php echo $card["title"]; ?>"
                        class="rounded-tl-[100px] rounded-br-[100px] rounded-tr-[12px] rounded-bl-[12px] w-full max-height-255">
                </picture>
                <div
                    class="absolute bottom-0 right-[-4px] rounded-full w-[60px] h-[60px] flex items-center justify-center bg-<?php echo $color ?> text-white text-4 font-bold">
                    <?php echo $index + 1 ?>
                </div>
            </div>
            <div class="text-4 font-bold mb-3"><?php echo $card["title"]; ?></div>
            <div class="text-3 leading-4"><?php echo $card["subtitle"]; ?></div>
        </div>
    <?php } ?>
</div>