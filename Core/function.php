<?php
/* ĐƠN VỊ THIẾT KẾ CHINHAPI.NET | ZALO 0388674883 | https://www.facebook.com/chinhapiit */

function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $site_gmail_momo, $site_pass_momo,$smtp_server,$smtp_port;
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = $smtp_server;
        $mail->SMTPAuth = true;
        $mail->Username = $site_gmail_momo; 
        $mail->Password = $site_pass_momo; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = $smtp_port;
        $mail->setFrom($site_gmail_momo, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($site_gmail_momo, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
function getOS()
{ // get thiết bị
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile',
    );

    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }

    return $os_platform;
}
function getTrinhDuyet()
{ 
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/coc_coc_browser/i' => 'Cốc Cốc',
    );

    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    return $browser;
}
function check_login($username){
    if($username == ""){
         header("Location: /auth/login");
         exit();
    }
}
function sentTb($tb,$id)
{
    global $tele_token,$id;
    $data = http_build_query([
        'chat_id' => $id,
        'text' => "🔔 THÔNG BÁO 
📝 Nội dung: " .$tb.
        "
🕒 Thời gian: " .
        date('d/m/Y H:i:s'),
    ]);
    $url = 'https://api.telegram.org/bot' . $tele_token . '/sendMessage';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if ($data) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<nav aria-badge="Page navigation example"><ul class="pagination pagination-lg">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li class="page-item"><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<i class="fas fa-angle-left"></i>');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="page-item active"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total)
    {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<i class="fas fa-angle-right"></i>');
    }
    $out[] = '</ul></nav>';
    return implode('', $out);
}
function status($data) {
    $status = array(
        "thanhcong" => '<button class="btn btn-primary" type="button">Thành Công</button>',
        "loi" => '<button class="btn btn-danger" type="button">Lỗi</button>',
        "dangxuly" => '<button class="btn btn-warning" type="button"  >Đang Xử Lý</button>',
      
    );
    if (array_key_exists($data, $status)) {
        return $status[$data];
    } else {
        return '<button class="btn btn-primary" type="button">Khác</button>';
    }
}
function level($data) {
    $status = array(
        "1" => 'Quản Trị Viên',
        "3" => 'Đại Lý',
        "0" => 'Thành Viên',
      
    );
    if (array_key_exists($data, $status)) {
        return $status[$data];
    } else {
        return 'Chưa Đăng Nhập';
    }
}
function status_ad($data) {
    $status = array(
        "thanhcong" => '<span class="badge bg-info">Thành Công</span>',
         "hoatdong" => '<span class="badge bg-info">Hoạt Động</span>',
         "tamdung" => '<span class="badge bg-danger">Tạm Dừng</span>',
         "dangxuly" => '<span class="badge bg-warning">Chờ Duyệt</span>'
      
    );
    if (array_key_exists($data, $status)) {
        return $status[$data];
    } else {
        return '<span class="badge bg-error">Lỗi</span>';
    }
}
function ngay($date) {
    return date('H:i:s d/m/Y', $date);
}
function random($string, $int) {  
    return substr(str_shuffle($string), 0, $int);
}

function quocgia($data) {
    $status_qg = array(
        "vn" => 'Việt Nam',
        "us" => 'Hoa Kỳ',
        "mx" => 'Mexico',
    );
    if (array_key_exists($data, $status_qg)) {
        return $status_qg[$data];
    } else {
        return 'Ko có quốc gia này';
    }
}
function money($price) {
    return str_replace(",", ".", number_format($price));
}
function antixss($data)
{
    // Fix &entity\n;
    $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    } while ($old_data !== $data);

    // we are done...
    $xoa = htmlspecialchars(addslashes(trim($data)));

    return $xoa;
}
function checkcac(){
    global $username;
    if(!$username){
        header("Location: /auth/login");
        exit();
    }
}
function checkLicense($lincense) {
    $curl = curl_init();
    $dataPost = array(
        "type" => "license",
        "domain" => $_SERVER['SERVER_NAME'],
        "key" => $lincense
    );
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://marketmmo.sbs/license', 
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query($dataPost),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $status = json_decode($response, true); 
    if ($status['status'] == '198') {
        return json_encode(array('status' => '198', 'msg' => 'License của domain đã tạm dừng'));
    } else if ($status['status'] == '100') {
        return json_encode(array('status' => '100', 'msg' => 'License của bạn đã hết hạn sử dụng. Vui lòng gia hạn để tiếp tục sử dụng! Liên hệ Telegram @chinhapiit'));
    } else if ($status['status'] == '999') {
        return json_encode(array('status' => '999', 'msg' => 'License và domain không hợp lệ'));
    } else if ($status['status'] == '222') {
        return json_encode(array('status' => '222', 'msg' => 'License và domain đã bị khóa do gian lận'));
    } else if ($status['status'] == '99') {
        return json_encode(array('status' => '99', 'msg' => 'Invalid request type'));
    } else {
        return json_encode(array('status' => '200', 'msg' => 'Success'));
    }
}
function redirect($url)
{
    header("Location: {$url}");
    exit();
}
function base_url($url)
{
    $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
    if ($base_url == 'https://localhost') {
        $base_url = 'https://localhost';
    }
    return $base_url . '/' . $url;
}
$lincense = json_decode(checkLicense($checklic), true);
function CheckLic() {
    global $checklic, $lincense;
    if ($checklic == "" || $lincense['status'] != "200") {
        header("Location: /check-license");
        exit();
    }
}
function xoadau($strTitle) {
    $strTitle=strtolower($strTitle);
    $strTitle=trim($strTitle);
    $strTitle=str_replace(' ','-',$strTitle);
    $strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
    $strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'o',$strTitle);
    $strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
    $strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'a',$strTitle);
    $strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/",'e',$strTitle);
    $strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/",'e',$strTitle);
    $strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
    $strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'u',$strTitle);
    $strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
    $strTitle=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'i',$strTitle);
    $strTitle=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$strTitle);
    $strTitle=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'y',$strTitle);
    $strTitle=str_replace('đ','d',$strTitle);
    $strTitle=str_replace('Đ','d',$strTitle);
    $strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
    return $strTitle;
}