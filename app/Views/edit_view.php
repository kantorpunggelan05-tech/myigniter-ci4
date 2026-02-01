<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f0f2f5; color: #495057; }
        .main-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .card-form { border: none; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); width: 100%; max-width: 550px; overflow: hidden; }
        .card-header-custom { background: linear-gradient(135deg, #ffc107, #fd7e14); color: white; padding: 30px 30px 20px; border-bottom: none; }
        .card-header-custom h4, .card-header-custom p, .card-header-custom i { color: white; text-shadow: 0 1px 2px rgba(0,0,0,0.1); }
        .form-label { font-weight: 500; font-size: 0.9rem; margin-bottom: 8px; color: #343a40; }
        .input-group-text { background-color: #f8f9fa; border-right: none; color: #6c757d; }
        .form-control { border-left: none; background-color: #f8f9fa; padding: 12px; font-size: 0.95rem; }
        .form-control:focus { background-color: #fff; box-shadow: none; border-color: #ffc107; }
        .input-group:focus-within { box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); border-radius: 0.375rem; }
        .input-group:focus-within .form-control, .input-group:focus-within .input-group-text { border-color: #ffc107; background-color: #fff; }
        .btn-submit { background-color: #fd7e14; border-color: #fd7e14; color: white; padding: 12px; font-weight: 600; border-radius: 8px; font-size: 1rem; transition: all 0.3s; }
        .btn-submit:hover { background-color: #e36a0d; border-color: #e36a0d; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(253, 126, 20, 0.3); }
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
                        <h4 class="mb-1 fw-bold">Edit Data</h4>
                        <p class="mb-0 opacity-75 small">Perbarui informasi mahasiswa ini.</p>
                    </div>
                    <i class="bi bi-pencil-square display-6 opacity-50"></i>
                </div>
            </div>

            <div class="card-body p-4 p-md-5">

                <!-- PERBAIKAN LOGIKA ERROR DISINI -->
                <?php if (validation_list_errors()) : ?>
                    <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"></i>
                        <div>
                            <strong>Gagal Mengupdate!</strong>
                            <div class="small mt-1">
                                <?= validation_list_errors() ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="/update/<?= $mahasiswa['id']; ?>" method="post" autocomplete="off">
                    <?= csrf_field(); ?>

                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Budi Santoso" value="<?= old('nama', $mahasiswa['nama']); ?>">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="nim" class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-heading"></i></span>
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Contoh: 2024001" value="<?= old('nim', $mahasiswa['nim']); ?>">
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-submit">
                            <i class="bi bi-check-circle-fill me-2"></i> Update Perubahan
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <a href="/coba" class="btn-back">
                            <i class="bi bi-arrow-left me-1"></i> Batal & Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>