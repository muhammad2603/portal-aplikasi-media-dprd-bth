<?php foreach ($pengajuan as $pgj): ?>
    <?php
    $timeService = new App\Libraries\TimeService();
    $set_icon_by_status = ($pgj["status"] === 'Pending' ? 'amber' : ($pgj["status"] === 'Perbaikan' ? 'indigo' : ($pgj["status"] === 'Disetujui' ? 'green' : 'red')));
    ?>
    <article class="py-5 px-4 border-[1.5px] border-solid border-gray-200 rounded-md shadow-sm"
        data-meta-pengajuan='{"confirmedBy": "<?= $pgj["last_confirmed_by"] ?? "null" ?>", "confirmedDate": "<?= $pgj["last_confirmed_date"] !== null ? $timeService->translateDate($pgj["last_confirmed_date"]) : "" ?>", "status": "<?= $pgj["status"] ?>", "judul": "<?= $pgj["judul"] ?>", "url": "<?= $pgj["url"] ?>", "tanggalPublikasi": "<?= $pgj["tanggal_publikasi"] ?>", "deskripsi": "<?= $pgj["deskripsi"] ?>", "media": "<?= $pgj["media"] ?>", "revisiCount": "<?= $pgj["total_perbaikan"] ?>", "tanggalUpload": "<?= $timeService->translateDate($pgj["created_at"]) ?>"}'>
        <div class="top flex items-center gap-4">
            <h3 class="text-base"><?= $pgj["judul"] ?></h3>
            <span class="py-1 px-3 flex items-center gap-1 bg-<?= $set_icon_by_status ?>-100/80 font-semibold text-<?= $set_icon_by_status ?>-600 text-xs rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <?php if ($pgj["status"] === 'Pending'): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    <?php elseif ($pgj["status"] === 'Perbaikan'): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    <?php elseif ($pgj["status"] === 'Ditolak'): ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    <?php else: ?>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    <?php endif ?>
                </svg>
                <span class="font-text"><?= $pgj["status"] ?></span>
            </span>
        </div>
        <?php if ($pgj["catatan_perbaikan_terakhir"] !== null): ?>
            <div class="comments mt-2.5 text-gray-500/90">
                <span class="flex gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                    <span class="text-sm"><?= ($pgj["status"] === "Perbaikan") ? "Catatan perbaikan" : "Alasan penolakan" ?>:</span>
                </span>
                <p class="comment mt-1 text-sm"><?= $pgj["catatan_perbaikan_terakhir"] ?></p>
            </div>
        <?php endif ?>
        <div class="info mt-3 flex gap-3">
            <span class="flex items-center gap-1 text-gray-500/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                </svg>
                <span class="font-text text-sm"><?= $pgj["media"] ?></span>
            </span>
            <span class="flex items-center gap-1 text-gray-500/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                <span class="font-text text-sm"><?= $timeService->translateDate($pgj["created_at"]) ?></span>
            </span>
        </div>
        <div class="actions mt-3.5 pt-3 flex gap-2.5 border-t-[1.5px] border-solid border-gray-200" data-id-pengajuan="<?= $pgj["id"] ?>">
            <button type="button" data-modal="#informations" class="btn-see-details font-text p-2 flex items-center gap-1.5 font-semibold text-xs border-[1.5px] border-solid border-gray-100 rounded-md transition duration-150 ease-in hover:bg-gray-200">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </span>
                <span>Lihat Detail</span>
            </button>
            <?php if ($pgj["status"] !== "Ditolak"): ?>
            <button type="button" data-modal="#edit" class="btn-edit font-text p-2 flex items-center gap-1.5 font-semibold text-xs border-[1.5px] border-solid border-gray-100 rounded-md transition duration-150 ease-in hover:bg-gray-200">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                </span>
                <span>Edit</span>
            </button>
            <?php endif ?>
            <?php if ($pgj["status"] === "Pending" || $pgj["status"] === "Ditolak"): ?>
                <button type="button" data-modal="#confirm" class="btn-delete font-text ml-auto p-2 flex items-center gap-1.5 font-semibold text-red-600 text-xs border-[1.5px] border-solid border-gray-100 rounded-md transition duration-150 ease-in hover:bg-red-50 hover:border-red-200">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </span>
                    <span>Hapus</span>
                </button>
            <?php endif ?>
        </div>
    </article>
<?php endforeach ?>