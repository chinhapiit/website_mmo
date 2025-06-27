<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'REMOVE_TK') {
        if($user['level'] == 1){
            $id = antixss($_POST['id']);
            $remove = $ketnoi->remove("lich_su_mua_hang","`id` = '$id'");
            if(isset($remove)){
                exit(json_encode(array('status' => '2', 'msg' => 'Xóa thành công')));
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Bạn không có quyền xóa')));
            }
        }else{
            exit(json_encode(array('status' => '1', 'msg' => 'Bạn không có quyền xóa')));
        }
    }
}