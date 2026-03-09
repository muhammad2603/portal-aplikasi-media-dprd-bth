<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<!-- Section Data Profil -->
<section class="riwayat-pengajuan py-12 lg:py-13 xl:py-10 px-7 bg-white rounded-lg shadow-md">
    <!-- Legend -->
    <div class="legend flex justify-between items-center">
        <!-- Title -->
        <div class="title">
            <h2 class="text-xl">Data Profil</h2>
        </div>
    </div>
    <!-- Box Data profile -->
    <div id="boxDataProfile" class="box-data-profile mt-4">
        <!-- Profile Image -->
        <div class="profile-image flex flex-col">
            <!-- Placeholder Profile Image -->
            <figure id="currentProfileImage" class="w-fit">
                <img src="/assets/images/default-profile-image.webp" alt="Profil" class="w-[100px] object-cover aspect-square rounded-full overflow-hidden">
            </figure>
            <!-- Current Profile Image -->
            <div class="current-profile-image-wrapper relative w-fit hidden">
                <button id="cancelChangeProfile" type="button" class="absolute right-[-4px] text-gray-500/90 hover:text-black active:text-black" title="Batalkan" aria-label="Batalkan">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
                <figure id="figureProfilePreview" class="mb-2">
                    <img src="/assets/images/default-profile-image.webp" alt="Profil" class="w-[100px] object-cover aspect-square rounded-full overflow-hidden">
                </figure>
            </div>
            <!-- Input Profile Image -->
            <input type="file" name="_change_profil" id="changeProfile" class="hidden" accept="image/jpeg,image/png,image/webp" aria-hidden="true" hidden />
            <span class="error-message font-text mt-1 font-medium text-xs text-red-500"></span>
            <!-- Button for change Profile Image -->
            <button id="btnChangeProfil" class="py-0.5 px-2.5 w-fit mt-2.5 bg-blue-500 rounded-sm transition duration-150 ease-in hover:bg-blue-600 focus:outline-none focus:bg-blue-600 active:bg-blue-600" title="Ganti profil anda">
                <label for="changeProfile" class="font-text text-xs text-white cursor-pointer">Ganti Profil</label>
            </button>
            <!-- Button Submit change Profile Image -->
            <button type="button" id="submitChangeData" class="py-1.5 px-5 w-fit bg-blue-500 font-text text-xs text-white rounded-sm transition duration-150 ease-in hover:bg-blue-600 focus:outline-none focus:bg-blue-600 active:bg-blue-600 hidden" aria-label="Submit pergantian profil">Submit</button>
        </div>
        <!-- Informasi Pribadi -->
        <div class="informasi-pribadi mt-4">
            <!-- Subtitle Form -->
            <h3 class="mt-4 pb-2 text-lg border-b-[1.5px] border-solid border-gray-200">Informasi Pengguna</h3>
            <!-- Nama Lengkap -->
            <div class="nama-lengkap mt-4 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">Nama Lengkap: <span class="font-text font-normal text-gray-500/90">Muhammad Fattahillah. Mz</span></p>
            </div>
            <!-- Role -->
            <div class="role mt-2 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">Role: <span class="font-text font-normal text-gray-500/90">Admin</span></p>
            </div>
            <!-- Jabatan -->
            <div class="jabatan mt-2 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">Jabatan: <span class="font-text font-normal text-gray-500/90">Non ASN</span></p>
            </div>
            <!-- Bagian -->
            <div class="bagian mt-2 flex flex-col gap-1.5 text-sm">
                <p class="font-text text-sm font-medium">Bagian: <span class="font-text font-normal text-gray-500/90">Humas & Publikasi</span></p>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Section Data Profil -->
<!-- Script Edit Profil Admin -->
<script type="module" src="<?= base_url("/assets/js/edit-profil-admin.js") ?>"></script>
<?= $this->endSection() ?>