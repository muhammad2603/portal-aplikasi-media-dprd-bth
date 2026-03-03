<nav class="mt-8 flex flex-col gap-4">
    <?php if ($role === 'User'): ?>
        <a href="/dashboard/pengajuan" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 bg-blue-500 text-white rounded-md transition duration-150 hover:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span class="font-text font-semibold text-sm">Buat Pengajuan Baru</span>
        </a>
    <?php endif ?>
    <a href="/dashboard/riwayat-pengajuan" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 rounded-md transition duration-150 <?= $role === 'Admin' ? 'text-white bg-blue-500 hover:bg-blue-600' : 'hover:bg-primary border border-solid border-gray-300' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
        </svg>
        <span class="font-text font-semibold text-sm">Kelola Pengajuan</span>
    </a>
    <a href="/dashboard/aktivitas" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 border border-solid border-gray-300 rounded-md transition duration-150 hover:bg-primary">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span class="font-text font-semibold text-sm">Aktivitas</span>
    </a>
    <?php if ($role === 'User'): ?>
        <a href="/dashboard/riwayat-hapus" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 text-red-500 border border-solid border-red-400 rounded-md transition duration-150 hover:bg-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
            <span class="font-text font-semibold text-sm">Riwayat Hapus</span>
        </a>
    <?php endif ?>
    <?php if ($role === 'Admin'): ?>
        <a href="/dashboard/riwayat-pembatalan" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 text-red-500 border border-solid border-red-400 rounded-md transition duration-150 hover:bg-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span class="font-text font-semibold text-sm">Riwayat Pembatalan</span>
        </a>
    <?php endif ?>
    <a href="/dashboard/pengaturan/profil" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 border border-solid border-gray-300 rounded-md transition duration-150 hover:bg-primary">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <span class="font-text font-semibold text-sm">Kelola Profil</span>
    </a>
</nav>