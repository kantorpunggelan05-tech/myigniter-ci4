<?php

use CodeIgniter\Router\RouteCollection;

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/**
 * --------------------------------------------------------------------
 * RUTE LATIHAN CRUD MAHASISWA (Tahap 4 - Tahap 9)
 * --------------------------------------------------------------------
 */

// 1. READ (Tahap 4 & 6)
// Menampilkan halaman utama tabel mahasiswa
$routes->get('/coba', 'Latihan::index');

// 2. CREATE (Tahap 7)
// Menampilkan form tambah data
$routes->get('/tambah', 'Latihan::tambah');
// Memproses penyimpanan data (menggunakan POST karena mengirim data rahasia/form)
$routes->post('/simpan', 'Latihan::simpan');

// 3. UPDATE (Tahap 8)
// Menampilkan form edit berdasarkan ID (:num artinya hanya menerima angka)
// $1 artinya mengambil parameter pertama (angka ID tersebut) dan mengirimnya ke Controller
$routes->get('/edit/(:num)', 'Latihan::edit/$1');
// Memproses update data berdasarkan ID
$routes->post('/update/(:num)', 'Latihan::update/$1');

// 4. DELETE (Tahap 9)
// Menghapus data berdasarkan ID
$routes->get('/hapus/(:num)', 'Latihan::hapus/$1');

// --- Rute Tambahan (Sisa Tahap 4 Awal) ---
// Ini opsional, rute tes sederhana
$routes->get('/profil', 'Latihan::biodata');