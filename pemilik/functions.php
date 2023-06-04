<?php 
$conn = mysqli_connect("localhost", "root", "", "ppl_a6");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
};

function tambah_paket($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $fasilitas = htmlspecialchars($data["fasilitas"]);
    $harga = $data["harga"];

    // query insert data
    $query = "INSERT INTO daftarpaket
                VALUES
            ('', '$nama', '$fasilitas', '$harga')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_paket($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $fasilitas = htmlspecialchars($data["fasilitas"]);
    $harga = $data["harga"];

    $query = "UPDATE daftarpaket SET 
                nama = '$nama',
                fasilitas = '$fasilitas',
                harga = '$harga'
                WHERE id = $id; 
                ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi_pemilik($data) {
    global $conn;
    
    $level = htmlspecialchars($data["level"]);
    $nama_user = htmlspecialchars($data["nama_user"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kota = htmlspecialchars($data["kota"]);
    $nama_cafe = htmlspecialchars($data["nama_cafe"]);
    $alamat_cafe = htmlspecialchars($data["alamat_cafe"]);
    $kecamatan_cafe = htmlspecialchars($data["kecamatan_cafe"]);
    $kota_cafe = htmlspecialchars($data["kota_cafe"]);
    $deskripsi_cafe = htmlspecialchars($data["deskripsi_cafe"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //insert data
    $query = "INSERT INTO dataakun
                VALUES
            ('', '$nama_user', '$email', '$password', '$alamat','$kecamatan', '$kota', '$nama_cafe',
            '$alamat_cafe', '$kecamatan_cafe', '$kota_cafe', '$deskripsi_cafe', '$no_telepon', '$level')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function registrasi_pembeli($data) {
    global $conn;
    
    $level = htmlspecialchars($data["level"]);
    $nama_user = htmlspecialchars($data["nama_user"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kota = htmlspecialchars($data["kota"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);

    //insert data

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO dataakun
                VALUES
            ('', '$nama_user', '$email', '$password', '$alamat', '$kecamatan', '$kota','','','','','', '$no_telepon', '$level')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//membuat data booking (pembeli)
function membuat_data_booking($data) {
    global $conn;


    $nama_penyewa = htmlspecialchars($data["nama_penyewa"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kota = htmlspecialchars($data["kota"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);
    $tgl_booking = $data["tgl_booking"];
    $durasi_sewa = $data["durasi_sewa"];
    $id_paket = $data["id_paket"];
    $tgl_pesanan = date("Y-m-d", time());

    //upload bukti pembayaran
    $bukti_pembayaran = upload();
    if( !$bukti_pembayaran ) {
        return false;
    }

    $query = "INSERT INTO databooking
                VALUES
            ('', '$tgl_pesanan', '$nama_penyewa', '$alamat', '$kecamatan', '$kota', '$no_telepon', 
            '$tgl_booking','$durasi_sewa', '$id_paket', '$bukti_pembayaran','')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    
    $namaFoto = $_FILES['bukti_pembayaran']['name'];
    $ukuranFoto = $_FILES['bukti_pembayaran']['size'];
    $error = $_FILES['bukti_pembayaran']['error'];
    $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu')
              </script>";
        return false;
    }

    // cek apakah yang diupload merupakan gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFoto);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda uploadkan bukan gambar!')
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFoto > 10000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!')
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();  
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}

function mengubah_data_booking($data) {
    global $conn;

    $id = $data["id"];
    $nama_penyewa = htmlspecialchars($data["nama_penyewa"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kota = htmlspecialchars($data["kota"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);
    $tgl_booking = $data["tgl_booking"];
    $durasi_sewa = $data["durasi_sewa"];
    // $id_paket = $data["id_paket"];
    // $tgl_pesanan = date('d/m/Y');
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah user memilih gambar baru atau tidak
    if( $_FILES['bukti_pembayaran']['error'] === 4 ) {
        $bukti_pembayaran = $gambarLama;
    } else {
        $bukti_pembayaran = upload();
    }

    $query = "UPDATE databooking SET
                nama_penyewa = '$nama_penyewa',
                alamat = '$alamat',
                kecamatan = '$kecamatan',
                kota = '$kota',
                no_telepon = '$no_telepon',
                tgl_booking = '$tgl_booking',
                durasi_sewa = '$durasi_sewa',
                bukti_pembayaran = '$bukti_pembayaran'
                WHERE id = $id;"
                ;

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function konfirmasi($data) {
    global $conn;

    $id = $data["id"];
    $konfirmasi = "terkonfirmasi";

    $query = "UPDATE databooking SET
                status_konfirmasi = '$konfirmasi'
                WHERE id = $id;"
                ;

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function mengedit_data_akunPemilik($data){
    global $conn;

    $id = $data["id"];
    $nama_user = htmlspecialchars($data["nama_user"]);
    $email = htmlspecialchars($data["email"]);
    // $password = htmlspecialchars($data["password"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kota = htmlspecialchars($data["kota"]);
    $nama_cafe = htmlspecialchars($data["nama_cafe"]);
    $alamat_cafe = htmlspecialchars($data["alamat_cafe"]);
    $kecamatan_cafe = htmlspecialchars($data["kecamatan_cafe"]);
    $kota_cafe = htmlspecialchars($data["kota_cafe"]);
    $deskripsi_cafe = htmlspecialchars($data["deskripsi_cafe"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);

    $query = "UPDATE dataakun SET
                nama_user= '$nama_user',
                email= '$email',
                alamat = '$alamat',
                kecamatan = '$kecamatan',
                kota = '$kota',
                nama_cafe= '$nama_cafe',
                alamat_cafe = '$alamat_cafe',
                kecamatan_cafe = '$kecamatan_cafe',
                kota_cafe = '$kota_cafe',
                deskripsi_cafe = '$deskripsi_cafe',
                no_telepon = '$no_telepon'
                WHERE id = $id;"
                ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function mengedit_data_akunPembeli($data){
    global $conn;

    $id = $data["id"];
    $nama_user = htmlspecialchars($data["nama_user"]);
    $email = htmlspecialchars($data["email"]);
    // $password = htmlspecialchars($data["password"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kota = htmlspecialchars($data["kota"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);

    $query = "UPDATE dataakun SET
                nama_user= '$nama_user',
                email= '$email',
                alamat = '$alamat',
                kecamatan = '$kecamatan',
                kota = '$kota',
                no_telepon = '$no_telepon'
                WHERE id = $id;"
                ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function mengedit_data_akunKasir($data){
    global $conn;

    $id = $data["id"];
    $nama_user = htmlspecialchars($data["nama_user"]);
    $email = htmlspecialchars($data["email"]);
    // $password = htmlspecialchars($data["password"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kota = htmlspecialchars($data["kota"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);

    $query = "UPDATE dataakun SET
                nama_user= '$nama_user',
                email= '$email',
                alamat = '$alamat',
                kecamatan = '$kecamatan',
                kota = '$kota',
                no_telepon = '$no_telepon'
                WHERE id = $id;"
                ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}



function buat_akun_kasir($data) {
    global $conn;
    
    $level = htmlspecialchars($data["level"]);
    $nama_user = htmlspecialchars($data["nama_user"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kota = htmlspecialchars($data["kota"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);

    //insert data

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO dataakun
                VALUES
            ('', '$nama_user', '$email', '$password', '$alamat', '$kecamatan', '$kota','','','','','', '$no_telepon', '$level')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function membuat_stok($data) {
    global $conn;

    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $stok_produk = htmlspecialchars($data["stok_produk"]);

    // query insert data
    $query = "INSERT INTO datastok
                VALUES
            ('', '$nama_produk', '$stok_produk')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_stok($data) {
    global $conn;

    $id = $data["id"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $stok_produk = htmlspecialchars($data["stok_produk"]);

    $query = "UPDATE datastok SET 
                nama_produk = '$nama_produk',
                stok_produk = '$stok_produk'
                WHERE id = $id; 
                ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_produk($data) {
    global $conn;


    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $gambar_produk = htmlspecialchars($data["gambar_produk"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);

    //upload bukti pembayaran
    $gambar_produk = upload_produk();
    if( !$gambar_produk ) {
        return false;
    }

    $query = "INSERT INTO dataproduk
                VALUES
            ('', '$nama_produk', '$gambar_produk', '$harga_produk')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_produk() {
    
    $namaFoto = $_FILES['gambar_produk']['name'];
    $ukuranFoto = $_FILES['gambar_produk']['size'];
    $error = $_FILES['gambar_produk']['error'];
    $tmpName = $_FILES['gambar_produk']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu')
              </script>";
        return false;
    }

    // cek apakah yang diupload merupakan gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFoto);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda uploadkan bukan gambar!')
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFoto > 10000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!')
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();  
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}

function mengubah_data_produk($data) {
    global $conn;

    $id = $data["id"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);
    $produkLama = htmlspecialchars($data["produkLama"]);

    //cek apakah user memilih gambar baru atau tidak
    if( $_FILES['gambar_produk']['error'] === 4 ) {
        $gambar_produk = $produkLama;
    } else {
        $gambar_produk = upload_produk();
    }

    $query = "UPDATE dataproduk SET
                nama_produk = '$nama_produk',
                gambar_produk = '$gambar_produk',
                harga_produk = '$harga_produk'
                WHERE id = $id;"
                ;

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function tambah_artikel($data) {
    global $conn;


    $judul_artikel = htmlspecialchars($data["judul_artikel"]);
    $author_artikel = htmlspecialchars($data["author_artikel"]);
    $deskripsi_artikel = htmlspecialchars($data["deskripsi_artikel"]);
    $gambar_artikel = htmlspecialchars($data["gambar_artikel"]);
    $tgl_artikel = date("Y-m-d", time());

    //upload bukti pembayaran
    $gambar_artikel = upload_artikel();
    if( !$gambar_artikel ) {
        return false;
    }

    $query = "INSERT INTO dataartikel
                VALUES
            ('', '$judul_artikel', '$author_artikel', '$deskripsi_artikel', '$gambar_artikel', '$tgl_artikel')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_artikel() {
    
    $namaFoto = $_FILES['gambar_artikel']['name'];
    $ukuranFoto = $_FILES['gambar_artikel']['size'];
    $error = $_FILES['gambar_artikel']['error'];
    $tmpName = $_FILES['gambar_artikel']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu')
              </script>";
        return false;
    }

    // cek apakah yang diupload merupakan gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFoto);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda uploadkan bukan gambar!')
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFoto > 10000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!')
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();  
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}

function mengubah_data_artikel($data) {
    global $conn;

    $id = $data["id"];
    $judul_artikel = htmlspecialchars($data["judul_artikel"]);
    $author_artikel = htmlspecialchars($data["author_artikel"]);
    $deskripsi_artikel = htmlspecialchars($data["deskripsi_artikel"]);
    $artikelLama = htmlspecialchars($data["artikelLama"]);
    $tgl_artikel = date("Y-m-d", time());

    //cek apakah user memilih gambar baru atau tidak
    if( $_FILES['gambar_artikel']['error'] === 4 ) {
        $gambar_artikel = $artikelLama;
    } else {
        $gambar_artikel = upload_artikel();
    }

    $query = "UPDATE dataartikel SET
                judul_artikel = '$judul_artikel',
                author_artikel = '$author_artikel',
                deskripsi_artikel = '$deskripsi_artikel',
                gambar_artikel = '$gambar_artikel',
                tgl_artikel = '$tgl_artikel'
                WHERE id = $id;"
                ;

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function konfirmasi_pesanan($data) {
    global $conn;

    $id = $data["id"];
    $konfirmasi = "terkonfirmasi";

    $query = "UPDATE datapesanan SET
                konfirmasi = '$konfirmasi'
                WHERE id = $id;"
                ;

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function membuat_data_pesanan($data) {
    global $conn;

    $id_produk = htmlspecialchars($data["id_produk"]);
    $tgl_pesanan = date("Y-m-d", time());
    $nama_pembeli = htmlspecialchars($data["nama_pembeli"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);
    $total_harga = htmlspecialchars($data["total_harga"]);
    $nomor_meja = htmlspecialchars($data["nomor_meja"]);


    //upload bukti pembayaran
    $bukti_pembayaran = upload_pesanan();
    if( !$bukti_pembayaran ) {
        return false;
    }

    $query = "INSERT INTO datapesanan
                VALUES
            ('', '$id_produk','$tgl_pesanan', '$nama_pembeli', '$nama_produk', 
            '$jumlah_produk', '$total_harga', '$nomor_meja', '$bukti_pembayaran', '')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_pesanan() {
    
    $namaFoto = $_FILES['bukti_pembayaran']['name'];
    $ukuranFoto = $_FILES['bukti_pembayaran']['size'];
    $error = $_FILES['bukti_pembayaran']['error'];
    $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu')
              </script>";
        return false;
    }

    // cek apakah yang diupload merupakan gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFoto);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda uploadkan bukan gambar!')
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFoto > 10000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!')
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();  
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}

function mengubah_data_pesanan($data) {
    global $conn;

    $id = $data["id"];
    $nama_pembeli = htmlspecialchars($data["nama_pembeli"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);
    $total_harga = htmlspecialchars($data["total_harga"]);
    $nomor_meja = htmlspecialchars($data["nomor_meja"]);
    $pesananLama = htmlspecialchars($data["pesananLama"]);
    $tgl_pesanan = date("Y-m-d", time());

    //cek apakah user memilih gambar baru atau tidak
    if( $_FILES['bukti_pembayaran']['error'] === 4 ) {
        $bukti_pembayaran = $pesananLama;
    } else {
        $bukti_pembayaran = upload_pesanan();
    }

    $query = "UPDATE datapesanan SET
                tgl_pesanan = '$tgl_pesanan',
                nama_pembeli = '$nama_pembeli',
                nama_produk = '$nama_produk',
                jumlah_produk = '$jumlah_produk',
                total_harga = '$total_harga',
                nomor_meja = '$nomor_meja',
                bukti_pembayaran = '$bukti_pembayaran'
                WHERE id = $id;"
                ;

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function membuat_data_membership($data) {
    global $conn;

    $six_month = time() + 60*60*24*180;

    // $tgl_pesanan = date("Y-m-d", time());
    // $nama = htmlspecialchars($data["nama"]);
    // $nama_cafe = htmlspecialchars($data["nama_cafe"]);
    // $no_telepon = htmlspecialchars($data["no_telepon"]);
    // $alamat_cafe = htmlspecialchars($data["alamat_cafe"]);
    // $kota_cafe = htmlspecialchars($data["kota_cafe"]);
    // $kecamatan_cafe = htmlspecialchars($data["kecamatan_cafe"]);
    $tgl_member = date("Y-m-d", $six_month);
    $id_akun = htmlspecialchars($data["id_akun"]);


    //upload bukti pembayaran
    $bukti_pembayaran = upload_membership();
    if( !$bukti_pembayaran ) {
        return false;
    }

    // '$nama', '$nama_cafe', '$no_telepon', '$alamat_cafe', '$kota_cafe', 
    //         '$kecamatan_cafe', 
    $query = "INSERT INTO datamembership
                VALUES
            ('', '$bukti_pembayaran', '$tgl_member', '$id_akun')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_membership() {
    
    $namaFoto = $_FILES['bukti_pembayaran']['name'];
    $ukuranFoto = $_FILES['bukti_pembayaran']['size'];
    $error = $_FILES['bukti_pembayaran']['error'];
    $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu')
              </script>";
        return false;
    }

    // cek apakah yang diupload merupakan gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFoto);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda uploadkan bukan gambar!')
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFoto > 10000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!')
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();  
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}

?>