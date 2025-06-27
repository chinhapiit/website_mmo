<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
$bank = antixss($_POST['bank']);
$stk = antixss($_POST['stk']);
$ctk = antixss($_POST['ctk']);
$amount = antixss($_POST['amount']);
$content = antixss($_POST['content']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'WITH_DRAW') {
        if($user['is_ref'] < $amount){
            exit(json_encode(array('status' => '1', 'msg' => 'Số dư của bạn ko đủ !')));
        }elseif($amount < $apiit['withdraw_money_ref']){
            exit(json_encode(array('status' => '1', 'msg' => "Số tiền rút phải lớn hơn ".$apiit['withdraw_money_ref']."đ !")));
        }elseif($amount > 10000000){
            exit(json_encode(array('status' => '1', 'msg' => 'Số tiền rẽ phải nhỏ hơn 10.000.000đ !')));
        }else{
            $withdraw_money = $ketnoi->insert("withdraw_money",array(
                'username' => $username,
                'bank' => $bank,
                'stk' => $stk,
                'ctk' => $ctk,
                'amount' => $amount,
                'content' => $content,
                'time' => $now,
                'status' => 'dangxuly',
                'type' => 'affi'
            ));
            $update_user = $ketnoi->update("users",array(
                'is_ref' => $user['is_ref'] - $amount
            ),"`username` = '$username'");
            if(isset($withdraw_money) && isset($update_user)){
                exit(json_encode(array('status' => '2', 'msg' => 'Rút tiền thành công')));
            }else{
                exit(json_encode(array('status' => '1', 'msg' => 'Rút tiền lỗi')));
            }
        }
    }
}