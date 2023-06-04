<?php
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';

$level = $_GET["level"];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["registrasi"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if ( registrasi_pemilik($_POST) > 0) {
        echo "
        <script>
            alert('User Baru Berhasil Ditambahkan!')
        </script>
        ";
        header("Location:login.php");
    } else {
        echo "
        <script>
            alert('User Gagal Ditambahkan!')
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
    <link rel="stylesheet" href="css\registrasi.css">
</head>
<body>
    <h1 style="text-align: center;">Halaman Registrasi Pemilik</h1>
    <div class="container mt-5 py-3 px-3 border" style="width: 800px; background-color:burlywood;">
    <form action="" method="post" class="row g-2">
                <input type="hidden" name="level" id="level" value="<?= $level; ?>">
                <div class="col-12">
                    <label for="nama_user" class="form-label">Nama</label>
                    <input type="text" name="nama_user" id="nama_user" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" name="kota" id="kota" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="nama_cafe" class="form-label">Nama Cafe</label>
                    <input type="text" name="nama_cafe" id="nama_cafe" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="alamat_cafe" class="form-label">Alamat Cafe</label>
                    <input type="text" name="alamat_cafe" id="alamat_cafe" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="kecamatan_cafe" class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan_cafe" id="kecamatan_cafe" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="kota_cafe" class="form-label">Kota</label>
                    <input type="text" name="kota_cafe" id="kota_cafe" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="deskripsi_cafe" class="form-label">Deskripsi Cafe</label>
                    <input type="text" name="deskripsi_cafe" id="deskripsi_cafe" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="registrasi" class="btn btn-primary btn-sm">Daftar</button>
                </div>
                <br>
    </form>
    </div>
    
    

</body>
</html>