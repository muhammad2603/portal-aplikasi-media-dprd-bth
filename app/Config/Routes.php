<?php

use CodeIgniter\Router\RouteCollection;
use App\Filters\GuestFilter;
use App\Filters\VerifiedFilter;
use App\Filters\AuthenticatedFilter;
use App\Filters\LogoutFilter;

/**
 * @var RouteCollection $routes
 */
/**
 * @routes group
 * @filter
 *      GuestFilter: route hanya bisa diakses oleh pengguna yang tidak memiliki kredensial
 *                  jika pengguna telah memiliki kredensial, arahkan ke dashboard
 */
$routes->group('', ["filter" => GuestFilter::class], function ($routes) {
    // jika user masuk ke root publik (http://domain.com/), arahkan ke rute login
    $routes->get('/', fn() => redirect()->to('/login')->setStatusCode(301));
    // @GET login
    $routes->get('/login', 'Login::index');
    // @POST login
    $routes->post('/login', 'Auth::attemptLogin');
    // @GET register
    $routes->get('/daftar', 'Registrasi::index');
    // @POST register account
    $routes->post('/daftar', 'RegisterAccount::add');
});
/**
 * @route group
 * @filter
 *      AuthenticatedFilter: route hanya bisa diakses oleh pengguna yang sudah memiliki akun, tapi akun belum diverifikasi
 *                          jika pengguna tidak memiliki kredensial, arahkan ke login
 *                          jika pengguna memiliki kredensial, tapi akun pengguna telah terverifikasi, arahkan ke dashboard
 */
$routes->group('', ["filter" => AuthenticatedFilter::class], function ($routes) {
    // @GET account status
    $routes->get('/status-akun', 'StatusAkun::index');
    // @GET /aktivasi
    $routes->get('/aktivasi', 'Activation::verification');
    // @GET /aktivasi-ulang
    $routes->get('/aktivasi-ulang', 'Activation::resend');
});
/**
 * @route group
 * @filter
 *      VerifiedFilter: route hanya bisa diakses oleh pengguna yang telah memiliki kredensial dan akun telah terverifikasi
 *                      jika pengguna tidak memiliki kredensial, arahkan ke login
 *                      jika pengguna memiliki kredensial, tapi akun pengguna belum diverifikasi, arahkan ke status akun
 */
$routes->group('', ["filter" => VerifiedFilter::class], function ($routes) {
    // @GET dashboard
    $routes->get('/dashboard', 'Dashboard::home');
    // @GET dashboard/pengajuan
    $routes->get('/dashboard/pengajuan', 'Dashboard::pengajuan');
    $routes->post('/dashboard/tambah-pengajuan', 'API_CRUD::createPengajuan');
    $routes->delete('/dashboard/hapus-pengajuan', 'API_CRUD::deletePengajuan');
    $routes->post('/dashboard/search-pengajuan', 'API_CRUD::searchPengajuan');
    // @GET dashboard/riwayat-pengajuan
    $routes->get('/dashboard/riwayat-pengajuan', 'Dashboard::riwayatPengajuan');
    // @GET dashboard/riwayat-hapus
    $routes->get('/dashboard/riwayat-hapus', 'Dashboard::riwayatHapus');
    // @GET dashboard/riwayat-pembatalan
    $routes->get('/dashboard/riwayat-pembatalan', 'Dashboard::riwayatBatal');
    // @GET dashboard/aktivitas
    $routes->get('/dashboard/aktivitas', 'Dashboard::aktivitas');
    // @GET dashboard/profil
    $routes->get('/dashboard/pengaturan/profil', 'Dashboard::profil');
});

/**
 * @route group
 * @filter
 *      LogoutFilter: route hanya bisa diakses oleh pengguna yang telah memiliki kredensial login/autentikasi
 *                  jika pengguna tidak memiliki kredensial, arahkan ke login
 */
$routes->group('', ["filter" => LogoutFilter::class], function ($routes) {
    // @POST dashboard/logout
    $routes->post('/dashboard/logout', 'Dashboard::logout');
});
