<?php 
// function isset();
// cek apakah ada data pada $_GET
// isset adalah sebuah function yang dimana untuk mengecek apakah sebuah variabel sudah di bikin atau belum

// tanda seru "!" artinya not, berarti code dibawah mengartikan jika data $_GET["nama"] belum dibikin, maka lakukanlah sesuatu
if( !isset($_GET["gambar"]) || !isset($_GET["name"]) || !isset($_GET["induk"]) || !isset($_GET["class"]))
// arti tanda double pipe (||) adalah or / atau
{
	//redirect : berfungsi untuk mengalihkan dari halaman yang di akses ke halaman tertentu / seperti internet positif
	header("Location: Latihan1.php");
	exit; //berfungsi agar code dibawahnya tidak di eksekusi
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Detail Mahasiswa</title>
	<style>
		img{
			width: 100px;
			height: 200px;
		}

	</style>
</head>
<body>
	
	<ul>
		<li><img src="img/<?= $_GET["gambar"];?>"></li>
		
		<li><?= $_GET["name"];?></li>
		<li><?= $_GET["induk"];?></li>
		<li><?= $_GET["class"];?></li>
	</ul>

<h5><a href="latihan1.php">Kembali ke daftar mahasiswa</a></h5>
</body>
</html>