<?php
include 'includes/cek_session.php';
// Jika ada file proses, tambahkan include di sini
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang - Warung ABC</title>
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

        .form-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            padding: 35px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            color: #ffffff;
            /* TANPA BORDER-RADIUS */
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        td {
            padding: 8px 0;
            vertical-align: middle;
        }

        td:first-child {
            width: 140px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
            /* TANPA BORDER-RADIUS */
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input:focus {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        input[type="submit"] {
            padding: 10px 20px;
            background: rgba(80, 200, 120, 0.3);
            border: none;
            color: #ffffff;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            /* TANPA BORDER-RADIUS */
        }

        input[type="submit"]:hover {
            background: rgba(80, 200, 120, 0.5);
        }

        .kembali-link {
            display: inline-block;
            margin-top: 10px;
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
    <div class="form-box">
        <h1>Tambah Barang</h1>
        <form action="proses_tambah_barang.php" method="POST">
            <table>
                <tr>
                    <td>Kode Barang</td>
                    <td><input type="text" name="kode_barang" required></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_barang" required></td>
                </tr>
                <tr>
                    <td>Harga Satuan</td>
                    <td><input type="number" name="harga_satuan" required></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" required></td>
                </tr>
                <tr>
                    <td>Tanggal Kadaluarsa</td>
                    <td><input type="date" name="kadaluarsa" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <a href="data_barang.php" class="kembali-link">⬅ Kembali</a>
    </div>
</body>
</html>