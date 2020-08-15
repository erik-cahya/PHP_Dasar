<?php

require 'functions.php';

$mahasiswa = query("SELECT * FROM tb_mahasiswa");


// Require composer autoload
require_once __DIR__ . '/composer/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();





$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/pdf-style.css"/>
</head>

<body>

    <h1 class="header">Data Mahasiwa</h1>

    <table border="1" cellpadding="10" cellspacing="0" class="table-mhs">
    <tr>
        <th width="30px">No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>E-Mail</th>
    </tr>
';

$number = 1;
foreach ($mahasiswa as $mhs) {

    $html .= '
    <tr>
        <td>' . $number . '</td>
        <td>' . $mhs["name"] . '</td>
        <td>' . $mhs["nim"] . '</td>
        <td>' . $mhs["jurusan"] . '</td>
        <td>' . $mhs["email"] . '</td>
        
    </tr>';
    $number++;
};

$html .= '</table>
</body>
</html>';






// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('data_mahasiswa', \Mpdf\Output\Destination::INLINE);
