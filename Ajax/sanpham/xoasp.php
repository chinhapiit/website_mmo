<?php 
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
$id_sp = antixss($_POST['id']);
$check_id = $ketnoi->get_row("SELECT * FROM `lich_su_mua_hang` WHERE `id` = '$id_sp' AND `username` = '$username'");
if($username == ""){
    exit(json_encode(array('status' => '1', 'msg' => 'Bạn chưa đăng nhập !')));
}elseif(!$check_id){
    exit(json_encode(array('status' => '1', 'msg' => 'Bạn không thể xóa sản phẩm này !')));
}else{
    $xoa_sp = $ketnoi->remove("lich_su_mua_hang","`id` = '$id_sp'");
    if(isset($xoa_sp)){
        exit(json_encode(array('status' => '2', 'msg' => 'Xóa sản phẩn thành công')));
    }else{
        exit(json_encode(array('status' => '1', 'msg' => 'Lỗi báo admin!')));
    }
}