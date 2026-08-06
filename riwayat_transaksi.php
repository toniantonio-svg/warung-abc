<?php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT t.no_transaksi, t.tanggal, t.total_bayar, u.nama_lengkap as nama_kasir
        FROM tbl_transaksi t
        JOIN tbl_user u ON t.id_kasir = u.id_user
        ORDER BY t.tanggal DESC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Transaksi - Warung ABC</title>
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
            align-items: flex-start;
            background: linear-gradient(-45deg, #6a11cb, #2575fc, #4facfe, #00f2fe);
            background-size: 400% 400%;
            animation: gradientMove 12s ease infinite;
            padding: 30px 15px;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            padding: 35px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            color: #ffffff;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            margin-bottom: 25px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        th {
            background: rgba(255, 255, 255, 0.2);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover td {
            background: rgba(255, 255, 255, 0.08);
        }

        .kembali-link {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .kembali-link:hover {
            color: #e0e0ff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Transaksi</h1>

        <table>
            <tr>
                <th>No. Transaksi</th>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>Total Bayar</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($hasil)) : ?>
            <tr>
                <td><?php echo $row['no_transaksi']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['nama_kasir']; ?></td>
                <td>Rp <?php echo number_format($row['total_bayar'], 0, ',', '.'); ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <a href="dashboard.php" class="kembali-link">⬅ Kembali ke Dashboard</a>
    </div>
</body>
</html>