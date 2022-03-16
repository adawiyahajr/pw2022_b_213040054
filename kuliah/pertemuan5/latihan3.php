<?php 
$mahasiswa = [
    ["Adawiyah ajriah", "213040054", "Teknik informatika", "adawiyah.213040054@mail.unpas.ac.id"],
    ["Emilia paradila", "213040043", "Teknik informatika", "emilia.213040043@mail.unpas.ac.id"],
    ["Najwa septiana", "213040041", "Teknik informatika", "najwa.213040041@mail.unpas.ac.id"]
];

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
    <li>Nama : <?= $mhs[0]; ?></li>
    <li>NRP :<?= $mhs[1]; ?></li>
    <li>Jurusan :<?= $mhs[2]; ?></li>
    <li>Email :<?= $mhs[3]; ?></li>
</ul>
<?php endforeach; ?>

</body>
</html>