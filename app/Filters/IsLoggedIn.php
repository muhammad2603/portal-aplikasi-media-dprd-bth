<?php // Filter for status login
// namespace Filters
namespace App\Filters;
// use RequestInterface from CodeIgniter
use CodeIgniter\HTTP\RequestInterface;
// use ResponseInterface from CodeIgniter
use CodeIgniter\HTTP\ResponseInterface;
// use FilterInterface from CodeIgniter
use CodeIgniter\Filters\FilterInterface;
// @class
class IsLoggedIn implements FilterInterface
{
    // @before
    public function before(RequestInterface $request, $arguments = null)
    {
        // @if check session with name isLoggedIn, if true:
        if (session()->get('isLoggedIn')) {
            // redirect user from /login to /dashboard
            return redirect()->to('/dashboard');
        }
    }
    // @after
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // @TODO
    }
}
