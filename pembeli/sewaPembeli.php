<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
session_start();
$daftar_paket = query("SELECT * FROM daftarpaket");



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
            <a href="../login_akun/index.php">Home</a>
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

        <h1 class="heading"> <span>Untuk</span> Pembeli </h1>

        <div class="row">

            <div class="content">
                <h3>Pembeli</h3>
                <a href="list_booking(pembeli).php" class="btn">List Booking</a>
            </div>

        </div>

    </section>
    <!-- about section ends -->

    <!-- menu section starts  -->

    <section class="menu" id="menu">

        <h1 class="heading"> Paket <span>Sewa</span> </h1>

        <div class="box-container">
            <?php foreach ($daftar_paket as $row) : ?>
                <div class="box">
                    <!-- <img src="images/menu-<?= $row["id"]?>.png" alt=""> -->
                    <h3>
                        <?= $row["nama"]?>
                    </h3>
                    <div class="price">Rp <?= $row["harga"]?></div>
                    <div class="fasilitas"><?= $row["fasilitas"]?></div>
                    
                    <button class="btn">
                        <a href="membuatdatabooking.php? id=<?= $row["id"];?>">Booking</a>
                    </button>
                </div>
            <?php endforeach; ?>

        </div>

    </section>