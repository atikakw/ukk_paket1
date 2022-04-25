<?php
$nik                = $_POST['nik'];
$nama_lengkap       = $_POST['nama_lengkap'];
$password       = $_POST['password'];

$format = "$nik|$nama_lengkap|$password";
$file = file('config.txt', FILE_IGNORE_NEW_LINES);
if (in_array($format, $file)) { //jika data ditemukan
    session_start();
    $_SESSION['nik'] = $nik;
    $_SESSION['nama_lengkap'] = $nama_lengkap;

    header("location:user.php");
} else { //jika data tidak ditemukan 
?>
    <script type="text/javascript">
        alert('!! Maaf Kombinasi NIK dan NAMA LENGKAP salah.');
        window.location.assign('index.php');
    </script>
<?php }
