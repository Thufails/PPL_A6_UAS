<?php
session_start();
error_reporting(0);

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'D:\xampp\htdocs\PPL\pemilik\functions.php';



$id = $_SESSION["id"];
$row = query("SELECT * FROM dataakun WHERE id = $id")[0];
$akun = $row["id"];
$dataMembership = query("SELECT * FROM datamembership WHERE id_akun = $akun")[0];
// print_r($_SESSION);


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
    <h1>Profil Akun Pemilik</h1>
    
    <div class="tabel-akun">
    <img src="avatar.jpg" class="avatar">
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
            Email
            </div>
            <div class="col">
            : <?= $row["email"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col">
            Alamat
            </div>
            <div class="col">
            : <?= $row["alamat"]; ?>
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
            : <?= $row["kecamatan_cafe"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col">
            Deskripsi Cafe
            </div>
            <div class="col">
            : <?= $row["deskripsi_cafe"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col">
            Nomor Telepon
            </div>
            <div class="col">
            : <?= $row["no_telepon"]; ?>
            </div>
        </div>
        <div class="row kolom">
            <div class="col">
            Tanggal Berlaku Member
            </div>
            <div class="col">
            <?php if($dataMembership) { ?>    
                : <?= $dataMembership["tgl_member"]; ?>
            <?php } else{?>
                : Bukan Member
            <?php } ?>
            
            </div>
        </div>
        <br>
        <button type="submit" name="" class=""><a href="ubahdataakun(pemilik).php?id=<?= $row["id"]; ?>" >Edit Akun</a></button>
        <button type="submit" name="" class=""><a href="membuatdatakasir.php" >Tambah Akun Kasir</a></button>
        <button type="submit" name="" class=""><a href="dataakunkasir.php" >Data Akun Kasir</a></button>
        <br>
        <br>
        <button type="submit" name="" class="btn btn-primary btn-sm"><a href="../membership/membership(Pemilik).php?id=<?= $row["id"]; ?>" style="text-decoration: none;">Membership</a></button>
        <button type="submit" name="" class="btn btn-primary btn-sm"><a href="index.php" style="text-decoration: none;">Kembali</a></button>
        <button type="submit" name="" class="btn btn-primary btn-sm"><a href="logout.php" style="text-decoration: none;">Log Out</a></button>
    </div>

</body>
</html>