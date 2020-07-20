<?php
// Ini adalah tag untuk koneksi ke MySql
// mysqli_connect("database", "username mysql", "password mysql", "database yang akan dikoneksikan");

$conn = mysqli_connect("localhost", "root", "", "db_phpdasar");

// $conn adalah variabel yang mewakilkan koneksi ke database


// ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM tb_buku");

// ambil data (fetch) mahasiswa dari object $result
// ada 4 cara :
// mysqli_fetch_row() : mengembalikan array secara numerik (menggunakan index)
// mysqli_fetch_assoc() : mengembalikan array secara associative
// mysqli_fetch_array() : mengembalikan array menggunakan keduanya (numerik & associative)
// mysqli_fetch_object() : mengembalikan array secara object

// while ($data_mhs = mysqli_fetch_assoc($result))
// {
// 	var_dump($data_mhs["nama"]);

// 	var_dump($data_mhs["email"]);
// };





// syntax untuk menampilkan pesan error pada database
// if( !$result) {
// 	echo mysqli_error($conn);
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Data Mahasiswa</title>
</head>

<body>
	<h1>Data Mahasiswa !!</h1>

	<table border="1" cellpadding="10" cellspacing="0" style="text-align: center;">



		<tr>
			<th>No.</th>
			<th>Action</th>
			<th>Judul Buku</th>
			<th>Penerbit</th>
			<th>Tahun Terbit</th>
			<th>Tebal Halaman</th>
			<th>Gambar Buku</th>
		</tr>



		<?php $no = 1; ?>
		<!-- untuk menampilkan tabel "no" -->
		<?php while ($data_mhs = mysqli_fetch_assoc($result)) : ?>
			<tr>
				<td><?= $no; ?></td>
				<td><a href="#"> Edit </a> | <a href="#">Delete</a></td>
				<td><?= $data_mhs["judul_buku"]; ?></td>
				<td><?= $data_mhs["penerbit"]; ?></td>
				<td><?= $data_mhs["tahun_terbit"]; ?></td>
				<td><?= $data_mhs["tebal_halaman"]; ?></td>
				<td><img src="img/<?= $data_mhs["gambar"]; ?>" width="50"></td>


			</tr>
			<?php $no++; ?>
			<!-- agar angka selalu menambah 1 -->
		<?php endwhile; ?>

	</table>
</body>

</html>