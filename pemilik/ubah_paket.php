<?php
require 'functions.php';
session_start();
$id = $_GET["id"];

$row = query("SELECT * FROM daftarpaket where id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if ( ubah_paket($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!')
            document.location.href = 'sewaPemilik.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!')
            document.location.href = 'ubah_paket.php';
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
            <a href="../login_akun/index.php">Home</a>
        </nav>

        <div class="icons">
            <div> <a href="../login_akun/profilakunpemilik.php" class="bi bi-person-circle" style="color: white;" id="people-btn"></a></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

    </header>

    <!-- header section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>Admin</span> Only </h1>

        </div>

    </section>

    <!-- about section ends -->

    <div class="container mt-5 py-3 px-3 border" style="width: 800px; background-color:burlywood;">
        <h5>Update Paket</h5>
            <form action="" method="post" class="row g-2">
                <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                <div class="col-12">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $row["nama"]; ?>">
                </div>
                <div class="col-12">
                    <label for="fasilitas" class="form-label">Fasilitas:</label>
                    <input type="text" name="fasilitas" id="fasilitas" class="form-control" value="<?= $row["fasilitas"]; ?>">
                </div>
                <div class="col-12">
                    <label for="harga" class="form-label">Harga:</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="<?= $row["harga"]; ?>">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
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