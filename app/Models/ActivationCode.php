<?php
// namespace Models
namespace App\Models;
// use Model from codeigniter
use CodeIgniter\Model;
// @class
class ActivationCode extends Model
{
    // set table name
    protected $table = "activation_code";
    // set allowed fields
    protected $allowedFields = ["user_id", "code"];
}
