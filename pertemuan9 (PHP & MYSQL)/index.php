<?php

// hubungkan ke functions.php
require 'functions.php';

// query(mengambil data)
// query yang berisi perintah mysql yang akan dilakukan & semua mekanisme querynya ada pada functions.php
$mahasiswa = query("SELECT * FROM tb_buku");

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Data Buku</title>
</head>

<body>
	<h1>Data Buku !!</h1>

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
		<?php foreach ($mahasiswa as $data_mhs) : ?>

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
		<?php endforeach; ?>

	</table>
</body>

</html>