<?= $this->extend('pages/dashboard/main') ?>
<?= $this->section('content') ?>
<div class="content py-6 px-6 md:py-8 sm:px-10 flex flex-col gap-6">
    <section class="cards pb-3.5 xl:pb-0 px-2 xl:px-0 flex gap-6 overflow-x-scroll xl:overflow-visible">
        <div class="total-pengajuan p-7 flex items-center shrink-0 gap-8 rounded-lg shadow-md">
            <div class="card-text flex flex-col gap-1">
                <p class="font-semibold text-sm text-gray-500/90">Total Pengajuan</p>
                <span class="font-text font-semibold text-3xl">36</span>
            </div>
            <span class="p-3 bg-blue-100/80 text-blue-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.25 18.28" class="size-5">
                    <path d="M.5,1.69v14.89c0,.66.53,1.19,1.19,1.19h10.87c.66,0,1.19-.53,1.19-1.19V5.53c0-.32-.13-.62-.35-.84l-3.76-3.76c-.22-.22-.52-.34-.83-.35l-7.11-.08c-.66,0-1.2.53-1.2,1.19Z" fill="none" stroke="currentColor" stroke-miterlimit="10" />
                    <path d="M8.81.58v4.11c0,.28.23.51.51.51h4.43" fill="none" stroke="currentColor" stroke-miterlimit="10" />
                    <rect x="2.64" y="8.78" width="3.5" height=".8" rx=".4" ry=".4" fill="currentColor" stroke-width="0" />
                    <rect x="2.64" y="13.64" width="8.98" height=".8" rx=".4" ry=".4" fill="currentColor" stroke-width="0" />
                    <rect x="2.64" y="12.02" width="8.98" height=".8" rx=".4" ry=".4" fill="currentColor" stroke-width="0" />
                    <rect x="2.64" y="10.4" width="8.98" height=".8" rx=".4" ry=".4" fill="currentColor" stroke-width="0" />
                </svg>
            </span>
        </div>
        <div class="total-disetujui p-7 flex items-center shrink-0 gap-8 rounded-lg shadow-md">
            <div class="card-text flex flex-col gap-1">
                <p class="font-semibold text-sm text-gray-500/90">Disetujui</p>
                <span class="font-text font-semibold text-3xl">24</span>
            </div>
            <span class="p-3 bg-green-100/80 text-green-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </span>
        </div>
        <div class="total-pending p-7 flex items-center shrink-0 gap-8 rounded-lg shadow-md">
            <div class="card-text flex flex-col gap-1">
                <p class="font-semibold text-sm text-gray-500/90">Pending</p>
                <span class="font-text font-semibold text-3xl">10</span>
            </div>
            <span class="p-3 bg-amber-100/80 text-amber-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </span>
        </div>
        <div class="total-pebaikan p-7 flex justify-between items-center shrink-0 grow gap-8 rounded-lg shadow-md">
            <div class="card-text flex flex-col gap-1">
                <p class="font-semibold text-sm text-gray-500/90">Perbaikan</p>
                <span class="font-text font-semibold text-3xl">2</span>
            </div>
            <span class="p-3 bg-indigo-100/80 text-indigo-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </span>
        </div>
    </section>

    <section class="remainder py-8 flex flex-col items-center gap-4 bg-white rounded-lg shadow-md">
        <p class="flex items-center gap-1 text-amber-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
            </svg>
            Anda belum mengajukan sejak 3 hari terakhir.
        </p>
        <a href="/dashboard/pengajuan" class="py-2.5 px-3 w-fit flex items-center gap-1.5 bg-blue-500 text-white rounded-md transition duration-150 hover:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span class="font-text font-semibold text-sm">Buat Pengajuan Baru</span>
        </a>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-9 gap-6">
        <aside class="lg:col-span-5 xl:col-span-6 h-fit py-10 md:py-5 px-7 bg-white rounded-lg shadow-md">
            <div class="legend flex justify-between items-center">
                <div class="title">
                    <h2 class="text-lg">Pengajuan Terakhir</h2>
                    <p class="text-sm text-gray-500/90">Daftar pengajuan terakhir anda</p>
                </div>
                <a href="/dashboard/pengajuan" class="font-text py-1.5 px-4 flex items-center gap-1.5 text-blue-600 text-sm rounded-full group transition duration-150 ease-in hover:bg-blue-100">
                    <span>Lihat semua</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 transition duration-200 ease-in group-hover:translate-x-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
            <div class="list-pengajuan-terakhir mt-8 flex flex-col gap-4">
                <article class="py-5 px-4 bg-primary rounded-md shadow-sm">
                    <div class="top flex items-center gap-4 justify-between">
                        <h3 class="text-base">Liputan Pemilu 2025</h3>
                        <span class="py-1 px-3 flex items-center gap-1 bg-green-100/80 font-semibold text-green-600 text-xs rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="font-text">Disetujui</span>
                        </span>
                    </div>
                    <div class="info mt-2 flex gap-3">
                        <span class="flex items-center gap-1 text-gray-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span class="font-text text-sm">Kompas TV</span>
                        </span>
                        <span class="flex items-center gap-1 text-gray-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            <span class="font-text text-sm">22 Februari 2026</span>
                        </span>
                    </div>
                </article>
                <article class="py-5 px-4 bg-primary rounded-md shadow-sm">
                    <div class="top flex items-center gap-4 justify-between">
                        <h3 class="text-base">Investigasi Korupsi Daerah</h3>
                        <span class="py-1 px-3 flex items-center gap-1 bg-amber-100/80 font-semibold text-amber-600 text-xs rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="font-text">Pending</span>
                        </span>
                    </div>
                    <div class="info mt-2 flex gap-3">
                        <span class="flex items-center gap-1 text-gray-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span class="font-text text-sm">Kompas TV</span>
                        </span>
                        <span class="flex items-center gap-1 text-gray-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            <span class="font-text text-sm">20 Februari 2026</span>
                        </span>
                    </div>
                </article>
                <article class="py-5 px-4 bg-primary rounded-md shadow-sm">
                    <div class="top flex items-center gap-4 justify-between">
                        <h3 class="text-base">Festival Budaya Nusantara</h3>
                        <span class="py-1 px-3 flex items-center gap-1 bg-red-100/80 font-semibold text-red-600 text-xs rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="font-text">Ditolak</span>
                        </span>
                    </div>
                    <div class="info mt-2 flex gap-3">
                        <span class="flex items-center gap-1 text-gray-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span class="font-text text-sm">Kompas TV</span>
                        </span>
                        <span class="flex items-center gap-1 text-gray-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            <span class="font-text text-sm">19 Februari 2026</span>
                        </span>
                    </div>
                </article>
                <article class="py-5 px-4 bg-primary rounded-md shadow-sm">
                    <div class="top flex items-center gap-4 justify-between">
                        <h3 class="text-base truncate">Dewan Dorong Pemda dan APH Perkuat Pengawasan PETI</h3>
                        <span class="py-1 px-3 flex items-center gap-1 bg-indigo-100/80 font-semibold text-indigo-600 text-xs rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            <span class="font-text">Perbaikan</span>
                        </span>
                    </div>
                    <div class="info mt-2 flex gap-3">
                        <span class="flex items-center gap-1 text-gray-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span class="font-text text-sm">Kompas TV</span>
                        </span>
                        <span class="flex items-center gap-1 text-gray-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            <span class="font-text text-sm">18 Februari 2026</span>
                        </span>
                    </div>
                </article>
            </div>
            <!-- @note: tambahkan informasi pengajuan jika user belum mengajukan berita -->
            <div class="informasi-pengajuan hidden mt-8 py-3 px-4 bg-amber-100/80 text-amber-600 rounded-md">
                <p class="font-semibold text-sm">Anda belum melakukan pengajuan.</p>
            </div>
        </aside>
        <aside class="lg:col-span-4 xl:col-span-3 py-10 md:py-5 px-7 bg-white rounded-lg shadow-md h-fit">
            <div class="legend text-center md:text-left">
                <h2 class="text-lg">Aksi Cepat</h2>
                <p class="text-sm text-gray-500/90">Pintasan fitur utama</p>
            </div>
            <nav class="mt-8 flex flex-col gap-4">
                <a href="/dashboard/pengajuan" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 bg-blue-500 text-white rounded-md transition duration-150 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="font-text font-semibold text-sm">Buat Pengajuan Baru</span>
                </a>
                <a href="/dashboard/pengajuan" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 border border-solid border-gray-300 rounded-md transition duration-150 hover:bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                    </svg>
                    <span class="font-text font-semibold text-sm">Kelola Pengajuan</span>
                </a>
                <a href="/dashboard/pengaturan/profil" class="py-3.5 px-3 flex justify-center md:justify-start items-center gap-1.5 border border-solid border-gray-300 rounded-md transition duration-150 hover:bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="font-text font-semibold text-sm">Kelola Profil</span>
                </a>
            </nav>
        </aside>
    </section>

    <section class="news-activity py-10 lg:py-8 xl:py-5 px-7 bg-white rounded-lg shadow-md">
        <div class="legend">
            <h2 class="text-lg">Aktivitas Terbaru</h2>
            <p class="text-sm text-gray-500/90">Lihat timeline aktivitas Anda dalam 7 hari terakhir</p>
        </div>
        <div class="activities mt-8 flex flex-col gap-4">
            <div class="flex gap-3.5">
                <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-green-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </span>
                <div class="flex flex-col gap-0.5">
                    <h3 class="text-base">Pengajuan disetujui</h3>
                    <p class="text-sm text-gray-500/90">Pengajuan "Liputan Pemilu 2026" Anda telah disetujui Admin</p>
                    <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        5 hari yang lalu
                    </span>
                </div>
            </div>
            <div class="flex gap-3.5">
                <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-red-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </span>
                <div class="flex flex-col gap-0.5">
                    <h3 class="text-base">Pengajuan ditolak</h3>
                    <p class="text-sm text-gray-500/90">Pengajuan "Festival Budaya Nusantara" Anda telah ditolak Admin. Lihat alasan penolakan di Pengajuan anda</p>
                    <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        7 hari yang lalu
                    </span>
                </div>
            </div>
            <div class="flex gap-3.5">
                <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-amber-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </span>
                <div class="flex flex-col gap-0.5">
                    <h3 class="text-base">Pengajuan terkirim</h3>
                    <p class="text-sm text-gray-500/90">Pengajuan "Investigasi Korupsi Daerah" Anda telah terkirim, mohon tunggu persetujuan dari Admin</p>
                    <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        8 hari yang lalu
                    </span>
                </div>
            </div>
            <div class="flex gap-3.5">
                <span class="py-1.5 px-1.5 h-fit bg-gray-200/60 text-indigo-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </span>
                <div class="flex flex-col gap-0.5">
                    <h3 class="text-base">Perbaikan pengajuan</h3>
                    <p class="text-sm text-gray-500/90">Pengajuan "Dewan Dorong Pemda dan APH Perkuat Pengawasan PETI" Anda butuh perbaikan. Lihat komentar Admin tentang perbaikan!</p>
                    <span class="mt-1 flex gap-1 text-gray-500/90 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        9 hari yang lalu
                    </span>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<?= $this->endSection() ?>