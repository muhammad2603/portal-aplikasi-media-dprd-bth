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
    protected $allowedFields    = ["judul", "url", "deskripsi", "berkas_pendukung", "user_id", "tanggal_publikasi", "created_at", "updated_at", "deleted_at"];
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
     * @param int $user_id
     * @param bool $withDelete opsional, jika ingin mengambil data pengajuan yang sudah dihapus (soft delete)
     * 
     * @return array
     * 
     * @description jika ingin mengambil semua data pengajuan user,
     * gunakan method ini dan set parameter $withDelete tergantung kebutuhan
     */
    public function getPengajuan(int $user_id, bool $withDelete = false): array
    {
        $builder = $this
            ->select([
                "pengajuan.id",
                "pengajuan.judul",
                "pengajuan.deskripsi",
                "um.nama_media AS media",
                "pengajuan.created_at",
            ]);
        if ($withDelete) {
            $builder->select("pengajuan.deleted_at");
            $builder->onlyDeleted();
        }
        return $builder
            ->join("user_meta um", "um.user_id = pengajuan.user_id")
            ->where("pengajuan.user_id", $user_id)
            ->findAll();
    }
    /**
     * Mengambil total pengajuan dan total pengajuan berdasarkan statusnya
     * 
     * @param int $user_id
     * 
     * @return array ["total" => int, "total_by_status" => array]
     */
    public function getTotalPengajuan(int $user_id): array
    {
        return [
            "total" => $this->select()->where("user_id", $user_id)->countAllResults(),
            "total_by_status" => $this->select([
                "COALESCE(SUM(status.nama = 'Pending'), 0) AS pending,
                COALESCE(SUM(status.nama = 'Disetujui'), 0) AS disetujui,
                COALESCE(SUM(status.nama = 'Perbaikan'), 0) AS perbaikan,
                COALESCE(SUM(status.nama = 'Ditolak'), 0) AS ditolak"
            ])
                ->join("status_pengajuan sp", "sp.id_pengajuan = pengajuan.id")
                ->join("status", "status.id = sp.id_status")
                ->where("pengajuan.user_id", $user_id)
                ->where("pengajuan.deleted_at IS NULL")
                ->get()
                ->getRowArray(),
        ];
    }
    /**
     * Mengambil data pengajuan user sejak 7 hari terakhir
     * 
     * @param int $user_id
     * 
     * @return array
     */
    public function getHistoriesIn7Days(int $user_id): array
    {
        $histories_date = date("Y-m-d H:i:s", strtotime('-7 days'));
        return $this
            ->select([
                "pengajuan.judul",
                "status.nama AS status",
                "pengajuan.created_at"
            ])
            ->join("riwayat_status_pengajuan rsp", "rsp.id_pengajuan = pengajuan.id")
            ->join("status", "status.id = rsp.id_status")
            ->where("pengajuan.user_id", $user_id)
            ->where("rsp.created_at >=", $histories_date)
            ->orderBy("rsp.created_at", "DESC")
            ->findAll();
    }
    /**
     * Mengambil pengajuan yang disubmit terakhir kali oleh user
     * 
     * @param int $user_id
     * 
     * @return array
     */
    public function getLastSubmitPengajuan(int $user_id): array|null
    {
        return $this
            ->select(["judul", "created_at"])
            ->where("user_id", $user_id)
            ->orderBy("created_at", "DESC")
            ->orderBy("id", "DESC")
            ->first();
    }
    /**
     * Mengambil riwayat pengajuan terakhir beserta data-nya
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
    /**
     * Memulihkan pengajuan yang sudah dihapus (soft delete)
     * 
     * @param int $user_id
     * @param int $pengajuan_id
     * 
     * @return bool
     */
    public function recoveryPengajuan(int $user_id, int $pengajuan_id): bool
    {
        return $this
            ->set(["deleted_at" => null])
            ->where([
                "id" => $pengajuan_id,
                "user_id" => $user_id
            ])
            ->update();
    }
}
