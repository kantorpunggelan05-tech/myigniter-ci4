<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Pengaturan extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        // Ambil ID user dari session
        $userId = session()->get('id');
        
        // Ambil data terbaru dari database (jika ada perubahan, agar selalu fresh)
        $userData = $this->userModel->find($userId);

        $data = [
            'title'    => 'Pengaturan Akun',
            'subtitle' => 'Update Profil & Keamanan',
            'segment'  => 'pengaturan',
            'user'     => $userData,
            'validation' => \Config\Services::validation()
        ];

        return view('pengaturan_view', $data);
    }

    public function updateProfil()
    {
        $userId = session()->get('id');

        // Validasi Input
        $rules = [
            'name'     => 'required|min_length[3]',
            'username' => "required|min_length[3]|is_unique[users.username,id,{$userId}]" // Cek unique kecuali punya sendiri
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/pengaturan')->withInput()->with('activeTab', 'profil');
        }

        // Proses Update Data Diri
        $this->userModel->update($userId, [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username')
        ]);

        // Update Session agar nama di Header/Sidebar berubah real-time
        session()->set([
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username')
        ]);

        session()->setFlashdata('success', 'Profil berhasil diperbarui.');
        return redirect()->to('/pengaturan');
    }

    public function updatePassword()
    {
        $userId = session()->get('id');
        $user   = $this->userModel->find($userId);

        // Validasi Input
        $rules = [
            'password_lama'     => 'required',
            'password_baru'     => 'required|min_length[6]',
            'konfirmasi_password'=> 'required|matches[password_baru]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/pengaturan')->withInput()->with('activeTab', 'password');
        }

        // 1. Cek Password Lama
        $passwordLamaInput = $this->request->getPost('password_lama');
        if (!password_verify($passwordLamaInput, $user['password'])) {
            return redirect()->to('/pengaturan')->withInput()->with('error_pass', 'Password lama tidak sesuai.')->with('activeTab', 'password');
        }

        // 2. Update Password Baru
        $this->userModel->update($userId, [
            'password' => password_hash($this->request->getPost('password_baru'), PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('success', 'Password berhasil diubah. Silakan login ulang nanti.');
        return redirect()->to('/pengaturan');
    }
}