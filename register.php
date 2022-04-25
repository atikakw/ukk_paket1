<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Peduli Diri - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script type="text/javascript">
        var maxChar = 16;

        function count() {
            if (document.formku.nik.value.length > maxChar) {
                document.formku.nik.value = document.formku.nik.value.substring(0, maxChar);
            } else document.formku.counter.value = maxChar - document.formku.nik.value.length;
        }

        function initial() {
            document.formku.counter.value = maxChar;
        }
    </script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/destination.png" width="30%">
                                        <h1 class="h4 text-gray-900 mb-2">Register Akun Aplikasi Peduli Diri</h1>
                                        <p>Silahkan Masukan NIK dan Nama Lengkap Anda.</p>
                                    </div>
                                    <?php
                                    session_start();
                                    if (!empty($_SESSION['nama'])) {
                                        echo $_SESSION['nama'];
                                        unset($_SESSION['nama']);
                                    }

                                    if (isset($_GET['error'])) {
                                        echo '<div class="alert alert-danger" role"alert">
                                        Captcha is wrong. Please try again!
                                        </div>';
                                    }
                                    ?>
                                    <form name="formku" class="user" method="post" action="proses_register.php">
                                        <div class="form-group">
                                            <input onkeyup="count()" name="nik" required type="number" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan NIK Anda...">
                                        </div>
                                        <div class="form-group">
                                            <input name="nama_lengkap" required type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Nama Lengkap Anda...">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" required type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password Anda...">
                                        </div>
                                        <div class="form-group">
                                            <input name="password1" required type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Repeat Password...">
                                        </div>
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey='6Lcof5QfAAAAALkWKYuNiShyLOBcPGJECQIbm4tl'></div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            <i class="fa fa-spinner"></i> Register
                                        </button>
                                        <hr>
                                        <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fa fa-arrow-left fa-fw"></i> Sudah Punya Akun...? Silahkan Ke Halaman Login
                                        </a>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>