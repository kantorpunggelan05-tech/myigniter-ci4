<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // 1. Inisialisasi Model
        $mhsModel   = new MahasiswaModel();
        $dosenModel = new DosenModel();
        $userModel  = new UserModel();

        // 2. Ambil Jumlah Data Real-time
        $countMhs   = $mhsModel->countAllResults();
        $countDosen = $dosenModel->countAllResults();
        $countUser  = $userModel->countAllResults();

        // 3. Siapkan Data untuk View
        $data = [
            'title'      => 'Dashboard',
            'subtitle'   => 'Statistik & Ringkasan',
            'segment'    => 'dashboard',
            
            // Data Card Statistik
            'jumlah_mhs'   => $countMhs,
            'jumlah_dosen' => $countDosen,
            'jumlah_user'  => $countUser,

            // Data untuk Grafik (Chart.js)
            'chart_label' => ['Mahasiswa', 'Dosen', 'Staff/Admin'],
            'chart_data'  => [$countMhs, $countDosen, $countUser]
        ];

        return view('dashboard_view', $data);
    }
}