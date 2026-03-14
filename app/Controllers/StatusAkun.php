<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class StatusAkun extends Controller
{
    public function index(): string
    {
        $data = [
            "page_name"         => "Status Akun",
            "email_support"     => $_ENV["EMAIL_SUPPORT"],
            "telp_fax"          => $_ENV["TELP_FAX_SUPPORT"],
        ];

        return view('pages/status-akun', $data);
    }
}
