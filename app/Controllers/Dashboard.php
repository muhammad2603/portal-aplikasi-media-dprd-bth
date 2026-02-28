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
        // @return: view home dashboard
        return view('pages/dashboard/home.php');
    }
    // @method: pengajuan
    public function pengajuan(): string
    {
        // @data
        $data_page = [
            "navigation" => "Pengajuan",
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
        ];
        // @return: view riwayat pengajuan dashboard
        return view('pages/dashboard/riwayat_pengajuan.php', $data_page);
    }
    // @method: profil
    public function profil(): string
    {
        // @data
        $data_page = [
            "navigation" => "Profil",
        ];
        // @return: view profil dashboard
        return view('pages/dashboard/profil.php', $data_page);
    }
    // @method: riwayat hapus
    public function riwayatHapus(): string
    {
        // @data
        $data_page = [
            "navigation" => "Riwayat Hapus"
        ];
        // @return: view riwayat hapus dashboard
        return view('pages/dashboard/riwayat_hapus.php', $data_page);
    }
}
