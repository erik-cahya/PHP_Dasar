<?php
session_start();

// jika tidak ada user yang melakukan login, maka tendang ke login.php
// atau agar user tidak bisa langsung mengakses index.php sebelum melakukan login terlebih dahulu
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

// require & include dapat digunakan untuk menghubungkan 2 file index.php ke functions.php

// menghubungkan ke functions.php
require 'functions.php';

// query yang berisi perintah mysql yang akan dilakukan & semua mekanisme querynya ada pada functions.php
$mahasiswa = query("SELECT * FROM tb_mahasiswa");

// ketika tombol cari di klik maka lakukan ini
// "cari : sesuaikan dengan tag name pada <button>"
if (isset($_POST["cari"])) {
  $mahasiswa = search($_POST["keyword"]);
};

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css" type="text/css">

  <style>
    .loader{
      position: absolute;
      width: 150px;
      z-index: -1;
      top: 85px;
      right: 650px;
      display: none;
    }
  </style>

  <!-- bootsrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>

<body>
  <a href="logout.php">Logout</a>

  <h1>List Daftar Mahasiswa !!</h1>
  <br>
  <br>




  <form action="" method="POST">
    <!-- size : untuk mengatur ukuran panjang search -->
    <!-- autofocus : agar kolom search otomatis aktif ketika user masuk ke halaman site -->
    <!-- autocomplete="off  " : untuk menghilangkan history pencarian -->
    <input type="text" name="keyword" size="80" placeholder="Cari Data" autofocus autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Search Data</button>

  <img src="img/loader.gif" class="loader">

  </form>





  <br>

<div id="container">
  <table class="table table-bordered">

    <thead class="thead-dark">
      <tr>
        <th scope="col">NO</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Profile Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <?php $number = 1; ?>
    <?php foreach ($mahasiswa as $data_mhs) : ?>

      <tbody>
        <th scope="row"><?= $number; ?></th>
        <td><?= $data_mhs["nim"]; ?></td>
        <td><?= $data_mhs["name"]; ?></td>
        <td><?= $data_mhs["email"]; ?></td>
        <td><?= $data_mhs["jurusan"]; ?></td>
        <td><img src="img/<?= $data_mhs["gambar"]; ?>" width="25"></td>
        <td>
          |
          <a href="ubah.php?id=<?= $data_mhs["id"]; ?>">Edit</a> |

          <!-- Implementasi hapus data ini, dengan cara mengirimkan data "id" yang tersimpan di dalam id $mahasiswa -->
          <!-- onclick : berfungsi untuk menampilkan pesan konfirmasi sebelum terhapus dengan cara mengembalikkan nilai true ataupun false -->
          <a href="delete.php?id=<?= $data_mhs["id"]; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');">Delete</a> |
          <br>|

          <a href="tambah.php">Add Data</a>|
        </td>
      </tbody>


      <?php $number++; ?>
    <?php endforeach; ?>


  </table>
  </div>






<!-- File JQuery -->
<script src="js/jquery-3.5.1.min.js"></script>


<!-- File Javascript -->
<script src="js/script.js">
</script>
</body>

</html>