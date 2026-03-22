<?php
// namespace Controllers
namespace App\Controllers;
// use Controller from codeigniter
use CodeIgniter\Controller;
// use UserModel from Models
use App\Models\UserModel;
// use UserMeta from Models
use App\Models\UserMeta;
// use Database from Config
use Config\Database;
// @class
class RegisterAccount extends Controller
{
    // @protected vars
    protected $db;
    protected $userModel;
    protected $userMeta;
    // @constructor
    public function __construct()
    {
        // @init Database connect
        $this->db           = Database::connect();
        // @init UserModel
        $this->userModel    = new UserModel();
        // @init UserMeta
        $this->userMeta     = new UserMeta();
    }
    // @method add
    public function add()
    {
        $throttler                  = service("throttler");
        $data                       = $this->request->getJSON();
        $get_ip_address             = $this->request->getIPAddress();
        $nama_lengkap               = $data->namaLengkap;
        $email_req                  = $data->email;
        $no_telp_req                = $data->noTelp;
        $password_req               = $data->password;
        $check_email                = $this->userModel->isEmailExist($email_req);
        $is_limit_by_ip_address     = $throttler->check(md5($get_ip_address), 5, MINUTE);
        // @if cek apakah pengguna terlalu banyak mengirim permintaan
        if (! $is_limit_by_ip_address)
            return $this->response->setStatusCode(429)->setJSON([
                "status" => 429,
                "message" => "Terlalu banyak upaya! Coba lagi nanti."
            ]);
        // @if check email is exist on DB
        if ($check_email)
            // @return http status code to 409 (conflicts) and give message for response
            return $this->response->setStatusCode(409)->setJSON([
                "status" => 409,
                "message" => "Email sudah tersedia!",
            ]);
        // cek apakah nomor hp sudah tersedia di DB
        $check_no_telp = $this->userMeta->select("nomor_hp")->where("nomor_hp", $no_telp_req)->first();
        // @if jika nomor hp sudah tersedia
        if ($check_no_telp !== null)
            // @return status code http 409 (Conflict)
            return $this->response->setStatusCode(409)->setJSON([
                "status" => 409,
                "message" => "Nomor hp sudah tersedia!"
            ]);
        // hash password akun pengguna
        $hash_pass = password_hash($password_req, PASSWORD_BCRYPT);
        // begin transactions
        $this->db->transBegin();
        // insert user account to DB
        $insert_user = $this->userModel->insert([
            "email"         => $email_req,
            "password"      => $hash_pass,
            "role_id"       => 2,
            "is_verified"   => "false",
            "token_login"   => null
        ]);
        // @if inserting user account to DB failed
        if ($insert_user === false) {
            // check if validation error exist
            $validationErrors = $this->userModel->errors();
            // @if validation errors is not empty (error detected)
            if (! empty($validationErrors)) {
                // write error message validation to log
                log_message("error", "Validation: " . json_encode($validationErrors));
            }
            // check is DB error
            $dbError = $this->db->error();
            // @if error from DB found
            if ($dbError["code"] !== 0) {
                // write error message database to log
                log_message("error", "Database: " . $dbError["message"]);
            }
            // rollback transaction
            $this->db->transRollback();
            // @return status code http to 400 (Bad Request)
            return $this->response->setStatusCode(400)->setJSON([
                "status" => 400,
                "message" => "Pendaftaran gagal! Jika ini terus berlanjut, mohon hubungi Administrator untuk solusi lebih lanjut!"
            ]);
        }
        // get ID user account inserted to DB
        $get_new_user_id = $this->userModel->getInsertID();
        // insert user meta to DB with ID user account
        $insert_user_meta = $this->userMeta->insert([
            "nama_lengkap"  => $nama_lengkap,
            "user_id"       => $get_new_user_id,
            "profil"        => '/assets/images/default-profile-image.webp',
            "nomor_hp"      => $no_telp_req
        ]);
        // @if inserting user meta to DB failed
        if ($insert_user_meta === false) {
            // check if validation error exist
            $validationErrors = $this->userMeta->errors();
            // @if validation errors is not empty (error detected)
            if (! empty($validationErrors)) {
                // write error message validation to log
                log_message("error", "Validation: " . json_encode($validationErrors));
            }
            // check is DB error
            $dbError = $this->db->error();
            // @if error from DB found
            if ($dbError["code"] !== 0) {
                // write error message database to log
                log_message("error", "Database: " . $dbError["message"]);
            }
            // rollback transaction
            $this->db->transRollback();
            // @return status code http to 400 (Bad Request)
            return $this->response->setStatusCode(400)->setJSON([
                "status" => 400,
                "message" => "Pendaftaran gagal! Jika ini terus berlanjut, mohon hubungi Administrator untuk solusi lebih lanjut!"
            ]);
        }
        // commit transactions
        $this->db->transCommit();
        // @set flash data with message
        session()->setFlashdata("message_from_register", "Akun berhasil didaftarkan. Silahkan login menggunakan akun yang telah terdaftar!");
        // @return message success and redirect uri
        return $this->response->setJSON([
            "status" => 200,
            "message" => "Akun anda berhasil terdaftar!",
            "redirectUri" => "/login"
        ]);
    }
}
