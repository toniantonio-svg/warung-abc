<?php
    include 'config/koneksi.php';

    $nama = 'Administrator';
    $username = 'admin';
    $password = 'password_hash('admin123', PASWORD_DEFAULT);
    $role = 'admin';

    $sql = "INSERT INTO tbl_user (nama_lengkap, username, password, role)";
    $sql .= "VALUES ('$nama', '$username', '$password', '$role')";

    if (mysqli_ query($koneksi, $sql)) {
        echo 'User admin berhasil dibuat. Silahkan hapus file ini.';
    } else { 
        echo 'Gagal membuat user: ' . mysqli_error($koneksi);
    }
?>