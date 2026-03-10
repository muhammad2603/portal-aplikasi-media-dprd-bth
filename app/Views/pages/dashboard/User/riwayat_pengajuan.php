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
<!-- Section Search Filter -->
<section class="search-filter py-10 lg:py-8 xl:py-5 px-7 flex flex-col sm:flex-row gap-4 bg-white rounded-lg shadow-md">
    <!-- Input Search -->
    <div class="input-search flex flex-col gap-1.5 text-sm shrink grow">
        <!-- Input wrapper -->
        <div class="input relative text-gray-500/90 shadow-sm rounded-md overflow-hidden">
            <!-- Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <!-- Input:text search -->
            <input type="text" name="_search" id="search" class="py-2.5 px-10 w-full bg-gray-100 focus:outline-none" placeholder="Cari judul pengajuan anda" aria-label="Cari judul pengajuan anda" autocomplete="off" />
        </div>
    </div>
    <!-- Filter Box wrapper -->
    <div class="filter-box-wrapper relative shrink-0 ml-auto">
        <!-- Button show filter select -->
        <button id="btnFilterBox" type="button" class="filter-box py-2.5 px-4 w-52 flex justify-between items-center gap-3.5 bg-gray-100 rounded-md shadow-sm focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-500/90">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
            </svg>
            <span id="filterText" class="filter-text font-text text-sm tracking-wider">Semua Status</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-500/90">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <!-- Filter Select -->
        <div id="filterSelect" class="filter-select w-full p-1.5 absolute top-[120%] translate-y-[-16px] flex flex-col border border-solid border-gray-200 bg-white rounded-md shadow-sm opacity-0 transition duration-350 ease-out visibility-hidden pointer-events-none closed">
            <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center bg-gray-100 text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 active">
                <span>Semua Status</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                <span>Disetujui</span>
                <span class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                <span>Pending</span>
                <span class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
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
<!-- Akhir Section Search Filter -->
<!-- Section Riwayat Pengajuan -->
<section class="riwayat-pengajuan py-10 lg:py-8 xl:py-5 px-7 bg-white rounded-lg shadow-md">
    <!-- Legend -->
    <div class="legend">
        <h2 class="text-base">Daftar Riwayat Pengajuan</h2>
        <p class="text-sm text-gray-500/90">Menampilkan <span class="font-semibold text-black">6</span> dari <span class="font-semibold text-black">36</span> total pengajuan</p>
    </div>
    <!-- List Riwayat Pengajuan -->
    <div id="listRiwayatPengajuan" class="list-riwayat-pengajuan mt-8 flex flex-col gap-4">
        <?php for ($i = 0; $i < 6; $i++): ?>
            <article class="py-5 px-4 border-[1.5px] border-solid border-gray-200 rounded-md shadow-sm"
                data-meta-pengajuan='{"confirmedBy": "Andi Rahman", "confirmedDate": "07 Maret 2026", "status": "Disetujui", "judul": "Liputan Pemilu 2025", "url": "https://media.com/berita/liputan-pemilu-2025", "tanggalPublikasi": "2026-03-01", "deskripsi": "Liputan pemilu 2025 yang diselenggarakan di DPRD Kabupaten Batang Hari", "media": "Kompas TV", "revisiCount": "3", "uploadDate": "22 Februari 2026"}'>
                <div class="top flex items-center gap-4">
                    <h3 class="text-base">Liputan Pemilu 2025</h3>
                    <span class="py-1 px-3 flex items-center gap-1 bg-green-100/80 font-semibold text-green-600 text-xs rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="font-text">Disetujui</span>
                    </span>
                </div>
                <div class="info mt-2 flex gap-3">
                    <span class="flex items-center gap-1 text-gray-500/90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                        </svg>
                        <span class="font-text text-sm">Kompas TV</span>
                    </span>
                    <span class="flex items-center gap-1 text-gray-500/90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        <span class="font-text text-sm">22 Februari 2026</span>
                    </span>
                </div>
                <div class="actions mt-3.5 pt-3 flex gap-2.5 border-t-[1.5px] border-solid border-gray-200">
                    <button type="button" data-modal="#informations" class="btn-see-details font-text p-2 flex items-center gap-1.5 font-semibold text-xs border-[1.5px] border-solid border-gray-100 rounded-md transition duration-150 ease-in hover:bg-gray-200">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                        <span>Lihat Detail</span>
                    </button>
                    <button type="button" data-modal="#edit" class="btn-edit font-text p-2 flex items-center gap-1.5 font-semibold text-xs border-[1.5px] border-solid border-gray-100 rounded-md transition duration-150 ease-in hover:bg-gray-200">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </span>
                        <span>Edit</span>
                    </button>
                    <button type="button" data-modal="#confirm" class="btn-delete font-text ml-auto p-2 flex items-center gap-1.5 font-semibold text-red-600 text-xs border-[1.5px] border-solid border-gray-100 rounded-md transition duration-150 ease-in hover:bg-red-50 hover:border-red-200">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </span>
                        <span>Hapus</span>
                    </button>
                </div>
            </article>
        <?php endfor ?>
    </div>
</section>
<!-- Akhir Section Riwayat Pengajuan -->
<!-- Script Filter Box -->
<script type="module" src="<?= base_url('/assets/js/filter-box.js') ?>"></script>
<!-- Script Aksi Riwayat Pengajuan -->
<script type="module" src="<?= base_url("/assets/js/aksi-riwayat-pengajuan.js") ?>"></script>
<?= $this->endSection() ?>