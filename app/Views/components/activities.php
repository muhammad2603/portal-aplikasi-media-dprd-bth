<!-- TODO berikan informasi state jika tidak ada aktivitas yang tercatat -->
<?php foreach ($activities as $activity): ?>
    <?php
    $timeService = new \App\Libraries\TimeService;
    ["days" => $days_diff, "hours" => $hours_diff, "minutes" => $minutes_diff, "seconds" => $seconds_diff] = $timeService->getDifference($activity['created_at'], true);
    $created_diff = "";
    if ($days_diff > 0 && $days_diff <= 30)
        $created_diff = $days_diff . " hari yang lalu";
    elseif ($hours_diff > 0 && $hours_diff < 24)
        $created_diff = $hours_diff . " jam yang lalu";
    elseif ($minutes_diff > 0 && $minutes_diff <= 60)
        $created_diff = $minutes_diff . " menit yang lalu";
    elseif ($seconds_diff > 0 && $seconds_diff <= 60)
        $created_diff = "beberapa detik yang lalu";
    else
        $created_diff = $timeService->translateDate($activity['created_at']);
    $set_status_color = ($activity["status"] === "Disetujui") ? "green" : (($activity["status"] === "Ditolak") ? "red" : (($activity["status"] === "Perbaikan") ? "indigo" : "amber"));
    ?>
    <div class="flex gap-3.5">
        <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-<?= $set_status_color ?>-600 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <?php if ($activity["status"] === "Disetujui"): ?>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                <?php elseif ($activity["status"] === "Ditolak"): ?>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                <?php elseif ($activity["status"] === "Perbaikan"): ?>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                <?php else: ?>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                <?php endif; ?>
            </svg>
        </span>
        <div class="flex flex-col gap-0.5">
            <h3 class="text-base"><?= esc($activity['title']) ?></h3>
            <p class="text-sm text-gray-500/90"><?= esc($activity['description']) ?></p>
            <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <?= $created_diff ?>
            </span>
        </div>
    </div>
<?php endforeach ?>