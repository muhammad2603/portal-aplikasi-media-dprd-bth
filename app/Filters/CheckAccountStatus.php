<?php
// namespace Filters
namespace App\Filters;
// use RequestInterface from codeigniter
use CodeIgniter\HTTP\RequestInterface;
// use ResponseInterface from codeigniter
use CodeIgniter\HTTP\ResponseInterface;
// use FilterInterface from codeigniter
use CodeIgniter\Filters\FilterInterface;
// @class
class CheckAccountStatus implements FilterInterface
{
    // @method before
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // @if cek apakah sesi key isAccountVerified ada AND value-nya adalah false
        if ($session->has("isAccountVerified") && $session->get('isAccountVerified') === false) {
            // @return redirect user ke-halaman status akun
            return redirect()->to('/status-akun', 301, 'GET');
        }
    }
    // @method after
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // @TODO
    }
}
