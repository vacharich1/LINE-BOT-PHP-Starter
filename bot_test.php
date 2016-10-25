<?php
// アカウント情報設定
$channel_id = "	1484765796";
$channel_secret = "3692fbc3db90c226b12e3f91130e2f9f";
$mid = "AYydB5m2TZasBEFQaZjNRTCTeC3d3oNKw77jzKd/mj3SAMlkABDK74AAJ6eN00no1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH6TY6AZoQrYmAP/ny8krS0KwSMDOokFaUouicUyyIKmhQdB04t89/1O/w1cDnyilFU=";
 
// 画像URL設定
$original_content_url_for_image = "https://www.dropbox.com/s/x2e2fx37guzaq3x/aot.png";
$preview_image_url_for_image = "https://www.dropbox.com/s/x2e2fx37guzaq3x/aot.png";
 
// メッセージ受信
$json_string = file_get_contents('php://input');
$json_object = json_decode($json_string);
$content = $json_object->result{0}->content;
$text = $content->text;
$from = $content->from;
$message_id = $content->id;
$content_type = $content->contentType;

echo $json_string;

echo "start1";
 
// ユーザ情報取得
api_get_user_profile_request($from);
 
// メッセージが画像、動画、音声であれば保存
if (in_array($content_type, array(2, 3, 4))) {
    api_get_message_content_request($message_id);
}
 
// メッセージコンテンツ生成
$image_content = <<< EOM
        "contentType":2,
        "originalContentUrl":"{$original_content_url_for_image}",
        "previewImageUrl":"{$preview_image_url_for_image}"
EOM;
 
// 受信メッセージに応じて返すメッセージを変更
$event_type = "138311608800106203";
if ($text == "マキビシ") {
    $content = $image_content;
} else { // 上記以外はtext送信
    if ($content_type != 1) {
        $text = "テキスト以外";
    }
$content = <<< EOM
        "contentType":1,
        "text":"{$text}...だと? マキビシくらいなはれ！"
EOM;
}
$post = <<< EOM
{
    "to":["{$from}"],
    "toChannel":1383378250,
    "eventType":"{$event_type}",
    "content":{
        "toType":1,
        {$content}
    }
}
EOM;
 
api_post_request("/v1/events", $post);
 
function api_post_request($path, $post) {
    $url = "https://trialbot-api.line.me{$path}";
    $headers = array(
        "Content-Type: application/json",
        "X-Line-ChannelID: {$GLOBALS['channel_id']}",
        "X-Line-ChannelSecret: {$GLOBALS['channel_secret']}",
        "X-Line-Trusted-User-With-ACL: {$GLOBALS['mid']}"
    );
 
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curl);
    error_log($output);
}
 
function api_get_user_profile_request($mid) {
    $url = "https://trialbot-api.line.me/v1/profiles?mids={$mid}";
    $headers = array(
        "X-Line-ChannelID: {$GLOBALS['channel_id']}",
        "X-Line-ChannelSecret: {$GLOBALS['channel_secret']}",
        "X-Line-Trusted-User-With-ACL: {$GLOBALS['mid']}"
    ); 
 
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curl);
    error_log($output);
}
 
function api_get_message_content_request($message_id) {
    $url = "https://trialbot-api.line.me/v1/bot/message/{$message_id}/content";
    $headers = array(
        "X-Line-ChannelID: {$GLOBALS['channel_id']}",
        "X-Line-ChannelSecret: {$GLOBALS['channel_secret']}",
        "X-Line-Trusted-User-With-ACL: {$GLOBALS['mid']}"
    ); 
 
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curl);
    file_put_contents("/tmp/{$message_id}", $output);
}
?>