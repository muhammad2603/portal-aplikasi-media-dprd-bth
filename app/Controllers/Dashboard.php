<?php
// namespace controllers
namespace App\Controllers;
// use controller from codeigniter
use CodeIgniter\Controller;
// @class
class Dashboard extends Controller
{
    // @method: home
    public function home(): string
    {
        // @data
        $data_page = [
            "navigation" => "Dashboard",
            "subtitle" => "Selamat datang kembali, Muhammad!",
            "role" => "user", // Role "user" hanya untuk debug, implementasi nyata lebih baik diambil dari database
        ];
        // @note: ubah ternary dengan block if supaya lebih mudah dibaca
        // Atur jalur file layout berdasarkan role
        $path_page_by_role = $data_page["role"] === "user" ? 'pages/dashboard/User/' : "";
        // @return: view home
        return view($path_page_by_role . 'home', $data_page);
    }
    // @method: pengajuan
    public function pengajuan(): string
    {
        // @data
        $data_page = [
            "navigation" => "Pengajuan",
            "subtitle" => "Buat pengajuan baru",
            "role" => "user", // Role "user" hanya untuk debug, implementasi nyata lebih baik diambil dari database
        ];
        // @note: ubah ternary dengan block if supaya lebih mudah dibaca
        // Atur jalur file layout berdasarkan role
        $path_page_by_role = $data_page["role"] === "user" ? 'pages/dashboard/User/' : "";
        // @return: view pengajuan
       return view($path_page_by_role . 'pengajuan', $data_page);
    }
    // @method: riwayat pengajuan
    public function riwayatPengajuan(): string
    {
        // @data
        $data_page = [
            "navigation" => "Riwayat Pengajuan",
            "subtitle" => "Kelola riwayat pengajuan anda",
            "role" => "user", // Role "user" hanya untuk debug, implementasi nyata lebih baik diambil dari database
        ];
        // @note: ubah ternary dengan block if supaya lebih mudah dibaca
        // Atur jalur file layout berdasarkan role
        $path_page_by_role = $data_page["role"] === "user" ? 'pages/dashboard/User/' : "";
        // @return: view riwayat pengajuan
        return view($path_page_by_role . 'riwayat_pengajuan', $data_page);
    }
    // @method: riwayat hapus
    public function riwayatHapus(): string
    {
        // @data
        $data_page = [
            "navigation" => "Riwayat Hapus",
            "subtitle" => "Kelola pengajuan yang terhapus",
            "role" => "user", // Role "user" hanya untuk debug, implementasi nyata lebih baik diambil dari database
        ];
        // @note: ubah ternary dengan block if supaya lebih mudah dibaca
        // Atur jalur file layout berdasarkan role
        $path_page_by_role = $data_page["role"] === "user" ? 'pages/dashboard/User/' : "";
        // @return: view riwayat hapus
        return view($path_page_by_role . 'riwayat_hapus', $data_page);
    }
    // @method: profil
    public function profil(): string
    {
        // @data
        $data_page = [
            "navigation" => "Profil",
            "subtitle" => "Edit data profil anda",
            "role" => "user", // Role "user" hanya untuk debug, implementasi nyata lebih baik diambil dari database
        ];
        // @note: ubah ternary dengan block if supaya lebih mudah dibaca
        // Atur jalur file layout berdasarkan role
        $path_page_by_role = $data_page["role"] === "user" ? 'pages/dashboard/User/' : "";
        // @return: view profil
        return view($path_page_by_role . 'profil', $data_page);
    }
}
