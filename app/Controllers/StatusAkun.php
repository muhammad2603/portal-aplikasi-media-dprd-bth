<?php
// namespace controllers
namespace App\Controllers;
// use controller from codeigniter
use CodeIgniter\Controller;
// use UserModel from Model
use App\Models\UserModel;
// @class
class StatusAkun extends Controller
{
    protected $userModel;
    // @constructor
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    // @method: index
    public function index()
    {
        // get userId from session
        $get_user_id_from_session = session()->get('userId');
        // fields
        $fields = [
            "um.nama_lengkap",
            "user.email",
            "um.nomor_hp",
            "user.is_verified",
            "user.created_at",
        ];
        // get user meta from database
        $get_user_identity = $this->userModel->select($fields)->join('user_meta um', 'um.user_id = user.id')->where('user.id', $get_user_id_from_session)->first();
        // @if akun pengguna sudah diverifikasi
        if ($get_user_identity["is_verified"] === "true") {
            // perbarui nilai session isAccountVerified menjadi true
            session()->set("isAccountVerified", true);
            // @return redirect pengguna ke-halaman dashboard
            return redirect()->to("/dashboard");
        }
        // @data page
        $data = [
            "user_data"         => $get_user_identity,
            "page_name"         => "Status Akun",
            "email_support"     => $_ENV["EMAIL_SUPPORT"],
            "telp_fax"          => $_ENV["TELP_FAX_SUPPORT"],
        ];
        // @return view
        return view('pages/status-akun', $data);
    }
}
