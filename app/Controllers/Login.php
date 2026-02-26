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
        return view('pages/login', []);
    }
}
