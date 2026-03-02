<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<!-- Section aktivitas terbaru -->
<section class="news-activity py-10 lg:py-8 xl:py-5 px-7 bg-white rounded-lg shadow-md">
    <!-- Section Filter -->
    <section class="search-filter flex justify-between items-center gap-4">
        <!-- Legend -->
        <div class="legend">
            <h2 class="text-base">Daftar Riwayat Aktivitas</h2>
            <p class="text-sm text-gray-500/90">Data ditampilkan dari yang <span class="font-semibold text-black">Terbaru</span></p>
        </div>
        <!-- Filter Box wrapper -->
        <div class="filter-box-wrapper relative shrink">
            <!-- Button show filter select -->
            <button type="button" class="filter-box py-2.5 px-4 flex items-center gap-3.5 bg-gray-100 rounded-md shadow-sm">
                <span class="text-gray-500/90">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                </span>
                <span class="filter-text font-text text-sm tracking-wider">Terbaru</span>
                <span class="text-gray-500/90">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </button>
            <!-- Filter Select -->
            <!--
            @note: filter-select akan dianimasikan
            @class-animation:
                - hidden to flex
                - translate-y to 0
                - opacity to 100
        -->
            <div class="filter-select hidden w-full p-1.5 absolute top-[120%] translate-y-[-16px] flex-col border border-solid border-gray-200 bg-white rounded-md shadow-sm opacity-10 transition duration-250 ease-out">
                <!-- @note: filter yang dipilih saat ini harus diberikan background, saat dihover, lepaskan backgroundnya -->
                <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center bg-gray-100 text-sm rounded-md hover:bg-gray-100">
                    <span>Terbaru</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </span>
                </button>
                <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100">
                    <span>Terlama</span>
                    <span class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </section>
    <!-- Akhir Section Filter -->
    <!-- Catatan aktivitas terbaru -->
    <div class="activities mt-8 flex flex-col gap-4">
        <div class="flex gap-3.5">
            <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-green-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </span>
            <div class="flex flex-col gap-0.5">
                <h3 class="text-base">Pengajuan disetujui</h3>
                <p class="text-sm text-gray-500/90">Pengajuan "Liputan Pemilu 2026" Anda telah disetujui Admin</p>
                <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    5 hari yang lalu
                </span>
            </div>
        </div>
        <div class="flex gap-3.5">
            <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-red-500 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </span>
            <div class="flex flex-col gap-0.5">
                <h3 class="text-base">Pengajuan ditolak</h3>
                <p class="text-sm text-gray-500/90">Pengajuan "Festival Budaya Nusantara" Anda telah ditolak Admin. Lihat alasan penolakan di Pengajuan anda</p>
                <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    7 hari yang lalu
                </span>
            </div>
        </div>
        <div class="flex gap-3.5">
            <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-amber-500 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </span>
            <div class="flex flex-col gap-0.5">
                <h3 class="text-base">Pengajuan terkirim</h3>
                <p class="text-sm text-gray-500/90">Pengajuan "Investigasi Korupsi Daerah" Anda telah terkirim, mohon tunggu persetujuan dari Admin</p>
                <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    8 hari yang lalu
                </span>
            </div>
        </div>
        <div class="flex gap-3.5">
            <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-indigo-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </span>
            <div class="flex flex-col gap-0.5">
                <h3 class="text-base">Perbaikan pengajuan</h3>
                <p class="text-sm text-gray-500/90">Pengajuan "Dewan Dorong Pemda dan APH Perkuat Pengawasan PETI" Anda butuh perbaikan. Lihat komentar Admin tentang perbaikan!</p>
                <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    9 hari yang lalu
                </span>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Section aktivitas terbaru -->
<?= $this->endSection() ?>