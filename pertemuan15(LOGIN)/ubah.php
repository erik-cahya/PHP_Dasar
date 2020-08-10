<?php

require 'functions.php';

// Ambil data di URL
$id = $_GET["id"];

$mhs = query("SELECT * FROM tb_mahasiswa WHERE id = $id")[0];

// cek apakah tombol kirim data sudah di tekan atau belum
if (isset($_POST["kirim"])) {

    // cek apakah data berhasil diubah atau tidak menggunakan javascript
    if (ubah($_POST) > 0) {
        echo "
      <script>
        alert('data berhasil diubah');
         document.location.href = 'index.php';
      </script>
    ";
    } else {
        $error = mysqli_error($db_conn);
        var_dump($error);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Daftar Mahasiswa Baru</title>
</head>

<body>

    <h1>Ubah Data Mahasiswa</h1>

    <form action=" " method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"] ?>">

        <ul>
            <li>
                <label for="nim">
                    NIM :
                    <input type="text" name="nim" id="nim" value="<?= $mhs["nim"]; ?>" required>
                </label>
                <!-- required : digunakan agar user harus memasukkan nilai di dalam field/field tidak boleh kosong -->


            <li>
                <label for="name">
                    Nama :
                    <input type="text" name="name" id="name" value="<?= $mhs["name"]; ?>" required>
                </label>
            </li>

            <li>
                <label for="email">
                    Email :
                    <input type="text" id="email" name="email" value="<?= $mhs["email"]; ?>" required>
                </label>
            </li>

            <li>
                <label for="jurusan">
                    Jurusan :
                    <input type="text" id="jurusan" name="jurusan" value="<?= $mhs["jurusan"]; ?>" required>
                </label>
            </li>

            <li>
                <label for="image">
                    Foto Profil : <br>
                    <img src="img/<?= $mhs['gambar']; ?>" width="100px"><br>
                    <input type="file" id="image" name="gambar"><br>
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