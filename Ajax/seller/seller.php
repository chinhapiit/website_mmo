<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'SEND_FILE') {
    $id_user = antixss($_POST['id_user']);
    $address = antixss($_POST['address']);
    $phone = antixss($_POST['phone']);
    
    $check = $ketnoi->get_row("SELECT * FROM `seller` WHERE `id_user` = '$id_user'");
    if ($check) {
        exit(json_encode(['status' => '1', 'msg' => 'Bạn đã gửi hồ sơ rồi, vui lòng chờ duyệt!']));
    }

     if (!isset($_FILES['img']) || $_FILES['img']['error'] != UPLOAD_ERR_OK) {
                respond('1', 'Lỗi tải lên ảnh.');
            }

            $img = $_FILES['img'];

            // Kiểm tra loại file ảnh
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($img['type'], $allowedTypes)) {
                respond('1', 'Chỉ hỗ trợ các định dạng JPG, PNG, GIF.');
            }

            // Kiểm tra kích thước file (ví dụ: tối đa 5MB)
            $maxFileSize = 5 * 1024 * 1024; // 5MB
            if ($img['size'] > $maxFileSize) {
                respond('1', 'Kích thước ảnh vượt quá giới hạn cho phép (5MB).');
            }

            // Tạo tên file duy nhất để tránh trùng lặp
            $fileExtension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
            $fileName = uniqid('img_', true) . '.' . $fileExtension;
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/images/'; // Đường dẫn đến thư mục images/
            $uploadPath = $uploadDir . $fileName;

            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0755, true)) {
                    respond('1', 'Không thể tạo thư mục lưu ảnh.');
                }
            }

            // Di chuyển file từ thư mục tạm đến thư mục images/
            if (!move_uploaded_file($img['tmp_name'], $uploadPath)) {
                respond('1', 'Lỗi khi lưu ảnh.');
            }

            // Tạo đường dẫn ảnh dưới dạng /images/img_XXXX.jpg
            $img_url = '/images/' . $fileName;
        $file = $ketnoi->insert("seller", [
            'id_user' => $id_user,
            'img' => $img_url,
            'address' => $address,
            'phone' => $phone,
            'total' => 0,
            'money' => 0,
            'register_date' => time(),
            'status' => 'dangxuly'
        ]);

        if ($file) {
            exit(json_encode(['status' => '2', 'msg' => 'Gửi hồ sơ thành công!']));
        } else {
            exit(json_encode(['status' => '1', 'msg' => 'Số dư không đủ!']));
        }
    
}
    elseif(isset($_POST['action']) && $_POST['action'] == 'UPDATE_SP') {
        $id_sp = antixss($_POST['id_sp']);
        $title = antixss($_POST['title']);
        $price = antixss($_POST['price']);
        $quoc_gia = antixss($_POST['quoc_gia']);
        $list_gt = antixss($_POST['list_gt']);
        $id_dm = antixss($_POST['id_dm']); 
        $check_sp = $ketnoi->get_row("SELECT * FROM `list_san_pham` WHERE `id` = '$id_sp'");
        if (empty($id_dm)) { 
            $id_dm = $check_sp['id_dm']; 
        }
        if($username == ""){
            exit(json_encode(['status' => '1', 'msg' => 'Vui lòng đăng nhập']));
        }elseif(!$check_sp){
            exit(json_encode(['status' => '1', 'msg' => 'Sản phẩm ko tồn tại']));
        }else{
            $update_sp = $ketnoi->update("list_san_pham",array(
                'id_dm' => $id_dm,
                'title' => $title,
                'price' => $price,
                'quoc_gia' => $quoc_gia,
                'list_gt' => $list_gt,
                ),"`id` = '$id_sp'");
            if($update_sp){
                exit(json_encode(['status' => '2', 'msg' => 'Cập nhật thành công']));
            }else{
                exit(json_encode(['status' => '1', 'msg' => 'Lỗi cập nhật']));
            }
        }
    }elseif(isset($_POST['action']) && $_POST['action'] == 'CO_CC') {
       $id_sp = antixss($_POST['id_sp']);
    $tt_sp = antixss($_POST['thongtinacc']);
    $check_sp = $ketnoi->get_row("SELECT * FROM `list_san_pham` WHERE `id` = '$id_sp'");
    if(!$check_sp){
       exit(json_encode(['status' => '1', 'msg' => 'Sản phẩm không tồn tại']));  
    }elseif($id_sp == "" || $tt_sp ==""){
       exit(json_encode(['status' => '1', 'msg' => 'Vui lòng điền đầy đủ thông tin'])); 
    }else{
        $add_product = $ketnoi->update("list_san_pham", array(
        'tt_sp' => $check_sp['tt_sp'] . $tt_sp  
    ), "`id` = '$id_sp'");
        if($add_product){
            exit(json_encode(['status' => '2', 'msg' => 'Thêm sản phẩm thành công'])); 
        }else{
            exit(json_encode(['status' => '1', 'msg' => 'Lỗi thêm sản phẩm'])); 
        }
    }
    }
}

?>
