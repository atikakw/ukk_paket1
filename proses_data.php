<?php

//process_data.php

if(isset($_POST["nik"]))
{
 $nik = '';
 $nama_lengkap = '';
 $password = '';

 $nik_error = '';
 $nama_lengkap_error = '';
 $password_error = '';
 $captcha_error = '';

 if(empty($_POST["nik"]))
 {
  $nik_error = 'nik is required';
 }
 else
 {
  $nik = $_POST["nik"];
 }

 if(empty($_POST["nama_lengkap"]))
 {
  $nama_lengkap_error = 'nama_lengkap is required';
 }
 else
 {
  $nama_lengkap = $_POST["nama_lengkap"];
 }
 

 if(empty($_POST["password"]))
 {
  $password_error = 'Password is required';
 }
 else
 {
  $password = $_POST["password"];
 }

 if(empty($_POST['g-recaptcha-response']))
 {
  $captcha_error = 'Captcha is required';
 }
 else
 {
  $secret_key = '6Lc9IpsfAAAAAL0cdalyyNhcpl8FcrN_VCqIQgt0';

  $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);

  $response_data = json_decode($response);

  if(!$response_data->success)
  {
   $captcha_error = 'Captcha verification failed';
  }
 }

 if($nik_error == '' && $nama_lengkap_error == '' && $password_error == '' && $captcha_error == '')
 {
  $data = array(
   'success'  => true
  );
 }
 else
 {
  $data = array(
   'nik_error' => $nik_error,
   'nama_lengkap_error' => $nama_lengkap_error,
   'password_error' => $password_error,
   'captcha_error'  => $captcha_error
  );
 }

 echo json_encode($data);
}

?>