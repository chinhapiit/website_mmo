<?php
$botToken = '6015195560:AAEaT8pEiXdr2vQ3ka8Rz2BogOES_3Jhkaw';
$update = json_decode(file_get_contents('php://input'), true);
if (isset($update['message']['text']) && $update['message']['text'] == '/start') {
    $userId = $update['message']['from']['id'];
    $messageData = [
        'chat_id' => $userId, 
        'text' => 'Id của bạn là: ' . $userId
    ];
    file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?" . http_build_query($messageData));
}
