<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'D:\xampp\htdocs\PPL\pemilik\functions.php';


$id = $_SESSION["id"];
$row = query("SELECT * FROM dataakun WHERE id = $id")[0];
// print_r($row);


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
    <link rel="stylesheet" href="profilakun.css">
</head>

<body>
    <h1>Profil Akun Kasir</h1>
    <div class="tabel-akun">
    <img src="avatar.jpg" class="avatar">
        <div class="row kolom">
            <div class="col" style="padding-bottom: 10px;">
            Nama
            </div>
            <div class="col">
            : <?= $row["nama_user"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col"style="padding-bottom: 10px;">
            Email
            </div>
            <div class="col">
            : <?= $row["email"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col"style="padding-bottom: 10px;">
            Alamat
            </div>
            <div class="col">
            : <?= $row["alamat"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col"style="padding-bottom: 10px;">
            Kecamatan
            </div>
            <div class="col">
            : <?= $row["kecamatan"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col"style="padding-bottom: 10px;">
            Kota
            </div>
            <div class="col">
            : <?= $row["kota"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col"style="padding-bottom: 10px;">
            No Telepon
            </div>
            <div class="col">
            : <?= $row["no_telepon"]; ?>
            </div>
        </div>
        <button type="submit" name="" class=""><a href="ubahdataakun(kasir).php?id=<?= $row["id"]; ?>" >Edit Akun</a></button>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <button type="submit" name="" class="btn btn-primary btn-sm"><a href="index.php" style="text-decoration: none;">Kembali</a></button>
        <button type="submit" name="" class="btn btn-primary btn-sm"><a href="logout.php" style="text-decoration: none;">Log Out</a></button>
    </div>

</body>
</html>