<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>

<section class="form-pengajuan mx-auto py-10 lg:py-8 xl:py-5 px-7 shrink-0 grow-0 w-full md:w-3/4 xl:w-2/4 flex flex-col gap-4 bg-white rounded-lg shadow-md">
    <!-- Legend -->
    <div class="legend">
        <h2 class="text-xl">Formulir Pengajuan</h2>
        <p class="mt-1 text-sm text-gray-500/90">Lengkapi formulir di bawah ini untuk mengajukan</p>
    </div>
    <h3 class="mt-4 pb-2 text-lg border-b-[1.5px] border-solid border-gray-200">Informasi Dasar</h3>
    <div class="input-judul-pengajuan mt-4 flex flex-col gap-1.5 text-sm">
        <label for="judulPengajuan" class="font-text text-sm font-medium"><span>Judul Pengajuan</span><span class="ml-1 text-red-400">*</span></label>
        <div class="input text-gray-500/90">
            <input type="text" name="_judul_pengajuan" id="judulPengajuan" class="py-2.5 px-3 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="Cth: Liputan Pelantikan Anggota DPRD..." aria-label="Masukkan Judul Pengajuan" autocomplete="off" />
        </div>
    </div>
    <div class="input-tanggal-tayang mt-4 flex flex-col gap-1.5 text-sm">
        <label for="tanggalPublikasi" class="font-text text-sm font-medium"><span>Tanggal Publikasi/Tayang</span><span class="ml-1 text-red-400">*</span></label>
        <p class="pl-1.5 font-semibold text-xs text-gray-500/90 tracking-wide">Input ini diisi dengan tanggal publikasi berita dimedia anda</p>
        <div class="input mt-1.5 text-gray-500/90">
            <input type="date" name="_tanggal_publikasi" id="tanggalPublikasi" class="py-2.5 px-3 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="Cth: Liputan Pelantikan Anggota DPRD..." aria-label="Masukkan Judul Pengajuan" autocomplete="off" />
        </div>
    </div>
    <div class="input-deskripsi mt-4 flex flex-col gap-1.5 text-sm">
        <label for="deskripsi" class="font-text text-sm font-medium"><span>Deskripsi</span><span class="ml-1 text-red-400">*</span></label>
        <div class="input text-gray-500/90">
            <textarea name="_deskripsi" id="deskripsi" class="py-2.5 px-3 w-full h-32 bg-primary border border-solid border-gray-500/90 rounded-md resize-none focus:outline-none" placeholder="Jelaskan deskripsi dari pengajuan anda, Max: 300 kata." aria-label="Masukkan Deskripsi Pengajuan" autocomplete="off"></textarea>
        </div>
    </div>
</section>

<section class="form-lampiran-pengajuan mx-auto py-10 lg:py-8 xl:py-5 px-7 shrink-0 grow-0 w-full md:w-3/4 xl:w-2/4 flex flex-col gap-4 bg-white rounded-lg shadow-md">
    <h3 class="pb-2 font-text font-semibold text-lg text-center border-b-[1.5px] border-solid border-gray-200">Screenshot Tayangan Berita Di Media Anda</h3>
    <div class="input-lampiran mt-1.5 flex flex-col gap-1.5 text-sm">
        <p class="font-semibold text-sm text-center text-gray-500/90 tracking-wide text-pretty">Lampirkan screenshot sebagai bukti bahwa berita telah dipublikasikan di media Anda.</p>
        <div class="lampiran mt-4 border-2 border-dashed border-gray-500/70 rounded-lg hover:border-blue-500">
            <label for="lampiran" class="py-8 flex flex-col items-center gap-2 cursor-pointer">
                <span class="text-gray-500/90">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>
                </span>
                <p><span class="font-text font-semibold text-blue-500 cursor-pointer">Klik untuk upload</span> <span>atau drag and drop disini</span></p>
                <p class="font-semibold text-xs text-gray-500/90 text-center">
                    File yang diizinkan:
                    <span class="block mt-1 text-gray-500/70">.jpg, .jpeg, .png, dan .webp (Maks. 2 MB)</span>
                </p>
            </label>
            <input type="file" name="_lampiran" id="lampiran" accept=".jpg,.jpeg,.png,.webp" class="hidden" hidden />
        </div>
        <div class="file-selected mt-4 flex-col items-center gap-3 hidden">
            <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvYMdJYjMJIxYaA70ar0T1C1BWT1BCqIBXPw&s"
                class="shadow-md w-3/4 aspect-video" />
            <p class="text-lg md:text-base lg:text-sm"><span class="font-semibold">File dipilih</span>: nama_image.jpg</p>
        </div>
    </div>
    <div class="form-actions mt-4 grid grid-cols-1 sm:grid-cols-4 gap-4 sm:gap-3">
        <button type="reset" class="col-span-2 py-1.5 font-text text-sm bg-transparent border-[1.5px] border-solid border-red-600 font-semibold text-red-400 rounded-sm transition duration-150 ease-in hover:bg-red-500 hover:text-white">Reset</button>
        <button type="submit" class="col-span-2 py-1.5 font-text font-semibold text-sm bg-blue-500 text-white rounded-sm transition duration-150 ease-in hover:bg-blue-600">Kirim Pengajuan</button>
    </div>
</section>

<?= $this->endSection() ?>