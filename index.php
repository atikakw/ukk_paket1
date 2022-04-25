<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Peduli Diri - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                                        <h1 class="h4 text-gray-900 mb-2">Selamat Datang Di Aplikasi Peduli Diri</h1>
                                        <p>Silahkan Masukan NIK dan Nama Lengkap Anda.</p>
                                    </div>
                                    <?php
                                    session_start();
                                    if (!empty($_SESSION['success'])) {
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success']);
                                    }

                                    ?>
                                    <form name="formku" class="user" method="post" action="proses_login.php">
                                        <div class="form-group">
                                            <input onkeyup="count()" name="nik" required type="number" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan NIK Anda...">
                                        </div>
                                        <div class="form-group">
                                            <input name="nama_lengkap" required type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Nama Lengkap Anda...">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" required type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password Anda...">
                                            <a href="" data-toggle="modal" data-target="#lupaModal" class="float-right"><small>Lupa Password?</small></a>
                                        </div>
                                        <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6Lc9IpsfAAAAAD1i2y9VorcygDc9yyKpMQubWX5Z" id="recaptcha"></div>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <i class="fa fa-spinner"></i> Login
                                        </button>
                                        <hr>
                                        <a href="register.php" class="btn btn-facebook btn-user btn-block">
                                            Belum Punya Akun...? Silahkan Ke Halaman Register <i class="fa fa-arrow-right fa-fw"></i>
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

    <div class="modal fade" id="lupaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lupa Password?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forgot-form" method="post" action="forgot-password.php">
                        <div class="input-group form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="input-group">
                            <button class="btn btn-danger" name="forgot" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php">Logout</a>
                </div> -->
            </div>
        </div>
    </div>

   <!--  Google reCAPTCHA V2 -->
   <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer></script>
    <script>
$(document).ready(function(){

 $('#captcha_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"proses_data.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function()
   {
    $('#register').attr('disabled','disabled');
   },
   success:function(data)
   {
    $('#register').attr('disabled', false);
    if(data.success)
    {
     $('#captcha_form')[0].reset();
     $('#nik_error').text('');
     $('#nama_lengkap_error').text('');
     $('#password_error').text('');
     $('#captcha_error').text('');
     grecaptcha.reset();
     alert('Form Successfully validated');
    }
    else
    {
     $('#nik_error').text(data.nik_error);
     $('#nama_lengkap_error').text(data.nama_lengkap_error);
     $('#password_error').text(data.password_error);
     $('#captcha_error').text(data.captcha_error);
    }
   }
  })
 });

});
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>