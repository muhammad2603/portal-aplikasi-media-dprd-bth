<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<!-- Section Search Filter -->
<section class="search ml-auto py-10 lg:py-8 xl:py-5 px-7 w-2/4 flex gap-4 bg-white rounded-lg shadow-md">
    <!-- Input Search -->
    <div class="input-search flex flex-col gap-1.5 text-sm shrink-0 grow">
        <!-- Input wrapper -->
        <div class="input relative text-gray-500/90 shadow-sm rounded-md overflow-hidden">
            <!-- Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <!-- Input:text search -->
            <input type="text" name="_search" id="search" class="py-2.5 px-10 w-full bg-gray-100 focus:outline-none" placeholder="Cari judul pengajuan yang terhapus" aria-label="Cari judul pengajuan anda" autocomplete="off" />
        </div>
    </div>
</section>
<!-- Akhir Section Search Filter -->
<!-- Section Riwayat Pengajuan -->
<section class="riwayat-pengajuan py-10 lg:py-8 xl:py-5 px-7 bg-white rounded-lg shadow-md">
    <!-- Legend -->
    <div class="legend">
        <h2 class="text-base">Daftar Pengajuan yang Terhapus</h2>
        <p class="text-sm text-gray-500/90">Menampilkan <span class="font-semibold text-black">6</span> dari <span class="font-semibold text-black">8</span> total pengajuan terhapus</p>
    </div>
    <!-- List Riwayat Pengajuan -->
    <div id="listRiwayatPengajuan" class="list-riwayat-pengajuan mt-8 flex flex-col gap-4">
        <?= view("components/riwayat-hapus", ["deleted_pengajuan" => $deleted_pengajuan]) ?>
    </div>
</section>
<!-- Akhir Section Riwayat Pengajuan -->
<!-- Script Riwayat Hapus -->
<script type="module" src="<?= base_url("/assets/js/aksi-riwayat-hapus.js") ?>"></script>
<?= $this->endSection() ?>