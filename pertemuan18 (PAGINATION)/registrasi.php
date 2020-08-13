<?php
require 'functions.php';

// ketika tombol register sudah ditekan, maka jalankan function registrasi
if (isset($_POST["register"])) {

    // kalau datanya lebih dari 0, itu artinya ada data baru yang masuk ke dalam database
    // karena menggunakan mysqli_affected_rows
    if (register($_POST) > 0) {
        echo "  <script> 
                    alert('user baru berhasil ditambahkan !');
                </script>
            ";
    } else {
        echo mysqli_error($db_conn);
    };
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Halaman Registrasi</h1>

    <form action="" method="POST">

        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">

            </li>

            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>

            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2">
            </li>

            <li>
                <button type="submit" name="register">Sign Up</button>
            </li>
        </ul>

    </form>


</body>

</html>