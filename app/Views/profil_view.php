<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    
    <!-- 1. Google Fonts (Poppins) - Agar font terlihat modern -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- 2. Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- 3. Bootstrap Icons (Untuk Ikon Edit/Hapus/Tambah) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5; /* Latar belakang abu-abu muda ala Facebook/AdminLTE */
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
        }
        .card {
            border: none;
            border-radius: 12px; /* Sudut melengkung halus */
            box-shadow: 0 4px 6px rgba(0,0,0,.05);
            transition: transform 0.2s;
        }
        .btn-add {
            background: linear-gradient(45deg, #0d6efd, #0a58ca);
            border: none;
            box-shadow: 0 4px 6px rgba(13, 110, 253, 0.3);
        }
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(13, 110, 253, 0.4);
        }
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            color: #6c757d;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        .avatar-initial {
            width: 35px;
            height: 35px;
            background-color: #e9ecef;
            color: #495057;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
            margin-right: 10px;
        }
        .action-btn {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR SEDERHANA -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="bi bi-code-slash me-2"></i>App Kampus
            </a>
            <span class="navbar-text text-muted small">
                CodeIgniter 4 Project
            </span>
        </div>
    </nav>

    <!-- CONTENT UTAMA -->
    <div class="container">
        
        <!-- HEADER SECTION -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0">Data Mahasiswa</h2>
                <p class="text-muted mb-0">Kelola data mahasiswa anda di sini.</p>
            </div>
            <a href="/tambah" class="btn btn-primary btn-add px-4 py-2 rounded-pill">
                <i class="bi bi-plus-lg me-2"></i>Tambah Data
            </a>
        </div>

        <!-- NOTIFIKASI (FLASHDATA) -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- CARD TABEL -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4" width="5%">ID</th>
                                <th width="40%">Mahasiswa</th>
                                <th width="30%">NIM</th>
                                <th class="text-center" width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($para_mahasiswa)) : ?>
                                <!-- TAMPILAN JIKA DATA KOSONG -->
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-folder2-open display-1"></i>
                                            <p class="mt-3 mb-0 fw-bold">Belum ada data mahasiswa.</p>
                                            <small>Silakan klik tombol tambah untuk memulai.</small>
                                        </div>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <!-- LOOPING DATA -->
                                <?php foreach ($para_mahasiswa as $mhs) : ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">#<?= $mhs['id']; ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!-- Inisial Nama (Avatar Sederhana) -->
                                            <div class="avatar-initial">
                                                <?= strtoupper(substr($mhs['nama'], 0, 1)); ?>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark"><?= $mhs['nama']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            <i class="bi bi-card-heading me-1"></i> <?= $mhs['nim']; ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Tombol Edit -->
                                        <a href="/edit/<?= $mhs['id']; ?>" 
                                           class="btn btn-warning text-white action-btn me-1" 
                                           data-bs-toggle="tooltip" 
                                           title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <a href="/hapus/<?= $mhs['id']; ?>" 
                                           class="btn btn-danger action-btn" 
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data <?= $mhs['nama']; ?>?');"
                                           data-bs-toggle="tooltip" 
                                           title="Hapus Data">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- CARD FOOTER -->
            <div class="card-footer bg-white border-0 py-3 text-center text-muted small">
                Menampilkan seluruh data mahasiswa aktif
            </div>
        </div>

    </div>

    <!-- JS Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script untuk mengaktifkan Tooltip (Pop up kecil saat hover tombol) -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>