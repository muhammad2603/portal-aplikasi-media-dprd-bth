<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $allowedFields = ["email", "password", "role_id", "token_login"];
}
