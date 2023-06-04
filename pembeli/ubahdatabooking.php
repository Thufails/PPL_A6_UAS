<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
session_start();
$id = $_GET["id"];

$row = query("SELECT * FROM databooking where id = $id")[0];


// cek apakah tombol sewa sudah ditekan atau belum
if ( isset($_POST["edit"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if ( mengubah_data_booking($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!')
            document.location.href = 'sewaPembeli.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!')
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">

<a href="#" class="logo">
    <img src="images/logo.png" alt="">
</a>

<nav class="navbar">
    <a href="../login_akun/index.php" style="text-decoration: none;">Home</a>
</nav>

<div class="icons">
    <div> <a href="../login_akun/profilakunpembeli.php" class="bi bi-person-circle" style="color: white;" id="people-btn"></a></div>
    <div class="fas fa-bars" id="menu-btn"></div>
</div>

<div class="cart-items-container">
    <div class="cart-item">
        <span class="fas fa-times"></span>
    </div>
</div>

</header>
<section class="about" id="about">

    <h1 class="heading"> <span>Untuk</span> Pembeli </h1>

    <div class="row">

        <div class="content">
            <h3>Pembeli</h3>
        </div>

    </div>

</section>
<h1 style="color:white; text-align: center;">Mengubah Data Boooking</h1>
    <div class="container mt-5 py-3 px-3 border" style="width: 800px; background-color:burlywood;">
    <form action="" method="post" enctype="multipart/form-data" class="row g-2">
        <input type="hidden" name="id" value="<?= $row["id"];?>">
        <input type="hidden" name="gambarLama" value="<?= $row["bukti_pembayaran"]; ?>">
        <div class="col-12">
            <label for="nama_penyewa" class="form-label">Nama</label>
            <input type="text" name="nama_penyewa" id="nama_penyewa" class="form-control" value="<?= $row["nama_penyewa"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="alamat" class="form-label">alamat</label>
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
        <div class="col-12">
            <label for="tgl_booking" class="form-label">Tanggal Booking Tempat</label>
            <input type="date" name="tgl_booking" id="tgl_booking" class="form-control" value="<?= $row["tgl_booking"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="durasi_sewa" class="form-label">Durasi Sewa</label>
            <input type="text" name="durasi_sewa" id="durasi_sewa" class="form-control" value="<?= $row["durasi_sewa"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label> <br>
            <img src="images/<?= $row['bukti_pembayaran']; ?>" width="100"> <br>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" >
        </div>
        <div class="d-grid gap-2">
        <button type="submit" name="edit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        <br>
    </form>
    </div>
    
    

</body>
</html>