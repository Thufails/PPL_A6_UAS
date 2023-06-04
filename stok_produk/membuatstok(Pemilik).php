<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
session_start();

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if ( membuat_stok($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!')
            document.location.href = 'stokPemilik.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!')
            document.location.href = 'membuatstok.php';
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
    <link rel="stylesheet" href="css/stylestok.css">

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
            <div class="bi bi-person-circle" id="people-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <div class="cart-items-container">
            <div class="cart-item">
                <span class="fas fa-times"></span>
            </div>
        </div>

    </header>

    <!-- header section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>Admin</span> Only </h1>

        <div class="row">

            <div class="content">
                <h3 style="color: white; font-size:30px;">Pemilik</h3>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <div class="container mt-5 py-3 px-3 border" style="width: 800px; background-color:burlywood;">
        <h5>Tambah Stok Kopi</h5>
            <form action="" method="post" class="row g-2">
                <div class="col-12">
                    <label for="nama_produk" class="form-label">Nama Produk:</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="stok_produk" class="form-label">Stok Produk:</label>
                    <input type="text" name="stok_produk" id="stok_produk" class="form-control" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah Data</button>
                </div>
                <br>
            </form>
    </div>

    




    <!-- footer section starts  -->

    <section class="footer">

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>

        </div>

        <div class="credit">created by <span>PPL A6</span> | all rights reserved</div>

    </section>

    <!-- footer section ends -->



    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>