<?php
// koneksi ke database
$db_conn = mysqli_connect(
  $host     = "localhost",
  $user     = "root",
  $password = "",
  $database = "db_php-dasar"
);

// query data dari tabel
$result = mysqli_query($db_conn, "SELECT * FROM tb_mahasiswa");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css" type="text/css">

  <!-- bootsrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>

<body>
  <h1>List Daftar Mahasiswa !!</h1>

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
    <?php while ($data_mhs = mysqli_fetch_assoc($result)) : ?>


      <tbody>
        <th scope="row"><?= $number; ?></th>
        <td><?= $data_mhs["nim"]; ?></td>
        <td><?= $data_mhs["name"]; ?></td>
        <td><?= $data_mhs["email"]; ?></td>
        <td><?= $data_mhs["jurusan"]; ?></td>
        <td><img src="img/<?= $data_mhs["gambar"]; ?>" width="25"></td>
        <td>
          <a href="#">Edit</a> |
          <a href="#">Delete</a>
        </td>
      </tbody>


      <?php $number++; ?>
    <?php endwhile; ?>


  </table>

</body>

</html>