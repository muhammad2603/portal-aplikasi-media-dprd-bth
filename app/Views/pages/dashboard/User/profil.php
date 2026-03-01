<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<!-- Section Data Profil -->
<section class="riwayat-pengajuan py-12 lg:py-13 xl:py-10 px-7 bg-white rounded-lg shadow-md">
    <!-- Legend -->
    <div class="legend">
        <h2 class="text-xl">Data Profil</h2>
        <p class="mt-1 text-sm text-gray-500/90">Lengkapi data profil anda</p>
    </div>
    <!-- Box Data profile -->
    <div class="box-data-profile mt-4">
        <!-- Profil Image -->
        <figure class="current-profil-image">
            <img src="https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg" alt="Profil" class="current-profile-image w-[100px] aspect-square rounded-full overflow-hidden">
        </figure>
        <!-- Informasi Pribadi -->
        <div class="informasi-pribadi mt-4">
            <!-- Subtitle Form -->
            <h3 class="mt-4 pb-2 text-lg border-b-[1.5px] border-solid border-gray-200">Informasi Dasar</h3>
            <!-- Nama Lengkap -->
            <div class="nama-lengkap mt-4 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">Nama Lengkap: <span class="font-text font-normal text-gray-500/90">Muhammad Fattahillah. Mz</span></p>
            </div>
            <!-- Tanggal Lahir -->
            <div class="tanggal-lahir mt-2 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">Tanggal Lahir: <span class="font-text font-normal text-gray-500/90">26 Maret 2026</span></p>
            </div>
            <!-- No Telp/WA -->
            <div class="no-telp mt-2 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">No HP/WA: <span class="font-text font-normal text-gray-500/90">0822-8034-3857</span></p>
            </div>
        </div>
        <!-- Informasi Kantor/Perusahaan Media -->
        <div class="informasi-kantor-media mt-4">
            <!-- Subtitle Form -->
            <h3 class="mt-4 pb-2 text-lg border-b-[1.5px] border-solid border-gray-200">Informasi Kantor/Perusahaan Media</h3>
            <!-- Kantor/Perusahaan Media -->
            <div class="nama-kantor-media mt-4 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">Nama Kantor/Perusahaan Media: <span class="font-text font-normal text-gray-500/90">Media Jambi News</span></p>
            </div>
            <!-- Alamat Kantor/Perusahaan Media -->
            <div class="alamat-kantor-media mt-2 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">Alamat Kantor/Perusahaan Media: <span class="font-text font-normal text-gray-500/90">Jl Cut Mutia No. 6 Kelurahan Rajawali, Kecamatan Jambi Timur, Kota Jambi, 36143</span></p>
            </div>
        </div>
    </div>
    <!-- Box Change Data -->
    <div class="box-change-data mt-4 hidden">
        <!-- Profile Image -->
        <div class="profile-image flex flex-col gap-0.5">
            <!-- Placeholder Profile Image -->
            <figure>
                <img src="https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg" alt="Profil" class="current-profile-image w-[100px] aspect-square rounded-full overflow-hidden">
            </figure>
            <!-- Input Profile Image -->
            <input type="file" name="_change_profil" id="changeProfile" class="hidden" accept=".jpg,.jpeg,.png,.webp" aria-hidden="true" hidden />
            <!-- Button for change Profile Image -->
            <button class="py-0.5 px-2.5 w-fit bg-blue-500 rounded-sm transition duration-150 ease-in hover:bg-blue-600 focus:outline-none focus:bg-blue-600 active:bg-blue-600" title="Ganti gambar profil anda">
                <label for="changeProfile" class="text-xs text-white cursor-pointer">Ganti Profil</label>
            </button>
        </div>
        <!-- Informasi Pribadi -->
        <div class="informasi-pribadi mt-4">
            <!-- Subtitle Form -->
            <h3 class="mt-4 pb-2 text-lg border-b-[1.5px] border-solid border-gray-200">Informasi Dasar</h3>
            <!-- Input Nama Lengkap -->
            <div class="input-nama-lengkap mt-4 flex flex-col gap-1.5 text-sm">
                <label for="namaLengkap" class="font-text text-sm font-medium">Nama Lengkap</label>
                <div class="input text-gray-500/90">
                    <input type="text" name="_change_full_name" id="namaLengkap" class="py-2.5 px-3 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" value="Muhammad Fattahillah. Mz" placeholder="Nama Lengkap" aria-label="Masukkan Nama Lengkap Anda" autocomplete="name" />
                </div>
            </div>
            <!-- Input Tanggal Lahir -->
            <div class="input-tanggal-lahir mt-4 flex flex-col gap-1.5 text-sm">
                <label for="tanggalLahir" class="font-text text-sm font-medium">Tanggal Lahir</label>
                <p class="pl-1.5 font-semibold text-xs text-gray-500/90 tracking-wide">Format [tanggal:bulan:tahun]. Tidak wajib diisi.</p>
                <div class="input mt-1.5 text-gray-500/90">
                    <input type="date" name="_change_date_birth" id="tanggalLahir" class="py-2.5 px-3 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" aria-label="Masukkan Tanggal Lahir Anda" value="2004-03-26" autocomplete="bday" />
                </div>
            </div>
            <!-- Input No Telp/WA -->
            <div class="input-no-telp mt-4 flex flex-col gap-1.5 text-sm">
                <label for="noTelp" class="font-text text-sm font-medium">No HP/WA</label>
                <p class="pl-1.5 font-semibold text-xs text-gray-500/90 tracking-wide">Diawali dengan 08XXXXXXXXXX. Minimal 12 digit angka</p>
                <div class="input mt-1.5 text-gray-500/90">
                    <input type="tel" name="_change_no_telp" id="noTelp" class="py-2.5 px-3 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" aria-label="Masukkan Nomor HP atau WhatsApp Anda" value="082280343857" placeholder="No HP/WA" autocomplete="tel-local" />
                </div>
            </div>
        </div>
        <!-- Informasi Kantor/Perusahaan Media -->
        <div class="informasi-kantor-media mt-4">
            <!-- Subtitle Form -->
            <h3 class="mt-4 pb-2 text-lg border-b-[1.5px] border-solid border-gray-200">Informasi Kantor/Perusahaan Media</h3>
            <!-- Input Nama Kantor/Perusahaan Media -->
            <div class="input-nama-kantor-media mt-4 flex flex-col gap-1.5 text-sm">
                <label for="namaKantorMedia" class="font-text text-sm font-medium">Nama Kantor/Perusahaan Media</label>
                <p class="pl-1.5 font-semibold text-xs text-gray-500/90 tracking-wide">Tidak wajib diisi.</p>
                <div class="input mt-1.5 text-gray-500/90">
                    <input type="text" name="_change_media_office_name" id="namaKantorMedia" class="py-2.5 px-3 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" aria-label="Masukkan Nama Kantor/Perusahaan Media Anda" placeholder="Cth: Media Jambi News, CNN, dll." value="Media Jambi News" autocomplete="off" />
                </div>
            </div>
            <!-- Input Alamat Kantor/Perusahaan Media -->
            <div class="input-alamat-kantor-media mt-4 flex flex-col gap-1.5 text-sm">
                <label for="alamatKantorMedia" class="font-text text-sm font-medium">Alamat Kantor/Perusahaan Media</label>
                <p class="pl-1.5 font-semibold text-xs text-gray-500/90 tracking-wide">Tidak wajib diisi.</p>
                <div class="input mt-1.5 text-gray-500/90">
                    <input type="text" name="_change_media_office_address" id="alamatKantorMedia" class="py-2.5 px-3 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" aria-label="Masukkan Alamat Kantor/Perusahaan Media Anda" placeholder="Cth: Jl. Melati No. 5, RT 01/RW 02, Jakarta, 14350" value="Jl Cut Mutia No. 6 Kelurahan Rajawali, Kecamatan Jambi Timur, Kota Jambi, 36143" autocomplete="off" />
                </div>
            </div>
        </div>
        <!-- Form Actions -->
        <div class="form-actions mt-8 ml-auto w-2/4 grid grid-cols-1 sm:grid-cols-4 gap-4 sm:gap-3">
            <button type="button" class="col-span-2 py-1.5 font-text text-sm bg-transparent border-[1.5px] border-solid border-red-600 font-semibold text-red-400 rounded-sm transition duration-150 ease-in hover:bg-red-500 focus:outline-none focus:bg-red-500 active:bg-red-500 hover:text-white focus:text-white">Batalkan</button>
            <button type="submit" class="col-span-2 py-1.5 font-text font-semibold text-sm bg-blue-500 text-white rounded-sm transition duration-150 ease-in hover:bg-blue-600 focus:outline-none focus:bg-blue-600 active:bg-blue-600">Kirim Pengajuan</button>
        </div>
    </div>
</section>
<!-- Akhir Section Data Profil -->
<?= $this->endSection() ?>