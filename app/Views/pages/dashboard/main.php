<!DOCTYPE html>
<html lang="en" class="text-[14px] sm:text-[16px] 2xl:text-[20px]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SiMELEK</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/fonts.css') ?>">
</head>

<body class="grid grid-cols-1 sm:grid-cols-12 min-h-screen">
    <aside class="fixed sm:block sm:sticky top-0 h-screen sm:h-fit sm:col-span-2 border-r border-solid border-gray-200 z-[9999999]">
        <div class="nav-overlay sm:hidden absolute top-0 left-0 w-screen h-screen bg-black/35 z-[-1]"></div>
        <div class="top-aside bg-white pt-6 pb-4 px-6 tracking-wider">
            <h2 class="text-xl text-green">SiMELEK</h2>
            <p class="mt-0.5 text-xs text-gray-500/90 text-pretty">Sistem Informasi Media Elektronik</p>
        </div>
        <div class="profiles py-4 px-2.5 flex gap-3 border-y border-solid border-gray-200 bg-blue-100">
            <figure class="shrink-0 p-0.5 bg-white rounded-full overflow-hidden">
                <img src="https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg" alt="Profil <nama_user>" class="size-11" />
            </figure>
            <div class="text-xs flex-1 min-w-0 flex flex-col justify-center gap-0.5">
                <p class="truncate text-sm font-semibold">Muhammad Fattahillah. Mz</p>
                <p class="text-xs text-gray-500/90">User</p>
            </div>
        </div>
        <nav class="bg-white p-4 flex flex-col gap-2 min-h-[230px] max-h-[230px] overflow-y-auto border-b border-solid border-gray-200">
            <a href="/dashboard" class="beranda font-text active p-3 flex gap-1.5 bg-blue-600 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span class="font-semibold truncate" title="Dashboard">Dashboard</span>
            </a>

            <a href="/dashboard/pengajuan" class="pengajuan font-text p-3 flex gap-1.5 text-gray-500/90 rounded-lg transition duration-150 ease-in hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                </svg>
                <span class="truncate" title="Pengajuan">Pengajuan</span>
            </a>

            <a href="/dashboard/riwayat-pengajuan" class="riwayat-pengajuan font-text p-3 flex gap-1.5 text-gray-500/90 rounded-lg transition duration-150 ease-in hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
                <span class="truncate" title="Riwayat Pengajuan">Riwayat Pengajuan</span>
            </a>

            <a href="/dashboard/pengaturan/profil" class="profil font-text p-3 flex gap-1.5 text-gray-500/90 rounded-lg transition duration-150 ease-in hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="truncate" title="Riwayat Pengajuan">Profil</span>
            </a>
        </nav>
        <div class="mores-nav bg-white p-4 h-full flex flex-col gap-2">
            <a href="/dashboard/pengaturan" class="pengaturan font-text active p-3 flex gap-1.5 text-gray-500/90 rounded-lg transition duration-150 ease-in hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="font-semibold truncate" title="Pengaturan">Pengaturan</span>
            </a>
            <a href="/dashboard/logout" class="logout active font-text p-3 flex gap-1.5 text-red-500 rounded-lg transition duration-150 ease-in hover:bg-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                </svg>
                <span class="font-semibold truncate" title="Pengaturan">Keluar</span>
            </a>
        </div>
    </aside>

    <main class="col-span-10 bg-primary">
        <header class="sticky top-0 py-5 px-7 flex items-center justify-between gap-6 sm:gap-0 bg-white border-b border-solid border-gray-200 shadow-sm z-10">
            <div class="start-header flex items-center gap-4 sm:gap-0">
                <button type="button" class="hamburger sm:hidden py-1 px-2 shrink-0 border-[1.5px] border-solid border-gray-200 rounded transition duration-150 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <div class="greets">
                    <h1 class="text-xl">Dashboard</h1>
                    <span class="font-text text-sm text-gray-500/90">Selamat datang kembali, Muhammad!</span>
                </div>
            </div>
            <aside class="flex items-center gap-5">
                <button type="button" class="relative py-1.5 px-2 h-fit border-[1.5px] border-solid border-gray-200 rounded-md transition duration-150 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 sm:size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                    <span class="font-text absolute -top-1.5 -right-2.5 py-0.5 px-1.5 bg-red-500 text-[.75rem] text-white rounded-full">13</span>
                </button>
                <a href="/dashboard/pengajuan" class="hidden sm:flex py-2 px-2.5 gap-1 bg-blue-500 text-white rounded-md transition duration-150 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="font-semibold font-text text-sm">Pengajuan Baru</span>
                </a>
            </aside>
        </header>
        <?= $this->renderSection('content') ?>
    </main>
</body>

</html>