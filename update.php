<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';

function generateRandomString($length = 4) {
    $characters = '1234567890ABCDEFTH';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
$time = date("Y-m-d H:i:s");
$fileUrl = 'https://localhost/update.zip';
$zipFile = 'DLCD_' . generateRandomString(4) . '.zip'; 
$extractTo = './'; 
$currentVersion = file_get_contents('version.txt'); 
file_put_contents($zipFile, file_get_contents($fileUrl));
$zip = new ZipArchive;
$checklic = $apiit['license_key'];
$lincense = json_decode(checkLicense($checklic), true);
if($checklic == "" || $lincense['status'] == "200"){
    if ($zip->open($zipFile) === TRUE) {
        $zipVersionFile = 'version.txt';
        $newVersion = '';
        if ($zip->locateName($zipVersionFile) !== false) {
            $newVersion = $zip->getFromName($zipVersionFile);
            $newVersion = trim($newVersion);
        } else {
            echo 'Tệp version.txt không tồn tại trong tệp ZIP.';
            $zip->close();
            unlink($zipFile);
            exit();
        }
        if (version_compare($newVersion, $currentVersion, '>')) {
            $zip->extractTo($extractTo);
            $zip->close();
            echo 'Update Thành Công!';
            file_put_contents('version.txt', $newVersion);
            $logEntry = "Cập Nhật Thành Công Vào Lúc $time | Phiên Bản Mới: $newVersion.\n";
            file_put_contents('update.txt', $logEntry, FILE_APPEND);
        } else {
            echo 'Hệ thống đã ở phiên bản mới nhất: ' . $currentVersion;
            $zip->close();
        }
    } else {
        echo 'Không thể mở tệp ZIP.';
    }
}else{
    echo "Vui lòng kiểm tra lại bản quyền !";
}

unlink($zipFile);
?>
