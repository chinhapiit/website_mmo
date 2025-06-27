<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['action']) && $_POST['action'] == 'cai-dat-chung') {
        $ten_web = antixss($_POST['ten_web']);
        $logo_website = antixss($_POST['logo_website']);
        $favicon = antixss($_POST['favicon']);
        $description = antixss($_POST['description']);
        $key_words = antixss($_POST['key_words']);
        $name_ad = antixss($_POST['name_ad']);
        $fb_admin = antixss($_POST['fb_admin']);
        $sdt_admin = antixss($_POST['sdt_admin']);
        $bao_tri = antixss($_POST['bao_tri']);
        $tele_admin = ($_POST['tele_admin']);
        $hoa_hong = ($_POST['hoa_hong']);
        $ck_seller = ($_POST['ck_seller']);
        $withdraw_money_ref = ($_POST['withdraw_money_ref']);
        $update = $ketnoi->update("setting",array(
            'website' => $ten_web,
            'logo_website' => $logo_website,
            'favicon' => $favicon,
            'description' => $description,
            'key_words' => $key_words,
            'name_ad' => $name_ad,
            'fb_admin' => $fb_admin,
            'sdt_admin' => $sdt_admin,
            'bao_tri' => $bao_tri,
            'hoa_hong' => $hoa_hong,
            'ck_seller' => $ck_seller,
            'withdraw_money_ref' => $withdraw_money_ref,
            'tele_admin' => $tele_admin
        ), " `id` = '1' ")
        ;
        if(isset($update)){
            die(json_encode([
                'status' => '2',
                'msg' => 'Cập nhật thành công',
            ]));
        }else{
            die(json_encode([
                'status' => '502',
                'msg' => 'Lỗi ko sửa được dữ liệu',
            ]));    
        }
    }elseif(isset($_POST['action']) && $_POST['action'] == 'SETUP'){
        $smtp_email = antixss($_POST['smtp_email']);
        $smtp_passemail = antixss($_POST['smtp_passemail']);
        $token_tele = antixss($_POST['token_tele']);
        $id_tele = antixss($_POST['id_tele']);
        $update = $ketnoi->update("setting", array(
            'smtp_email' => $smtp_email,
            'smtp_passmail' => $smtp_passemail,
            'token_tele' => $token_tele,
            'id_tele' => $id_tele
        ), " `id` = '1' ");
        if(isset($update)){
            echo json_encode([
                'status' => '2',
                'msg' => 'Cập nhật thành công',
            ]);
        }else{
            echo json_encode([
                'status' => '502',
                'msg' => 'Lỗi ko sửa được dữ liệu',
        ]);
        }
    }elseif(isset($_POST['action']) && $_POST['action'] == 'THONG_BAO'){
   
        $content = ($_POST['content']);
        $update = $ketnoi->update("setting", array(
            'thong_bao' => $content
        ), " `id` = '1' ");
        if(isset($update)){
            die(json_encode([
                'status' => '2',
                'msg' => 'Cập nhật thành công',
            ]));
        }else{
            die(json_encode([
                'status' => '1',
                'msg' => 'Lỗi cập nhật',
            ]));
        }
    }
}
?>