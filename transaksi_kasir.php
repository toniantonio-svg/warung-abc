<?php
include 'includes/cek_session.php';
include 'config/koneksi.php';

// Ambil data barang untuk pilihan
$sql_barang = "SELECT * FROM tbl_barang ORDER BY nama_barang ASC";
$hasil_barang = mysqli_query($koneksi, $sql_barang);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Kasir - Warung ABC</title>
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
            margin-bottom: 25px;
            text-align: center;
        }

        h3 {
            font-size: 20px;
            font-weight: 600;
            margin: 25px 0 15px 0;
        }

        .form-pilih {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        select, input[type="number"] {
            padding: 10px 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        select:focus, input[type="number"]:focus {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        input[type="submit"] {
            padding: 10px 16px;
            border: none;
            background: rgba(80, 200, 120, 0.3);
            color: #ffffff;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background: rgba(80, 200, 120, 0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 10px;
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

        .btn-simpan {
            background: rgba(80, 200, 120, 0.3);
            margin-bottom: 15px;
        }

        .btn-simpan:hover {
            background: rgba(80, 200, 120, 0.5);
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
        <h1>Transaksi Penjualan</h1>

        <h3>Pilih Barang</h3>
        <form action="proses_tambah_keranjang.php" method="POST" class="form-pilih">
            <select name="id_barang" required>
                <?php while ($item = mysqli_fetch_assoc($hasil_barang)) : ?>
                <option value="<?php echo $item['id_barang']; ?>">
                    <?php echo $item['nama_barang']; ?> (Stok: <?php echo $item['stok']; ?>)
                </option>
                <?php endwhile; ?>
            </select>
            Jumlah:
            <input type="number" name="jumlah" min="1" required>
            <input type="submit" value="Tambah ke Keranjang">
        </form>

        <h3>Keranjang</h3>
        <table>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $total = 0;
            if (isset($_SESSION['keranjang']) && !empty($_SESSION['keranjang'])) :
                foreach ($_SESSION['keranjang'] as $id_barang => $item) :
                    $total += $item['subtotal'];
            ?>
            <tr>
                <td><?php echo $item['nama_barang']; ?></td>
                <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $item['jumlah']; ?></td>
                <td>Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                <td>
                    <a href="hapus_keranjang.php?id=<?php echo $id_barang; ?>" class="aksi-hapus">Hapus</a>
                </td>
            </tr>
            <?php 
                endforeach;
            endif; 
            ?>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td colspan="2"><strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong></td>
            </tr>
        </table>

        <form action="proses_simpan_transaksi.php" method="POST">
            <input type="submit" value="Simpan Transaksi" class="btn-simpan">
        </form>

        <p><a href="dashboard.php" class="kembali-link">⬅ Kembali ke Dashboard</a></p>
    </div>
</body>
</html>