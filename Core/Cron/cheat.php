<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
$users = $ketnoi->get_list("SELECT * FROM `users`");
foreach ($users as $user) {
    $id = $user['id']; 
    $ref_id = $user['ref_id']; 
    $ip = $user['ip']; 
    $refUser = $ketnoi->get_row("SELECT * FROM `users` WHERE `id` = '$ref_id'  AND `ip` = '$ip' ");
    if ($refUser) {
        $ketnoi->update("users",array(
            'bannd' => 1
        ),"`id` = '$id'");       // echo "User ID: $id đã bị banned vì trùng ref_id và IP với tài khoản gốc ID {$refUser['id']}.\n";
    }
}
?>
