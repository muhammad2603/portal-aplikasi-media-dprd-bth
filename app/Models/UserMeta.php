<?php
// namespace Models
namespace App\Models;
// use Model from codeigniter
use CodeIgniter\Model;
// @class
class UserMeta extends Model
{
    protected $table = "user_meta";
    protected $allowedFields = ["nama_lengkap", "user_id", "profil", "tanggal_lahir", "nomor_hp", "nama_media", "alamat_media", "last_login"];
}
