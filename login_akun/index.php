<?php 
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$pemilik = $_SESSION["level"] == "pemilik";
$pembeli = $_SESSION["level"] == "pembeli";

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css\styleindex.css">

</head>

<body>


    <header class="header">

        <a href="#" class="logo">
            <img src="images/logo.png" alt="">
        </a>
        
        <nav class="navbar">
            <a href="index.php" style="text-decoration: none;">Home</a>
            <?php
            if($pemilik){
            ?>
            <a href="../pemilik/sewaPemilik.php" style="text-decoration: none;">Sewa</a>
            <a href="../stok_produk/stokPemilik.php" style="text-decoration: none;">Stok Kopi</a>
            <a href="../daftar_produk/daftarprodukPemilik.php" style="text-decoration: none;">Produk</a>
            <a href="../pesanan/melihatpesanan(Pemilik).php" style="text-decoration: none;">Pesanan</a>
            <?php }elseif($pembeli){ ?>
            <a href="../pembeli/sewaPembeli.php" style="text-decoration: none;">Sewa</a>
            <a href="../pesanan/melihatpesanan(Pembeli).php" style="text-decoration: none;">Pesanan</a>
            <?php } else{ ?>
            <a href="../stok_produk/stokKasir.php" style="text-decoration: none;">Stok Kopi</a>
            <a href="../pesanan/melihatpesanan(Kasir).php" style="text-decoration: none;">Pesanan</a>
            <?php } ?>
        </nav>

        <div class="icons">
            <?php
            
            if($pemilik){
            ?>    
            <div> <a href="profilakunpemilik.php" class="bi bi-person-circle" style="color: white;" id="people-btn"></a></div>
            <?php }elseif($pembeli) { ?>
            <div> <a href="profilakunpembeli.php" class="bi bi-person-circle" style="color: white;" id="people-btn"></a></div>
            <?php } else {?>
            <div> <a href="profilakunkasir.php" class="bi bi-person-circle" style="color: white;" id="people-btn"></a></div>

            <?php } ?>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>


    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>SELAMAT DATANG DI SICAFE</h3>
            <p>
                Sistem layanan berbasis website yang menyediakan layanan penyewaan barang untuk kepentingan meeting dan pembelian produk yang disediakan oleh Cafe
            </p>
            <?php
            
                if($pemilik){
                ?>    
                <div> <a href="../artikel/artikelPemilik.php" class="btn" > Artikel </a></div>
                <?php } else{?>
                <div> <a href="../artikel/artikelPembeli.php" class="btn" > Artikel </a></div>

                <?php } ?>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>Produk</span> Kami </h1>

        <div class="row">

            <div class="image">
                <img src="images/about-img.jpeg" alt="">
            </div>

            <div class="content">
                <h3>Apa Yang Membuat Produk Kami Spesial?</h3>
                <p>Kopi kami memiliki mutu tinggi, disangrai menggunakan teknologi terbaik dan terbaru menjadikan biji kopi memiliki aroma yang spesial</p>
                <p>Pilihan biji kopi yang bermutu, dipilih langsung dari kebun kopi yang sudah berlisensi. Pemetikan kopi juga dilakukan oleh para petani yang sudah profesional</p>
                <?php
            
                if($pemilik){
                ?>    
                <div> <a href="../daftar_produk/daftarprodukPemilik.php" class="btn" > Produk </a></div>
                <?php } else{?>
                <div> <a href="../daftar_produk/daftarprodukPembeli.php" class="btn" > Produk </a></div>

                <?php } ?>
                
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- menu section starts  -->

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
    <script src="script.js"></script>

</body>

</html>