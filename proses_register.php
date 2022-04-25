<?php
error_reporting(0);

$nik = $_POST['nik'];
$nama_lengkap = $_POST['nama_lengkap'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$oi = strlen($nik); //strlen=untuk menghitung jumlah karakter yang ada di inputan nik
// cek apakah nik sudah terdaftar atau belum
$data = file('config.txt', FILE_IGNORE_NEW_LINES); //FUNGSI DARI FILE_IGNORE_NEW_LINES IALAH MEMBUAT ISINYA MENJADI ARRAY


foreach ($data as $dat) {
    $pecah = explode("|", $dat); //explode ialah memecahkan antara variabel nik,sama nama_lengkap
    if ($nik == $pecah['0']) {
        $cek = true;
    }
}
if ($oi == 16) {
    if (!preg_match("/^[a-zA-Z .]*$/", $nama_lengkap)) {
        session_start();
        $_SESSION['nama'] = '<div class="alert alert-danger" role="alert">
    nama tidak boleh angka
      </div>';
        header('location:register.php');
    } else {
        if ($password == $password1) {
            if ($cek) { //jika nik sudah terdaftar
?>
                <script type="text/javascript">
                    alert("maaf nik yang anda gunkan terdaftar");
                    window.location.assign('register.php');
                </script>';
<?php
            } else //jika nik tidak terdaftar  buat penyimpanan ke file config
            {
                if (isset($_POST['submit'])) {
                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $secret = '6Lcof5QfAAAAAHdb1w6KbXU0M-shOQGJq2VVUS69';
                    $response = file_get_contents($url . '?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR']);
                    $data = json_decode($response);
                    if ($data->success == true) {
                        $format = "\n$nik|$nama_lengkap|$password";
                        //buka dulu file config.txt
                        $file = fopen('config.txt', 'a');
                        fwrite($file, $format);
                        //lalu di tutup $file nya
                        fclose($file);
                        header('location: index.php');
                    } else {
                        header('location: register.php?error');
                    }
                }

                session_start();
                $_SESSION['success'] = '<div class="alert alert-success" role"alert">
                Data berhasil ditambahkan, silahkan login
                </div>';
            }
        } else {
            echo "<script>alert('Password yang anda masukan tidak sama');history.go(-1)</script>";
        }
    }
} else {
    session_start();
    $_SESSION['success'] = '<script type="text/javascript">alert("Maaf NIK Yang Anda Tambahkan Terlalu Sedikit")</script>';
    header('location:register.php');
}
?>