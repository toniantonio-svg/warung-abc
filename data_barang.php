<?php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT * FROM tbl_barang ORDER BY nama_barang ASC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang - Warung ABC</title>
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
            max-width: 900px;
            color: #ffffff;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            margin-bottom: 25px; /* Jarak antara tabel dan tombol */
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

        .aksi-edit {
            display: inline-block;
            padding: 6px 12px;
            margin-right: 6px;
            background: rgba(80, 200, 120, 0.3);
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .aksi-edit:hover {
            background: rgba(80, 200, 120, 0.5);
        }

        .aksi-hapus {
            display: inline-block;
            padding: 6px 12px;
            background: rgba(255, 80, 80, 0.3);
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .aksi-hapus:hover {
            background: rgba(255, 80, 80, 0.5);
        }

        .nav-link {
            text-align: left;
        }

        .nav-link a {
            display: inline-block;
            padding: 10px 16px;
            margin-right: 10px;
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link a:hover {
            background: rgba(255, 255, 255, 0.35);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>

        <table>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Stok</th>
                <th>Kadaluarsa</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($hasil)) : ?>
            <tr>
                <td><?php echo $row['kode_barang']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td>Rp <?php echo number_format($row['harga_satuan'], 0, ',', '.'); ?></td>
                <td><?php echo $row['stok']; ?></td>
                <td>
                    <?php 
                    if (isset($row['kadaluarsa'])) echo $row['kadaluarsa'];
                    elseif (isset($row['tgl_kadaluarsa'])) echo $row['tgl_kadaluarsa'];
                    elseif (isset($row['tanggal_kadaluarsa'])) echo $row['tanggal_kadaluarsa'];
                    else echo "-";
                    ?>
                </td>
                <td>
                    <a href="edit_barang.php?id=<?php echo $row['id_barang']; ?>" class="aksi-edit">Edit</a>
                    <a href="hapus_barang.php?id=<?php echo $row['id_barang']; ?>" class="aksi-hapus" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <!-- TOMBOL DIPINDAH KE BAWAH SINI -->
        <div class="nav-link">
            <a href="dashboard.php">⬅ Kembali ke Dashboard</a>
            <a href="tambah_barang.php">➕ Tambah Barang</a>
        </div>
    </div>
</body>
</html>