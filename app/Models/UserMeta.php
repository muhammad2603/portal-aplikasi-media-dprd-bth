<?php
// namespace Models
namespace App\Models;
// use Model from codeigniter
use CodeIgniter\Model;
// @class
class UserMeta extends Model
{
    protected $table = "user_meta";
    protected $allowedFields = ["nama_lengkap", "profil_path_img", "kartu_tanda_anggota", "tanggal_lahir", "nomor_hp", "nama_media", "alamat_media", "last_login"];
    public function getUserMeta(int $user_id, array|null $custom_fields = null)
    {
        $fields = [
            "nama_lengkap",
            "profil_path_img AS profil",
            "kartu_tanda_anggota",
            "tanggal_lahir",
            "nomor_hp",
            "nama_media",
            "alamat_media",
        ];
        return $this
            ->select($custom_fields ?? $fields)
            ->where("user_id", $user_id)
            ->first();
    }
}
