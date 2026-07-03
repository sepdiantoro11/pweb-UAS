<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Laundry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<<<<<<< HEAD
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family:'Poppins',sans-serif;
        background:linear-gradient(180deg,#ffffff 0%,#ffffff 35%,#c9fdf3 75%,#46fde1 100%);
        min-height:100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    h2{
        color:#3873e0;
    }

    .hero-card{
        background:#fff;
        border-radius:24px;
        box-shadow:0 10px 35px rgba(56,115,224,.10);
        border:none;
    }

    .hero-tagline {
        color: #3873e0;
        font-weight: 600;
    }

    .btn-primary,
    .btn-info {
        height:52px;
        display:flex;
        align-items:center;
        justify-content:center;
        border-radius:8px;
        font-weight:600;
        border: none;
    }

    .btn-primary{
        background:#3873e0;
    }

    .btn-primary:hover{
        background:#2e62c4;
    }

    .btn-info{
        background:#4ec2e0;
        color:#fff !important;
    }

    .btn-info:hover{
        background:#3aaecb;
    }

    .logo{
        width:220px; 
        height: auto;
    }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-center mb-4">
                <h2 class="fw-bold mb-3">
                    Selamat Datang Di
                </h2>
                <img src="<?= base_url('assets/images/logo1.png'); ?>" class="logo" alt="Deluxe Laundry Logo">
            </div>

            <div class="hero-card p-5 text-center">
=======
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
>>>>>>> 1a678dd8bf37ac519780b69f9099dca1443eee6b

                <h1 class="text-primary fw-bold mb-3" style="font-size: 32px;">Deluxe Laundry</h1>

                <p class="hero-tagline fs-5 mb-3">
                    Laundry beres, hidup no stres.
                </p>

                <p class="hero-desc text-muted mb-4">
                    Pantau status cucianmu kapan aja, tanpa perlu datang ke toko.
                </p>

                <div class="row">
                    <div class="col-sm-10 offset-sm-1 d-flex gap-3">
<<<<<<< HEAD
                        <a href="<?= site_url('login'); ?>" class="btn btn-primary flex-fill">
                            Login Admin
                        </a>
                        <a href="<?= site_url('tracking'); ?>" class="btn btn-info flex-fill">
=======
                        <a href="<?= site_url('login'); ?>" class="btn btn-primary py-3 flex-grow-1 text-center d-flex align-items-center justify-content-center">
                            Login Admin
                        </a>
                        <a href="<?= site_url('tracking'); ?>" class="btn btn-info py-3 flex-grow-1 text-white text-center d-flex align-items-center justify-content-center" style="background-color: #4cc7e4; border: none;">
>>>>>>> 1a678dd8bf37ac519780b69f9099dca1443eee6b
                            Cek Status Laundry
                        </a>
                    </div>
                </div>

<<<<<<< HEAD
            </div> 
        </div> 
    </div> 
</div> 

</body>
=======
            </div> </div> </div> </div> </body>
>>>>>>> 1a678dd8bf37ac519780b69f9099dca1443eee6b
</html>