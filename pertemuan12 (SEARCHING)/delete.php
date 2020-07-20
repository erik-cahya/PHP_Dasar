<?php
require 'functions.php';

$id = $_GET["id"];

// cek apakah data berhasil dihapus atau tidak menggunakan javascript
if (delete($id) > 0) {
  echo "
    <script>
    alert('data berhasil dihapus');
     document.location.href = 'index.php';
  </script> 
  ";
} else {
  echo "
    <script>
    alert('Data Gagal Dihapus');
     document.location.href = 'index.php'; 
  </script>
  ";


  //untuk menampilkan pesan error di mysql
  // $del = mysqli_error($db_conn);
  // var_dump($del);
};
