<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POST</title>
</head>
<body>

<!-- cara baca : -->
<!-- saya mau bikin sebuah form, yang form ini menggunakna metode requestnya post, dan semua data di dalam formnya akan dikirimkan ke halaman latihan4.php	 -->

<form action="latihan4.php " method="post">
	Masukkan Nama Anda : 
	<input type="text" name="nama"> <!-- name="nama" bertindak sebagai key pada vaiabel $_POST -->
	<br>
	<button type="submit" name="submit">Kirim!</button>
</form>
<h1>================================================================================================</h1>
<!-- code lain -->
<!-- apa jadinya jika tidak ada artibut action=""?? maka secara otomatis ia mengirimkan datanya ke dirinya sendiri/ ke halaman ini -->


<!-- agar tidak ada pesan error -->
<?php if( isset($_POST["submit"]) ) : ?>
	<h1>NIK Anda Adalah : <?= $_POST["nim"];?></h1>
<?php endif; ?>
<!-- cara bacanya isset diatas :
apakah tombol submit sudah di pencet atau belum, kalau sudah di pencet,tampilkan <h1> NIK Anda Adalah ..... , kalau belum jangan tampilkan / kosong  -->

<form action=" " method="post">
	Masukkan NIM Anda :
	<input type="text" name="nim">
	<br>
	<button type="submit" name="submit">Munculkan!!</button>
</form>

</body>
</html>