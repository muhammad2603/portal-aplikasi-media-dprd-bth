<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;
use App\Models\Pengajuan;
use App\Models\StatusPengajuan;
// @class
class API_CRUD extends BaseController
{
    // TODO perbaiki saat setelah menambah pengajuan, pengajuan juga harus dibuat data status_pengajuan dan riwayat_status_pengajuannya
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
        $db                 = Database::connect();
        $pengajuanModel     = new Pengajuan();
        $judul              = $this->request->getPost("judul");
        $url                = $this->request->getPost("url");
        $tanggalPublikasi   = $this->request->getPost("tanggalPublikasi");
        $deskripsi          = $this->request->getPost("deskripsi");
        $user_id            = session()->get("userId");
        $targetPath         = WRITEPATH . 'uploads';
        $fullPath           = null;
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
            $pengajuanModel
                ->set([
                    "judul" => $judul,
                    "url" => $url,
                    "deskripsi" => $deskripsi,
                    "user_id" => $user_id,
                    "tanggal_publikasi" => $tanggalPublikasi
                ]);
            // @if cek jika lampiran tersedia dan lampiran valid dan lampiran belum dipindahkan
            if ($lampiran !== null && ($lampiran->isValid() && ! $lampiran->hasMoved())) {
                $name = $lampiran->getRandomName();
                $fullPath = $targetPath . "/$name";
                $move_uploaded_file = $lampiran->move($targetPath, $name);
                if (! $move_uploaded_file)
                    throw new \Exception("Upload file berkas pendukung user gagal!");
                $pengajuanModel->set("berkas_pendukung", $name);
            }
            $pengajuanModel->insert();
            if ($db->transStatus() === false) {
                throw new \Exception("Upload pengajuan user ke database gagal!");
            }
            $db->transCommit();
            return $this->response->setStatusCode(201)->setJSON([
                "status" => 201,
                "message" => "Pengajuan berhasil.",
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
        // @list status pengajuan yang boleh dihapus
        $allowedStatus = ["Pending", "Ditolak"];
        $statusPengajuanModel = new StatusPengajuan();
        ["status" => $status_pengajuan, "judul" => $judul_pengajuan] = $statusPengajuanModel
            ->select([
                "pgj.judul AS judul",
                "status.nama AS status"
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
        $pengajuanModel = new Pengajuan();
        $db = Database::connect();
        $db->transBegin();
        $pengajuanModel->delete($get_id_pengajuan);
        if ($db->transStatus === false) {
            log_message("error", "Pengajuan gagal dihapus tanpa sebab.");
            return $db->transRollback();
        }
        $db->transCommit();
        return $this->response->setJSON([
            "status" => 200,
            "message" => "Pengajuan dengan judul '$judul_pengajuan' berhasil terhapus"
        ]);
    }
}
