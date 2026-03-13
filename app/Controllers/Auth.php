<?php
// declare strict type
declare(strict_types=1);
// namespace Controller
namespace App\Controllers;
// use UserModel
use App\Models\UserModel;

class Auth extends BaseController
{
    // @protected: Model
    protected $userModel;
    // @constructor
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    // @method attemptLogin
    public function attemptLogin()
    {
        // @service (CodeIgniter) throttler
        $throttler = service('throttler');
        // get ip address client from request
        $ip_addr = $this->request->getIPAddress();
        // get payload JSON
        $payload = $this->request->getJSON();
        // @request
        $email_req = $payload->email;
        // key for throttler
        $key_by_ip_addr = "login-" . md5($ip_addr);
        $key_by_email_req = "login-" . md5($email_req);
        // set max limit request
        $max_limit_req = 5;
        // check if rate limit reached
        $check_rate_limit = $throttler->check($key_by_ip_addr, $max_limit_req, MINUTE) || $throttler->check($key_by_email_req, $max_limit_req, MINUTE);
        // @if check if rate-limit login reached
        if (! $check_rate_limit) {
            return $this->response->setStatusCode(429)->setJSON([
                "status" => 429,
                "message" => "Terlalu banyak percobaan login. Coba lagi nanti!"
            ]);
        }
        // @request
        $password_req = $payload->password;
        // @request
        $remember_req = $payload->remember ?? false;
        // @db get email user from database
        $getEmail = $this->userModel->select("email")->where("email", $email_req)->first();
        // @if: email tidak ditemukan
        if ($getEmail === null) {
            // @return
            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    "status" => 401,
                    "reason" => "Unauthorized",
                    "message" => "Email atau Password tidak cocok. Coba lagi!"
                ]);
        }
        // @db get password user if email user found
        $getPassword = $this->userModel->select("password")->where("email", $getEmail["email"])->first()["password"];
        // cek password cocok atau tidak
        $isCredentialsValid = password_verify($password_req, $getPassword);
        // @if: password tidak cocok
        if ($isCredentialsValid === false) {
            // @return
            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    "status" => 401,
                    "reason" => "Unauthorized",
                    "message" => "Email atau Password tidak cocok. Coba lagi!"
                ]);
        }
        // set session isLoggedIn
        session()->set('isLoggedIn', true);
        // success
        return $this->response
            ->setJSON([
                "status" => 200,
                "message" => "Login berhasil. Sedang mengalihkan halaman..."
            ]);
    }
}
