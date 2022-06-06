<?php 
require '../functions.php';

$keyword2 = $_GET["keyword"];

$query = "SELECT * FROM film
            WHERE
        nama_film LIKE '%$keyword2%' OR
        genre LIKE '%$keyword2%'
    ";
$film = query($query);
?>
<table class="table table-secondary" border="1" cellpadding="10" cellspacing="0">
    <thead class="table-dark">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
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
        <td>
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