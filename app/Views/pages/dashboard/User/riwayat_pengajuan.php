<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<?php

use App\Libraries\TimeService;

$timeService = new TimeService();
?>
<!-- Section Cards: informasi Pengajuan -->
<section class="cards pb-3.5 xl:pb-0 px-2 xl:px-0 flex gap-6 overflow-x-scroll xl:overflow-visible">
    <?= view('components/card', [
        "items" => [
            [
                "card_title" => 'Pending',
                "card_description" => $riwayat_pengajuan["pending"],
                "add_class" => 'flex-1 flex-col',
                "card_icon" => [
                    "icon" => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>',
                    "icon_color" => 'bg-amber-100/80 text-amber-600'
                ]
            ],
            [
                "card_title" => 'Perbaikan',
                "card_description" => $riwayat_pengajuan["perbaikan"],
                "add_class" => 'flex-1 flex-col',
                "card_icon" => [
                    "icon" => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>',
                    "icon_color" => 'bg-indigo-100/80 text-indigo-600'
                ]
            ],
            [
                "card_title" => 'Ditolak',
                "card_description" => $riwayat_pengajuan["ditolak"],
                "add_class" => 'flex-1 flex-col',
                "card_icon" => [
                    "icon" => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>',
                    "icon_color" => 'bg-red-100/80 text-red-600'
                ]
            ],
            [
                "card_title" => 'Disetujui',
                "card_description" => $riwayat_pengajuan["disetujui"],
                "add_class" => 'flex-1 flex-col',
                "card_icon" => [
                    "icon" => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>',
                    "icon_color" => 'bg-green-100/80 text-green-600'
                ]
            ],
        ]
    ]) ?>
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
            <input type="text" name="_search" id="searchInput" class="py-2.5 px-10 w-full bg-gray-100 focus:outline-none" placeholder="Cari judul pengajuan anda" aria-label="Cari judul pengajuan anda" autocomplete="off" />
        </div>
    </div>
    <!-- Filter Box wrapper -->
    <div class="filter-box-wrapper relative shrink-0 ml-auto">
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
            <button type="button" data-filter-by="Terbaru" class="filter-option py-1.5 px-2 flex justify-between items-center bg-gray-100 text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 active">
                <span>Terbaru</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" data-filter-by="Pending" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                <span>Pending</span>
                <span class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" data-filter-by="Disetujui" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                <span>Disetujui</span>
                <span class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" data-filter-by="Perbaikan" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                <span>Perbaikan</span>
                <span class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </span>
            </button>
            <button type="button" data-filter-by="Ditolak" class="filter-option py-1.5 px-2 flex justify-between items-center text-sm rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
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
        <!-- __FIX__ pesan dibawah ini harus disesuaikan dengan jumlah data yang diambil.
                jika data yang diambil memiliki total <= 6, maka pesan harus: Menampilkan {total} pengajuan
                jika data yang diambil memiliki total > 6, maka pesan harus: Menampilkan {pager} dari {total} total pengajuan
                digunakan saat penerapan pagination nanti -->
        <p class="text-sm text-gray-500/90">Menampilkan <span class="font-semibold text-black"><?= count($list_pengajuan) ?></span> dari <span class="font-semibold text-black"><?= $total_pengajuan ?></span> total pengajuan</p>
        <p class="text-sm text-gray-500/90">Catatan: Pengajuan bisa dihapus hanya jika statusnya masih Pending dan Ditolak.</p>
    </div>
    <!-- List Riwayat Pengajuan -->
    <div id="listRiwayatPengajuan" class="list-riwayat-pengajuan mt-8 flex flex-col gap-4">
        <?= view("components/data_pengajuan", ["pengajuan" => $list_pengajuan]) ?>
    </div>
</section>
<!-- Akhir Section Riwayat Pengajuan -->
<!-- Script Filter Box -->
<script type="module" src="<?= base_url('/assets/js/filter-box.js') ?>"></script>
<!-- Script Aksi Riwayat Pengajuan -->
<script type="module" src="<?= base_url("/assets/js/aksi-riwayat-pengajuan.js") ?>"></script>
<?= $this->endSection() ?>