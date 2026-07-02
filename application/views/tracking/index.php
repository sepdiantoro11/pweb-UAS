<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracking Laundry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-8"> 
            
            <div class="text-center mb-4">
                <h2 class="hero-title fw-bold text-primary mb-4" style="font-size: 36px;">Cek Status Laundry</h2>
                <img src="<?= base_url('assets/images/logo1.png'); ?>" width="220" alt="Logo Tracking Laundry" class="mb-2">
            </div>

            <div class="tracking-card text-center p-5" style="background: #ffffff; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <form>
                    
                    <div class="row mb-4 align-items-center">
                        <label class="col-sm-3 form-label text-primary fw-bold mb-0 text-sm-end">
                            Nomor Resi:
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" placeholder="Nomor Resi atau Nomor HP">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-9 offset-sm-3 d-flex gap-3">
                            <button type="submit" class="btn btn-primary py-3 flex-grow-1 fw-bold">Cari Status</button>
                            <a href="<?= site_url(); ?>" class="btn btn-info py-3 flex-grow-1 text-white text-center d-flex align-items-center justify-content-center fw-bold" style="background-color: #4cc7e4; border: none;">
                                Kembali
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9 offset-sm-3 text-start">
                            <p class="text-muted small mb-0">
                                * Status laundry diperbarui oleh admin secara berkala.
                            </p>
                        </div>
                    </div>

                </form>
            </div> </div> </div> </div> </body>
</html>