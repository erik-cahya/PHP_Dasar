<?php
// jalankan dulu session
session_start();

require 'functions.php';

// cek dulu cookienya
// jika ada cookie, maka jalankan session
if(isset($_COOKIE['id']) && isset($_COOKIE['key']) )
{
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // sekarang kita akan mencari data mahasiswa yang sesuai dengan id diatas
    // jika dapat, bandingkan usernamenya dengan $_COOKIE['key'] ini 

    // ambil username berdasarkan id
    $result = mysqli_query($db_conn, "SELECT username FROM tb_users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek kesamaan cookie dengan username
    if( $key === hash('sha256', $row['username']) )
    {
        $_SESSION['login'] = true;
    }

}

// jika user sudah melakukan login, maka user tidak dapat mengakses halaman login lagi
if (isset($_SESSION['login']))
{
    header("Location: index.php");
    exit;
}



if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db_conn, "SELECT * FROM tb_users WHERE username = '$username'");

    // cek username
    // mysqli_num_rows : ini digunakan untuk menghitung berapa baris yang dikembalikan dari fungsi "SELECT * FROM ", 
    // kalau ketemu, nilai = 1 (kalau ada username di dalam tabel user), kalau tidak ada nilainya = 0 
    if (mysqli_num_rows($result) === 1) 
    {

        // cek password
        $row = mysqli_fetch_assoc($result);
        // password_verify : mengecek apakah sebuah string sama atau tidak dengan hash 
        // parameter ada 2 : yaitu string yang belum diacak, dan string yang sudah diacak(hash)
        if (password_verify($password, $row["password"])) 
        {

            // set session 
            $_SESSION["login"] = true;

            // Cek Remember Me / Cookie
            if (isset($_POST["remember"])) 
            {
                // buat cookie
                setcookie('id',$row["id"], time() + 60);
                setcookie('key', hash('sha256',$row['username']), time() + 60);
            }

            // header : adalah fungsi redirect ke halaman tertentu
            // exit : berfungsi agar syntax php dibawahnya tidak dijalankan
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <h1>Login Page</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style:italic;">Username / password salah</p>
    <?php endif; ?>

    <form action="" method="POST">
        <ul>
            <li>
                <label>Username</label>
                <input type="text" name="username" id="username">
            </li>
            <br>
            <li>
                <label> Password </label>
                <input type="password" name="password" id="password">
            </li>

            <li>
                <input type="checkbox" name="remember" id="remember">
                <label> Remember Me</label>
            </li>


            <br>
            <button type="submit" name="login">Login</button>

        </ul>

    </form>
</body>

</html>