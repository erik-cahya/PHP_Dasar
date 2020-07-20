<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POST</title>
</head>
<body>	

<!-- Agar nama yang muncul sesuai dengan nilai data yang kita isikan : -->	
	<h1>Halo, Selamat Datang <?= $_POST["nama"];?> !!</h1> 
<!-- artibut name="" pada tag input yang bertindak sebagai key-nya -->
<br>

<!-- membuat tombol kembali -->
<form action="latihan3.php" method="post">
	<button type="submit">Tekan Untuk Kembali</button>	
</form>


</body>
</html>