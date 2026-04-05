<?php $timeService = new \App\Libraries\TimeService; ?>
<?php if (count($deleted_pengajuan) === 0): ?>
    <div class="informasi-pengajuan py-3 px-4 bg-amber-100/80 text-amber-600 rounded-md">
        <p class="font-semibold text-sm">Tidak ada pengajuan yang terhapus.</p>
    </div>
<?php else: ?>
    <?php foreach ($deleted_pengajuan as $pgj): ?>
        <article class="py-5 px-4 border-[1.5px] border-solid border-gray-200 rounded-md shadow-sm"
            data-meta-pengajuan='{"judul": "<?= esc($pgj['judul']) ?>", "deskripsi": "<?= esc($pgj['deskripsi']) ?>", "media": "<?= esc($pgj['media']) ?>", "tanggalUpload": "<?= $timeService->translateDate($pgj['created_at']) ?>"}'>
            <div class="top flex items-center gap-4">
                <h3 class="text-base"><?= esc($pgj['judul']) ?></h3>
            </div>
            <div class="deskripsi mt-2 text-sm text-gray-500/90">
                <p><?= esc($pgj['deskripsi']) ?></p>
            </div>
            <div class="info mt-2 flex gap-3">
                <span class="flex items-center gap-1 text-gray-500/90">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                    <span class="font-text text-sm"><?= esc($pgj['media']) ?></span>
                </span>
                <span class="flex items-center gap-1 text-gray-500/90">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                    <span class="font-text text-sm"><?= $timeService->translateDate($pgj['created_at']) ?></span>
                </span>
            </div>
            <div data-pengajuan-id="<?= esc($pgj['id']) ?>" class="actions mt-3.5 pt-3 flex justify-end gap-2.5 border-t-[1.5px] border-solid border-gray-200">
                <span class="mr-auto flex items-center gap-1 text-gray-500/90">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    <span class="font-text text-sm">Dihapus pada tanggal <?= $timeService->translateDate($pgj['deleted_at']) ?></span>
                </span>
                <button type="button" class="btn-recovery font-text p-2 flex items-center gap-1.5 font-semibold text-blue-600 text-xs border-[1.5px] border-solid border-gray-100 rounded-md transition duration-150 ease-in hover:bg-blue-50 hover:border-blue-200" data-modal="#confirm" aria-label="Pulihkan pengajuan">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </span>
                    <span>Pulihkan</span>
                </button>
                <button type="button" class="btn-delete-permanent font-text p-2 flex items-center gap-1.5 font-semibold text-red-600 text-xs border-[1.5px] border-solid border-gray-100 rounded-md transition duration-150 ease-in hover:bg-red-50 hover:border-red-200" data-modal="#confirm" aria-label="Hapus permanen pengajuan">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </span>
                    <span>Hapus Permanen</span>
                </button>
            </div>
        </article>
    <?php endforeach ?>
<?php endif ?>