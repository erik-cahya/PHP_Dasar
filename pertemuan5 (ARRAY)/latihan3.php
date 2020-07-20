<?php
// membuat array dan ditampilkan di dalam html untuk user

// Array Dengan 1 Data
$student_data = ["Erik Cahya Pradana", "190030209", "Sitem Informasi", "CA193"];
// Array Dengan Data lebih Dari 1
$book_data = 
[
	["Membuat Sistem E-Learning Dengan PHP", "19 Februari 2019", "BK2265"],
	["Membuat E-Banking Dengan PHP", "5 November 2025", "BN5658"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Data Mahasiswa ITB STIKOM BALI</title>					
	
</head>
<body>
<h1>Data Mahasiswa</h1>

<!-- Cara 1 Untuk Menampilkan dengan menggunakan foreach -->

<ul>
	<b>
	<?php foreach ( $student_data as $student) : ?>
		<li> <?php echo $student; ?> </li>
	<?php endforeach; ?>
	</b>
</ul>

<br>
<br>




<!-- Cara 2 - Untuk menampikan data, yang dimana data di dalam array lebih dari 1 (menggunakna index data) -->
<!-- $book[0]; [0] adalah index -->
<h1> Daftar Buku Baru Perpustakaan </h1>


<?php foreach($book_data as $book) : ?>

<ul>
	<li><b>Judul Buku : </b><?= $book[0]; ?></li>
	<li><b>Tanggal Terbit : </b> <?= $book[1]; ?></li>
	<li><b>Kode Buku : </b> <?= $book[2]; ?></li>
</ul>

<?php endforeach; ?>


	
</body>
</html>