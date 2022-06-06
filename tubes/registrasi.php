<?php 
require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "phpdasar") or die(mysqli_error($conn));

if( isset($_POST["register"]) ) {
    global $conn;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $cek_login = mysqli_num_rows($cek_user);

    if( $cek_login > 0 ) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
            </script>";
    } else {
        if( $password != $password2 ) {
            echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
        return false;
        } else {
            mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
            echo "<script>
                alert('data berhasil dikirim');
            </script>";
        return mysqli_affected_rows($conn);
        }
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
    
    return mysqli_affected_rows($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
<div class="regist-box">
<h1>Halaman Registrasi</h1>

<form action="" method="post">
    <div class="user-box">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="user-box">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="user-box">
        <label for="password2">konfirmasi password</label>
        <input type="password" name="password2" id="password2">
    </div>
    <br>
        <button type="submit" name="register">Sign up!</button>
</form>
</div>

</body>
</html>