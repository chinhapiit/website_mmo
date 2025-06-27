<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';

// Hàm để phản hồi dưới dạng JSON
function respond($status, $msg) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => $status,
        'msg' => $msg
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra action
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'add_cmCon') {
    // Xử lý add_cmCon
    $id_dm     = antixss($_POST['id_dm'] ?? '');
    $title     = antixss($_POST['title'] ?? '');
    $price     = antixss($_POST['price'] ?? '');
    $tt_sp     = antixss($_POST['tt_sp'] ?? '');
    $list_gt   = antixss($_POST['list_gt'] ?? '');
    $ng_ban    = antixss($_POST['ng_ban'] ?? '');
    $quoc_gia  = antixss($_POST['quoc_gia'] ?? '');
    $status    = antixss($_POST['status'] ?? '');
    // Kiểm tra img_url nếu có và là URL hợp lệ
$img_url = isset($_POST['img_url']) ? antixss($_POST['img_url']) : '';
if (empty($img_url)) {
    $img_url = ''; // Nếu không phải URL hợp lệ, bỏ qua
}

// Kiểm tra img_list nếu có dữ liệu và không rỗng
$img_list = isset($_POST['img_list']) ? antixss($_POST['img_list']) : '';
if (empty($img_list)) {
    $img_list = ''; // Nếu không có dữ liệu, gán giá trị rỗng
}

// Kiểm tra nếu có dữ liệu hợp lệ
if (!empty($img_url) || !empty($img_list)) {
    $loai = 1; // Chọn loại 'tool' nếu có img_url hoặc img_list
} else {
    $loai = 0; // Không phải 'tool' nếu không có dữ liệu
}


    // Thêm dữ liệu vào cơ sở dữ liệu
    $them = $ketnoi->insert("list_san_pham", array(
        'id_dm'    => $id_dm,
        'title'    => $title,
        'price'    => $price,
        'tt_sp'    => $tt_sp,
        'list_gt'  => $list_gt,
        'ng_ban'   => $ng_ban,
        'quoc_gia' => $quoc_gia,
        'status'   => $status,
        'img'  => $img_url,  
        'list_img' => $img_list,
        'loai' => $loai // Thêm danh sách ảnh nếu chọn tool
    ));

    if ($them) {
        respond('2', 'Thành công thêm chuyên mục sản phẩm con.');
    } else {
        respond('1', 'Lỗi thêm chuyên mục sản phẩm con.');
    }
}
     else if ($action == 'update_cmCon') {
            // Xử lý update_cmCon
            $id = antixss($_POST['id']);
            $id_dm = isset($_POST['id_dm']) ? antixss($_POST['id_dm']) : '';
            $title = isset($_POST['title']) ? antixss($_POST['title']) : '';
            $price = isset($_POST['price']) ? antixss($_POST['price']) : '';
            $tt_sp = isset($_POST['tt_sp']) ? antixss($_POST['tt_sp']) : '';
            $list_gt = isset($_POST['list_gt']) ? antixss($_POST['list_gt']) : '';
            $ng_ban = isset($_POST['ng_ban']) ? antixss($_POST['ng_ban']) : '';
            $quoc_gia = isset($_POST['quoc_gia']) ? antixss($_POST['quoc_gia']) : '';
            $status = isset($_POST['status']) ? antixss($_POST['status']) : '';

            // Chuẩn bị dữ liệu để cập nhật
            $data = array(
                'id_dm' => $id_dm,
                'title' => $title,
                'price' => $price,
                'tt_sp' => $tt_sp,
                'list_gt' => $list_gt,
                'ng_ban' => $ng_ban,
                'quoc_gia' => $quoc_gia,
                'status' => $status
            );

            $sua = $ketnoi->update("list_san_pham", $data, "id = '$id'");

            if ($sua) {
                respond('2', 'Thành công cập nhật chuyên mục sản phẩm con.');
            } else {
                respond('1', 'Lỗi cập nhật chuyên mục sản phẩm con.');
            }

        } else if ($action == 'remove_cmCon') {
            // Xử lý remove_cmCon
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

            // Thực hiện xóa dữ liệu từ cơ sở dữ liệu
            $xoa = $ketnoi->remove("list_san_pham", "id = '$id'");

            if ($xoa) {
                respond('2', 'Thành công xóa chuyên mục sản phẩm con.');
            } else {
                respond('1', 'Lỗi xóa chuyên mục sản phẩm con.');
            }

        }elseif($action == 'update_status'){
            $id = antixss($_POST['id']);
            $status = antixss($_POST['status']);
            $update_status = $ketnoi->update("list_san_pham",array(
                'status' => $status
            ),"`id` = '$id'");
            if(isset($update_status)){
                respond('2', 'Kích hoạt trạng thái thành công.');
            }else{
                respond('1', 'Lỗi kích hoạt trạng thái.');
            }
        } else {
            respond('1', 'Hành động không hợp lệ.');
        }
    } else {
        respond('1', 'Không có hành động được chỉ định.');
    }
} else {
    respond('1', 'Yêu cầu không hợp lệ.');
}
?>