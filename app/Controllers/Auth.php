<?php
// declare strict type
declare(strict_types=1);
// namespace Controller
namespace App\Controllers;
// use UserModel
use App\Models\UserModel;

use CodeIgniter\Cookie\Cookie;

use DateTime;

helper("text");
// @class
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
        // @db get user identity (including User ID, Full Name, Email, and Role) from database
        $getUserIdentity = $this->userModel->select(["user.id" => "user_id", "nama_lengkap", "email", "role", "is_verified"])->join("user_meta", "user_meta.user_id = user.id")->join("roles_user", "roles_user.id = user.role_id")->where("email", $email_req)->first();
        // @if: email tidak ditemukan
        if ($getUserIdentity === null) {
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
        $getPassword = $this->userModel->select("password")->where(["id" => $getUserIdentity["user_id"], "email" => $getUserIdentity["email"]])->first()["password"];
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
        // get value on field is_verified
        $is_account_verified = $getUserIdentity["is_verified"] === "true" ? true : false;
        // @request
        $remember_req = $payload->remember ?? false;
        // @if user requested remember me
        if ($remember_req && $is_account_verified) {
            // create token login for user
            $token_login = bin2hex(random_bytes(32));
            // hash token login with sha256 algorithm
            $hash_token_login = hash("sha256", $token_login);
            // save random string as token login to table user
            $this->userModel->update($getUserIdentity["user_id"], ["token_login" => $hash_token_login]);
            // save token login to cookie with securely and httponly
            $this->response->setCookie(
                "token_login",
                $token_login,
                // add expire to 24 hour from now
                new DateTime("+24 hours"),
                '',
                '/',
                '',
                ($_ENV["CI_ENVIRONMENT"] === "production") ?? false,
                true,
                COOKIE::SAMESITE_STRICT
            );
        }
        // set session isLoggedIn
        session()->set([
            "isLoggedIn" => true,
            "userId" => $getUserIdentity["user_id"],
            "userFullName" => $getUserIdentity["nama_lengkap"],
            "role" => $getUserIdentity["role"],
            "isAccountVerified" => $is_account_verified,
        ]);
        // @if status akun user belum diverifikasi
        if (! $is_account_verified) {
            return $this->response->setStatusCode(403)->setJSON([
                "status" => 403,
                "message" => 'Akun belum diverifikasi.',
                "redirect_to" => '/status-akun',
            ]);
        }
        // success
        return $this->response
            ->setJSON([
                "status" => 200,
                "message" => "Login berhasil. Sedang mengalihkan halaman...",
            ]);
    }
}
