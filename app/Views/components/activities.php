<?php $is_custom_message_data_not_found = $custom_message_data_not_found ?? null; ?>
<?php if (count($activities)  === 0): ?>
    <div class="informasi-pengajuan py-3 px-4 bg-amber-100/80 text-amber-600 rounded-md">
        <p class="font-semibold text-sm"><?= $is_custom_message_data_not_found ? $custom_message_data_not_found : "Tidak ada aktivitas yang tercatat." ?></p>
    </div>
<?php else: ?>
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
        $is_pengajuan_exist = $activity["judul_pengajuan"] ? true : false;
        // __COMMENT__ list action memiliki icon tersendiri
        $actions_for_custom_icon = ["recovery", "soft delete", "hard delete"];
        $color_actions = ["recovery" => "blue", "soft delete" => "red", "hard delete" => "red"];
        $is_spesificy_icon = in_array($activity["action"], $actions_for_custom_icon);
        // __FIX__ perhatikan bagian blok if status dan action, kode terlihat ambigu dan sulit dipahami. lebih baik buat helper untuk pemanggilan icon
        $set_status_color = (! $is_spesificy_icon && $activity["status"] === "Disetujui") ? "green" : ((! $is_spesificy_icon && $activity["status"] === "Ditolak") ? "red" : ((! $is_spesificy_icon && $activity["status"] === "Perbaikan") ? "indigo" : "amber"));
        ?>
        <div class="flex gap-3.5">
            <!--  __COMMENT__ kondisi ini dilakukan untuk memisahkan warna berdasarkan actionnya memiliki icon khusus. jika tidak khusus, maka true, jika khusus, maka false -->
            <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-<?= (! $is_spesificy_icon && $is_pengajuan_exist ? $set_status_color : (in_array($activity["action"], $actions_for_custom_icon) && ($is_pengajuan_exist || $activity["action"] === "hard delete") ? $color_actions[$activity["action"]] : "slate")) ?>-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <?php if ($activity["status"] === "Disetujui" && ! $is_spesificy_icon): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    <?php elseif ($activity["status"] === "Ditolak" && ! $is_spesificy_icon): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    <?php elseif ($activity["status"] === "Perbaikan" && ! $is_spesificy_icon): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    <?php elseif ($activity["status"] === "Pending" && ! $is_spesificy_icon): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    <?php elseif ($activity["action"] === "hard delete"): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                    <?php elseif (! $is_pengajuan_exist): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                    <?php elseif ($activity["action"] === "recovery"): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    <?php elseif ($activity["action"] === "soft delete"): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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
<?php endif; ?>