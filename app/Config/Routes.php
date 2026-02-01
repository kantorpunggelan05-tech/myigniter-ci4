<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Rute Publik
$routes->get('/login', 'Auth::index');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');
$routes->get('/home', 'Home::index');

// 2. Rute Terproteksi (Wajib Login)
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    // Dashboard
    $routes->get('/', 'Dashboard::index');
    $routes->get('/dashboard', 'Dashboard::index');

    // CRUD Mahasiswa (Latihan)
    $routes->get('/coba', 'Latihan::index');
    $routes->get('/mahasiswa', 'Latihan::index');
    $routes->get('/tambah', 'Latihan::tambah');
    $routes->post('/simpan', 'Latihan::simpan');
    $routes->get('/edit/(:num)', 'Latihan::edit/$1');
    $routes->post('/update/(:num)', 'Latihan::update/$1');
    $routes->get('/hapus/(:num)', 'Latihan::hapus/$1');

    // --- CRUD DOSEN (TAHAP 6) ---
    $routes->get('/dosen', 'Dosen::index');
    $routes->get('/dosen/tambah', 'Dosen::tambah');
    $routes->post('/dosen/simpan', 'Dosen::simpan');
    $routes->get('/dosen/edit/(:num)', 'Dosen::edit/$1');
    $routes->post('/dosen/update/(:num)', 'Dosen::update/$1');
    $routes->get('/dosen/hapus/(:num)', 'Dosen::hapus/$1');

    // --- MANAJEMEN USERS (MANUAL) ---
    $routes->get('/users', 'Users::index');
    $routes->get('/users/tambah', 'Users::tambah');
    $routes->post('/users/simpan', 'Users::simpan');
    $routes->get('/users/edit/(:num)', 'Users::edit/$1');
    $routes->post('/users/update/(:num)', 'Users::update/$1');
    $routes->get('/users/hapus/(:num)', 'Users::hapus/$1');

    // Pengaturan
    $routes->get('/pengaturan', 'Pengaturan::index');
    $routes->get('/profil', 'Pengaturan::index');
    $routes->post('/pengaturan/updateProfil', 'Pengaturan::updateProfil');
    $routes->post('/pengaturan/updatePassword', 'Pengaturan::updatePassword');
});