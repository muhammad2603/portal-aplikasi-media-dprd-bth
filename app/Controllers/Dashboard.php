<?php
// namespace controllers
namespace App\Controllers;
// use controller from codeigniter
use CodeIgniter\Controller;
use App\Models\Pengajuan;
use App\Models\StatusPengajuan;
use App\Models\UserActivities;
use App\Models\UserMeta;

// load helper cookie
helper("cookie");
// @class
class Dashboard extends Controller
{
    protected $role;
    protected $pages_dashboard = "pages/dashboard";
    protected $pengajuanModel;
    protected $statusPengajuanModel;
    protected $userActivitiesModel;
    protected $userMetaModel;
    protected $user_id;
    // @constructor
    public function __construct()
    {
        $this->user_id                  = session()->get("userId");
        $this->role                     = session()->get("role");
        $this->pengajuanModel           = new Pengajuan();
        $this->statusPengajuanModel     = new StatusPengajuan();
        $this->userActivitiesModel      = new UserActivities();
        $this->userMetaModel            = new userMeta();
    }
    // @method: home
    public function home(): string
    {
        $get_is_first_login_from_sess = session("isFirstLogin");
        $get_user_full_name_from_sess = session("userFullName");
        $subtitle_by_status_login = $get_is_first_login_from_sess ? "Selamat datang, $get_user_full_name_from_sess! Silahkan buat pengajuan pertama anda." : "Selamat datang kembali, $get_user_full_name_from_sess!";
        // @data
        $data_page = [
            "navigation" => "Dashboard",
            "subtitle" => $subtitle_by_status_login,
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
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/pengajuan", $data_page);
    }
    // @method: riwayat pengajuan
    public function riwayatPengajuan(): string
    {
        $list_riwayat_pengajuan_by_status = $this->pengajuanModel->getPengajuan($this->user_id);
        ["total" => $total_pengajuan, "total_by_status" => $total_riwayat_pengajuan] = $this->pengajuanModel->getTotalPengajuan($this->user_id);
        // @data
        $data_page = [
            "navigation" => "Riwayat Pengajuan",
            "subtitle" => $this->role === "User" ? "Buat pengajuan baru" : "Kelola pengajuan yang telah diproses",
            "riwayat_pengajuan" => $total_riwayat_pengajuan,
            "total_pengajuan" => $total_pengajuan,
            "list_pengajuan" => $list_riwayat_pengajuan_by_status,
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/riwayat_pengajuan", $data_page);
    }
    // @method: riwayat hapus, method ini dikhususkan untuk User
    public function riwayatHapus(): string
    {
        $deleted_pengajuan = $this->pengajuanModel->getPengajuan($this->user_id, true);
        // @data
        $data_page = [
            "navigation" => "Riwayat Hapus",
            "subtitle" => "Kelola pengajuan yang terhapus",
            "deleted_pengajuan" => $deleted_pengajuan
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
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/riwayat_pembatalan", $data_page);
    }
    // @method: aktivitas
    public function aktivitas(): string
    {
        $activityHistories = $this->userActivitiesModel->getUserActivities($this->user_id);
        // @data
        $data_page = [
            "navigation" => "Aktivitas",
            "subtitle" => "Lihat riwayat aktivitas anda",
            "activities" => $activityHistories
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/aktivitas", $data_page);
    }
    // @method: profil
    public function profil(): string
    {
        // __COMMENT__ saat mengambil data di Database, pastikan sesuai dengan role-nya, karena meta user dan admin terpisah
        // @data
        $data_page = [
            "navigation" => "Profil",
            "subtitle" => "Edit data profil anda",
            "user_meta_data" => $this->userMetaModel->getUserMeta($this->user_id),
        ];
        // @return: view home by role
        return view("$this->pages_dashboard/" . $this->role . "/profil", $data_page);
    }
    // @method: logout
    public function logout()
    {
        // set cookie token_login to expired
        setcookie("token_login", "", time() - 3600, "/", "");
        // destroy current session
        session()->destroy();
        // @return with redirect to login
        return redirect()->to('/login');
    }
}
