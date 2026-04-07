<?php

namespace App\Models;

use CodeIgniter\Model;

class UserActivities extends Model
{
    protected $table            = 'user_activities';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["actor_id", "actor_role", "entity", "entity_id", "action", "description", "created_at"];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

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

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    /**
     * @param int $user_id ID pengguna yang ingin diambil aktivitasnya
     * @param string $filter_by "asc" atau "desc", "desc" sebagai default untuk menampilkan aktivitas terbaru
     * @return array
     */
    public function getUserActivities(int $user_id, string $filter_by = "desc", $is_seven_days_before = false): array
    {
        $builder = $this
            ->select([
                "pgj.judul AS judul_pengajuan",
                "CASE
                    WHEN ua.action = 'create' THEN 'Pengajuan terkirim'
                    WHEN ua.action = 'update' THEN 'Memperbarui data pengajuan'
                    WHEN ua.action = 'soft delete' THEN 'Pengajuan dihapus'
                    WHEN ua.action = 'approved' THEN 'Pengajuan disetujui'
                    WHEN ua.action = 'revised' THEN 'Memperbarui data pengajuan'
                    WHEN ua.action = 'recovery' THEN 'Pengajuan dipulihkan'
                    ELSE 'Pengajuan ditolak' -- ua.action = 'rejected'
                END AS title",
                "status.nama AS status",
                "ua.action",
                "user_activities.description",
                "user_activities.created_at",
            ])
            ->join("pengajuan pgj", "pgj.id = user_activities.entity_id", "LEFT")
            ->join("user_actions ua", "ua.id = user_activities.action")
            ->join("riwayat_status_pengajuan rsp", "rsp.id_pengajuan = user_activities.entity_id")
            ->join("status", "status.id = rsp.id_status")
            ->where("actor_id", $user_id);
        if ($is_seven_days_before) {
            $builder->where("user_activities.created_at >=", date("Y-m-d H:i:s", strtotime("-7 days")));
        }
        return $builder
            ->orderBy("user_activities.created_at", $filter_by)
            ->findAll();
    }
}
