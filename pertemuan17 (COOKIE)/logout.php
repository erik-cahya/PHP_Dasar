<?php 
// fungsi untuk halaman logout
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;


?>