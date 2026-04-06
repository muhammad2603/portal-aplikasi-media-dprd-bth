<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class APIFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $response = service('response');
        $session = session();
        $throttler = service('throttler');
        $key_by_ip = md5($request->getIPAddress());
        $is_ip_limited = ($throttler->check($key_by_ip, 100, MINUTE) === false);
        $key_by_user_id = md5($session->get('user_id'));
        $is_user_id_limited = ($throttler->check($key_by_user_id, 100, MINUTE) === false);
        if ($is_ip_limited || $is_user_id_limited) {
            return $response
                ->setStatusCode(429)
                ->setJSON([
                    "status" => 429,
                    "message" => "Terlalu banyak permintaan, silakan coba lagi nanti."
                ]);
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
