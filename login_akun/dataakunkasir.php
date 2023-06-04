<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';
$dataakun = query("SELECT * FROM dataakun");

// print_r($dataakun);

echo(count($dataakun));
for ($x = 0; $x < count($dataakun); $x+=1) {
    if($dataakun[$x]["level"] != "kasir") {
        unset($dataakun[$x]);
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
    <link rel="stylesheet" href="css\styledataakun.css">

</head>

<body>


    <header class="header">

        <a href="#" class="logo">
            <img src="images/logo.png" alt="">
        </a>

        <nav class="navbar">
            <a href="index.php">Home</a>

        </nav>

        <div class="icons">
            <div> <a href="profilakunpemilik.php" class="bi bi-person-circle" style="color: white;" id="people-btn"></a></div>
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

        <h1 class="heading"> <span>Data Akun</span> Kasir </h1>

        <table class="table" border="1" cellpadding="10" cellspacing="0" style="background-color: #fff; font-size: 15px;">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kota</th>
            <th>No Telepon</th>
            <th>Level</th>
            <th>aksi</th>
        </tr>

        <?php $i = 1 ?>
        <?php foreach ($dataakun as $row) : ?>
            <tr>
                <td><?= $i; ?></td>

                <td><?= $row["nama_user"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["kecamatan"]; ?></td>
                <td><?= $row["kota"]; ?></td>
                <td><?= $row["no_telepon"]; ?></td>
                <td><?= $row["level"]; ?></td>
                <td>
                    <a href="ubahdataakun(kasir)byPemilik.php?id=<?= $row["id"]; ?>">Edit</a>
                </td>
                
            </tr>
            <?php $i++ ?>
        <?php endforeach;?>
    </table>

    </section>

    <!-- about section ends -->

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