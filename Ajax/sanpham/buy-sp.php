<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'MUA_TK') {
        $id_sp = antixss($_POST['id_sp']);
        $gia_tien = antixss($_POST['gia_tien']);
        $so_luong = antixss($_POST['so_luong']);
        $giam_gia = antixss($_POST['giam_gia']);
        $check_hang = $ketnoi->get_row("SELECT * FROM `list_san_pham` WHERE  `id` = '$id_sp' AND  `status` = 'hoatdong'");
        $check = $ketnoi->get_row("SELECT * FROM `users` WHERE `username` = '$username'");
        $tt_sp = $check_hang['tt_sp'];
        $san_pham_list = array_filter(explode("\n", $tt_sp)); 
        $so_luong_con_lai = count($san_pham_list);
        if($username == ""){
            exit(json_encode(array('status' => '1', 'msg' => 'Bạn chưa đăng nhập !')));
        }elseif(!$check_hang){
            exit(json_encode(array('status' => '1', 'msg' => 'Sản phẩm không tồn tại !')));
        }elseif($so_luong > $so_luong_con_lai){
            exit(json_encode(array('status' => '1', 'msg' => "Trong shop chỉ $so_luong_con_lai còn sản phẩm ")));
        }elseif($user['money'] < $gia_tien){
            exit(json_encode(array('status' => '1', 'msg' => 'Số dư của bạn ko đủ !')));
        }else{
                $tai_khoan_da_ban = array_slice($san_pham_list, 0, $so_luong);
                $san_pham_list_con_lai = array_slice($san_pham_list, $so_luong);
                $tt_sp_con_lai = implode("\n", $san_pham_list_con_lai);
                $don_hang = implode("\n", $tai_khoan_da_ban);
                $rd = random("asdfghjklqweqrqrqw1234567890",8);
                $update_ls = $ketnoi->insert("lich_su_mua_hang",array(
                    'username' => $username,
                    'id_sp' => $id_sp,
                    'ma_gd' => $rd,
                    'don_hang' => $don_hang,
                    'gia'=> $gia_tien,
                    'time' => $time,
                    'ng_ban' => $check_hang['ng_ban'],
                    'status' => 'thanhcong'
                ));
                $update_list = $ketnoi->update("list_san_pham",array(
                    'tt_sp' => $tt_sp_con_lai,
                ),"`id` = '$id_sp'");
                $tien_new = $user['money'] - $gia_tien;
                $update_money = $ketnoi->update("users",array(
                    'money' => $tien_new 
                ),"`username` = '$username'");
                if($user['ref_id'] != 0){
                    $update_ref = $ketnoi->cong('users','is_ref',$gia_tien * $apiit['hoa_hong'] / 100,"`id` = '".$user['ref_id']."'");
                    $update_totel = $ketnoi->cong('users','ref_money',$gia_tien * $apiit['hoa_hong'] / 100,"`id` = '".$user['ref_id']."'");
                    $update_his =$ketnoi->insert("history_affiliate",array(
                       'id_buy' => $user['id'],
                       'id_ref' => $user['ref_id'],
                       'don_hang' => $id_sp,
                       'price' => $gia_tien,
                       'money_receive' => $gia_tien * $apiit['hoa_hong'] / 100,
                       'time' => $time,
                       'status' => 'thanhcong'
                    ));
                    if(!$update_ref && !$update_his){
                        exit(json_encode(array('status' => '1', 'msg' => 'Lỗi báo admin !')));
                    }
                }
                $check_ng_ban = $ketnoi->get_row("SELECT * FROM `users` WHERE  `username` = '".$check_hang['ng_ban']."' ");
                if($check_ng_ban){
                    $id = $check['id_tele'];
                    $api = sentTb("Bạn vừa thanh toán đơn hàng : $gia_tien",$id);
                    $update_sl = $ketnoi->cong('seller','money',$gia_tien - $gia_tien * $apiit['ck_seller']/ 100,"`id_user` = '".$check_ng_ban['id']."'");
                    if(isset($update_ls) || isset($update_list) || isset($update_money)){
                    exit(json_encode(array('status' => '2', 'msg' => 'Mua hàng thành công !')));
                    }else{
                        exit(json_encode(array('status' => '1', 'msg' => 'Lỗi cập nhật csdl !')));
                    }
                }else{
                    exit(json_encode(array('status' => '1', 'msg' => 'Lỗi báo admin !')));
                }
               
        }
    }
}
