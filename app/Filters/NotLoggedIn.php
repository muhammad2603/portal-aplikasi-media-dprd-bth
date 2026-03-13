<?php // Filter for Authentication Login //
// namespace Filters
namespace App\Filters;
// use RequestInterface from CodeIgniter
use CodeIgniter\HTTP\RequestInterface;
// use ResponseInterface from CodeIgniter
use CodeIgniter\HTTP\ResponseInterface;
// use FilterInterface from CodeIgniter
use CodeIgniter\Filters\FilterInterface;
// @class
class NotLoggedIn implements FilterInterface
{
    // @before
    public function before(RequestInterface $request, $arguments = null)
    {
        // @if check session with name isLoggedIn, if false:
        if (! session()->get('isLoggedIn')) {
            // redirect user from /dashboard/* to /login
            return redirect()->to('/login');
        }
    }
    // @after
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // @TODO
    }
}
