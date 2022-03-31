<?php 
// variabel scope / lingkup variabel
// $x = 10;

// function tampilX() {
//     global $x;
//     echo $x;
// }
// tampilX();

// SUPERGLOBALS
// variabel global milik PHP
// merupakan Array Associative

// $_GET
$mahasiswa = [
    [
        "nama" => "adawiyah ajriah",
        "NRP" => "213040054",
        "email" => "adawiyahajr@gmail.com",
        "jurusan" => "Teknik informatika",
        "gambar" => "satu.jpg"
    ],
    [
        "nama" => "salma salsabila",
        "NRP" => "213040054",
        "email" => "adawiyahajr@gmail.com",
        "jurusan" => "Teknik informatika",
        "gambar" => "dua.jpg"
    ]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>GET</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>
<ul>
<?php foreach( $mahasiswa as $mhs ) : ?>
    <li>
        <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=
        <?= $mhs["NRP"]; ?>&email=<?= $mhs["email"]; ?>
        &jurusan=<?= $mhs["jurusan"]; ?>$gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
    </li>
<?php endforeach; ?>
</ul>


</body>
</html>