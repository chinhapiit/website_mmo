<?php
/* Đăng Ký Tài khoản */
/* ĐƠN VỊ THIẾT KẾ CHINHAPI.NET | ZALO 0388674883 | https://www.facebook.com/chinhapiit */

// XỬ LÝ ĐĂNG NHẬP
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'LOGIN') {
        $username = antixss($_POST['username']);
        $password = antixss($_POST['password']);
        $check = $ketnoi->get_row("SELECT * FROM `users` WHERE `username` = '$username'");
        $new_pass = sha1(md5($password));
        if($username== "" || $password == "" ){
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin !')));
        }else{
            if (empty($check)) {  
                exit(json_encode(array('status' => '1', 'msg' => 'Tài khoản không tồn tại !')));
            } elseif(empty($check) || $check['password'] != ($new_pass)) {
                exit(json_encode(array('status' => '1', 'msg' => 'Mật khẩu không chính xác !')));
            }else{
                $now_ss = random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 32);
                $update = $ketnoi->update("users", array(
                    'update_time' => $now,
                    'session' => $now_ss
                    ), " `username` = '$username' ");
                $update_login = $ketnoi->insert("history_login",array(
                    'username' => $username,
                    'title' => "Đăng nhập thành công",
                    'ip' => $ip,
                    'trinh_duyet' => getOS(),
                    'thiet_bi' => getTrinhDuyet(),
                    'time_log' => $now,
                ));
                $_SESSION['session'] = $now_ss;
                $id = $check['id_tele'];
              
                if ($update || $update_login || $api) {
                    exit(json_encode(array('status' => '2', 'msg' => 'Đăng nhập thành công !')));   
                } else {
                    exit(json_encode(array('status' => '1', 'msg' => 'Báo admin !')));
                }
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'REGISTER') {
        $username = antixss($_POST['username']);
        $password = antixss($_POST['password']);
        $email = antixss($_POST['email']);
        $firstname = antixss($_POST['firstname']);
        $lastname = antixss($_POST['lastname']);
        if($username == "" || $password == "" || $email ==  "" || $lastname == "" || $firstname == ""){
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đủ thông tin !')));
        }elseif(strlen($username) < 4){
            exit(json_encode(array('status' => '1', 'msg' => 'Độ tài khoản phải lớn hơn 4 ký tự !')));
        }elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            exit(json_encode(array('status' => '1', 'msg' => 'Tài khoản không được thêm ký tự đặc biệt !')));
        }elseif ($ketnoi->num_rows("SELECT * FROM `users` WHERE `username` = '$username' ") > 0) {
            exit(json_encode(array('status' => '1', 'msg' => 'Tên tài khoản đã tồn tại !')));
        }elseif ($ketnoi->num_rows("SELECT * FROM `users` WHERE `email` = '$email' ") > 0) {
            exit(json_encode(array('status' => '1', 'msg' => 'Email này đã tồn tại !')));
        }elseif(strlen($password) < 4 || strlen($password) > 32){
            exit(json_encode(array('status' => '1', 'msg' => 'Độ mật khẩu phải lớn hơn 4 và nhỏ hơn 32 ký tự !')));
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            exit(json_encode(array('status' => '1', 'msg' => 'Email không đúng địng dạng !')));
        }else{
            $new_pass = sha1(md5($password));
            $register_user =  $ketnoi->insert("users",array(
                'myname' => $firstname . ' ' . $lastname,
                'username' => $username,
                'password' => $new_pass,
                'email' => $email,
                'level' => '0',
                'tong_nap' => '0',
                'money' => '0',
                'ref_click' => '0',
                'ref_money' => '0',
                'is_ref' => '0',
                'ref_id' => !empty($_SESSION['ref']) ? $_SESSION['ref'] : 0,
                'bannd' => '0',
                'session' => '0',
                'time' => $now,
                'ip' => $ip,
                'otpcode' => '0'
            ));
            if(isset($register_user)){
                $now_ss = random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 32);
                $update_ss = $ketnoi->update("users",array(
                    'session' => $now_ss,
                ),"`username` = '$username'");
                $_SESSION['session'] = $now_ss;
                if($update_ss){
                    exit(json_encode(array('status' => '2', 'msg' => 'Đăng ký tài khoản thành công')));
                }else{
                    exit(json_encode(array('status' => '1', 'msg' => 'Lỗi ko update được session')));
                }
               
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Lỗi add csdl!')));
            }  
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'UPDATE_PROFILE') {
        $email = antixss($_POST['email']);
        $id_tele = antixss($_POST['id_tele']);
        // $user = $ketnoi->get_row("SELECT * FROM `users` WHERE `username` = '$username'");
        if (!empty($_POST['newpass'])) {
            $newpass = antixss($_POST['newpass']);
            $pass_new = sha1(md5($newpass));
            if($user['password'] == $pass_new){
                exit(json_encode(array('status' => '1', 'msg' => 'Mật khẩu mới phải khác mật khẩu cũ')));
            }
        } else {
            $pass_new = $user['password'];
        }
        if($username == ""){
            exit(json_encode(array('status' => '1', 'msg' => 'Bạn chưa đăng nhập')));
        }elseif($ketnoi->num_rows("SELECT * FROM `users` WHERE `email` = '$email' AND `username` != '$username'") > 0){
            exit(json_encode(array('status' => '1', 'msg' => 'Email này đã tồn tại vui lòng chọn email khác')));
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            exit(json_encode(array('status' => '1', 'msg' => 'Email không đúng định dạng')));
        }elseif(strlen($pass_new) < 4 || strlen($pass_new) > 50){
            exit(json_encode(array('status' => '1', 'msg' => 'Độ dài mật khẩu phải lớn hơn 4 và nhỏ hơn 32 ký tự')));
        }else{
            $update_profile = $ketnoi->update("users",array(
                'email' => $email,
                'password' => $pass_new,
                'id_tele' => $id_tele
            ),"`username` = '$username'");
            if(isset($update_profile)){
                exit(json_encode(array('status' => '2', 'msg' => 'Cật nhật thành công')));
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Lỗi báo admin !')));
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'RESET_PASS') {
        $email = antixss($_POST['email']);
        $check_us = $ketnoi->get_row("SELECT * FROM `users` WHERE `email` = '$email'");
        if($ketnoi->num_rows("SELECT * FROM `users` WHERE `email` = '$email'") == 0){
            exit(json_encode(array('status' => '1', 'msg' => 'Email này không tồn tại')));
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            exit(json_encode(array('status' => '1', 'msg' => 'Email không đúng định dạng')));
        }else{
            $otpcode = random('0123456789', 20);
            $guitoi = $check_us['email'];   
            $subject = 'Bạn đã yêu cầu đặt lại mật khẩu cho tài khoản'.$check_us['username'].'.';
            $bcc = 'Đặt Lại Mật Khẩu';
            $hoten ='SERVER';
            $noi_dung = '<p>Kính chào quý khách hàng <b>'.$check_us['username'].'</b>,</p>
            <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu của bạn, nếu bạn là người thực hiện yêu cầu này, hãy bấm vào liên kết bên dưới để đặt lại mật khẩu, nếu không ĐỪNG NHẤP VÀO, KHÔNG CHIA SẺ cho bất cứ ai.</p>
            <p>Liên kết đặt lại mật khẩu <a href="https://' . $_SERVER['SERVER_NAME'] . '/datpass/' . $otpcode . '" target="_blank">tại đây</a>.</p>
            <p>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi. Cảm ơn!</p>
            <p>Website: <b><a href="https://'.$_SERVER['SERVER_NAME'].'/" target="_blank">'.$_SERVER['SERVER_NAME'].'</a></b></p>';
            $api = sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);
            $update_mk = $ketnoi->update("users",array(
                'otpcode' => $otpcode,
            ),"`username` = '".$check_us['username']."'");
            if($update_mk){
                exit(json_encode(array('status' => '2', 'msg' => 'Mã đặt mật khẩu đã được gửi tới mail của bạn')));
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Lỗi gửi otb')));
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'DAT_PASS') {
        $id_otp = antixss($_POST['id']);
        $password = antixss($_POST['password']);
        $spassword = antixss($_POST['spassword']);
        $check_us = $ketnoi->get_row("SELECT * FROM `users` WHERE `otpcode` = '$id_otp'");
        if($password == "" || $spassword == ""){
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng điền đủ thông tin')));
        }elseif($ketnoi->num_rows("SELECT * FROM `users` WHERE `otpcode` = '$id_otp' ") != 1){
            exit(json_encode(array('status' => '1', 'msg' => 'OTP Không tồn tại')));
        }elseif(strlen($password) < 4 || strlen($password) > 32){
            exit(json_encode(array('status' => '1', 'msg' => 'Độ dài mật khẩu phải lớn hơn 4 và nhỏ hơn 32 ký tự')));
        }elseif($password != $spassword ){
            exit(json_encode(array('status' => '1', 'msg' => 'Hai mật khẩu không khớp')));
        }else{
            $newpass = sha1(md5($password));
            $update_pass = $ketnoi->update("users",array(
                'password' => $newpass
            ),"`username` = '".$check_us['username']."'");
            if(isset($update_pass)){
                exit(json_encode(array('status' => '2', 'msg' => 'Đặt lại mật khẩu thành công')));
            }else{
                exit(json_encode(array('status' => '2', 'msg' => 'Lỗi báo admin !')));
            }
        }
    }
}