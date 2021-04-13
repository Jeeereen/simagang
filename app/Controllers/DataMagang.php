<?php

namespace App\Controllers;

use App\Models\DataMagangModel;

class DataMagang extends BaseController
{
    protected $datamagangModel;
    public function __construct()
    {
        $this->datamagangModel = new DataMagangModel();
    }
    public function index()
    {;
        $data = [
            'title' => 'Home',
            'content' => 'datamagang/index',
            'datamagang' => $this->datamagangModel->getDataMagang()
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detail($nik)
    {

        $data = [
            'title' => 'Detail Magang',
            'content' => 'datamagang/detail',
            'datamagang' => $this->datamagangModel->getDataMagang($nik)
        ];
        //jika tidak ada data nik yang masuk
        if (empty($data['datamagang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nik ' . $nik . 'tidak ditemukan');
        }
        return view('layout/v_wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Data Tambah Magang',
            'content' => 'datamagang/create'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function save()
    {
        $this->datamagangModel->save([
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'gambar' => $this->request->getVar('gambar'),
            'ttl' => $this->request->getVar('ttl'),
            'email' => $this->request->getVar('email'),
            'jeniskelamin' => $this->request->getVar('jeniskelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'notp' => $this->request->getVar('notp'),
            'agama' => $this->request->getVar('agama'),
            'jurusan' => $this->request->getVar('jurusan')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil.');
        return redirect()->to('/datamagang');
    }
}
