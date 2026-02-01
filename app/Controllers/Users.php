<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    // 1. READ - Tampilkan List User
    public function index()
    {
        $data = [
            'title'      => 'Manajemen User',
            'subtitle'   => 'Daftar Administrator',
            'data_user'  => $this->userModel->orderBy('id', 'DESC')->findAll(),
            'segment'    => 'users' // Untuk Sidebar
        ];

        return view('users/index', $data);
    }

    // 2. CREATE - Form Tambah
    public function tambah()
    {
        $data = [
            'title'      => 'Tambah User',
            'subtitle'   => 'Admin Baru',
            'segment'    => 'users',
            'validation' => \Config\Services::validation()
        ];
        return view('users/tambah', $data);
    }

    // Proses Simpan User Baru
    public function simpan()
    {
        // Validasi
        if (!$this->validate([
            'name'     => 'required|min_length[3]',
            'username' => 'required|min_length[4]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'conf_password' => 'required|matches[password]'
        ])) {
            return redirect()->to('/users/tambah')->withInput();
        }

        $this->userModel->save([
            'name'     => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT), // Hash Password
        ]);

        session()->setFlashdata('success', 'User baru berhasil ditambahkan.');
        return redirect()->to('/users');
    }

    // 3. UPDATE - Form Edit
    public function edit($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            throw new PageNotFoundException('User tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit User',
            'subtitle'   => 'Update Data',
            'segment'    => 'users',
            'user'       => $user,
            'validation' => \Config\Services::validation()
        ];
        return view('users/edit', $data);
    }

    // Proses Update
    public function update($id)
    {
        $userLama = $this->userModel->find($id);
        
        // Aturan Username (Cek unique jika berubah)
        $ruleUsername = ($userLama['username'] == $this->request->getVar('username')) 
            ? 'required|min_length[4]' 
            : 'required|min_length[4]|is_unique[users.username]';

        // Validasi dasar
        $rules = [
            'name'     => 'required|min_length[3]',
            'username' => $ruleUsername,
        ];

        // Jika password diisi, validasi password
        if($this->request->getVar('password')) {
            $rules['password']      = 'min_length[6]';
            $rules['conf_password'] = 'matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/users/edit/' . $id)->withInput();
        }

        // Data yang akan diupdate
        $dataUpdate = [
            'name'     => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
        ];

        // Hanya update password jika input tidak kosong
        if($this->request->getVar('password')) {
            $dataUpdate['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $dataUpdate);

        session()->setFlashdata('success', 'Data user berhasil diperbarui.');
        return redirect()->to('/users');
    }

    // 4. DELETE
    public function hapus($id)
    {
        // Cegah menghapus diri sendiri
        if(session()->get('id') == $id) {
            session()->setFlashdata('error', 'Anda tidak dapat menghapus akun yang sedang login.');
            return redirect()->to('/users');
        }

        $this->userModel->delete($id);
        session()->setFlashdata('success', 'User berhasil dihapus.');
        return redirect()->to('/users');
    }
}