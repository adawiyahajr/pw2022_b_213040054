<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerhalaman = 5;
$jumlahData = count(query("SELECT * FROM film"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;

$film = query("SELECT * FROM film LIMIT $awalData, $jumlahDataPerhalaman");

// tombol cari ditekan
if( isset($_POST["submit"]) ) {
    $film = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman admin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <a href="logout.php" class="logout">Logout</a> | <a href="cetak.php">Cetak</a>
    <style>
        @media print {
            .logout, .tambah, .form-cari, .navbar, .navigasi, .aksi {
                display: none;
            }
        }
    </style>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Notflix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php">Home</a></li>
                    <li><a class="dropdown-item" href="tambah.php" class="tambah">Tambah data</a></li>
                </ul>
            </li>
                <li class="nav-item">
            </ul>
        <form action="" method="post" class="form-cari">
            <input class="form-control me-2" type="text" name="keyword" autofocus placeholder="Search" aria-label="Search" autocomplete="off" id="keyword">
            <button class="btn btn-outline-light" type="submit" name="submit" id="tombol-cari">Search</button>

        </form>
        </div>
    </div>
    </nav>
    <br>

<!-- navigasi -->
<div class="navigasi">
<?php if( $halamanAktif > 1 ) : ?>
<a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
    <?php if( $i == $halamanAktif ) : ?>
    <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i ?></a>
    <?php else : ?>
        <a href="?halaman=<?= $i; ?>"><?= $i ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
<a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
<?php endif; ?>
<br>
</div>

<div id="container">
<div class="wrapper">
<table class="table table-secondary" border="1" cellpadding="10" cellspacing="0">
    <thead class="table-dark">
    <tr>
        <th>No.</th>
        <th class="aksi">Aksi</th>
        <th>Gambar</th>
        <th>Nama film</th>
        <th>Sutradara</th>
        <th>Genre</th>
        <th>Release</th>
    </tr>
    </thead>

    <?php $i = 1; ?>
    <?php foreach( $film as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td class="aksi">
            <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-success btn-sm">ubah</a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda yakin?');" class="btn btn-danger btn-sm">delete</a>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="70"></td>
        <td><?= $row["nama_film"]; ?></td>
        <td><?= $row["sutradara"]; ?></td>
        <td><?= $row["genre"]; ?></td>
        <td><?= $row["release"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</table>
</div>
</div>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>