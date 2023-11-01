<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

// ./assets/api.iniからAPIキーを取得
$config = parse_ini_file('./assets/api.ini', true);
$api_key = $config['GNEWS']['API_KEY'];
$url = "https://gnews.io/api/v4/top-headlines?token=$api_key&lang=en";

// cURLセッションの初期化
$ch = curl_init();

// cURLオプションの設定
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// SSL証明書の検証を無効化
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// HTTPリクエストの実行
$response = curl_exec($ch);

// エラーハンドリング
if ($response === false) {
    $error = curl_error($ch);
    echo "Failed to fetch the external API. Reason: $error";
} else {
    // レスポンスを出力
    echo $response;
}

// cURLセッションの終了
curl_close($ch);




