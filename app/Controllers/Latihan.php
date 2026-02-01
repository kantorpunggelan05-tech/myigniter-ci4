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
        
        // --- PERBAIKAN PENTING DI SINI ---
        // Kita wajib memanggil helper 'form' agar fungsi 
        // validation_list_errors() dan csrf_field() di View bisa jalan.
        helper('form'); 
    }

    public function index()
    {
        $data = [
            'title'          => 'Dashboard Data Mahasiswa',
            'para_mahasiswa' => $this->mhsModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('profil_view', $data);
    }

    public function tambah()
    {
        session(); // Aktifkan session
        $data = [
            'title' => 'Tambah Data Mahasiswa Baru'
        ];
        return view('tambah_view', $data);
    }

    public function simpan()
    {
        // Validasi Input
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'Nama Mahasiswa wajib diisi.',
                    'min_length' => 'Nama terlalu pendek, minimal 3 karakter.'
                ]
            ],
            'nim' => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => 'NIM wajib diisi.',
                    'numeric'  => 'NIM harus berupa angka, tidak boleh huruf.'
                ]
            ]
        ])) {
            return redirect()->to('/tambah')->withInput();
        }

        $this->mhsModel->save([
            'nama' => $this->request->getVar('nama'),
            'nim'  => $this->request->getVar('nim')
        ]);

        session()->setFlashdata('pesan', 'Data mahasiswa berhasil ditambahkan.');
        return redirect()->to('/coba');
    }

    public function edit($id)
    {
        $dataMhs = $this->mhsModel->find($id);
        if (empty($dataMhs)) {
            throw new PageNotFoundException('Data mahasiswa dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title'     => 'Edit Data Mahasiswa',
            'mahasiswa' => $dataMhs
        ];
        return view('edit_view', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'Nama Mahasiswa wajib diisi.',
                    'min_length' => 'Nama terlalu pendek.'
                ]
            ],
            'nim' => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => 'NIM wajib diisi.',
                    'numeric'  => 'NIM harus berupa angka.'
                ]
            ]
        ])) {
            return redirect()->to('/edit/' . $id)->withInput();
        }

        $this->mhsModel->update($id, [
            'nama' => $this->request->getVar('nama'),
            'nim'  => $this->request->getVar('nim')
        ]);

        session()->setFlashdata('pesan', 'Data mahasiswa berhasil diperbarui.');
        return redirect()->to('/coba');
    }

    public function hapus($id)
    {
        $dataMhs = $this->mhsModel->find($id);
        if (empty($dataMhs)) {
            throw new PageNotFoundException('Data tidak ditemukan.');
        }

        $this->mhsModel->delete($id);
        session()->setFlashdata('pesan', 'Data mahasiswa berhasil dihapus.');
        return redirect()->to('/coba');
    }
}