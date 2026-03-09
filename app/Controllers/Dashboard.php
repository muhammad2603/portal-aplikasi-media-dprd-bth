<?php
// namespace controllers
namespace App\Controllers;
// use controller from codeigniter
use CodeIgniter\Controller;
// @class
class Dashboard extends Controller
{
    protected $role = 'Admin'; // Role ini hanya untuk debug, implementasi nyata lebih baik diambil dari database
    protected $pages_dashboard = "pages/dashboard";

    // @method: home
    public function home(): string
    {
        // @data
        $data_page = [
            "navigation" => "Dashboard",
            "subtitle" => "Selamat datang kembali, Muhammad!",
            "role" => $this->role,
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/home", $data_page);
    }
    // @method: pengajuan
    public function pengajuan(): string
    {
        // @data
        $data_page = [
            "navigation" => "Pengajuan",
            "subtitle" => $this->role === "User" ? "Buat pengajuan baru" : "Kelola pengajuan yang belum diproses",
            "role" => $this->role,
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/pengajuan", $data_page);
    }
    // @method: riwayat pengajuan
    public function riwayatPengajuan(): string
    {
        // @data
        $data_page = [
            "navigation" => "Riwayat Pengajuan",
            "subtitle" => $this->role === "User" ? "Buat pengajuan baru" : "Kelola pengajuan yang telah diproses",
            "role" => $this->role,
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/riwayat_pengajuan", $data_page);
    }
    // @method: riwayat hapus, method ini dikhususkan untuk User
    public function riwayatHapus(): string
    {
        // @data
        $data_page = [
            "navigation" => "Riwayat Hapus",
            "subtitle" => "Kelola pengajuan yang terhapus",
            "role" => $this->role,
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/riwayat_hapus", $data_page);
    }
    // @method: riwayat batal, method ini dikhususkan untuk Admin
    public function riwayatBatal(): string
    {
        // @data
        $data_page = [
            "navigation" => "Riwayat Pembatalan",
            "subtitle" => "Kelola pengajuan yang dibatalkan",
            "role" => $this->role,
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/riwayat_pembatalan", $data_page);
    }
    // @method: aktivitas
    public function aktivitas(): string
    {
        // @data
        $data_page = [
            "navigation" => "Aktivitas",
            "subtitle" => "Lihat riwayat aktivitas anda",
            "role" => $this->role,
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/aktivitas", $data_page);
    }
    // @method: profil
    public function profil(): string
    {
        // @data
        $data_page = [
            "navigation" => "Profil",
            "subtitle" => "Edit data profil anda",
            "role" => $this->role,
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/profil", $data_page);
    }
}
