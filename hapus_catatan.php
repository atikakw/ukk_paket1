<?php
$id_catatan = $_GET['id_catatan'];

$no = 0;
$data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
foreach ($data as $value) {
    $no++;
    $pecah = explode("|", $value);
    if ($pecah['0'] == $id_catatan) {
        $line = $no - 1; //mencari urutan barisan keberapa
    }
}

$buka_file = file('catatan.txt'); //membaca file catatan.txt

unset($buka_file[$line]);
file_put_contents('catatan.txt', implode("", $buka_file));
session_start();
$_SESSION['TAMBAH'] = '<div class="alert alert-danger" role="alert">
Data Berhasil Dihapus
</div>';
header('location:user.php?url=catatan_perjalanan');
