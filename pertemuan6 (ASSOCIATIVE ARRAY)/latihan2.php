<?php 
// Array Associative
// Definisi : Tipe Data yang memiliki banyak nilai
// key-nya adalah sting yang kita buat sendiri

$mahasiswa = 
// indexnya diganti dengan string
[
// ini adalah array index ke 0	
	[
		"nama" 		=> "Erik Cahya Pradana",
		"kelas" 	=> "CA193",
		"nim" 		=> "190030209",
		"gambar"	=> "image1.jpg" //untuk menambahkan gambar
	],
// ini adalah array index ke 1		
	[
		"nama" 		=> "Louis",
		"kelas" 	=> "CA193",
		"nim" 		=> "19003256",
		"gambar"	=> "image2.jpg" //untuk menambahkan gambar
	]	
];

// echo $mahasiswa[0]["nama"]; 
// --------- panggil index arraynya dulu kemudian string arraynya
// --------- [0] : adalah index dari nama "erik cahya pradana"
// --------- [nama] : adalah sting array yang berisikan data erik cahya pradana untuk ditampilkan 

$books =
[
	["Internet Of Things","2008","ANDICOMP","Rp. 28.000"],
	["Bahasa Inggris","2012","STIKOM","Rp. 20.000"],
	["Modul Mikrotik","2005","Citra Web","Rp. 50.000"]
];

// tampilkan data diatas menggunakan html
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#kotak{
			width: 10%;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			float: left;
			margin: 5px;
		}
		#clear{
			clear: both;
		}
		img{
			width: 100px;
			height: 150px;

		}
		#decor{
			text-decoration: none;
		}

	</style>

</head>
<body>
<h1>Data Mahasiswa</h1>
<div id="decor">
<?php foreach ($mahasiswa as $mhs ) : ?>
	<ul>
		<li><img src="img/<?= $mhs["gambar"] ?>"></li>
		<li>Nama Mahasiswa : <?= $mhs["nama"]; ?> </li>
			<li>Kelas : <?= $mhs["kelas"]; ?> </li>
		<li>NIM : <?= $mhs["nim"]; ?> </li>
	</ul>
<?php endforeach; ?>
</div>
<br><br><br>

<?php fore



<h1>Data Buku</h1>

<?php foreach ($books as $book) : ?>
	<?php foreach ($book as $x) : ?>
		<div id="kotak"><?php echo $x; ?></div>
	<?php endforeach; ?>

<div id="clear"></div>
<?php endforeach; ?>



</body>
</html>
































