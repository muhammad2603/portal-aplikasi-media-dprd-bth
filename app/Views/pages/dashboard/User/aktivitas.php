<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<!-- Section aktivitas terbaru -->
<section class="news-activity py-10 lg:py-8 xl:py-5 px-7 bg-white rounded-lg shadow-md">
    <!-- Section Filter -->
    <section class="search-filter flex flex-col sm:flex-row justify-between items-center gap-4">
        <!-- Legend -->
        <div class="legend">
            <h2 class="text-base">Daftar Riwayat Aktivitas</h2>
            <p class="text-sm text-gray-500/90">Aktivitas diurut berdasarkan dari <span class="font-semibold text-black">Terbaru</span></p>
        </div>
        <!-- Filter Box wrapper -->
        <div id="btnFilterBox" class="filter-box-wrapper relative shrink-0 ml-auto">
            <!-- Button show filter select -->
            <button id="btnFilterBox" type="button" class="filter-box py-2.5 px-4 w-52 flex justify-between items-center gap-3.5 bg-gray-100 rounded-md shadow-sm focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-500/90">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
                <span id="filterText" class="filter-text font-text text-sm tracking-wider">Terbaru</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-500/90">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <!-- Filter Select -->
            <div id="filterSelect" class="filter-select w-full p-1.5 absolute top-[120%] translate-y-[-16px] flex flex-col border border-solid border-gray-200 bg-white rounded-md shadow-sm opacity-0 transition duration-350 ease-out visibility-hidden pointer-events-none closed">
                <button type="button" data-filter-by="desc" class="filter-option py-1.5 px-2 flex justify-between items-center bg-gray-100 text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 active">
                    <span>Terbaru</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </span>
                </button>
                <button type="button" data-filter-by="asc" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
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
    <div id="activitiesWrapper" class="activities mt-8 flex flex-col gap-4">
        <?= view("components/activities", ["activities" => $activities]) ?>
    </div>
</section>
<!-- Akhir Section aktivitas terbaru -->
<!-- Script Filter Box -->
<script type="module" src="<?= base_url('/assets/js/filter-box.js') ?>"></script>
<script src="<?= base_url('/assets/js/aktivitas.js') ?>"></script>
<?= $this->endSection() ?>