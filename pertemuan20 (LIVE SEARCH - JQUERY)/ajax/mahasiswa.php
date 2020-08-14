<?php 

 require '../functions.php';

//  agar isi manipulasi loading
// dengan sleepkan dulu webnya baru kirimkan datanya
sleep(1);


 $keyword = $_GET["keyword"];

 $query = "SELECT * FROM tb_mahasiswa
            WHERE
            name LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' OR
            email LIKE '%$keyword%'
            ";
 $mahasiswa = query($query);

 

?>
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