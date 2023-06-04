<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
session_start();
$dataartikel = query("SELECT * FROM dataartikel");

$id = $_GET["id"];

$row = query("SELECT * FROM dataartikel where id = $id")[0];

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
    <link rel="stylesheet" href="css/styleartikel.css">

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
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

    </header>

    <!-- header section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <!-- <h1 class="heading"> <span>Admin</span> Only </h1>

        <div class="row">

            <div class="content">
            </div>

        </div> -->

    </section>

    <!-- about section ends -->

    <!-- menu section starts  -->

    <section class="menu" id="menu">

        <h1 class="heading"> <span> </span> </h1>

        <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-light">
                <h1 class="mb-3"> <?= $row["judul_artikel"]?> </h1>
                    <span class="pb-0"style="font-size: 12pt;">Oleh <?= $row["author_artikel"]?> <br><?= $row["tgl_artikel"]?></span>
                    
                    <img src="images/<?= $row["gambar_artikel"]?>" class="card-img-top img-fluid" style="width:800px"alt="">
                    <article class="my-2" style="font-size: 12pt; text-align:justify;">
                    <?= $row["deskripsi_artikel"]?>
                    </article>
                <!-- <a href="/posts" class="d-block mt-5">Back to Posts</a> -->
            </div>
        </div>
    </div>

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