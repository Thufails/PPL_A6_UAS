<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
session_start();
$datastok = query("SELECT * FROM datastok");
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
            <a href="../login_akun/index.php">Home</a>
        </nav>

        <div class="icons">
        <div> <a href="../login_akun/profilakunkasir.php" class="bi bi-person-circle" style="color: white;" id="people-btn"></a></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

    </header>

    <!-- header section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>Admin</span> Only </h1>

        <div class="row">

            <div class="content">
                <h3 style="color: white; font-size:30px;">Kasir</h3>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- menu section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>Daftar Stok</span> Produksi Kopi </h1>

        <table class="table" border="1" cellpadding="10" cellspacing="0" style="background-color: #fff; font-size: 15px;">
        <tr>
            <th>No. </th>
            <th>Nama Produk</th>
            <th>Stok Produk</th>
            <th>Ubah Stok</th>

        </tr>

        <?php $i = 1 ?>
        <?php foreach ($datastok as $row) : ?>
            <tr>
                <td><?= $i; ?></td>

                <td><?= $row["nama_produk"]; ?></td>
                <td><?= $row["stok_produk"]; ?></td>
                <td>
                    <a href="mengubahstok(Kasir).php?id=<?= $row["id"]; ?>" style="text-decoration: none;" >Edit</a>
                </td>
                
            </tr>
            <?php $i++ ?>
        <?php endforeach;?>
    </table>

    </section>




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