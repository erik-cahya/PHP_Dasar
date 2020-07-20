<?php 
// cara mencetak salah satu isi dari array multidimensi
// ini arraynya
$hari = [["Senin","Selasa","Rabu"], [1, 2, 3], ["Kamis","Jumat",4]];
//ini cara menampilkannya (akan menampilkan data "kamis")
// echo $hari[2][0]; 
// [2] : nomor index posisi pembungkus array "kamis"
// [0] : nomor index posisi data kamis itu sendiri
?>


<!DOCTYPE html>	
<!-- -------------Menggunakan foreach(); -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#kotak{
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			float: left;
			margin: 5px;
			
			/*kita tambahkan animasi*/
			transition: 1.2s;
			cursor: pointer;
		}
		#kotak:hover{ /*agar ada efek ketika mouse lewat diatasnya*/
			transform:rotate(360deg);
			border-radius: 50%;
		}

		.clear_float{
			clear: both; /*untuk clear float */
		}

	</style>
</head>
<body>
<!-- foreach khusus untuk array yang bersarang / datanya lebih dari 1 -->


<?php foreach ($hari as $day) : ?>
<div class="clea_float"></div>
	
	<?php foreach ($day as $x ) : ?>
		<?php echo $x; ?>
	<?php endforeach; ?>
	
<?php endforeach; ?>	


</body>
</html>








