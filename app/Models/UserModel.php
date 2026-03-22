<?php
// namespace Models
namespace App\Models;
// use Model from codeigniter
use CodeIgniter\Model;
// @class
class UserModel extends Model
{
    // @set table name
    protected $table = "user";
    // @set allowed fields
    protected $allowedFields = ["email", "password", "role_id", "is_verified", "token_login"];
    /**
     * @method isEmailExist
     * 
     * @param string $email
     * 
     * @return true jika email tersedia
     */
    public function isEmailExist(string $email)
    {
        $find_email = $this->select("email")->where("email", $email)->first();
        // @if email exist on DB
        if ($find_email !== null)
            // @return true
            return true;
    }
}
