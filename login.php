<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"]) ) {
    header('Location: index.php');
    exit;
}



if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman login</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">
<h1>login</h1>
<?php if( isset($error) ) : ?>
    <p style="color: red; font-style: italic;">username atau password salah</p>
<?php endif; ?>
    <form action="" method="post">
        <div class="user-box">
            <i class="uil uil-user"></i>
            <label for="username"></label>
            <input type="text" placeholder="username" name="username" id="username" required>
        </div>
        <div class="user-box">
            <i class="uil uil-unlock"></i>
            <label for="password"></label>
            <input type="password" placeholder="password" name="password" id="password" required>
        </div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
            <br>
            <button type="submit" name="login" class="button">login</button>

    </form>
</div>
</body>
</html>