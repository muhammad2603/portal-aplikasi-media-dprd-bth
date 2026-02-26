<?php
// namespace Controllers
namespace App\Controllers;
// use Controller from CodeIgniter
use CodeIgniter\Controller;
// Controller Login
class Login extends Controller
{
    // @method index: returned string view
    public function index(): string
    {
        // data halaman
        $data_pages = [
            'page_name' => 'Login | SiKEMA Setwan Kabupaten Batang Hari'
        ];
        // @return view ke halaman login
        return view('pages/login', $data_pages);
    }
}
