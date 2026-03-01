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
        ];
        // @return: view home dashboard
        return view('pages/dashboard/home.php', $data_page);
    }
    // @method: pengajuan
    public function pengajuan(): string
    {
        // @data
        $data_page = [
            "navigation" => "Pengajuan",
            "subtitle" => "Buat pengajuan baru",
        ];
        // @return: view pengajuan dashboard
        return view('pages/dashboard/pengajuan.php', $data_page);
    }
    // @method: riwayat pengajuan
    public function riwayatPengajuan(): string
    {
        // @data
        $data_page = [
            "navigation" => "Riwayat Pengajuan",
            "subtitle" => "Kelola riwayat pengajuan anda",
        ];
        // @return: view riwayat pengajuan dashboard
        return view('pages/dashboard/riwayat_pengajuan.php', $data_page);
    }
    // @method: riwayat hapus
    public function riwayatHapus(): string
    {
        // @data
        $data_page = [
            "navigation" => "Riwayat Hapus",
            "subtitle" => "Kelola pengajuan yang terhapus",
        ];
        // @return: view riwayat hapus dashboard
        return view('pages/dashboard/riwayat_hapus.php', $data_page);
    }
    // @method: profil
    public function profil(): string
    {
        // @data
        $data_page = [
            "navigation" => "Profil",
            "subtitle" => "Edit data profil anda",
        ];
        // @return: view profil dashboard
        return view('pages/dashboard/profil.php', $data_page);
    }
}
