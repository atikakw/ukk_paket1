<?php
session_start();
$nik                    = $_SESSION['nik'];
$nama_lengkap           = $_SESSION['nama_lengkap'];
$tanggal                = $_POST['tanggal'];
$jam                    = $_POST['jam'];
$lokasi                 = $_POST['lokasi'];
$suhu                   = $_POST['suhu'];
$id_catatan             = rand(0, 100000);

$format = "\n$id_catatan|$nik|$nama_lengkap|$tanggal|$jam|$lokasi|$suhu ";

//kita buka file catatan.txt

$file = fopen('catatan.txt', 'a');
fwrite($file, $format);

//tutup file catatan
fclose($file);
session_start();
$_SESSION['TAMBAH'] = '<div class="alert alert-success" role="alert">
Data Berhasil Ditambahkan
</div>';
header('location:user.php?url=catatan_perjalanan');
