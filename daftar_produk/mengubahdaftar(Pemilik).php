<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
session_start();

$id = $_GET["id"];

$row = query("SELECT * FROM dataproduk where id = $id")[0];


// cek apakah tombol sewa sudah ditekan atau belum
if ( isset($_POST["edit"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if ( mengubah_data_produk($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!')
            document.location.href = 'daftarprodukPemilik.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!')
            document.location.href = 'mengubahdaftar(Pemilik).php';
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
    <link rel="stylesheet" href="css/styleproduk.css">
</head>
<body>
<header class="header">

<a href="#" class="logo">
    <img src="images/logo.png" alt="">
</a>

<nav class="navbar">
    <a href="../login_akun/index.php">Home</a>
    <a href="home">Artikel</a>
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

    <h1 class="heading"> <span>Untuk</span> Pemilik </h1>

    <div class="row">

        <div class="content">
            <h3>Pemilik</h3>
        </div>

    </div>

</section>
<h1 style="text-align: center; padding-top:25px; color: white;">Mengubah Data Produk</h1>
    <div class="container mt-5 py-3 px-3 border" style="width: 800px; background-color:burlywood;">
    <form action="" method="post" enctype="multipart/form-data" class="row g-2">
        <input type="hidden" name="id" value="<?= $row["id"];?>">
        <input type="hidden" name="produkLama" value="<?= $row["gambar_produk"]; ?>">
        <div class="col-12">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $row["nama_produk"]; ?>" required>
        </div>
        <div class="col-12">
            <label for="gambar_produk" class="form-label">Gambar Produk</label> <br>
            <img src="images/<?= $row['gambar_produk']; ?>" width="100"> <br>
            <input type="file" name="gambar_produk" id="gambar_produk" class="form-control" >
        </div>
        <div class="col-12">
            <label for="harga_produk" class="form-label">Harga Produk</label>
            <input type="text" name="harga_produk" id="harga_produk" class="form-control" value="<?= $row["harga_produk"]; ?>" required>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" name="edit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        <br>
    </form>
    </div>
    
    

</body>
</html>