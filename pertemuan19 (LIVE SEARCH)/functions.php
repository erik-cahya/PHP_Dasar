<?php
// koneksi ke database
$db_conn = mysqli_connect(
  $host     = "localhost",
  $user     = "root",
  $password = "",
  $database = "db_php-dasar"
);

// mekanisme function untuk query / ambil data
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

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }


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

function upload()
{

  // ['gambar'] didapat dari name pada html
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];


  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
      alert('pilih gambar terlebuh dahulu');
      </script>";
    return false;
  }

  // =============== cek apakah yang diupload adalah gambar
  // dengan cara mengecek ekstensi gambar yang diupload
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

  //  ambil ekstensi gambar yang diupload
  // explode : digunakan untuk memecah sebuah string
  // sehingga ketika memiliki sebuah file dengan nama erik.jpg -> akan diubah menjadi $string =[erik][jpg]
  $ekstensiGambar = explode('.', $namaFile);

  // end : agar yang diambil adalah ekstensi paling akhir
  // strtolower : agar nama file menjadi huruf kecil semua
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  //  in_array : untuk mengecek apakah file yang diupload sesuai dengan yang ada di dalam $ekstensiGambarValid
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
      alert('file anda bukan gambar')
      </script>";
    return false;
  }

  //  =================== cek jika ukurannya terlalu besar (pembatas ukuran file) dalam kelipatan byte
  if ($ukuranFile > 2000000) {
    echo "<script>
      alert('ukuran gambar terlalu besar')
      </script>";
    return false;
  }

  // lolos pengecekan & gambar siap diupload
  // generate nama gambar baru
  // uniqid : digunakan untuk men-generate string random agar tidak ada nama gambar yang sama ketika di upload
  $namaFileBaru = uniqid();
  // tambahkan ekstesi file didepannya
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
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
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }


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



// function search yang nanti datanya akan ditangkap di $keyword
function search($pencarian)
{
  $query = "SELECT * FROM tb_mahasiswa
              WHERE
              name LIKE '%$pencarian%' OR
              nim LIKE '%$pencarian%' OR
              jurusan LIKE '%$pencarian%' OR
              email LIKE '%$pencarian%'
          ";

  return query($query);
}

// function register 
// function ini menerima inputan data dari $_POST dan ditangkan di sini dan dimasukkan ke dalan $data
function register($data)
{
  global $db_conn;

  // ambil data dari $_POST dan diambil oleh $data dan dimasukkan ke sini ($username, $password, $password2)
  // stripslashes : untuk membersihkan backslash yang diinputkan oleh user
  // strtolower : memaksa agar inputan user menjadi huruf kecil semua
  // mysqli_real_escape_string : agar ketika user memasukkan tanda kutip('), maka tanda kutipnya akan disimpan di database secara aman & membutuhkan 2 parameter, yaitu koneksi dan data

  $username = stripslashes(strtolower($data["username"]));
  $password = mysqli_real_escape_string($db_conn, $data["password"]);
  $password2 = mysqli_real_escape_string($db_conn, $data["password2"]);

  // cek verifikasi username
  // dengan cara query dlu datanya dan simpan di dalam variabel result
  $result = mysqli_query($db_conn, "SELECT username FROM tb_users WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
          alert('username sudah tersedia');
          </script>";
    return false;
  };



  // cek verifikasi password
  if ($password !== $password2) {
    echo "<script>
          alert('Password yang anda masukkan tidak sama');
          </script>";

    return false;
  };

  // enkripsi password 
  // password_hash : metode yang digunakan untuk meng-enkripsi password, & menggunakan 2 parameter, yaitu (password yang akan di enksripsi & algoritma yang akan digunakan )
  $password = password_hash($password, PASSWORD_DEFAULT);

  // masukkan data ke dalam database
  mysqli_query($db_conn, "INSERT INTO tb_users VALUES('','$username','$password')");
  return mysqli_affected_rows($db_conn);
}
