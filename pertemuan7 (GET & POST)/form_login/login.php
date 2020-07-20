<?php 
// cek apakah tombol login sudah ditekan atau belum
if( isset($_POST["login"]))
{
	// cek apakah username & password benar | username : admin & passwordnya : 123
	if( $_POST["username"] == "admin" && $_POST["password"] == "123")
	{
	// jika benar, user akan redirect ke halaman admin.php
		header("Location: admin.php");
		exit;
	}
	else
	{
	// jika salah, tampilkan pesan kesalahan
	$error = true;
	}
	
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page Simple</title>
</head>
<body>
<h1>Simple Login Page !!</h1>



<?php if( isset($error) ) : ?>
	<p>Username/Password Salah</p>
<?php endif; ?>


<ul>
<form action="" method="post">
	
<li>
	<!-- fungsi for="" agar label dengan input saling terhubung 1 sama lain, input dihubungkan dengan artibut id="" sedangkan label dengan artibut for="" -->
	<label for="username">Masukkan Username : 
		<input type="text" name="username" id="username"> 		
	</label>
</li>
<br>	
<li>
	<label for="password">Masukkan Password  : 
		<input type="password" name="password" id="password">
	</label>
</li>
	
	<button type="submit" name="login">LOGIN!</button>




</form>
</ul>


</body>
</html>