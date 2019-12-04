<?php

// 環境変数ファイルを読み込む
require_once(__DIR__.'/../config/env.php');
require_once(__DIR__.'/option.php');

// コマンドラインから引数を受け取る
if ($argc <= 2) {
    $arg = !empty($argv[1]) ? $argv[1] : null;
} else {
    echo "オプションが見つかりませんでした";
    exit(1);
}

$message = options($arg);

// 通知へ送るデータやトークンなど
$url            = getenv('URL');
$chatwork_token = getenv('TOKEN');

$data = [
    'body' => $message
];

$header = [
    "X-ChatWorkToken: $chatwork_token",
];

// chatworkへ通知を送る
$ch = curl_init();

$options = [
    CURLOPT_URL            => $url,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($data), // postで送るデータ
    CURLOPT_HEADER         => true, // ヘッダの内容を出力
    CURLOPT_HTTPHEADER     => $header, // httpヘッダーフィールドに設定
    CURLOPT_RETURNTRANSFER => true, // curl_exec()の返り値を文字列で返す
];

curl_setopt_array($ch, $options);

$response = curl_exec($ch);

echo $response;

curl_close($ch);
exit(0);
