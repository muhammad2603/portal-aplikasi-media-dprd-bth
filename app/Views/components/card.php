<?php foreach ($items as $card): ?>
    <?php
    $add_class = $card["add_class"] ?? '';

    $find_str_flex_col_on_add_class = strrpos($add_class, 'flex-col', 0);

    $set_card_child_pos = 'order-[-1]';
    ?>
    <div class="p-7 flex <?= $find_str_flex_col_on_add_class === false ? 'items-center gap-8' : 'shrink-0 gap-4' ?> rounded-lg shadow-md <?= $add_class ?>">
        <div class="card-text flex flex-col gap-1">
            <p class="font-semibold text-base sm:text-sm text-gray-500/90"><?= $card["card_title"] ?></p>
            <span class="font-text font-semibold text-3xl"><?= $card["card_description"] ?></span>
        </div>
        <span class="p-3 <?= $find_str_flex_col_on_add_class !== false ? 'w-fit' : '' ?> rounded-lg <?= $card["card_icon"]["icon_color"] . ' ' . $set_card_child_pos ?>">
            <?= $card["card_icon"]["icon"] ?>
        </span>
    </div>
<?php endforeach ?>