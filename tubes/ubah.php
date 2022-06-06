<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

// query data film berdasarkan id
$film = query("SELECT * FROM film WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php?id=$film[id]';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'ubah.php?id=$film[id]';
            </script>
        ";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update data film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <style>
        body{
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        h1 {
            text-align: center;
            font-size: x-large;
        }
    </style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Notflix</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="ubah.php">Update data film</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $film["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $film["gambar"]; ?>">
        <ul class="form-group">
            <li>
                <label for="nama film">Nama film</label>
                <input type="text" name="nama_film" id="nama film" required value="<?= $film["nama_film"]; ?>" required class="form-control">
            </li>
            <li>
                <label for="sutradara">Sutradara</label>
                <input type="text" name="sutradara" id="sutradara" required value="<?= $film["sutradara"]; ?>" required class="form-control">
            </li>
            <li>
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" required value="<?= $film["genre"]; ?>" required class="form-control">
            </li>
            <li>
                <label for="release">Release</label>
                <input type="text" name="release" id="release" required value="<?= $film["release"]; ?>" required class="form-control">
            </li>
            <li>
                <label for="gambar">Gambar</label> <br>
                <img src="img/<?= $film["gambar"]; ?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar" required class="form-control">
            </li>
            <br>
            <li>
                <button type="submit" name="submit" class="btn btn-dark">Update data!</button>
            </li>
        </ul>
</form>
    </div>

</body>
</html>