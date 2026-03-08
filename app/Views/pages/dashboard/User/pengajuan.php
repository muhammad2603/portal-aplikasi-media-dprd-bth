<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<!-- Form Pengajuan -->
<section class="form-pengajuan mx-auto py-10 lg:py-8 xl:py-5 px-7 shrink-0 grow-0 w-full md:w-3/4 xl:w-2/4 flex flex-col gap-4 bg-white rounded-lg shadow-md">
    <!-- Legend -->
    <div class="legend">
        <h2 class="text-xl">Formulir Pengajuan</h2>
        <p class="mt-1 text-sm text-gray-500/90">Lengkapi formulir di bawah ini untuk mengajukan</p>
    </div>
    <!-- Subtitle Form -->
    <h3 class="mt-4 pb-2 text-lg border-b-[1.5px] border-solid border-gray-200">Informasi Dasar</h3>
    <!-- Input Judul Pengajuan -->
    <div class="input-judul-pengajuan mt-4 flex flex-col gap-1.5 text-sm">
        <label for="judulPengajuan" class="font-text text-sm font-medium"><span>Judul Pengajuan</span><span class="ml-1 text-red-400">*</span></label>
        <span id="errorInputJudulPengajuan" class="error pl-1.5 font-text font-semibold text-xs text-red-500 tracking-wide">Judul wajib diisi.</span>
        <div class="input-wrapper text-gray-500/90">
            <input type="text" name="_judul_pengajuan" id="judulPengajuan" class="input py-2.5 px-3 font-text w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="Cth: Liputan Pelantikan Anggota DPRD..." aria-label="Masukkan Judul Pengajuan" data-error-message-id="errorInputJudulPengajuan" autocomplete="off" />
        </div>
    </div>
    <!-- Input Link/URL Berita -->
    <div class="input-link-url-berita mt-4 flex flex-col gap-1.5 text-sm">
        <label for="urlBerita" class="font-text text-sm font-medium"><span>URL/Link Berita</span><span class="ml-1 text-red-400">*</span></label>
        <p class="pl-1.5 font-semibold text-xs text-gray-500/90 tracking-wide">Isi dengan URL atau link yang mengarah ke berita dimedia anda.</p>
        <span id="errorInputUrlBerita" class="error pl-1.5 font-text font-semibold text-xs text-red-500 tracking-wide">URL/Link Berita wajib diisi.</span>
        <div class="input-wrapper mt-1.5 text-gray-500/90">
            <input type="url" name="_url_berita" id="urlBerita" class="input py-2.5 px-3 font-text w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="Cth: https://media.com/berita/link-berita" aria-label="Masukkan URL atau Link Berita dimedia anda" data-error-message-id="errorInputUrlBerita" autocomplete="url" />
        </div>
    </div>
    <!-- Input Tanggal Tayang -->
    <div class="input-tanggal-tayang mt-4 flex flex-col gap-1.5 text-sm">
        <label for="tanggalPublikasi" class="font-text text-sm font-medium"><span>Tanggal Publikasi/Tayang</span><span class="ml-1 text-red-400">*</span></label>
        <p class="pl-1.5 font-semibold text-xs text-gray-500/90 tracking-wide">Isi dengan tanggal publikasi berita dimedia anda.</p>
        <span id="errorInputTanggalPublikasi" class="error pl-1.5 font-text font-semibold text-xs text-red-500 tracking-wide">Tanggal Publikasi/Tayang wajib diisi.</span>
        <div class="input-wrapper mt-1.5 text-gray-500/90">
            <input type="date" name="_tanggal_publikasi" id="tanggalPublikasi" class="input py-2.5 px-3 font-text w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" aria-label="Masukkan Tanggal Publikasi/Tayang Berita di Media Anda" data-error-message-id="errorInputTanggalPublikasi" autocomplete="off" />
        </div>
    </div>
    <!-- Input Deskripsi -->
    <div class="input-deskripsi mt-4 flex flex-col gap-1.5 text-sm">
        <label for="deskripsi" class="font-text text-sm font-medium"><span>Deskripsi</span><span class="ml-1 text-red-400">*</span></label>
        <span id="errorInputDeskripsi" class="error pl-1.5 font-text font-semibold text-xs text-red-500 tracking-wide">Deskripsi wajib diisi.</span>
        <div class="input-wrapper text-gray-500/90">
            <textarea id="deskripsi" name="_deskripsi" class="input scrollbar-custom py-2.5 px-3 font-text text-sm w-full h-32 bg-primary border border-solid border-gray-500/90 rounded-md resize-none focus:outline-none" placeholder="Jelaskan deskripsi dari pengajuan anda, Max: 300 karakter." aria-label="Masukkan Deskripsi Pengajuan" data-error-message-id="errorInputDeskripsi" autocomplete="off"></textarea>
            <span class="font-text mt-1 mr-2.5 block text-right text-xs">Total: <span id="wordCount">0</span> karakter</span>
        </div>
    </div>
