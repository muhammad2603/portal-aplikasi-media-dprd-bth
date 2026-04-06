<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;
use App\Models\Pengajuan;
use App\Models\StatusPengajuan;
use CodeIgniter\I18n\Time;
// @class
class API_CRUD extends BaseController
{
    private $rsp_last = "(
            SELECT id_pengajuan, komentar, id_status, created_at FROM riwayat_status_pengajuan rsp_parent
            JOIN (
                SELECT
                    MAX(id) AS last_id
                FROM riwayat_status_pengajuan
                WHERE id_status IN (2, 4)
                GROUP BY id_pengajuan
            ) rsp_child ON rsp_child.last_id = rsp_parent.id
        ) rsp_last";
    public function createPengajuan()
    {
        $lampiran           = $this->request->getFile("lampiran");
        $rules = [
            "judul" => [
                "rules" => "required|min_length[5]|max_length[255]",
                "errors" => [
                    "required" => "Judul wajib diisi.",
                    "min_length" => "Judul terlalu pendek (min. 5 karakter)",
                    "max_length" => "Judul terlalu panjang (maks. 50 karakter)",
                ]
            ],
            "url" => [
                "rules" => "required|regex_match[^(http|https):\/\/.+\.\w{1,3}\/]",
                "errors" => [
                    "required" => "URL wajib diisi.",
                    "regex_match" => "URL tidak valid."
                ]
            ],
            "tanggalPublikasi" => [
                "rules" => "required|valid_date[Y-m-d]",
                "errors" => [
                    "required" => "Tanggal publikasi wajib diisi.",
                    "valid_date" => "Format tanggal publikasi tidak valid."
                ]
            ],
            "deskripsi" => [
                "rules" => "required|min_length[30]|max_length[300]",
                "errors" => [
                    "required" => "Deskripsi wajib diisi.",
                    "min_length" => "Deskripsi terlalu pendek (min. 30 karakter)",
                    "max_length" => "Deskripsi terlalu panjang (maks. 300 karakter)",
                ]
            ]
        ];
        if ($lampiran !== null) {
            $rules = [
                ...$rules,
                "lampiran" => [
                    "rules" => "is_image[lampiran]|max_size[lampiran,2048]|mime_in[lampiran,image/jpeg,image/png,image/webp]|ext_in[lampiran,jpg,jpeg,png,webp]",
                    "errors" => [
                        "max_size" => "Ukuran gambar terlalu besar (maks. 2 MB).",
                        "mime_in" => "Ekstensi gambar tidak diizinkan, pastikan ekstensi-nya jpeg, jpg, png, dan webp.",
                        "ext_in" => "Ekstensi gambar tidak diizinkan, pastikan ekstensi-nya jpeg, jpg, png, dan webp.",
                        "is_image" => "Gambar tidak valid, pastikan file adalah gambar."
                    ]
                ]
            ];
        }
        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(400)->setJSON([
                "status" => 400,
                "message" => $this->validator->getErrors()
            ]);
        }
        $db                     = Database::connect();
        $pengajuanModel         = new Pengajuan();
        $statusPengajuanModel   = new StatusPengajuan();
        $judul                  = $this->request->getPost("judul");
        $url                    = $this->request->getPost("url");
        $tanggalPublikasi       = $this->request->getPost("tanggalPublikasi");
        $deskripsi              = $this->request->getPost("deskripsi");
        $user_id                = session()->get("userId");
        $targetPath             = WRITEPATH . 'uploads';
        $fullPath               = null;
        // @if cek jika judul pengajuan sudah ada didatabase
        if (count($pengajuanModel->select()->where("judul", $judul)->find()) > 0)
            return $this->response
                ->setStatusCode(409)
                ->setJSON([
                    "status" => 409,
                    "message" => "Judul pengajuan sudah ada."
                ]);
        $db->transBegin();
        try {
            $data_pengajuan = $db->table("pengajuan")
                ->set([
                    "judul" => $judul,
                    "url" => $url,
                    "deskripsi" => $deskripsi,
                    "user_id" => $user_id,
                    "tanggal_publikasi" => $tanggalPublikasi,
                    "created_at" => Time::now(),
                ]);
            // @if cek jika lampiran tersedia dan lampiran valid dan lampiran belum dipindahkan
            if ($lampiran !== null && ($lampiran->isValid() && ! $lampiran->hasMoved())) {
                $name = $lampiran->getRandomName();
                $fullPath = $targetPath . "/$name";
                $move_uploaded_file = $lampiran->move($targetPath, $name);
                if (! $move_uploaded_file)
                    throw new \Exception("Upload file berkas pendukung user gagal!");
                $data_pengajuan->set("berkas_pendukung", $name);
            }
            $data_pengajuan->insert();
            $insert_id = $db->insertID();
            $db->table("status_pengajuan")->insert(["id_pengajuan" => $insert_id]);
            $db->table("riwayat_status_pengajuan")->insert(["id_pengajuan" => $insert_id, "created_at" => Time::now()]);
            if ($db->transStatus() === false) {
                throw new \Exception("Upload pengajuan user ke database gagal!");
            }
            $db->transCommit();
            return $this->response->setStatusCode(201)->setJSON([
                "status" => 201,
                "message" => "Pengajuan berhasil diupload.",
            ]);
        } catch (\Throwable $e) {
            $db->transRollback();
            if ($fullPath !== null && file_exists($fullPath)) {
                unlink($fullPath);
            }
            return log_message("error", $e->getMessage());
        }
    }
    public function deletePengajuan()
    {
        $payload = $this->request->getJSON();
        $rules = [
            "idPengajuan" => [
                "rules" => "required|is_natural_no_zero",
                "errors" => [
                    "required" => "Pengajuan gagal terhapus!",
                    "is_natural_no_zero" => "Pengajuan gagal terhapus!"
                ]
            ]
        ];
        if (! $this->validate($rules))
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    "status" => 400,
                    "message" => $this->validator->getErrors(),
                ]);
        $get_id_pengajuan = (int) $payload->idPengajuan;
        $get_user_id_from_session = (int) session()->get("userId");
        $is_hard_delete = $payload->isPermanent ?? false;
        // @list status pengajuan yang boleh dihapus
        $allowedStatus = ["Pending", "Ditolak"];
        $statusPengajuanModel = new StatusPengajuan();
        ["status" => $status_pengajuan, "judul" => $judul_pengajuan, "berkas_pendukung" => $berkas_pendukung, "deleted_at" => $deleted_at] = $statusPengajuanModel
            ->select([
                "pgj.judul AS judul",
                "pgj.berkas_pendukung",
                "status.nama AS status",
                "pgj.deleted_at"
            ])
            ->join("status", "status.id = sp.id_status")
            ->join("pengajuan pgj", "pgj.id = sp.id_pengajuan")
            ->where("sp.id_pengajuan", $get_id_pengajuan)
            ->where("pgj.user_id", $get_user_id_from_session)
            ->first();
        // @if cek jika pengajuan tidak ditemukan
        if (! $judul_pengajuan)
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    "status" => 404,
                    "message" => "Pengajuan tidak ditemukan!",
                ]);
        // @if cek jika pengajuan memiliki status yang tidak boleh terhapus
        if (! in_array($status_pengajuan, $allowedStatus))
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    "status" => 400,
                    "message" => "Pengajuan gagal terhapus!",
                ]);
        if ($is_hard_delete && $deleted_at === null) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    "status" => 400,
                    "message" => "Pengajuan gagal dihapus secara permanen karena pengajuan belum dihapus terlebih dahulu.",
                ]);
        }
        $pengajuanModel = new Pengajuan();
        $db = Database::connect();
        $db->transBegin();
        $pengajuanModel->delete($get_id_pengajuan, $is_hard_delete);
        if ($db->transStatus === false) {
            log_message("error", "Pengajuan gagal dihapus tanpa sebab.");
            return $db->transRollback();
        }
        $db->transCommit();
        if ($is_hard_delete && $berkas_pendukung !== null) {
            $target_file_upload = WRITEPATH . "uploads/$berkas_pendukung";
            if (file_exists($target_file_upload)) {
                $delete_file_upload = unlink($target_file_upload);
                if (! $delete_file_upload) {
                    log_message("error", "Berkas pendukung pengajuan dengan judul '$judul_pengajuan' gagal dihapus tanpa sebab.");
                }
            } else {
                log_message("error", "Berkas pendukung pengajuan dengan judul '$judul_pengajuan' tidak ditemukan ketika akan dihapus secara permanen.");
            }
        }
        return $this->response->setJSON([
            "status" => 200,
            "message" => $is_hard_delete ? "Pengajuan berhasil dihapus secara permanen!" : "Pengajuan berhasil dihapus!"
        ]);
    }
    public function searchPengajuan()
    {
        $keyword = $this->request->getGet("keyword") ?? "";
        $pengajuanModel = new Pengajuan();
        $user_id = session()->get("userId");
        $search_pengajuan = $pengajuanModel
            ->select([
                "pengajuan.id",
                "pengajuan.judul",
                "pengajuan.deskripsi",
                "pengajuan.url",
                "pengajuan.tanggal_publikasi",
                "um.nama_media AS media",
                "status.nama AS status",
                "rsp_last.komentar AS catatan_perbaikan_terakhir",
                "COUNT(CASE WHEN rsp.id_status = 2 THEN 1 END) AS total_perbaikan",
                "(CASE WHEN status.nama != 'Pending' THEN adm.username END) AS last_confirmed_by",
                "rsp_last.created_at AS last_confirmed_date",
                "pengajuan.created_at",
            ])
            ->join("status_pengajuan sp", "sp.id_pengajuan = pengajuan.id")
            ->join("status", "status.id = sp.id_status")
            ->join("user_meta um", "um.user_id = pengajuan.user_id")
            ->join("riwayat_status_pengajuan rsp", "rsp.id_pengajuan = pengajuan.id")
            ->join("admin adm", "adm.id = sp.admin_id", "LEFT")
            ->join($this->rsp_last, "rsp_last.id_pengajuan = pengajuan.id", "LEFT")
            ->groupBy("rsp.id_pengajuan")
            ->where("pengajuan.user_id", $user_id)
            ->like("pengajuan.judul", $keyword)
            ->orderBy("pengajuan.id", "DESC")
            ->orderBy("pengajuan.created_at", "DESC")
            ->findAll();
        return $this->response->setJSON([
            "status" => 200,
            "message" => "Pengajuan ditemukan",
            "data_view" => view("components/data_pengajuan", ["pengajuan" => $search_pengajuan]),
        ]);
    }
    public function filterPengajuan()
    {
        $filter_by = $this->request->getGet("filterBy") ?? "Terbaru";
        // @note: filter yang diizinkan, jika ada status atau jenis filter baru, pastikan untuk menambahkannya ke dalam array $filters_allowed
        $filters_allowed = ["Terbaru", "Disetujui", "Pending", "Perbaikan", "Ditolak"];
        if (!in_array($filter_by, $filters_allowed)) {
            return $this->response->setJSON([
                "status" => 400,
                "message" => "Filter tidak diizinkan!"
            ]);
        }
        $pengajuanModel = new Pengajuan();
        $get_pengajuan_by_filter = $pengajuanModel
            ->select([
                "pengajuan.id",
                "pengajuan.judul",
                "pengajuan.deskripsi",
                "pengajuan.url",
                "pengajuan.tanggal_publikasi",
                "um.nama_media AS media",
                "status.nama AS status",
                "rsp_last.komentar AS catatan_perbaikan_terakhir",
                "COUNT(CASE WHEN rsp.id_status = 2 THEN 1 END) AS total_perbaikan",
                "(CASE WHEN status.nama != 'Pending' THEN adm.username END) AS last_confirmed_by",
                "rsp_last.created_at AS last_confirmed_date",
                "pengajuan.created_at",
            ])
            ->join("status_pengajuan sp", "sp.id_pengajuan = pengajuan.id")
            ->join("status", "status.id = sp.id_status")
            ->join("user_meta um", "um.user_id = pengajuan.user_id")
            ->join("riwayat_status_pengajuan rsp", "rsp.id_pengajuan = pengajuan.id")
            ->join("admin adm", "adm.id = sp.admin_id", "LEFT")
            ->join($this->rsp_last, "rsp_last.id_pengajuan = pengajuan.id", "LEFT")
            ->groupBy("rsp.id_pengajuan")
            ->where("pengajuan.user_id", session()->get("userId"));
        $result = match ($filter_by) {
            "Terbaru" => $get_pengajuan_by_filter->orderBy("pengajuan.id", "DESC")->orderBy("pengajuan.created_at", "DESC")->findAll(),
            "Disetujui" => $get_pengajuan_by_filter->where("status.nama", "Disetujui")->orderBy("pengajuan.id", "DESC")->orderBy("pengajuan.created_at", "DESC")->findAll(),
            "Pending" => $get_pengajuan_by_filter->where("status.nama", "Pending")->orderBy("pengajuan.id", "DESC")->orderBy("pengajuan.created_at", "DESC")->findAll(),
            "Perbaikan" => $get_pengajuan_by_filter->where("status.nama", "Perbaikan")->orderBy("pengajuan.id", "DESC")->orderBy("pengajuan.created_at", "DESC")->findAll(),
            "Ditolak" => $get_pengajuan_by_filter->where("status.nama", "Ditolak")->orderBy("pengajuan.id", "DESC")->orderBy("pengajuan.created_at", "DESC")->findAll(),
        };
        return $this->response->setJSON([
            "status" => 200,
            "message" => "Filter pengajuan berhasil",
            "data_view" => view("components/data_pengajuan", ["pengajuan" => $result]),
        ]);
    }
    public function userActivities()
    {
        $filter_by = $this->request->getGet("filterBy") ?? "desc";
        $user_id = session()->get("userId");
        $userActivitiesModel = new \App\Models\UserActivities();
        $activityHistories = $userActivitiesModel->getUserActivities($user_id, $filter_by);
        return $this->response->setJSON([
            "status" => 200,
            "message" => "Aktivitas pengguna berhasil diambil",
            "data_view" => view("components/activities", ["activities" => $activityHistories]),
        ]);
    }
    public function recoveryPengajuan()
    {
        $user_id = (int) session()->get("userId");
        $pengajuan_id = $this->request->getJSON()->pengajuanId;
        $pengajuanModel = new Pengajuan();
        $isPengajuanDeleted = $pengajuanModel->onlyDeleted()->find($pengajuan_id);
        if (! $isPengajuanDeleted) {
            return $this->response->setStatusCode(404)->setJSON([
                "status" => 404,
                "message" => "Pengajuan tidak ditemukan atau tidak dalam kondisi dihapus."
            ]);
        }
        $db = Database::connect();
        $db->transBegin();
        $pengajuanModel->recoveryPengajuan($user_id, $pengajuan_id);
        if ($db->transStatus() === false) {
            log_message("error", "Pengajuan gagal dipulihkan tanpa sebab.");
            return $db->transRollback();
        }
        $db->transCommit();
        return $this->response->setJSON([
            "status" => 200,
            "message" => "Pengajuan berhasil dipulihkan",
        ]);
    }
}
