<?= $this->extend('pages/main') ?>
<?= $this->section('content') ?>
<?php
// use Time from codeigniter
use CodeIgniter\I18n\Time;
// call helper date
helper('date');
?>
<!-- Main -->
<main class="py-12 px-6 sm:px-8 md:px-14 xl:px-0 tracking-wide">
    <section class="w-full xl:w-2/4 mx-auto mb-3">
        <!-- Logout Button -->
        <form action="/dashboard/logout" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="logout active font-text ml-auto p-3 w-fit flex items-center gap-1.5 text-red-500 rounded-lg transition duration-150 ease-in hover:bg-red-100 focus:outline-none focus:bg-red-100" aria-label="Keluar" title="Keluar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                </svg>
                <span class="font-semibold truncate text-sm">Keluar</span>
            </button>
        </form>
    </section>
    <!-- Section Status Akun -->
    <section class="status-akun p-8 sm:py-8 sm:px-10 w-full xl:w-2/4 mx-auto bg-white shadow-md rounded-lg">
        <!-- Top/Legend -->
        <div class="top flex flex-col gap-3 items-center text-center text-gray-500/90 text-pretty">
            <span class="text-amber-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </span>
            <h1 class="text-xl">Sedang Menunggu Anda Melakukan Aktivasi Akun...</h1>
            <p class="text-base">Silahkan aktivasi akun anda terlebih dahulu untuk melanjutkan ke halaman Dashboard!</p>
            <div class="aktivasi-akun font-text p-3.5 text-gray-500/90 text-base border border-solid border-gray-500/90 rounded-md">
                <p>Anda dapat melakukan aktivasi dari pesan yang masuk ke Email anda dan klik link untuk melakukan aktivasi akun.</p>
                <p class="mt-2 mb-3 text-sm">Jika pesan belum masuk ke Email anda, silahkan klik tombol dibawah ini:</p>
                <button id="btnAktivasi" class="w-fit mx-auto py-1.5 px-3.5 flex justify-center items-center gap-2 bg-blue-400 text-sm text-white rounded-sm transition duration-150 ease-in hover:bg-blue-500" aria-label="Kirim ulang aktivasi ke email anda">
                    <span>Kirim Ulang Kode Aktivasi</span>
                    <span id="iconLoading" class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5 animate-spin">
                            <path d="M12 2 A10 10 0 0 1 22 12" />
                        </svg>
                    </span>
                </button>
                <p id="messageAktivasi" class="mt-3 text-sm"></p>
            </div>
        </div>
        <!-- Akhir Top/Legend -->
    </section>
    <!-- Akhir Section Status Akun -->
    <!-- Section Informasi Akun -->
    <section class="informasi-akun mt-10 p-8 sm:py-8 sm:px-10 w-full xl:w-2/4 mx-auto bg-white shadow-md rounded-lg">
        <h2 class="text-xl">Informasi Akun Anda yang Terdaftar</h2>
        <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-500/90">
            <div class="nama-lengkap">
                <div class="title flex items-center gap-1.5">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                        </svg>
                    </span>
                    <h3 class="mt-1.5 text-base">Nama Lengkap</h3>
                </div>
                <p class="text-sm"><?= $user_data["nama_lengkap"] ?></p>
            </div>
            <div class="email">
                <div class="title flex items-center gap-1.5">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </span>
                    <h3 class="mt-1.5 text-base">Email</h3>
                </div>
                <p class="text-sm truncate"><?= $user_data["email"] ?></p>
            </div>
            <div class="telpon">
                <div class="title flex items-center gap-1.5">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                    </span>
                    <h3 class="mt-1.5 text-base">No HP/WA</h3>
                </div>
                <p class="text-sm truncate"><?= $user_data["nomor_hp"] ?></p>
            </div>
            <div class="status-akun">
                <div class="title flex items-center gap-1.5">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                    </span>
                    <h3 class="mt-1.5 text-base">Status Akun</h3>
                </div>
                <p class="text-sm">Belum diverifikasi</p>
            </div>
            <div class="tanggal-daftar">
                <div class="title flex items-center gap-1.5">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                    </span>
                    <h3 class="mt-1.5 text-base">Tanggal Pendaftaran</h3>
                </div>
                <p class="text-sm"><?= (Time::parse($user_data["created_at"]))->toLocalizedString('dd MMMM yyyy') ?></p>
            </div>
        </div>
    </section>
    <!-- Akhir Section Informasi Akun -->
    <!-- Kontak Administrator -->
    <div class="kontak mt-10 text-center text-sm">
        <p class="text-gray-500/90">Mengalami kendala atau ada pertanyaan? Hubungi kami di:</p>
        <div class="mail-telp mt-2 flex justify-center gap-4 text-green">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 float-left mr-1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
                <span><?= $email_support ?></span>
            </p>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 float-left mr-1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>
                <span><?= $telp_fax ?></span>
            </p>
        </div>
    </div>
    <!-- Akhir Kontak Administrator -->
</main>
<!-- Akhir Main -->
<!-- Script Status Akun JS -->
<script type="module" src="<?= base_url("/assets/js/status-akun.js") ?>"></script>
<?= $this->endSection() ?>