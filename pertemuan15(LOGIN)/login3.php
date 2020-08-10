<?php
require 'functions.php';

// cek apakah tombol login sudah ditekan?
// jika sudah lakukan perintah di bawah ini
if (isset($_POST["login"])) {
    if (login($_POST) > 0) {
        header("Location:index.php");
    } else {
        echo "user yang anda masukkan salah";
    }
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
            <br>
            <button type="submit" name="login">Login</button>

        </ul>

    </form>
</body>

</html>