<?php
// declare strict types
declare(strict_types=1);
// namespace Models
namespace App\Models;
// use Model from codeigniter
use CodeIgniter\Model;
// @class
class Pengajuan extends Model
{
    protected $table            = 'pengajuan';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ["judul", "url", "deskripsi", "berkas_pendukung", "user_id", "tanggal_publikasi"];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    /**
     * Ambil total pengajuan dan total pengajuan berdasarkan statusnya
     * 
     * @param int $user_id
     * 
     * @return array
     */
    public function getTotalPengajuan(int $user_id): array
    {
        return [
            "total" => $this->select()->where("user_id", $user_id)->countAllResults(),
            "total_by_status" => $this->select([
                "SUM(status.nama = 'Pending') AS pending,
                SUM(status.nama = 'Disetujui') AS disetujui,
                SUM(status.nama = 'Perbaikan') AS perbaikan,
                SUM(status.nama = 'Ditolak') AS ditolak"
            ])
                ->join("riwayat_status_pengajuan rsp", "rsp.id_pengajuan = pengajuan.id")
                ->join("status", "status.id = rsp.id_status")
                ->where("pengajuan.user_id", $user_id)
                ->get()
                ->getRowArray(),
        ];
    }
    /**
     * Ambil pengajuan yang disubmit terakhir kali oleh user
     * 
     * @param int $user_id
     * 
     * @return array
     */
    public function getLastSubmitPengajuan(int $user_id): array
    {
        return $this
            ->select(["judul", "created_at"])
            ->where("user_id", $user_id)
            ->orderBy("created_at", "DESC")
            ->orderBy("id", "DESC")
            ->first();
    }
    /**
     * Ambil riwayat pengajuan terakhir beserta data-nya
     * 
     * @param int $user_id
     * 
     * @return array
     */
    public function getLastHistoriesPengajuan(int $user_id): array
    {
        return $this
            ->select([
                "pengajuan.judul",
                "um.nama_media AS media",
                "status.nama AS status",
                "pengajuan.created_at",
            ])
            ->join("status_pengajuan sp", "sp.id_pengajuan = pengajuan.id")
            ->join("status", "status.id = sp.id_status")
            ->join("user_meta um", "um.user_id = pengajuan.user_id")
            ->where("pengajuan.user_id", $user_id)
            ->orderBy("pengajuan.created_at", "DESC")
            ->orderBy("pengajuan.id", "DESC")
            ->findAll(4);
    }
}
