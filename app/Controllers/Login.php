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
        $data_pages = [
            'page_name' => 'Login'
        ];

        return view('pages/login', $data_pages);
    }
}
