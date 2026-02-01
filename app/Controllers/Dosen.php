<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Dosen extends BaseController
{
    protected $dosenModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
        helper(['form', 'url']);
    }

    // 1. READ
    public function index()
    {
        $data = [
            'title'      => 'Data Dosen',
            'subtitle'   => 'Daftar Pengajar',
            'data_dosen' => $this->dosenModel->orderBy('id', 'DESC')->findAll(),
            'segment'    => 'dosen' // PENTING: Untuk Sidebar
        ];

        return view('dosen/index', $data);
    }

    // 2. CREATE
    public function tambah()
    {
        $data = [
            'title'      => 'Tambah Dosen',
            'subtitle'   => 'Form Data Baru',
            'segment'    => 'dosen',
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tambah', $data);
    }

    public function simpan()
    {
        // Validasi
        if (!$this->validate([
            'nidn' => 'required|numeric|is_unique[dosen.nidn]|min_length[5]',
            'nama' => 'required|min_length[3]',
            'gelar' => 'required',
            'mata_kuliah' => 'required'
        ])) {
            return redirect()->to('/dosen/tambah')->withInput();
        }

        $this->dosenModel->save([
            'nidn'        => $this->request->getVar('nidn'),
            'nama'        => $this->request->getVar('nama'),
            'gelar'       => $this->request->getVar('gelar'),
            'mata_kuliah' => $this->request->getVar('mata_kuliah'),
        ]);

        session()->setFlashdata('success', 'Data dosen berhasil ditambahkan.');
        return redirect()->to('/dosen');
    }

    // 3. UPDATE
    public function edit($id)
    {
        $dosen = $this->dosenModel->find($id);
        if (!$dosen) {
            throw new PageNotFoundException('Data dosen tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Dosen',
            'subtitle'   => 'Perbarui Data',
            'segment'    => 'dosen',
            'dosen'      => $dosen,
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/edit', $data);
    }

    public function update($id)
    {
        $dosenLama = $this->dosenModel->find($id);
        
        // Cek NIDN unik jika berubah
        $ruleNidn = ($dosenLama['nidn'] == $this->request->getVar('nidn')) 
            ? 'required|numeric' 
            : 'required|numeric|is_unique[dosen.nidn]';

        if (!$this->validate([
            'nidn' => $ruleNidn,
            'nama' => 'required',
            'gelar' => 'required',
            'mata_kuliah' => 'required'
        ])) {
            return redirect()->to('/dosen/edit/' . $id)->withInput();
        }

        $this->dosenModel->update($id, [
            'nidn'        => $this->request->getVar('nidn'),
            'nama'        => $this->request->getVar('nama'),
            'gelar'       => $this->request->getVar('gelar'),
            'mata_kuliah' => $this->request->getVar('mata_kuliah'),
        ]);

        session()->setFlashdata('success', 'Data dosen berhasil diperbarui.');
        return redirect()->to('/dosen');
    }

    // 4. DELETE
    public function hapus($id)
    {
        $this->dosenModel->delete($id);
        session()->setFlashdata('success', 'Data dosen berhasil dihapus.');
        return redirect()->to('/dosen');
    }
}