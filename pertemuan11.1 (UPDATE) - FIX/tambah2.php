<?php

// koneksi ke database 
$db_conn = mysqli_connect("localhost", "root", "", "db_php-dasar");

// cek apakah tombol kirim data sudah di tekan atau belum
if (isset($_POST["kirim"])) {
  // ambil data dari tiap element di dalam form
  // sesuaikan dengan tag "name" di dalam form
  $nim = $_POST["nim"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $jurusan = $_POST["jurusan"];
  $gambar = $_POST["gambar"];

  // query insert data
  $query = "INSERT INTO tb_mahasiswa
            VALUES ('', '$nim', '$name', '$email','$jurusan','$gambar')
            ";

  // 2 parameter, koneksi dan query mysql
  mysqli_query($db_conn, $query);

  // cek apakah data berhasil ditambahkan atau tidak 
  // mysqli_affected_rows : digunakan untuk mengetahui apakah ada baris data yang berhasil dirubah/ditambahkan atau tidak. Dengan cara mengetahui nilai value yang dihasilkan (jika nilainya -1 : maka gagal, dan jika 1 : maka berhasil dirubah)
  if (mysqli_affected_rows($db_conn) > 0) {
    echo "Data Berhasil Ditambahkan";
  } else {
    echo "Gagal";
    echo "<br><br>";
    // untuk menampilkan pesan kesalahan sql
    echo mysqli_error($db_conn);
  };
}

// pesan data telah berhasil di submit
// if (isset($_POST["kirim"])) {
//   
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Daftar Mahasiswa Baru</title>
</head>

<body>

  <h1>Input Data Mahasiswa</h1>

  <form action=" " method="POST">

    <ul>
      <li>
        <label for="nim">
          NIM :
          <input type="text" name="nim" id="nim">
        </label>
      </li>

      <li>
        <label for="name">
          Nama :
          <input type="text" name="name" id="name">
        </label>
      </li>

      <li>
        <label for="email">
          Email :
          <input type="text" id="email" name="email">
        </label>
      </li>

      <li>
        <label for="jurusan">
          Jurusan :
          <input type="text" id="jurusan" name="jurusan">
        </label>
      </li>

      <li>
        <label for="image">
          Foto Profil :
          <input type="text" id="image" name="gambar">
        </label>
      </li>

      <li>
        <button type="submit" name="kirim"> Kirim Data!! </button>

      </li>

    </ul>
  </form>
  <form action="index.php">
    <button type="submit">Kembali</button>
  </form>

</body>

</html>