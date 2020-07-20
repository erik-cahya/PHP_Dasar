<?php 
	/* --arti pesan error --
	
	parameter : adalah string/data yang dimasukkan ke dalam tanda kurung. ex: date("parameter").*/

	// Date
	// Untuk menampilkan tanggal dengan format tertentu
	// echo date("l, d-M-Y");

	// Time
	// UNIX Timestamp / EPOCH Time
	// echo time()

	
	// function untuk menampilkan/menghitung hari
	// ex : menghitung 100 hari kemudian dari hari ini
	// 	echo date("l", time()+60*60*24*100); //artinya : 60dtk * 60menit/1menit * 24jam/1hari * 100hari
	// 	echo "<p>";
	// ex : menghitung 100 hari kebelakang dari hari ini
	// 	echo date("d M Y", time()-60*60*24*100); 

	// mktime
	// function untuk membuat sendiri dari  tahun 1970 sampai sekarang
	// mktime(0,0,0,0,0,0)
	// jam, menit, detik, bulan, tanggal, tahun
	echo date("l", mktime(0,0,0,05,04,2001));

 ?>