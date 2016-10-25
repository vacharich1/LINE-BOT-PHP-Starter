<?php

$access_token = 'AYydB5m2TZasBEFQaZjNRTCTeC3d3oNKw77jzKd/mj3SAMlkABDK74AAJ6eN00no1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH6TY6AZoQrYmAP/ny8krS0KwSMDOokFaUouicUyyIKmhQdB04t89/1O/w1cDnyilFU=';

 
$json_content = file_get_contents('php://input');
$json = json_decode($json_content, true);

// 可以一次送來多筆資料，所以是陣列
foreach ($json['result'] as $result) {
    $content = $result['content'];
    if ($result['eventType'] == '138311609100106403') {
        // 加入好友或封鎖
        $mid = $content['params'][0];
        if ($content['opType'] == 4) {
            echo '加入好友 ' . $mid;
        }
        if ($content['opType'] == 8) {
            echo '封鎖 ' . $mid;
        }
        // 利用 curl 另外取得 user 資料
        $profile = curlUserProfileFromLine($mid);
        echo 'name = ' . $profile['displayName'];
        echo '<img src="' . $profile['pictureUrl'] . '" />';
    }
}

function curlUserProfileFromLine($mid) {
    $url = 'https://trialbot-api.line.me/v1/profiles?mids=' . $mid;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Line-ChannelID: ' . LineConfig::getChannelId(),
        'X-Line-ChannelSecret: ' . LineConfig::getChannelSecret(),
        'X-Line-Trusted-User-With-ACL: ' . LineConfig::getMID(),
    ));

    $json_content = curl_exec($ch);
    curl_close($ch);

    if (!$json_content) {
        return false;
    }

    $json = json_decode($json_content, true);
    foreach ($json['contacts'] as $user) {
        if ($mid == $user['mid']) {
            return $user;
        }
    }

    return false;
}
 
?>