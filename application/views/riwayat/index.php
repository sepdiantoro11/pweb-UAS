<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Laundry - Riwayat Transaksi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #ffffff;
            overflow-x: hidden;
        }

        .sidebar {
            width: 280px;
            background-color: #002d72;
            min-height: 100vh;
            padding: 30px 0;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .sidebar-brand {
            text-align: center;
            padding-bottom: 40px;
        }

        .sidebar-brand img {
            width: 200px;
            height: auto;
            object-fit: contain;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .sidebar-item {
            width: 100%;
            margin-bottom: 10px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: #ffffff;
            text-decoration: none;
            font-size: 1.05rem;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        .sidebar-link i {
            font-size: 1.5rem;
            margin-right: 20px;
        }

        .sidebar-item.active .sidebar-link {
            background-color: rgba(255, 255, 255, 0.12);
            border-left: 5px solid #ffffff;
            padding-left: 20px;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
            color: #ffffff;
        }

        .main-content {
            flex-grow: 1;
            background: linear-gradient(135deg, #ffffff 60%, #46fde1 100%);
            padding: 30px 40px;
        }

        .content-header {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .btn-logout {
            background-color: #4ec2e0;
            color: #fff;
            padding: 8px 30px;
            border-radius: 8px;
            text-decoration: none;
        }

        .page-title {
            text-align: center;
            color: #3873e0;
            font-weight: 600;
            font-size: 1.85rem;
            margin-bottom: 25px;
        }

        .table-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 16px 48px rgba(0,0,0,0.18), 0 4px 16px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: #002d72;
            color: #fff;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-empty {
            text-align: center;
            padding: 40px;
            color: #888;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <img src="<?php echo base_url('assets/images/logo1.png'); ?>">
    </div>

    <ul class="sidebar-menu">
        <li class="sidebar-item">
            <a href="<?php echo site_url('pelanggan'); ?>" class="sidebar-link">
                <i class="bi bi-person-circle"></i> Pelanggan
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo site_url('daftarcucian'); ?>" class="sidebar-link">
                <i class="bi bi-mailbox"></i> Daftar Cucian
            </a>
        </li>
        <li class="sidebar-item active">
            <a href="<?php echo site_url('riwayat'); ?>" class="sidebar-link">
                <i class="bi bi-clock-history"></i> Riwayat
            </a>
        </li>
    </ul>
</div>

<div class="main-content">

    <div class="content-header">
        <a href="<?php echo site_url('auth/logout'); ?>" class="btn-logout">Logout</a>
    </div>

    <h2 class="page-title">Riwayat Transaksi Laundry</h2>

    <div class="table-card">

        <div class="card-header">
            <div>
                <i class="bi bi-clock-history me-2"></i>Data Riwayat Transaksi
            </div>

            <form action="<?php echo site_url('riwayat'); ?>" method="GET" class="d-flex" style="gap:8px;">
                <input type="text"
                    name="search"
                    class="form-control form-control-sm"
                    style="width:200px; border-radius:6px;"
                    placeholder="Cari riwayat..."
                    value="<?php echo isset($search) ? $search : ''; ?>">

                <button class="btn btn-sm btn-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>

                <?php if(!empty($search)): ?>
                    <a href="<?php echo site_url('riwayat'); ?>" class="btn btn-sm btn-light">
                        <i class="bi bi-x-circle"></i>
                    </a>
                <?php endif; ?>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID Riwayat</th>
                    <th>ID Cucian</th>
                    <th>No Resi</th>
                    <th>Nomor HP</th>
                    <th>Nama</th>
                    <th>Paket</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                <?php if(!empty($riwayat)): ?>
                    <?php foreach($riwayat as $r): ?>
                        <tr>
                            <td><?= $r['id_riwayat'] ?></td>
                            <td><?= $r['id_cucian'] ?></td>
                            <td><?= $r['no_resi'] ?></td>
                            <td><?= $r['nomor_wa_arsip'] ?></td>
                            <td><?= $r['nama_pelanggan_arsip'] ?></td>
                            <td><?= $r['nama_paket_arsip'] ?></td>
                            <td>Rp <?= number_format($r['total_biaya_final']) ?></td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td><?= date('d-m-Y', strtotime($r['tgl_diambil'])) ?></td>
                            <td>
                                <a href="<?= site_url('riwayat/hapus/'.$r['id_riwayat']) ?>" class="btn btn-danger btn-sm btn-hapus">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10">
                            <div class="table-empty">Belum ada data riwayat</div>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.btn-hapus').forEach(btn=>{
    btn.addEventListener('click', function(e){
        e.preventDefault();
        const href = this.href;

        Swal.fire({
            title: 'Hapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus'
        }).then((res)=>{
            if(res.isConfirmed){
                window.location = href;
            }
        });
    });
});
</script>

</body>
</html>