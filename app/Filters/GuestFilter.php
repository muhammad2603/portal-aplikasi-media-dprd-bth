<?php
// namespace Filters
namespace App\Filters;
// use RequestInterface from HTTP
use CodeIgniter\HTTP\RequestInterface;
// use ResponseInterface from HTTP
use CodeIgniter\HTTP\ResponseInterface;
// use FilterInterface from Filters
use CodeIgniter\Filters\FilterInterface;
// use UserModel from Models
use App\Models\UserModel;
// call helper cookie
helper("cookie");
// @class
class GuestFilter implements FilterInterface
{
    /*
     * @method before
     * 
     * @explain: filter ini mencegah pengguna yang sudah login untuk mengakses endpoint Login dan Daftar
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // cek apakah pengguna sudah login
        $is_user_logged_in = $session->has("isLoggedIn") && $session->get("isLoggedIn") === true;
        // cek apakah akun pengguna belum diverifikasi
        $is_unverified_account = $session->has("isAccountVerified") && $session->get("isAccountVerified") === false;
        // @if pengguna sudah login AND akun belum diverifikasi
        if ($is_user_logged_in && $is_unverified_account)
            // @return redirect pengguna ke-halaman status akun
            return redirect()->to('/status-akun', 301, 'GET');
        // init UserModel
        $userModel = new UserModel();
        // ambil token login dari cookie
        $get_cookie_token_login = get_cookie("token_login");
        // @if pengguna tidak memiliki sesi login, tapi memiliki cookie token login
        if ((! $is_user_logged_in) && $get_cookie_token_login) {
            // hash token login dari cookie menggunakan algoritma sha256
            $hash_token_login = hash("sha256", $get_cookie_token_login);
            // atur kolom data pengguna yang ingin diambil
            $set_fields = [
                "user.id uid",
                "user.is_verified",
                "um.nama_lengkap",
                "ru.role",
            ];
            // ambil data pengguna dari database berdasarkan token login yang cocok
            $get_user_data_from_db_by_token_login = $userModel
                ->select($set_fields)
                ->join("user_meta um", "user.id = um.user_id")
                ->join("roles_user ru", "user.role_id = ru.id")
                ->where(["user.is_verified" => "true", "user.token_login" => $hash_token_login])
                ->first();
            // @if data pengguna ditemukan
            if ($get_user_data_from_db_by_token_login !== null) {
                $user_id = $get_user_data_from_db_by_token_login["uid"];
                $user_full_name = $get_user_data_from_db_by_token_login["nama_lengkap"];
                $user_role = $get_user_data_from_db_by_token_login["role"];
                $account_status = ($get_user_data_from_db_by_token_login["is_verified"] === "true");
                // @set data pengguna ke-session yang diperbarui
                $session->set([
                    "isLoggedIn" => true,
                    "userId" => $user_id,
                    "userFullName" => $user_full_name,
                    "role" => $user_role,
                    "isAccountVerified" => $account_status,
                ]);
                // @return redirect pengguna ke-halaman dashboard dengan session yang sudah diperbarui
                return redirect()->to("/dashboard");
            }
        }
        // cek apakah akun pengguna sudah terverifikasi
        $is_verified_account = $session->has("isAccountVerified") && $session->get("isAccountVerified") === true;
        // @if pengguna sudah login AND akun sudah diverifikasi
        if ($is_user_logged_in && $is_verified_account) {
            // @return redirect pengguna ke-halaman dashboard
            return redirect()->to('/dashboard', 301, 'GET');
        }
    }
    // @method after
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
