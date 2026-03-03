<?php foreach ($items as $card): ?>
    <?php
    $add_class = $card["add_class"] ?? '';
    ?>
    <div class="total-pengajuan-baru p-7 flex items-center gap-8 rounded-lg shadow-md <?= $add_class ?>">
        <div class="card-text flex flex-col gap-1">
            <p class="font-semibold text-sm text-gray-500/90"><?= $card["card_title"] ?></p>
            <span class="font-text font-semibold text-3xl"><?= $card["card_description"] ?></span>
        </div>
        <span class="p-3 rounded-lg <?= $card["card_icon"]["icon_color"] ?>">
            <?= $card["card_icon"]["icon"] ?>
        </span>
    </div>
<?php endforeach ?>