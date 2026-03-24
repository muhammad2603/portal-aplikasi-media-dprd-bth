<?php
// namespace Filters
namespace App\Filters;
// use RequestInterface from HTTP 
use CodeIgniter\HTTP\RequestInterface;
// use ResponseInterface from HTTP 
use CodeIgniter\HTTP\ResponseInterface;
// use FilterInterface from Filters 
use CodeIgniter\Filters\FilterInterface;
// call helper cookie
helper("cookie");
// @class
class VerifiedFilter implements FilterInterface
{
    // @method before
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // cek cookie token_login
        $token_login_cookie = get_cookie("token_login");
        // cek apakah pengguna telah login
        $is_logged_in = $session->has("isLoggedIn");
        // @if pengguna belum login ATAU tidak memiliki cookie token login
        if (! $is_logged_in && ! $token_login_cookie)
            // @return redirect user ke-halaman login
            return redirect()->to('/login', 301, 'GET');
        // cek apakah akun pengguna sudah diverifikasi
        $is_account_verified = $session->has("isAccountVerified") && $session->get("isAccountVerified") === true;
        // @if pengguna sudah login AND akun pengguna belum diverifikasi
        if (! $is_account_verified)
            // @return redirect user ke-halaman status akun
            return redirect()->to('/status-akun', 301, 'GET');
    }
    // @method after
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
