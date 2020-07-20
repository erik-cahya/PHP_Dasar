<?php 
// Menampilkan Data Array untuk user
// menggunkan sytax for(); / foreach();

$angka = [1,2,3,4,5,6,7,8];
$names =	["Erik", 123, 321, 456, 654];

?>

<!DOCTYPE html> <!-- file html yang digunakan untuk menampilkan ke user -->
<html lang="en">
<head>
	<title>Show Data Array</title>
	
	<style>
		#kotak {
			background: salmon;
			width: 80px;
			height: 80px;
			line-height: 80px; /*agar content/tulisan tepat berada di tengah dan ukuran sama dengan ukuran height (horizontal position*/
			text-align: center; /*agar content/tulisan tepat berada di tengah (vertical position*/
			float : left; /*agar saat menambah content baru jejer kesamping*/
			margin: 5px; /*untuk memberi jarak antar content agar tidak dempet*/
		}
		#clear{
			clear: both; /*untuk meng-clear style pada suatu css / memberi spasi antara cara 1 & cara 2*/ 
		}
	</style>

</head>
<body>


<!-- --------------------------------------------------------------------------------------------- cara 1 -->
<?php for($i=0; $i < count($angka); $i++) { ?> 
	<!-- count berfungsi agar php menghitung sendiri jumlah data pada variabel $angka -->
<div id="kotak"> <?php echo$angka[$i]; ?> </div>
<?php  } ?>
<!-- --------------------------------------------------------------------------------------------- akhir cara 1 -->


<div id="clear"></div>


<!-- --------------------------------------------------------------------------------------------- cara 2 -------->	
<?php foreach ($names as $name) { ?>
	<div id="kotak"><?php echo $name ?></div>
<?php } ?>
<!-- --------------------------------------------------------------------------------------------- akhir cara 2 -->

<div id="clear"></div>

<!-- --------------------------------------------------------------------------------------------- cara 3 -------->	
<?php foreach ($names as $name) : ?>
	<div id="kotak"><?= $name ?></div> <!-- syntax "php echo" bisa kita ganti dengan "=" sehingga tulisan lebih ringkas -->
<?php endforeach; ?>

<!-- --------------------------------------------------------------------------------------------- akhir cara 3 -->

</body>
</html>









