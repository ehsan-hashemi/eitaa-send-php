$token = 'bot313340:072950e2-318c-45d8-b879-11f9eeb58bbb';
$chat_id = 10200307;
$caption = 'سلام!';
$title = 'send file by api';

// initialise the curl request
$request = curl_init('https://eitaayar.ir/api/'.$token.'/sendFile');

// send a file
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt(
    $request, CURLOPT_POSTFIELDS,
    array(
        'file' => new \CurlFile(realpath('https://ehsanpg.ir/icon.jpeg')),
        'chat_id' => $chat_id,
        'title' => $title,
        'caption' => $caption,
    ));

// output the response
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($request);

// close the session
curl_close($request);