<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracking Laundry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        /* Menggunakan Flexbox untuk membuat konten otomatis di tengah layar */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    h2{
        color:#3873e0;
    }

    .tracking-card{
        background:#fff;
        border-radius:24px;
        box-shadow:0 16px 48px rgba(0,0,0,.18), 0 4px 16px rgba(0,0,0,.1);
        border:none;
    }

    .form-control{
        border-radius:8px;
        padding:12px 15px;
        height:52px;
        border:1px solid #dbe7f5;
    }

    .form-control:focus{
        border-color:#3873e0;
        box-shadow:0 0 0 .2rem rgba(56,115,224,.25);
    }

    .btn-primary,
    .btn-back{
        height:52px;
        display:flex;
        align-items:center;
        justify-content:center;
        border-radius:8px;
        font-weight:600;
    }

    .btn-primary{
        background:#3873e0;
        border:none;
    }

    .btn-primary:hover{
        background:#2e62c4;
    }

    .btn-back{
        background:#4ec2e0;
        color:#fff;
        border:none;
    }

    .btn-back:hover{
        background:#3aaecb;
        color:#fff;
    }

    .badge-status{
        background:linear-gradient(135deg,#3873e0,#4ec2e0);
        font-size:14px;
        padding:8px 18px;
        letter-spacing:.3px;
    }

    .table th{
        color:#3873e0;
        width:35%;
    }

    .table td{
        color:#333;
    }

    .logo{
        width:220px;
    }

    .result-card{
        background:linear-gradient(135deg,#eaf6ff 0%,#e4fffb 60%,#d7fbf3 100%);
        border:1px solid #bfe4f5;
        border-left:5px solid #3873e0;
        border-radius:14px;
        box-shadow:0 10px 30px rgba(0,0,0,.12), 0 4px 12px rgba(0,0,0,.08);
    }

    .result-card h4{
        color:#3873e0;
    }

    .result-card table tr:not(:last-child) th,
    .result-card table tr:not(:last-child) td{
        border-bottom:1px solid rgba(56,115,224,.15);
    }

    .result-card th{
        color:#2e62c4;
    }

    .result-card td{
        color:#1f2937;
        font-weight:500;
    }

    </style>

</head>

<body>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-center mb-4">
                <h2 class="fw-bold mb-3">
                    Cek Status Laundry
                </h2>

                <img src="<?= base_url('assets/images/logo1.png'); ?>" class="logo" alt="Logo">
            </div>

            <div class="tracking-card p-5 rounded-4">

                <form method="post">
                    <div class="row mb-4 align-items-center">
                        <label class="col-md-3 fw-bold text-primary">
                            Nomor Resi
                        </label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                name="keyword"
                                class="form-control form-control-lg"
                                placeholder="Masukkan Nomor Resi atau Nomor HP"
                                value="<?= set_value('keyword'); ?>"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="offset-md-3 col-md-9 d-flex gap-2">
                            <button type="submit" class="btn btn-primary flex-fill">
                                Cari Status
                            </button>

                            <a href="<?= site_url(); ?>" class="btn btn-back flex-fill">
                                Kembali
                            </a>
                        </div>
                    </div>
                </form>

                <?php if($cari && !empty($hasil)): ?>

                    <hr class="my-4">

                    <div class="card border-0 result-card">
                        <div class="card-body p-4">
                            <h4 class="text-primary mb-3 text-start">
                                Status Laundry
                            </h4>

                            <table class="table table-borderless text-start">
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $hasil['nama_pelanggan']; ?></td>
                                </tr>
                                <tr>
                                    <th>No Resi</th>
                                    <td><?= $hasil['no_resi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Paket</th>
                                    <td><?= $hasil['nama_paket']; ?></td>
                                </tr>
                                <tr>
                                    <th>Berat</th>
                                    <td><?= (floor($hasil['berat_laundry']) == $hasil['berat_laundry']) ? number_format($hasil['berat_laundry'], 0, ',', '.') : number_format($hasil['berat_laundry'], 2, ',', '.'); ?> Kg</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>Rp <?= number_format($hasil['total_biaya'],0,',','.'); ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="badge badge-status">
                                            <?= $hasil['status_cucian']; ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                <?php endif; ?>

                <p class="text-muted mt-4 mb-0 text-center" style="font-size: 0.875rem;">
                    * Status laundry diperbarui oleh admin secara berkala.
                </p>

            </div>
        </div>
    </div>
</div>

<?php if($cari): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    <?php if(!empty($hasil)): ?>
        Swal.fire({
            icon: 'success',
            title: 'Resi Ditemukan!',
            text: 'Status laundry berhasil ditemukan.',
            confirmButtonColor: '#3873e0'
        });
    <?php else: ?>
        Swal.fire({
            icon: 'error',
            title: 'Data Tidak Ditemukan',
            text: 'Nomor resi atau nomor HP tidak ditemukan.',
            confirmButtonColor: '#dc3545'
        });
    <?php endif; ?>
});
</script>
<?php endif; ?>

</body>
</html>