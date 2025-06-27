<?php
/* ĐƠN VỊ THIẾT KẾ CHINHAPI.NET | ZALO 0388674883 | https://www.facebook.com/chinhapiit */
require ('config.php');
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
$ketnoi = new teamapiit();
$now = time();
$time = date('Y-m-d H:i:s', $now);
$ip = $_SERVER['REMOTE_ADDR'];
session_start();
include_once('SMTP/class.smtp.php');
include_once('SMTP/PHPMailerAutoload.php');
include_once('SMTP/class.phpmailer.php');
$apiit = $ketnoi->get_row("SELECT * FROM `setting` ");
$tele_token = $apiit['token_tele'];;
$smtp_server = "smtp.gmail.com";
$smtp_port = "587";
$site_gmail_momo = $apiit['smtp_email'];
$site_pass_momo = $apiit['smtp_passmail'];
$thang_hien_tai = date('m');
$checklic = $apiit['license_key'];
if(isset($_SESSION['session'])) {
    $session = $_SESSION['session'];
    $user = $ketnoi->get_row("SELECT * FROM `users` WHERE `session` = '$session' ");
    $check_ctv = $user['id'];
    $ctv = $ketnoi->get_row("SELECT * FROM `seller` WHERE `id_user` = '$check_ctv' ");
    $username = $user['username'] ?: null;
     if (!$user || empty($user['id'])) {
        session_start();
        session_destroy();
        header('location: /');
    }elseif($user['bannd'] == '1'){
        session_start();
        session_destroy();
        header('location: /');
    }
    if($user['level'] == 1) {
        $_SESSION['admin'] = $username;
    }elseif($user['level'] == 3){
        $_SESSION['ctv'] = $username;
    }else{
       unset($_SESSION['admin'], $_SESSION['ctv']);
    }
}
$options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
$pusher = new Pusher\Pusher(
'1c8704a870f8fbd34577',
'9dc5c1c56a729164abc2',
'1927428',
$options
);
require ('function.php');
