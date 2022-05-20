<?php 
// $mahasiswa = [
//     ["adawiyah ajriah", "213040054", "adawiyahajr@gmail.com", "Teknik informatika"],
//     ["adawiyah ajriah", "213040054", "adawiyahajr@gmail.com", "Teknik informatika"]
// ];

// array associative
// definisinya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri
$mahasiswa = [
    [
        "nama" => "adawiyah ajriah",
        "NRP" => "213040054",
        "email" => "adawiyahajr@gmail.com",
        "jurusan" => "Teknik informatika",
        "gambar" => "satu.jpg"
    ],
    [
        "nama" => "adawiyah ajriah",
        "NRP" => "213040054",
        "email" => "adawiyahajr@gmail.com",
        "jurusan" => "Teknik informatika",
        "gambar" => "dua.jpg"
    ]
];
// echo $mahasiswa[1]["jurusan"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach( $mahasiswa as $mhs ) : ?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>">
        </li>
        <li>Nama : <?= $mhs["nama"]; ?></li>
        <li>NRP : <?= $mhs["NRP"]; ?></li>
        <li>jurusan : <?= $mhs["jurusan"]; ?></li>
        <li>email : <?= $mhs["email"]; ?></li>
    </ul>
    <?php endforeach; ?>

</body>
</html>