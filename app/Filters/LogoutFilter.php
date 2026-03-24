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
class LogoutFilter implements FilterInterface
{
    // @method before
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $is_logged_in = $session->get("isLoggedIn");
        $cookie_token_login = get_cookie("token_login");
        // @if pengguna tidak memiliki kredensial autentikasi/login
        if (! $is_logged_in && ! $cookie_token_login)
            // @return pengguna ke-halaman login
            return redirect()->to('/login');
    }
    // @method after
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
