<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Latihan extends BaseController
{
    protected $mhsModel;

    public function __construct()
    {
        $this->mhsModel = new MahasiswaModel();
        helper(['form', 'url']);
    }

    // 1. READ - Menampilkan Tabel di dalam Wrapper
    public function index()
    {
        $data = [
            'title'          => 'Data Mahasiswa',
            'subtitle'       => 'List Data',
            'para_mahasiswa' => $this->mhsModel->orderBy('id', 'DESC')->findAll(),
            'segment'        => 'mahasiswa' // PENTING: Agar sidebar 'Data Mahasiswa' menyala
        ];

        // View ini harus menggunakan $this->extend('layout/wrapper')
        return view('profil_view', $data);
    }

    // 2. CREATE - Menampilkan Form di dalam Wrapper
    public function tambah()
    {
        $data = [
            'title'      => 'Tambah Mahasiswa',
            'subtitle'   => 'Form Data Baru',
            'segment'    => 'mahasiswa',
            'validation' => \Config\Services::validation()
        ];
        return view('tambah_view', $data);
    }

    // Proses Simpan
    public function simpan()
    {
        $rules = [
            'nama' => 'required|min_length[3]',
            'nim'  => 'required|numeric|is_unique[mahasiswa.nim]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/tambah')->withInput();
        }

        $this->mhsModel->save([
            'nama' => $this->request->getVar('nama'),
            'nim'  => $this->request->getVar('nim')
        ]);

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->to('/coba');
    }

    // 3. UPDATE - Menampilkan Form Edit di dalam Wrapper
    public function edit($id)
    {
        $dataMhs = $this->mhsModel->find($id);

        if (empty($dataMhs)) {
            throw new PageNotFoundException('Data tidak ditemukan: ' . $id);
        }

        $data = [
            'title'      => 'Edit Mahasiswa',
            'subtitle'   => 'Update Data',
            'segment'    => 'mahasiswa',
            'mahasiswa'  => $dataMhs,
            'validation' => \Config\Services::validation()
        ];
        return view('edit_view', $data);
    }

    // Proses Update
    public function update($id)
    {
        $dataLama = $this->mhsModel->find($id);
        
        $ruleNim = ($dataLama['nim'] == $this->request->getVar('nim')) 
            ? 'required|numeric' 
            : 'required|numeric|is_unique[mahasiswa.nim]';

        if (!$this->validate(['nama' => 'required', 'nim' => $ruleNim])) {
            return redirect()->to('/edit/' . $id)->withInput();
        }

        $this->mhsModel->update($id, [
            'nama' => $this->request->getVar('nama'),
            'nim'  => $this->request->getVar('nim')
        ]);

        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('/coba');
    }

    // 4. DELETE
    public function hapus($id)
    {
        $this->mhsModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/coba');
    }
    
    // Profil Developer
    public function biodata()
    {
        echo view('layout/wrapper', [
            'title'    => 'Profil Developer', 
            'subtitle' => 'About Me',
            'segment'  => 'profil',
            'content'  => '<h3>Halaman Profil</h3><p>Ini adalah halaman profil developer.</p>'
        ]);
    }
}