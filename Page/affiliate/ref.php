<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
if(isset($_GET['ref'])){
    $ref = antixss($_GET['ref']);
    if($row = $ketnoi->get_row("SELECT * FROM `users` WHERE `id` = '$ref'")){
        $_SESSION['ref'] = $row['id'];
        $ketnoi->cong('users','ref_click',1,"`id` = '".$row['id']."'");
        $ketnoi->insert("ref_click",array(
            'id_user' => $row['username'],
            'time' => $time
        ));
        redirect(BASE_URL(''));
    }
    redirect(BASE_URL(''));
}
redirect(BASE_URL(''));