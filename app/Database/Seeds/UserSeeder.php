<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'name'     => 'Administrator Utama',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Menggunakan Query Builder
        $this->db->table('users')->insert($data);
    }
}