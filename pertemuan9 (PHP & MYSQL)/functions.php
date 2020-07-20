<?php 
// ini adalah file yang berisi sekumpulan function, yang nantinya akan dipanggil di index.php
// sehinngga funtionnya tidak numpuk di index.php



// koneksikan ke database
$database = mysqli_connect("localhost", "root", "", "db_phpdasar");

// panggil function query yang ada pada index.php
function query($query)
{
	global $database;
	// 2 parameter : koneksi & string query
	$result = mysqli_query($database, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) )
	{
		$rows[] = $row;
	}
	return $rows;
}

 ?>