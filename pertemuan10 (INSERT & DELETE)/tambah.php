<?php

require 'functions.php';

// cek apakah tombol kirim data sudah di tekan atau belum
if (isset($_POST["kirim"])) {

  // cek apakah data berhasil ditambahkan atau tidak menggunakan javascript
  if (add_data($_POST) > 0) {
    echo "
      <script>
        alert('data berhasil ditambahkan');
         document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
    <script>
      alert('data gagal ditambahkan');
      document.location.href = 'tambah.php';
    </script>
  ";
  }
}
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
          <input type="text" name="nim" id="nim" required>
        </label>
        <!-- required : digunakan agar user harus memasukkan nilai di dalam field/field tidak boleh kosong -->
      </li>

      <li>
        <label for="name">
          Nama :
          <input type="text" name="name" id="name" required>
        </label>
      </li>

      <li>
        <label for="email">
          Email :
          <input type="text" id="email" name="email" required>
        </label>
      </li>

      <li>
        <label for="jurusan">
          Jurusan :
          <input type="text" id="jurusan" name="jurusan" required>
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