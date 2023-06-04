<?php 

session_start();
require 'D:\xampp\htdocs\PPL\pemilik\functions.php';

if (isset ($_SESSION["login"])) {
    header("Location: index.php");
    exit;
};

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM dataakun WHERE email = '$email'");

    // cek username
    if (mysqli_num_rows($result) == 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session 

            $_SESSION["id"] = $row["id"];
            $_SESSION["level"] = $row["level"];
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        }
    }
    
    echo "
        <script>
            alert('email atau password yang anda masukkan salah, harap isi kembali')
            document.location.href = 'login.php';
        </script>";

    $error = true;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiCafe</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css\stylelogin.css">
</head>
<body>
    <div class="login-box">
        <img src="avatar.jpg" class="avatar">
        <h1>Login</h1>
        <form action="" method="post">
            <p>Email</p>
            <input type="text" name="email" id="email" placeholder="Enter Email">
            <p>Password</p>
            <input type="password" name="password" id="password" placeholder="Enter Password">
            <!-- <button type="submit" name="login" class="btn btn-primary btn-sm">Login</button> -->
            <input type="submit" name="login" value="login">
            <p>Belum Punya Akun?<a href="pilihuser.php">Registrasi Disini</a></p>
            
        </form>
    </div>
</body>
</html>