<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<!-- Section Cards: informasi Pengajuan -->
<section class="cards pb-3.5 xl:pb-0 px-2 xl:px-0 flex gap-6 overflow-x-scroll xl:overflow-visible">
    <!-- Card: Total Pengajuan -->
    <div class="total-pengajuan min-w-32 p-7 flex flex-col shrink-0 grow gap-4 rounded-lg shadow-md">
        <span class="w-fit p-3 bg-blue-100/80 text-blue-600 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.25 18.28" class="size-5">
                <path d="M.5,1.69v14.89c0,.66.53,1.19,1.19,1.19h10.87c.66,0,1.19-.53,1.19-1.19V5.53c0-.32-.13-.62-.35-.84l-3.76-3.76c-.22-.22-.52-.34-.83-.35l-7.11-.08c-.66,0-1.2.53-1.2,1.19Z" fill="none" stroke="currentColor" stroke-miterlimit="10" />
                <path d="M8.81.58v4.11c0,.28.23.51.51.51h4.43" fill="none" stroke="currentColor" stroke-miterlimit="10" />
                <rect x="2.64" y="8.78" width="3.5" height=".8" rx=".4" ry=".4" fill="currentColor" stroke-width="0" />
                <rect x="2.64" y="13.64" width="8.98" height=".8" rx=".4" ry=".4" fill="currentColor" stroke-width="0" />
                <rect x="2.64" y="12.02" width="8.98" height=".8" rx=".4" ry=".4" fill="currentColor" stroke-width="0" />
                <rect x="2.64" y="10.4" width="8.98" height=".8" rx=".4" ry=".4" fill="currentColor" stroke-width="0" />
            </svg>
        </span>
        <div class="card-text flex flex-col gap-1">
            <p class="font-semibold text-sm text-gray-500/90">Total Pengajuan</p>
            <span class="font-text font-semibold text-3xl">36</span>
        </div>
    </div>
    <!-- Card: Total Disetujui -->
    <div class="total-disetujui min-w-32 p-7 flex flex-col shrink-0 grow gap-4 rounded-lg shadow-md">
        <span class="w-fit p-3 bg-green-100/80 text-green-600 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </span>
        <div class="card-text flex flex-col gap-1">
            <p class="font-semibold text-sm text-gray-500/90">Total Disetujui</p>
            <span class="font-text font-semibold text-3xl">24</span>
        </div>
    </div>
    <!-- Card: Total Pending -->
    <div class="total-pending min-w-32 p-7 flex flex-col shrink-0 grow gap-4 rounded-lg shadow-md">
        <span class="w-fit p-3 bg-amber-100/80 text-amber-600 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </span>
        <div class="card-text flex flex-col gap-1">
            <p class="font-semibold text-sm text-gray-500/90">Total Pending</p>
            <span class="font-text font-semibold text-3xl">10</span>
        </div>
    </div>
    <!-- Card: Total Perbaikan -->
    <div class="total-perbaikan min-w-32 p-7 flex flex-col shrink-0 grow gap-4 rounded-lg shadow-md">
        <span class="w-fit p-3 bg-indigo-100/80 text-indigo-600 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </span>
        <div class="card-text flex flex-col gap-1">
            <p class="font-semibold text-sm text-gray-500/90">Total Perbaikan</p>
            <span class="font-text font-semibold text-3xl">2</span>
        </div>
    </div>
</section>
<!-- Akhir Section Cards -->

<section class="search-filter py-10 lg:py-8 xl:py-5 px-7 flex gap-4 bg-white rounded-lg shadow-md">
    <div class="input-search flex flex-col gap-1.5 text-sm shrink-0 grow">
        <div class="input relative text-gray-500/90 shadow-sm rounded-md overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="text" name="_search" id="search" class="py-2.5 px-10 w-full bg-gray-100 focus:outline-none" placeholder="Cari judul pengajuan anda" aria-label="Cari judul pengajuan anda" autocomplete="off" />
        </div>
    </div>
    <div class="filter-box-wrapper relative shrink">
        <button type="button" class="filter-box py-2.5 px-4 flex items-center gap-3.5 bg-gray-100 rounded-md shadow-sm">
            <span class="text-gray-500/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
            </span>
            <span class="filter-text font-text text-sm tracking-wider">Semua Status</span>
            <span class="text-gray-500/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </span>
        </button>
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
                <span>Semua Status</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100">
                <span>Disetujui</span>
                <span class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100">
                <span>Pending</span>
                <span class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100">
                <span>Ditolak</span>
                <span class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</section>

<?= $this->endSection() ?>