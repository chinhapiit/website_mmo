<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
$data = [
    "labels" => [],
    "revenues" => [],
    "profits" => []
];
$start_date = new DateTime(date('Y-m-01'));
$end_date = new DateTime(date('Y-m-t'));
while ($start_date <= $end_date) {
    $ngay = $start_date->format('Y-m-d');
    $sql = "SELECT SUM(`gia`) AS doanhthu, SUM(`gia` * 0.3) AS loinhuan 
            FROM `lich_su_mua_hang` 
            WHERE DATE(`time`) = '$ngay'";
    $result = $ketnoi->get_row($sql);
    $data['labels'][] = $start_date->format('d/m/Y');
    $data['revenues'][] = $result['doanhthu'] ?? 0;
    $data['profits'][] = $result['loinhuan'] ?? 0;
    $start_date->modify('+1 day');
}
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
