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
    {
        $data = [
            'title' => 'Home',
            'content' => 'datamagang/index',
            'datamagang' => $this->datamagangModel->getDataMagang()
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detail($magang_id)
    {

        $data = [
            'title' => 'Detail Magang',
            'content' => 'datamagang/detail',
            'datamagang' => $this->datamagangModel->getDataMagang($magang_id)
        ];
        //jika tidak ada data magang_id yang masuk
        if (empty($data['datamagang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(' Magang ' . $magang_id . 'tidak ditemukan');
        }
        return view('layout/v_wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Magang',
            'content' => 'datamagang/create',
            'validation' => \Config\Services::validation()
        ];
        return view('layout/v_wrapper', $data);
    }

    public function save()
    {
        //validasi 
        if (!$this->validate([
            'nama' => 'required',
            'nik' => 'required|is_unique[magang.nik]',
            'gambar' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ], [
            'nama' => [
                'required' =>  'Nama harus diisi.'
            ],
            'nik' => [
                'required' => 'NIK harus diisi.',
                'is_unique' => 'NIK telah terdaftar.'
            ],
            'gambar' => [
                'uploaded' => 'Masukkan gambar..',
                'max_size' => 'Ukuran maximal gambar adalah 1024kb.',
                'is_image' => 'File yang anda pilih bukan gambar.',
                'mime_in' => 'File yang anda pilih bukan gambar.'
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/datamagang/create')->withInput()->with('validation', $validation);
            return redirect()->to('/datamagang/create')->withInput();

            //ambil gambar
            $fileGambar = $this->request->getFile('gambar');
            dd($fileGambar);
        }
        $data = [
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

        ];
        $this->datamagangModel->insert($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/datamagang');
    }

    public function delete($magang_id)
    {
        $this->datamagangModel->delete($magang_id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/datamagang');
    }

    public function edit($magang_id)
    {
        $data = [
            'title' => 'Form Ubah Data Magang',
            'content' => 'datamagang/edit',
            'validation' => \Config\Services::validation(),
            'datamagang' => $this->datamagangModel->getDataMagang($magang_id)
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($magang_id)
    {

        // dd($this->datamagangModel->getDataMagang($magang));
        $niklama = $this->datamagangModel->getDataMagang($magang_id);
        if ($niklama['nik'] == $this->request->getVar('nik')) {
            $rulebaru = 'required';
        } else {
            $rulebaru = 'required|is_unique[magang.nik]|numeric';
        }
        if (!$this->validate([
            'nama' => 'required',
            'nik' => $rulebaru
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/datamagang/create')->withInput()->with('validation', $validation);
        }

        $this->datamagangModel->save([
            'magang_id' => $magang_id,
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

        session()->setFlashdata('pesan', 'Data berhasil dirubah.');
        return redirect()->to('/datamagang');
    }
}