</section>
<!-- Akhir Form Pengajuan -->
<!-- Form Lampiran Pengajuan -->
<section class="form-lampiran-pengajuan mx-auto py-10 lg:py-8 xl:py-5 px-7 shrink-0 grow-0 w-full md:w-3/4 xl:w-2/4 flex flex-col gap-4 bg-white rounded-lg shadow-md">
    <!-- Subtitle Form -->
    <h3 class="pb-2 font-text font-semibold text-lg text-center border-b-[1.5px] border-solid border-gray-200">Screenshot Tayangan Berita Di Media Anda</h3>
    <!-- Input Lampiran -->
    <div class="input-lampiran mt-1.5 flex flex-col gap-1.5 text-sm">
        <!-- Deskripsi Lampiran -->
        <p class="font-semibold text-sm text-center text-gray-500/90 tracking-wide text-pretty">Lampirkan screenshot sebagai bukti bahwa berita telah dipublikasikan di media Anda (Opsional).</p>
        <!-- Add File -->
        <div id="lampiranLabel" class="lampiran mt-4 border-2 border-dashed border-gray-500/70 rounded-lg hover:border-blue-500">
            <label for="lampiran" class="py-8 flex flex-col items-center gap-2 cursor-pointer">
                <span class="text-gray-500/90">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>
                </span>
                <p><span class="font-text font-semibold text-blue-500 cursor-pointer">Klik untuk upload</span></p>
                <p class="font-semibold text-xs text-gray-500/90 text-center">
                    File yang diizinkan:
                    <span class="block mt-1 text-gray-500/70">.jpg, .jpeg, .png, dan .webp (Maks. 2 MB)</span>
                </p>
            </label>
            <input type="file" name="_lampiran" id="lampiran" accept="image/jpeg,image/png,image/webp" class="hidden" hidden />
        </div>
        <!-- Tambah ini jika user telah memilih lampirannya -->
        <div id="lampiranPreview" class="file-selected relative mt-4 w-fit flex flex-col items-center gap-3 hidden">
            <button id="cancelLampiran" type="button" class="absolute right-[-4px] text-gray-500/90 hover:text-black active:text-black" title="Batalkan" aria-label="Batalkan">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <img
                src=""
                class="w-3/4 object-contain aspect-video shadow-md " />
            <span class="text-lg md:text-base lg:text-sm"><span class="font-semibold">File dipilih</span>: <span id="namaFileLampiran"></span></span>
        </div>
        <p class="lampiran-error mt-2 font-medium text-center text-xs text-red-500"></p>
    </div>
    <div class="form-actions mt-4 grid grid-cols-1 sm:grid-cols-4 gap-4 sm:gap-3">
        <button type="reset" id="btnReset" class="col-span-2 py-1.5 font-text text-sm bg-transparent border-[1.5px] border-solid border-red-600 font-semibold text-red-400 rounded-sm transition duration-150 ease-in hover:bg-red-500 hover:text-white focus:outline-none focus:bg-red-500 focus:text-white">Reset</button>
        <button type="submit" id="btnSubmit" class="col-span-2 py-1.5 font-text font-semibold text-sm bg-blue-500 text-white rounded-sm transition duration-150 ease-in hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Kirim Pengajuan</button>
    </div>
</section>
<!-- Akhir Form Lampiran Pengajuan -->
<!-- Script Pengajuan Berita -->
<script src="<?= base_url("/assets/js/pengajuan-berita.js") ?>" type="module"></script>
<?= $this->endSection() ?>