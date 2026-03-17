<?php

use CodeIgniter\Router\RouteCollection;
use App\Filters\GuestFilter;
use App\Filters\VerifiedFilter;
use App\Filters\AuthenticatedFilter;

/**
 * @var RouteCollection $routes
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
});

$routes->group('', ["filter" => AuthenticatedFilter::class], function ($routes) {
    // @GET account status
    $routes->get('/status-akun', 'StatusAkun::index');
    // @GET /aktivasi
    $routes->get('/aktivasi', 'Activation::verification');
    // @GET /aktivasi-ulang
    $routes->get('/aktivasi-ulang', 'Activation::resend');
});

$routes->group('', ["filter" => VerifiedFilter::class], function ($routes) {
    // @GET dashboard
    $routes->get('/dashboard', 'Dashboard::home');
    // @GET dashboard/pengajuan
    $routes->get('/dashboard/pengajuan', 'Dashboard::pengajuan');
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
    // @POST dashboard/logout
    $routes->post('/dashboard/logout', 'Dashboard::logout');
});
