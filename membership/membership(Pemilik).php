<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
session_start();
$id_akun = $_GET["id"];

$row = query("SELECT * FROM dataakun WHERE id = $id_akun")[0];

if ( isset($_POST["bayar"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if ( membuat_data_membership($_POST) > 0) {
        echo "
        <script>
            alert('Membership anda berhasil diperpanjang')
            document.location.href = '../login_akun/profilakunpemilik.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!')
            document.location.href = 'membership(Pemilik).php';
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
    <link rel="stylesheet" href="css/membership.css">
</head>
<body>
    <header class="header">

    <a href="#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="../login_akun/index.php">Home</a>
    </nav>

    <div class="icons">
        <div> <a href="../login_akun/profilakunpemilik.php" class="bi bi-person-circle" style="color: white;" id="people-btn"></a></div>
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


    </section>
    
<h1 style="color:white; text-align: center;">Pembayaran Membership</h1>
    <div class="container mt-5 py-3 px-3 border" style="width: 800px; background-color:burlywood;">
    <form action="" method="post" enctype="multipart/form-data" class="row g-2">
        <input type="hidden" name="id_akun" id="id_akun" value="<?= $row["id"];?>">
        <div class="tabel-akun" style="font-size: medium;">
        <div class="row kolom">
            <div class="col">
            Nama
            </div>
            <div class="col">
                : <?= $row["nama_user"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col">
            Nama Cafe
            </div>
            <div class="col">
            : <?= $row["nama_cafe"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col">
            Alamat Kafe
            </div>
            <div class="col">
            : <?= $row["alamat_cafe"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col">
            Kecamatan
            </div>
            <div class="col">
            : <?= $row["kecamatan"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col">
            Kota
            </div>
            <div class="col">
            : <?= $row["kota"]; ?>
            </div>
        </div>
        <div class="col-12">
            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" required>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" name="bayar" class="btn btn-primary btn-sm">Bayar</button>
        </div>
        <br>
    </form>
    </div>
    
    

</body>
</html>