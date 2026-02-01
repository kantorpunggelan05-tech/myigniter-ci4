<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $model->where('username', $username)->first();
        
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            
            if ($verify_pass) {
                $ses_data = [
                    'id'        => $data['id'],
                    'username'  => $data['username'],
                    'name'      => $data['name'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}