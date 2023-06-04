<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';

session_start();
$id = $_GET["id"];

$row = query("SELECT * FROM dataakun where id = $id")[0];


// cek apakah tombol sewa sudah ditekan atau belum
if ( isset($_POST["simpan"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if ( mengedit_data_akunKasir($_POST) > 0) {
        echo "
        <script>
            alert('data anda telah berhasil diubah!')
            document.location.href = 'dataakunkasir.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!')
            document.location.href = 'dataakunkasir.php';
        </script>
        
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiCafe</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="registrasi.css">
</head>
<body>
<h1 style="text-align: center;">Mengedit Data Akun Kasir</h1>
    <div class="container mt-5 py-3 px-3 border" style="width: 800px; background-color:burlywood;">
    <form action="" method="post" enctype="multipart/form-data" class="row g-2">
        <input type="hidden" name="id" value="<?= $row["id"];?>">
        <div class="col-12">
            <label for="nama_user" class="form-label">Nama</label>
            <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?= $row["nama_user"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $row["email"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $row["alamat"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="<?= $row["kecamatan"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" name="kota" id="kota" class="form-control" value="<?= $row["kota"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="no_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="<?= $row["no_telepon"]; ?>" required>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan Data</button>
        <button type="submit" name="" class="btn btn-primary btn-sm"><a href="profilakunpemilik.php" style="color:white; text-decoration: none;">Kembali</a></button>
        </div>
        <br>
    </form>
    </div>