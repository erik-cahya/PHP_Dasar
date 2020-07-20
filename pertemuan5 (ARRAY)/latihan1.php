<?php 
//---- ARRAY -----
// Array adalah variabel yang memiliki banyak nilai

//cara membuat array

// syntax untuk menampilkan array
// var_dump(); / print_r();

//1. Cara lama
$hari = array("Senin", "Selasa", "Rabu");
var_dump($hari);

echo  "<p>";

//2. Cara Baru
$bulan = ["Januari", "Februari", 1234, "Maret"];
var_dump($bulan);
echo "<p>";
print_r($bulan);

//untuk menambahkan data pada array di 1 variabel yang sama
$hari[] = "Minggu";
echo "<p>";
print_r($hari);


?>