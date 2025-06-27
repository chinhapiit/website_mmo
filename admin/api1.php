<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
$data = [
    "labels" => ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
    "data" => []
];
for ($thang = 1; $thang <= 12; $thang++) {
    $sql = "SELECT SUM(`gia`) AS doanhthu FROM `lich_su_mua_hang` 
            WHERE MONTH(`time`) = $thang AND YEAR(`time`) = YEAR(CURDATE())";
    $result = $ketnoi->get_row($sql);
    $data['data'][] = $result['doanhthu'] ?? 0; 
}
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
