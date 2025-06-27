<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
function getApiitId($content) {
    $pattern = '/APIIT\s+(\d+)/i';
    if (preg_match($pattern, $content, $matches)) {
        return $matches[1]; 
    } else {
        return null; 
    }
}
// echo getApiitId("APIIT 46 FT25077404901198 Ma giao dich Trace400442 Trace 400442");
// $money = 100000;
// $data = "Bạn vừa nạp thành công"." ".money($money)."đ";
//                             $pusher->trigger('my-channel', 'my-event', $data);
$ch = curl_init('https://buom.coincard.lol/api/historymbbank/bfc80419c3802359e6d739566090a3eb');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
// print_r($data);
if ($data === null) {
    echo "Không có lịch sử giao dịch ";
} else{
    foreach ($data['TranList'] as $mb) {
        if ($mb['creditAmount'] !== "0") {
            $ma_gd = $mb['refNo'];
            $amout = $mb['creditAmount'];
            $noidung = $mb['addDescription'];
            $id_nap = getApiitId($noidung);
            if ($amout >= 500000 && $amout < 1000000) {
                $money = $amout + $amout * 5 / 100; 
            } elseif ($amout >= 1000000) {
                $money = $amout + $amout * 10 / 100; 
            } else {
                $money = $amout; 
            }            
            if($user_bank = $ketnoi->get_row("SELECT * FROM `users` WHERE `id` = '$id_nap'")){
                if($ketnoi->num_rows(" SELECT * FROM `lich_su_nap_bank` WHERE `ma_gd` = '$ma_gd'") == 0){
                    $creat_bank = $ketnoi->insert("lich_su_nap_bank",array(
                        'username' => $user_bank['username'],
                        'ngan_hang_nap' => "MbBank",
                        'ma_gd' => $ma_gd,
                        'time' => $time,
                        'amount' => $amout,
                        'thuc_nhan' => $money,
                        'status' => "thanhcong"
                    ));
                    if(isset($creat_bank)){
                        $update_money = $ketnoi->update("users", array(
                            'money' => $user_bank['money'] + $money,
                            'tong_nap' => $user_bank['tong_nap'] + $money
                        ),"`username` = '".$user_bank['username']."'");                    
                        if($update_money){
                            $data = "Bạn vừa nạp thành công"." ".money($money)."đ";
                            $pusher->trigger('my-channel', 'my-event', $data);
                            $id = $user_bank['id_tele'];
                            sentTb("Nạp tiền thành công số tiền: ".money($money)."đ" ."- Username : ".$user_bank['username']."", $id);
                        }
                    }
                }else{
                    echo "Không có giao dịch nào";
                }
            }
           
        }
        
    }
}