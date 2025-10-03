<?php
// توکن ربات رو همینجا بذار
$token   = 'bot313340:072950e2-318c-45d8-b879-11f9eeb58bbb';
$chat_id = 44476102; // آیدی چت یا کانال
$caption = 'سلام!';
$title   = 'ارسال فایل با API';

// مسیر فایل برای ارسال
$file = __DIR__ . 'https://ehsanpg.ir/icon.jpeg'; // فایل در کنار همین اسکریپت

if (!file_exists($file)) {
    die("❌ فایل پیدا نشد: $file");
}

$url = "https://eitaayar.ir/api/$token/sendFile";

$post_fields = [
    'file'    => new CURLFile(realpath($file)),
    'chat_id' => $chat_id,
    'title'   => $title,
    'caption' => $caption,
];

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => $url,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $post_fields,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => false,
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    echo "Response: " . $response;
}

curl_close($ch);