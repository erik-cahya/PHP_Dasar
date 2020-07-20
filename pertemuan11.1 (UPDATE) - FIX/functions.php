<?php
// koneksi ke database
$db_conn = mysqli_connect(
  $host     = "localhost",
  $user     = "root",
  $password = "",
  $database = "db_php-dasar"
);

// mekanisme function untuk query
function query($mekanisme_query)
{
  global $db_conn;

  // berisi 2 parameter : koneksi(db_conn) & string query($mekanisme_quey)
  $result = mysqli_query($db_conn, $mekanisme_query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


// $data : digunakan untuk menampung data post yang dikirimkan
// mekanisme fucntion untuk tambah data
function add_data($data)
{
  global $db_conn;

  // ambil data dari tiap element di dalam form
  // sesuaikan dengan tag "name" di dalam form
  $nim = htmlspecialchars($data["nim"]);
  $name = htmlspecialchars($data["name"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar = htmlspecialchars($data["gambar"]);

  // htmlspecialchars : digunakan agar ketika user memasukkan script html, script html terebut tidak berjalan atau di ekesekusi

  // query insert data
  $query = "INSERT INTO tb_mahasiswa
   VALUES ('', '$nim', '$name', '$email','$jurusan','$gambar')
   ";

  // 2 parameter, koneksi dan query mysql
  mysqli_query($db_conn, $query);

  // untuk mengembalikan nilai 1 atau -1 yang akan digunakan untuk menampilkan pesan error pada mysql
  return mysqli_affected_rows($db_conn);
}


function delete($id)
{
  global $db_conn;
  $del = mysqli_query($db_conn, "DELETE FROM tb_mahasiswa WHERE id=$id");

  return mysqli_affected_rows($db_conn);
}









// $data : digunakan untuk menampung data post yang dikirimkan
function ubah($data)
{
  global $db_conn;

  // ambil data dari tiap element di dalam form
  // sesuaikan dengan tag "name" di dalam form
  $id = $data["id"];
  $nim = htmlspecialchars($data["nim"]);
  $name = htmlspecialchars($data["name"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar = htmlspecialchars($data["gambar"]);

  // htmlspecialchars : digunakan agar ketika user memasukkan script html, script html terebut tidak berjalan atau di ekesekusi

  // query insert data
  $query = "UPDATE tb_mahasiswa SET  
              nim = '$nim',
              name = '$name',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
            
            WHERE id = $id;
            ";

  // 2 parameter, koneksi dan query mysql
  mysqli_query($db_conn, $query);

  // untuk mengembalikan nilai 1 atau -1 yang akan digunakan untuk menampilkan pesan error pada mysql
  return mysqli_affected_rows($db_conn);
}
