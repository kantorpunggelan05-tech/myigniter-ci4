<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f0f2f5; color: #495057; }
        .main-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .card-form { border: none; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); width: 100%; max-width: 550px; overflow: hidden; }
        .card-header-custom { background: linear-gradient(135deg, #0d6efd, #0043a8); color: white; padding: 30px 30px 20px; border-bottom: none; }
        .form-label { font-weight: 500; font-size: 0.9rem; margin-bottom: 8px; color: #343a40; }
        .input-group-text { background-color: #f8f9fa; border-right: none; color: #6c757d; }
        .form-control { border-left: none; background-color: #f8f9fa; padding: 12px; font-size: 0.95rem; }
        .form-control:focus { background-color: #fff; box-shadow: none; border-color: #dee2e6; }
        .input-group:focus-within { box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15); border-radius: 0.375rem; }
        .input-group:focus-within .form-control, .input-group:focus-within .input-group-text { border-color: #86b7fe; background-color: #fff; }
        .btn-submit { padding: 12px; font-weight: 600; border-radius: 8px; font-size: 1rem; transition: all 0.3s; }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3); }
        .btn-back { color: #6c757d; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; transition: color 0.2s; }
        .btn-back:hover { color: #343a40; }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="card card-form bg-white">
            
            <div class="card-header-custom">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="mb-1 fw-bold">Tambah Data</h4>
                        <p class="mb-0 opacity-75 small">Masukkan informasi mahasiswa baru.</p>
                    </div>
                    <i class="bi bi-person-plus-fill display-6 opacity-50"></i>
                </div>
            </div>

            <div class="card-body p-4 p-md-5">

                <!-- PERBAIKAN LOGIKA ERROR DISINI -->
                <!-- Menggunakan validation_list_errors() untuk mengecek error -->
                <?php if (validation_list_errors()) : ?>
                    <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"></i>
                        <div>
                            <strong>Gagal Menyimpan!</strong>
                            <div class="small mt-1">
                                <?= validation_list_errors() ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="/simpan" method="post" autocomplete="off">
                    <?= csrf_field(); ?>

                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Budi Santoso" value="<?= old('nama'); ?>">
                        </div>
                        <div class="form-text text-muted small">Gunakan nama asli sesuai KTM.</div>
                    </div>

                    <div class="mb-5">
                        <label for="nim" class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-heading"></i></span>
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Contoh: 2024001" value="<?= old('nim'); ?>">
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-submit">
                            <i class="bi bi-save2 me-2"></i> Simpan Data
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <a href="/coba" class="btn-back">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>