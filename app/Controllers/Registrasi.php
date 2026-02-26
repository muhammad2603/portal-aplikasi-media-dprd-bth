<?php
// namespace controllers
namespace App\Controllers;
// use controller from codeigniter
use CodeIgniter\Controller;
// @class
class Registrasi extends Controller
{
    // @method index
    public function index(): string
    {
        // data page
        $data_page = [
            "page_name" => 'Daftar'
        ];
        // @return
        return view('pages/register', $data_page);
    }
}
