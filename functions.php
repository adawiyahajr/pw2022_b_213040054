<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

return $conn;


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $eror = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if( $eror  === 4 ) {
        // echo "<script>
        //         alert('pilih gambar terlebih dahulu!');
        //     </script>";
        return false;
    }

    $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ektensiGambar = explode('.', $namaFile);
    $ektensiGambar = strtolower(end($ektensiGambar));
    if( !in_array($ektensiGambar, $ektensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru
    $nama_File_baru = uniqid();
    $nama_File_baru .= '.';
    $nama_File_baru .= $ektensiGambar;
    move_uploaded_file($tmpName, 'img/' . $nama_File_baru);

    return $nama_File_baru;
}

function tambah($data) {
    global $conn;

    $nama_film = htmlspecialchars($data["nama_film"]);
    $sutradara = htmlspecialchars($data["sutradara"]);
    $genre = htmlspecialchars($data["genre"]);
    $release = htmlspecialchars($data["release"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO 
                film
                    VALUES
            ('null', '$nama_film', '$sutradara', '$genre', '$release', '$gambar')
        ";
    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM film WHERE id=$id");
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama_film = htmlspecialchars($data["nama_film"]);
    $sutradara = htmlspecialchars($data["sutradara"]);
    $genre = htmlspecialchars($data["genre"]);
    $release = htmlspecialchars($data["release"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    $gambar = upload();
    if( !$gambar ) {
        return false;
    }
    
    $query = "UPDATE 
                film 
                    SET
                    `nama_film` = '$nama_film',
                    `sutradara` = '$sutradara',
                    `genre` = '$genre',
                    `release` = '$release',
                    `gambar` = '$gambar'
                WHERE id = '$id'
                ";

mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM film
                WHERE
            nama_film LIKE '%$keyword%' OR
            genre LIKE '%$keyword%'
        ";
    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!')
            </script>";
        return false;
    }
    return 1;

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', $password')");

    return mysqli_affected_rows($conn);
}

?>
