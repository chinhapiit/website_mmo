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

        if ($action == 'add_cmCha') {
            // Xử lý add_cmCha
            $title = antixss($_POST['title']);
            $status = antixss($_POST['status']);

            // Kiểm tra xem file ảnh đã được upload hay chưa
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

            // Thêm dữ liệu vào cơ sở dữ liệu
            $them = $ketnoi->insert("danh_muc_sp", array(
                'title' => $title,
                'toslug' => xoadau($title),
                'img' => $img_url,
                'status' => $status
            ));

            if ($them) {
                respond('2', 'Thành công thêm chuyên mục sản phẩm.');
            } else {
                respond('1', 'Lỗi thêm chuyên mục sản phẩm.');
            }

        } else if ($action == 'update_cmCha') {
            // Xử lý update_cmCha
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
            $title = isset($_POST['title']) ? antixss($_POST['title']) : '';
            $status = isset($_POST['status']) ? antixss($_POST['status']) : '';
            $currentImg = isset($_POST['current_img']) ? antixss($_POST['current_img']) : '';

            // Kiểm tra xem ID có hợp lệ không
            if ($id <= 0) {
                respond('1', 'ID không hợp lệ.');
            }

            // Xử lý upload ảnh mới nếu có
            if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
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

                // Nếu có ảnh cũ, có thể bạn muốn xóa nó
                if (!empty($currentImg)) {
                    $oldImgPath = $_SERVER['DOCUMENT_ROOT'] . $currentImg;
                    if (file_exists($oldImgPath)) {
                        unlink($oldImgPath);
                    }
                }

            } else {
                // Nếu không có ảnh mới, giữ nguyên ảnh hiện tại
                $img_url = $currentImg;
            }

            // Chuẩn bị dữ liệu để cập nhật
            $data = array(
                'title' => $title,
                'img' => $img_url,
                'status' => $status
            );

            $sua = $ketnoi->update("danh_muc_sp", $data, "id = '$id'");

            if ($sua) {
                respond('2', 'Thành công cập nhật chuyên mục sản phẩm.');
            } else {
                respond('1', 'Lỗi cập nhật chuyên mục sản phẩm.');
            }

        } else if ($action == 'remove_cmCha') {
            // Xử lý remove_cmCha
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

            // Thực hiện xóa dữ liệu từ cơ sở dữ liệu
            $xoa = $ketnoi->remove("danh_muc_sp", "id = '$id'");

            if ($xoa) {
                respond('2', 'Thành công xóa chuyên mục sản phẩm.');
            } else {
                respond('1', 'Lỗi xóa chuyên mục sản phẩm.');
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