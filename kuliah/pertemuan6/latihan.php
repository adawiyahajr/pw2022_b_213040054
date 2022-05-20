<!DOCTYPE html>
<html>
<head>
    <title>Latihan array</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: lightgreen;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
            transition: 1s;
        }
        .kotak:hover {
            transform: rotate(180deg);
            border-radius: 50%;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>

<?php 
$angka = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];
?>

<?php foreach( $angka as $a ) : ?>
    <?php foreach( $a as $b) : ?>
        <div class="kotak"><?= $b; ?></div>
    <?php endforeach; ?>
    <div class="clear"></div>
<?php endforeach; ?>

</body>
</html>