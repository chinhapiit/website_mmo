<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'REMOVE_BANK') {
        if($user['level'] == 1){
            $id = antixss($_POST['id']);
            $remove = $ketnoi->remove("nap_bank","`id` = '$id'");
            if(isset($remove)){
                exit(json_encode(array('status' => '2', 'msg' => 'Xóa thành công')));
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Không thể xóa')));
            }
        }else{
            exit(json_encode(array('status' => '1', 'msg' => 'Bạn không có quyền xóa')));
        }
    }elseif(isset($_POST['action']) && $_POST['action'] == 'UPDATE_BANK'){
        $id = antixss($_POST['id']);
        $ngang_hang = antixss($_POST['ngang_hang']);
        $ctk = antixss($_POST['ctk']);
        $stk = antixss($_POST['stk']);
        $status = antixss($_POST['status']);
        $min_nap = antixss($_POST['min_nap']);
        if($ngang_hang == "" || $ctk == "" || $stk == "" || $status == "" || $min_nap == ""){
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đủ thông tin')));
        }elseif($min_nap < 1000){
            exit(json_encode(array('status' => '1', 'msg' => 'Min nạp phải lớn hơn 1k')));
        }else{
            $update_bank = $ketnoi->update("nap_bank",array(
                'ngang_hang' => $ngang_hang,
                'ctk' => $ctk,
                'stk' => $stk,
                'status' => $status,
                'min_nap' => $min_nap
            ),"`id`= '$id'");
            if(isset($update_bank)){
                exit(json_encode(array('status' => '2', 'msg' => 'Cập nhật thành công')));
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Lỗi không cập nhật được')));
            }
        }
    }elseif(isset($_POST['action']) && $_POST['action'] == 'ADD_BANK'){
        $ngang_hang = antixss($_POST['ngang_hang']);
        $ctk = antixss($_POST['ctk']);
        $stk = antixss($_POST['stk']);
        $status = antixss($_POST['status']);
        $min_nap = antixss($_POST['min_nap']);
        if($ngang_hang == "" || $ctk == "" || $stk == "" || $status == "" || $min_nap == ""){
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đủ thông tin')));
        }elseif($min_nap < 1000){
            exit(json_encode(array('status' => '1', 'msg' => 'Min nạp phải lớn hơn 1k')));
        }else{
            $add_bank = $ketnoi->insert("nap_bank",array(
                'ngang_hang' => $ngang_hang,
                'ctk' => $ctk,
                'stk' => $stk,
                'status' => $status,
                'min_nap' => $min_nap
            ));
            if(isset($add_bank)){
                exit(json_encode(array('status' => '2', 'msg' => 'Thêm thành công')));
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Lỗi không thêm được')));
            }
        }
    }
}