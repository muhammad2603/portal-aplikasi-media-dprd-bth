<?= $this->extend('pages/main') ?>

<?= $this->section('content') ?>
<main class="px-6 sm:px-14 xl:px-0 w-full min-h-screen flex items-center">
    <section class="login grid grid-cols-1 lg:grid-cols-2 gap-12 mx-auto p-8 md:p-12 lg:p-8 xl:p-4 2xl:py-10 2xl:px-8 w-full xl:w-3/4 h-auto bg-white shadow-md rounded-xl">
        <aside class="background-login hidden lg:block w-full h-full p-4 bg-[url(https://cdn.antaranews.com/cache/1200x800/2023/02/01/IMG-20230201-WA0025_3.jpg)] bg-cover bg-center bg-no-repeat border-2 border-solid border-primary rounded-lg">
            <figure>
                <img src="<?= base_url('/assets/images/logo-batanghari.png') ?>" alt="Logo Kabupaten Batang Hari" class="w-10" />
            </figure>
        </aside>
        <div class="register-information pt-4 pb-1.5 flex flex-col gap-3.5 md:gap-1.5 justify-center font-title">
            <span class="text-3xl text-center tracking-wide">Daftar | <h1 class="inline text-green">SiKEMA</h1></span>
            <p class="text-center text-sm text-pretty text-gray-500/90 tracking-wide">Silahkan daftar diri anda untuk mengakses aplikasi Sistem Informasi Media Elektronik Setwan Kabupaten Batang Hari!</p>
            <div class="form-login mt-2 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <div class="input-nama-lengkap sm:col-span-2 flex flex-col gap-1.5 text-sm">
                    <label for="namaLengkap" class="font-text font-semibold"><span>Nama Lengkap</span></label>
                    <div class="input relative text-gray-500/90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                        </svg>
                        <input type="text" name="_nama_lengkap" id="namaLengkap" class="py-2.5 pl-10 pr-2 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="Nama Lengkap" aria-label="Masukkan Nama Lengkap" autocomplete="name" />
                    </div>
                </div>
                <div class="input-email flex flex-col gap-1.5 text-sm">
                    <label for="email" class="font-text font-semibold"><span>Email</span></label>
                    <div class="input relative text-gray-500/90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <input type="email" name="_email" id="email" class="py-2.5 pl-10 pr-2 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="nama_email@gmail.com" aria-label="Masukkan Email" autocomplete="email" />
                    </div>
                </div>
                <div class="input-no-telp flex flex-col gap-1.5 text-sm">
                    <label for="noTelp" class="font-text font-semibold"><span>No Telpon/WA</span></label>
                    <div class="input relative text-gray-500/90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        <input type="tel" name="_no_telp" id="noTelp" class="py-2.5 pl-10 pr-2 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="08XXXXXXXXXX" aria-label="Masukkan Kata Sandi" autocomplete="tel" />
                    </div>
                </div>
                <div class="input-password sm:col-span-2 flex flex-col gap-1.5 text-sm">
                    <label for="password" class="font-text font-semibold"><span>Kata Sandi</span></label>
                    <div class="input relative text-gray-500/90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        <input type="password" name="_password" id="password" class="py-2.5 px-10 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="Kata Sandi" aria-label="Masukkan Kata Sandi" autocomplete="off" />
                    </div>
                </div>
                <button type="button" class="sm:col-span-2 mt-1 py-2.5 bg-green font-text font-semibold text-white tracking-wider rounded-md hover:shadow-lg active:shadow-lg">Daftar</button>
            </div>
            <div class="bottom text-gray-500/90">
                <div class="flex items-center gap-5 py-3.5">
                    <span class="flex-1 h-0.5 bg-gray-100"></span>
                    <span class="shrink-0 text-sm">Atau</span>
                    <span class="flex-1 h-0.5 bg-gray-100"></span>
                </div>
                <p class="text-sm text-center">Sudah memiliki akun? <a href="/login" class="font-semibold text-green">Silahkan Login</a></p>
                <p class="copyright mt-1 text-sm text-center">&copy; Copyright 2026. Setwan Batang Hari. All Rights Reserved.</p>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>