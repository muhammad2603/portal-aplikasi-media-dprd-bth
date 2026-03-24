<?php
// namespace Filters
namespace App\Filters;
// use RequestInterface from HTTP
use CodeIgniter\HTTP\RequestInterface;
// use ResponseInterface from HTTP
use CodeIgniter\HTTP\ResponseInterface;
// use FilterInterface from Filters
use CodeIgniter\Filters\FilterInterface;
// @class
class AuthenticatedFilter implements FilterInterface
{
    // @method before
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // cek apakah pengguna sudah login
        $is_logged_in = $session->has("isLoggedIn") && $session->get("isLoggedIn") === true;
        // cek apakah akun pengguna sudah diverifikasi
        $is_account_verified = $session->has("isAccountVerified") && $session->get("isAccountVerified") === true;
        // @if jika pengguna belum login
        if (! $is_logged_in) {
            // @return redirect pengguna ke-halaman login
            return redirect()->to('/login');
        }
        // @if pengguna sudah login AND akun pengguna sudah diverifikasi
        if ($is_logged_in && $is_account_verified)
            // @return redirect pengguna ke-halaman dashboard
            return redirect()->to('/dashboard');
    }
    // @method after
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
