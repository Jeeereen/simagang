<?php

namespace App\Models;

use CodeIgniter\Model;

class DataMagangModel extends Model
{
    protected $table = "magang";
    protected $primaryKey = "magang_id";
    protected $allowedFields = ['nik', 'nama', 'gambar', 'ttl', 'email', 'jeniskelamin', 'alamat', 'notp', 'agama', 'jurusan'];

    public function getDataMagang($magang_id = false)
    {
        if ($magang_id == false) {
            return $this->findAll();
        }
        return $this->where(['magang_id' => $magang_id])->first();
    }
}
