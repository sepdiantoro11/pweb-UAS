<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Laundry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-8">

            <div class="text-center mb-4">
                <h2 class="hero-title fw-bold text-primary mb-4" style="font-size: 36px;">Selamat Datang Di</h2>
                <img src="<?= base_url('assets/images/logo1.png'); ?>" width="220" alt="Deluxe Laundry Logo" class="mb-2">
            </div>

            <div class="hero-card text-center p-5">

                <h1 class="text-primary fw-bold mb-3" style="font-size: 32px;">Deluxe Laundry</h1>

                <p class="hero-tagline fs-5 mb-3">
                    Laundry beres, hidup no stres.
                </p>

                <p class="hero-desc text-muted mb-4">
                    Pantau status cucianmu kapan aja, tanpa perlu datang ke toko.
                </p>

                <div class="row">
                    <div class="col-sm-10 offset-sm-1 d-flex gap-3">
                        <a href="<?= site_url('login'); ?>" class="btn btn-primary py-3 flex-grow-1 text-center d-flex align-items-center justify-content-center">
                            Login Admin
                        </a>
                        <a href="<?= site_url('tracking'); ?>" class="btn btn-info py-3 flex-grow-1 text-white text-center d-flex align-items-center justify-content-center" style="background-color: #4cc7e4; border: none;">
                            Cek Status Laundry
                        </a>
                    </div>
                </div>

            </div> </div> </div> </div> </body>
</html>