<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
session_start();

$id = $_GET["id"];

$row = query("SELECT * FROM datapesanan where id = $id")[0];


// cek apakah tombol sewa sudah ditekan atau belum
if ( isset($_POST["simpan"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if ( mengubah_data_pesanan($_POST) > 0) {
        echo "
        <script>
            alert('data pesanan anda berhasil diubah!')
            document.location.href = 'melihatpesanan(Pembeli).php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data pesanan gagal diubah!')
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
    <link rel="stylesheet" href="css/stylepesanan.css">
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
<h1 style="color:white; text-align: center;">Mengubah Data Pesanan</h1>
    <div class="container mt-5 py-3 px-3 border" style="width: 800px; background-color:burlywood;">
    <form action="" method="post" enctype="multipart/form-data" class="row g-2">
        <input type="hidden" name="id" value="<?= $row["id"];?>">
        <input type="hidden" name="pesananLama" value="<?= $row["bukti_pembayaran"]; ?>">
        <div class="col-12">
            <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
            <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" required value="<?= $row["nama_pembeli"];?>">
        </div>
        <div class="col-12">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" required value="<?= $row["nama_produk"];?>">
        </div>
        <div class="col-12">
            <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
            <input type="text" name="jumlah_produk" id="jumlah_produk" class="form-control" required value="<?= $row["jumlah_produk"];?>">
        </div>
        <div class="col-12">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" name="total_harga" id="total_harga" class="form-control" required value="<?= $row["total_harga"];?>">
        </div>
        <div class="col-12">
            <label for="nomor_meja" class="form-label">Nomor Meja</label>
            <input type="text" name="nomor_meja" id="nomor_meja" class="form-control" required value="<?= $row["nomor_meja"];?>">
        <div class="col-12">
            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label> <br>
            <img src="images/<?= $row['bukti_pembayaran']; ?>" width="100"> <br>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" >
        </div>
        <br>
        <div class="d-grid gap-2">
            <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        <br>
    </form>
    </div>
    
    

</body>
</html>