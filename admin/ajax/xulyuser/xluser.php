<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'UPDATE_USER') {
        $usernames = antixss($_POST['username']);
        $email = antixss($_POST['email']);
        $level = antixss($_POST['level']);
        $banned = antixss($_POST['banned']);
        $id = antixss($_POST['id']);
        $check_user = $ketnoi->get_row("SELECT * FROM `users` WHERE `id` = '$id'");
        if (!empty($_POST['password'])) {
            $password = antixss($_POST['password']);
            $pass_new = sha1(md5($password));
            if($check_user['password'] == $pass_new){
                exit(json_encode(array('status' => '1', 'msg' => 'Mật khẩu mới phải khác mật khẩu cũ')));
            }
        } else {
            $pass_new = $check_user['password'];
        }
        if (!empty($_POST['congtien']) || !empty($_POST['trutien'])) {
            $congtien = antixss($_POST['congtien']);
            $trutien = antixss($_POST['trutien']);
            $tinhtien = $congtien - $trutien;
        } else {
            $tinhtien = 0;
        }
        if($ketnoi->num_rows("SELECT * FROM `users` WHERE `email` = '$email' AND `username` != '$usernames'") > 0){
            exit(json_encode(array('status' => '1', 'msg' => 'Email này đã tồn tại vui lòng chọn email khác')));
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            exit(json_encode(array('status' => '1', 'msg' => 'Email không đúng định dạng')));
        }elseif($ketnoi->num_rows("SELECT * FROM `users` WHERE `username` = '$usernames' AND `username` != '".$check_user['username']."'") > 0 ){
            exit(json_encode(array('status' => '1', 'msg' => 'Username này đã tồn tại')));
        }else{
            $update_user = $ketnoi->update("users",array(
                'username' => $usernames,
                'email' => $email,
                'password' => $pass_new,
                'money' => $check_user['money'] + $tinhtien,
                'tong_nap' => $check_user['tong_nap'] + $tinhtien,
                'level' => $level,
                'bannd' => $banned
            ),"`id` = '$id'");
            if(isset($update_user)){
                exit(json_encode(array('status' => '2', 'msg' => 'Cập nhật thành công')));
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Lỗi cập nhật')));
            }
        }
    }
}