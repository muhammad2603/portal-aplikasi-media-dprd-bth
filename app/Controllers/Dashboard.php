<?php
// namespace controllers
namespace App\Controllers;
// use controller from codeigniter
use CodeIgniter\Controller;
// @class
class Dashboard extends Controller
{
    // @method
    public function home(): string
    {
        // @return
        return view('pages/dashboard/home.php');
    }
}
