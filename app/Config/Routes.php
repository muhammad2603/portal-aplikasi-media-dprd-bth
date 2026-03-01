<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// jika user masuk ke root publik (http://domain.com/), arahkan ke rute login
$routes->get('/', fn() => redirect()->to('/login')->setStatusCode(301));
// @GET login
$routes->get('/login', 'Login::index');
// @GET register
$routes->get('/daftar', 'Registrasi::index');

// Lakukan filter sebelum masuk ke area Dashboard

// @GET dashboard
$routes->get('/dashboard', 'Dashboard::home');
// @GET dashboard/pengajuan
$routes->get('/dashboard/pengajuan', 'Dashboard::pengajuan');
// @GET dashboard/riwayat-pengajuan
$routes->get('/dashboard/riwayat-pengajuan', 'Dashboard::riwayatPengajuan');
// @GET dashboard/riwayat-hapus
$routes->get('/dashboard/riwayat-hapus', 'Dashboard::riwayatHapus');
// @GET dashboard/profil
$routes->get('/dashboard/pengaturan/profil', 'Dashboard::profil');
