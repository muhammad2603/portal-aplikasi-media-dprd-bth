<?= $this->extend('pages/main') ?>

<?= $this->section('content') ?>
<main class="px-6 sm:px-14 xl:px-0 w-full min-h-screen flex items-center">
    <section class="login grid grid-cols-1 lg:grid-cols-2 gap-12 mx-auto p-8 md:p-12 lg:p-8 xl:p-4 2xl:py-10 2xl:px-8 w-full xl:w-3/4 h-auto bg-white shadow-md rounded-xl">
        <aside class="background-login hidden lg:block w-full h-full p-4 bg-[url(https://cdn.antaranews.com/cache/1200x800/2023/02/01/IMG-20230201-WA0025_3.jpg)] bg-cover bg-center bg-no-repeat border-2 border-solid border-primary rounded-lg">
            <figure>
                <img src="<?= base_url('/assets/images/logo-batanghari.png') ?>" alt="Logo Kabupaten Batang Hari" class="w-10" />
            </figure>
        </aside>
        <div class="login-information pt-4 pb-1.5 flex flex-col gap-3.5 md:gap-1.5 justify-center font-title">
            <span class="text-3xl text-center tracking-wide">LOGIN | <h1 class="inline text-green">SiKEMA</h1></span>
            <p class="text-center text-sm text-pretty text-gray-500/90 tracking-wide">Selamat datang di Sistem Informasi Media Elektronik Setwan Kabupaten Batang Hari!</p>
            <div class="form-login mt-5 flex flex-col gap-5 md:gap-4">
                <div class="input-email flex flex-col gap-1.5 text-sm">
                    <label for="email" class="font-text font-semibold"><span>Email</span></label>
                    <div class="input relative text-gray-500/90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <input type="email" name="_email" id="email" class="py-2.5 px-10 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="nama_email@gmail.com" aria-label="Masukkan Email" autocomplete="email" />
                    </div>
                </div>
                <div class="input-password flex flex-col gap-1.5 text-sm">
                    <label for="password" class="font-text font-semibold"><span>Kata Sandi</span></label>
                    <div class="input relative text-gray-500/90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-5 absolute top-[50%] left-3 -translate-y-[50%]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        <input type="password" name="_password" id="password" class="py-2.5 px-10 w-full bg-primary border border-solid border-gray-500/90 rounded-md focus:outline-none" placeholder="Kata Sandi" aria-label="Masukkan Kata Sandi" autocomplete="off" />
                    </div>
                </div>
                <div class="meta-form flex justify-between font-text text-sm">
                    <span class="remember-me">
                        <input type="checkbox" name="_rememberme" id="rememberMe" class="align-middle mr-0.5 accent-green-600 focus:outline-none" />
                        <label for="rememberMe">Ingat Saya</label>
                    </span>
                    <a href="/reset-password" class="text-green">Lupa kata sandi?</a>
                </div>
                <button type="button" class="py-2.5 bg-green font-text font-semibold text-white tracking-wider rounded-md hover:shadow-lg active:shadow-lg">Login</button>
            </div>
            <div class="bottom text-gray-500/90">
                <div class="flex items-center gap-5 py-3.5">
                    <span class="flex-1 h-0.5 bg-gray-100"></span>
                    <span class="shrink-0 text-sm">Atau</span>
                    <span class="flex-1 h-0.5 bg-gray-100"></span>
                </div>
                <p class="text-sm text-center">Belum memiliki akun? <a href="/daftar" class="font-semibold text-green">Daftar sekarang</a></p>
                <p class="copyright mt-1 text-sm text-center">&copy; Copyright 2026. Setwan Batang Hari. All Rights Reserved.</p>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>