<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/cek_session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Warung ABC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Gradien bergerak sama persis */
            background: linear-gradient(-45deg, #6a11cb, #2575fc, #4facfe, #00f2fe);
            background-size: 400% 400%;
            animation: gradientMove 12s ease infinite;
            padding: 20px;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .dashboard-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            padding: 35px 40px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 40px; /* Jarak antara bagian kiri dan kanan */
        }

        .bagian-kiri {
            flex: 1;
        }

        .bagian-kanan {
            flex: 1;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .role-info {
            opacity: 0.9;
            font-size: 15px;
            margin-bottom: 0;
        }

        ul {
            list-style: none;
            margin-bottom: 25px;
        }

        li {
            margin: 10px 0;
        }

        a {
            display: block;
            padding: 12px 18px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        a:hover {
            background: rgba(255, 255, 255, 0.35);
            transform: translateX(5px);
        }

        .logout-link {
            text-align: center;
            padding: 10px;
            background: rgba(255, 80, 80, 0.2);
            border-radius: 12px;
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .logout-link:hover {
            background: rgba(255, 80, 80, 0.35);
        }

        /* Responsif: jika layar kecil, kembali ke susun bawah */
        @media (max-width: 650px) {
            .dashboard-box {
                flex-direction: column;
                text-align: center;
                gap: 25px;
            }
            a:hover {
                transform: translateY(-2px);
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-box">
        <!-- Bagian Kiri: Sambutan -->
        <div class="bagian-kiri">
            <h1>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?></h1>
            <p class="role-info">Anda login sebagai: <?php echo $_SESSION['role']; ?></p>
        </div>

        <!-- Bagian Kanan: Menu -->
        <div class="bagian-kanan">
            <ul>
                <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'gudang') : ?>
                <li><a href="data_barang.php">📦 Data Barang</a></li>
                <?php endif; ?>

                <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'kasir') : ?>
                <li><a href="transaksi_kasir.php">🛒 Transaksi Kasir</a></li>
                <li><a href="riwayat_transaksi.php">📋 Riwayat Transaksi</a></li>
                <?php endif; ?>
            </ul>

            <a href="logout.php" class="logout-link">🚪 Keluar / Logout</a>
        </div>
    </div>
</body>
</html>