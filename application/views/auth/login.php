<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang Di Deluxe Laundry</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(180deg, #ffffff 0%, #ffffff 35%, #2bfdd6 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }

        .login-container {
            width: 100%;
            max-width: 780px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header-section {
            text-align: center;
            margin-bottom: 25px;
        }

        .header-section h1 {
            color: #3873e0;
            font-weight: 600;
            font-size: 2rem;
            margin-bottom: 15px;
            letter-spacing: 0.5px;
        }

        .logo-img {
            width: 230px; /* Dimensi logo disesuaikan agar proporsional */
            height: auto;
            object-fit: contain;
        }

        /* Card Form Elemen Utama */
        .login-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); /* Shadow halus di sekeliling card */
            border: 1px solid #e2e8f0;
            width: 100%;
            padding: 45px 50px;
        }

        /* Form Layout: Penyelarasan Label dan Input Box */
        .form-group-custom {
            margin-bottom: 22px;
            display: flex;
            align-items: center;
        }

        .label-custom {
            font-weight: 600;
            color: #3b71ca; /* Warna biru untuk teks 'Nama:', 'Email:', 'Password:' */
            font-size: 1.1rem;
            width: 130px; /* Lebar statis label agar input field di kanannya sejajar lurus */
            flex-shrink: 0;
        }

        .input-custom {
            border: 1px solid #b4b4b4;
            border-radius: 6px;
            padding: 10px 15px;
            font-size: 1rem;
            color: #333333;
            width: 100%;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .input-custom:focus {
            border-color: #3b71ca;
            box-shadow: 0 0 0 0.2rem rgba(59, 113, 202, 0.25);
            outline: 0;
        }

        /* Wrapper Alert */
        .alert-container {
            width: 100%;
            margin-bottom: 15px;
        }

        /* Container Dua Tombol Sejajar */
        .button-group-custom {
            display: flex;
            justify-content: center;
            gap: 25px; /* Jarak antar tombol sesuai gambar */
            margin-top: 35px;
            padding-left: 20px; /* Offset sedikit agar seimbang dengan posisi form */
        }

        /* Tombol Dasar */
        .btn-custom {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 10px 0;
            width: 180px; /* Ukuran kedua tombol seragam */
            border-radius: 8px;
            border: none;
            color: #ffffff;
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        /* Tombol Sebelah Kiri: Daftar (Biru Royal) */
        .btn-daftar {
            background-color: #3b71ca;
        }

        .btn-daftar:hover {
            background-color: #2a559e;
            transform: translateY(-1px);
        }

        /* Tombol Sebelah Kanan: Masuk (Cyan Segar) */
        .btn-masuk {
            background-color: #4ec2e0;
        }

        .btn-masuk:hover {
            background-color: #34a3c0;
            transform: translateY(-1px);
        }

        /* Validasi Error Teks Kecil di Bawah Input */
        .error-text {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 4px;
            padding-left: 130px; /* Menyesuaikan agar sejajar dengan kolom input kotak */
            width: 100%;
        }

        /* Penanganan Responsif Mobile Viewport */
        @media (max-width: 576px) {
            body {
                background: linear-gradient(180deg, #ffffff 0%, #2bfdd6 100%);
            }
            .login-card {
                padding: 25px 20px;
            }
            .form-group-custom {
                flex-direction: column;
                align-items: flex-start;
            }
            .label-custom {
                width: 100%;
                margin-bottom: 5px;
            }
            .button-group-custom {
                flex-direction: column;
                gap: 15px;
                padding-left: 0;
                align-items: center;
            }
            .btn-custom {
                width: 100%;
            }
            .error-text {
                padding-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        
        <div class="header-section">
            <h1>Selamat Datang Di</h1>
            <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo Deluxe Laundry" class="logo-img">
        </div>

        <?php if($this->session->flashdata('message')): ?>
            <div class="alert-container">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>

        <div class="login-card">
            <?php echo form_open('auth'); ?>

                <div class="form-group-custom">
                    <label class="label-custom" for="nama">Nama:</label>
                    <input type="text" class="input-custom" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" autocomplete="off">
                </div>
                <?php if(form_error('nama')): ?>
                    <div class="error-text" style="margin-top: -15px; margin-bottom: 15px;">
                        <?php echo form_error('nama', '', ''); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group-custom">
                    <label class="label-custom" for="email">Email:</label>
                    <input type="text" class="input-custom" id="email" name="email" value="<?php echo set_value('email'); ?>" autocomplete="off">
                </div>
                <?php if(form_error('email')): ?>
                    <div class="error-text" style="margin-top: -15px; margin-bottom: 15px;">
                        <?php echo form_error('email', '', ''); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group-custom">
                    <label class="label-custom" for="password">Password:</label>
                    <input type="password" class="input-custom" id="password" name="password">
                </div>
                <?php if(form_error('password')): ?>
                    <div class="error-text" style="margin-top: -15px; margin-bottom: 15px;">
                        <?php echo form_error('password', '', ''); ?>
                    </div>
                <?php endif; ?>

                <div class="button-group-custom">
                    <button type="submit" name="action" value="daftar" class="btn-custom btn-daftar">
                        Daftar
                    </button>
                    
                    <button type="submit" name="action" value="masuk" class="btn-custom btn-masuk">
                        Masuk
                    </button>
                </div>

            <?php echo form_close(); ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>