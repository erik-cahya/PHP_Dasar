<?php 
// Variabel SuperGlobal 
// Adalah variabel yang sudah dimiliki oleh php yang bisa kita gunakan langsung pada file php kita
// Macam" Variabel SuperGlobal : $_GET, $_REQUEST, $_POST, $_SESSION, $_COOKIE, $_SERVER, $_ENV (enviranment)
// dan semua variabel tersebut sifatnya variabel associative

//--- $_GET ----
// Cara mengisi variabel $_GET
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		$mahasiswa = 
		[
			[
				"nama"		=> "Erik Cahya Pradana",
				"nim"		=> "190030209",
				"kelas"		=> "CA193",
				"profil"	=> "image1.jpg"
			],
			[
				"nama"		=> "Kadek Indah",
				"nim"		=> "19002035",
				"kelas"		=> "CA193",
				"profil"	=> "image2.jpg"
			]
		];
	
	?>
	
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Data Mahasiswa</h1>
	<ul>
		<?php foreach( $mahasiswa as $mhs) : ?>
			
			<li>
				
<a href="latihan2.php?gambar=<?= $mhs["profil"];?>&name=<?= $mhs["nama"];?>&induk=<?= $mhs["nim"];?>&class=<?= $mhs["kelas"];?>"> 
					
					<?= $mhs["nama"];?>
				
				</a>
			
			</li>

		<?php endforeach; ?>
	</ul>
</body>
</html>

