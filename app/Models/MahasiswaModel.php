<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class MahasiswaModel
 * * Model ini bertugas untuk mengelola interaksi dengan tabel 'mahasiswa' di database.
 * Menggunakan fitur standar CodeIgniter 4.
 */
class MahasiswaModel extends Model
{
    // -------------------------------------------------------------------------
    // KONFIGURASI TABEL
    // -------------------------------------------------------------------------
    
    /**
     * Nama tabel di database yang digunakan oleh model ini.
     */
    protected $table = 'mahasiswa';

    /**
     * Nama kolom Primary Key (Kunci Utama) tabel.
     * Biasanya 'id'.
     */
    protected $primaryKey = 'id';

    /**
     * Apakah Primary Key menggunakan Auto Increment (AI)?
     * Default true, tapi kita tulis eksplisit agar jelas.
     */
    protected $useAutoIncrement = true;

    /**
     * Tipe data yang dikembalikan saat mengambil data.
     * Kita set 'array' agar konsisten dengan View yang kita buat.
     */
    protected $returnType = 'array';

    // -------------------------------------------------------------------------
    // KEAMANAN (Mass Assignment Protection)
    // -------------------------------------------------------------------------
    
    /**
     * Daftar kolom yang BOLEH diisi atau diubah oleh user melalui form.
     * Kolom selain ini akan diabaikan demi keamanan.
     * * PENTING: Jika Anda menambah kolom baru di DB (misal 'jurusan'), 
     * tambahkan juga di sini.
     */
    protected $allowedFields = [
        'nama', 
        'nim'
    ];

    // -------------------------------------------------------------------------
    // FITUR TAMBAHAN (Opsional - Future Proofing)
    // -------------------------------------------------------------------------
    
    // Jika nanti Anda menambahkan kolom 'created_at' dan 'updated_at' di database,
    // Anda bisa mengubah nilai ini menjadi true agar CI4 mengisinya otomatis.
    // Untuk saat ini kita set false karena tabel kita sederhana.
    protected $useTimestamps = false;
}