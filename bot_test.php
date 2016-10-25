<?php
echo "start";
$access_token = 'AYydB5m2TZasBEFQaZjNRTCTeC3d3oNKw77jzKd/mj3SAMlkABDK74AAJ6eN00no1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH6TY6AZoQrYmAP/ny8krS0KwSMDOokFaUouicUyyIKmhQdB04t89/1O/w1cDnyilFU=';

echo "start1";

// Get POST body content
$content = file_get_contents('php://input');
echo $content;
// Parse JSON
$events = json_decode($content, true);
echo "start2";

$json_content = file_get_contents('php://input');
$json = json_decode($json_content, true);

$meta="";

// 可以一次送來多筆資料，所以是陣列
foreach ($json['result'] as $result) {
    $contentaaa = $result['content'];
    if ($result['eventType'] == '138311609000106303') {
        echo '接收訊息 from ' . $contentaaa['from'] . ' to ' . implode(',', $contentaaa['to'])
           . ' at ' . date('Y-m-d H:i:s', substr($contentaaa['createdTime'], 0, 10));
        switch ($content['contentType']) {
            case 1:// 文字
                echo '文字 = ' . $contentaaa['text'];
                break;
            case 7:// 位置
                echo '文字 = ' . $contentaaa['text'];
                $location = $contentaaa['location'];
                echo '名稱 = ' . $location['title'];
                echo '地址 = ' . $location['address'];
                echo '緯度 = ' . $location['latitude'];
                echo '經度 = ' . $location['longitude'];
                break;
            case 8:// 貼圖
                $meta = $contentaaa['contentMetadata'];
                echo '貼圖包編號 = ' . $meta['STKPKGID'];
                echo '貼圖編號 = ' . $meta['STKID'];
                echo '貼圖版本 = ' . $meta['STKVER'];
            case 10:// 好友資料
                $meta = $contentaaa['contentMetadata'];
                echo 'user 編號 = ' . $meta['mid'];
                echo '姓名 = ' . $meta['displayName'];
                break;
        }
    }
}





// Validate parsed JSON data
if (!is_null($events['events'])) {
// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			
			
			
			$textcut = explode(" ", $text);
			$result = count($textcut);
			if($result <= 2)
			{
					$count_text_cut = strlen($textcut[0]);
					$x=0;
					$arr1 = str_split($textcut[0]);
					if($arr1[0] == "@")
					{
		
						//echo $count_text_cut;
						$hoonname = substr($textcut[0], 1); // cut@
						if($result == 2)
							$timeframe = $textcut[1];
						else
							$timeframe ="d";
						#echo $hoonname;
						
						
						$sql = "INSERT INTO hoon_check (id, hoonname, timeframe)
						VALUES ('', '$hoonname', '$timeframe')";
						
						if (mysqli_query($link, $sql)) {
								echo "New record created successfully";
						} 
						else {
								#echo "Error: " . $sql . "<br>" . mysqli_error($link);
						}
						sleep(0.3);
						$check ="check1";
						#echo "work code";
						$sql = "INSERT INTO `check_capture`(`id`, `check`) VALUES ('','$check')";
						if (mysqli_query($link, $sql)) {
								echo "New record created successfully";
						} 
						else {
								echo "Error: " . $sql . "<br>" . mysqli_error($link);
						}
							#echo "work code";
						// Get replyToken
						$replyToken = $event['replyToken'];
						if($hoonname=="aot" or $hoonname=="AOT")
							$llll = "https://www.dropbox.com/s/x2e2fx37guzaq3x/aot.png";
						else if($hoonname == "tpch" or $hoonname == "TPCH")
							$llll = "https://www.dropbox.com/s/kde06zagtb302ec/tpch.png";
						else if($hoonname=="aav" or $hoonname=="AAV")
							$llll = "https://www.dropbox.com/s/xx3m4erqo5bbjwm/aav.png";
						else if($hoonname=="ptt" or $hoonname=="PTT")
							$llll = "https://www.dropbox.com/s/qq3linskfg4pz5z/ptt.png";
						else if($hoonname=="scc" or $hoonname=="SCC")
							$llll = "https://www.dropbox.com/s/3ldbg8vyhjnl0cq/scc.png";
						else if($hoonname=="ck" or $hoonname=="CK")
							$llll = "https://www.dropbox.com/s/m93490z5z6lewg0/ck.png";
						else if($hoonname=="dtac" or $hoonname=="DTAC")
							$llll = "https://www.dropbox.com/s/rwiyh1djuhlepia/dtac.png";
						else if($hoonname=="itd" or $hoonname=="ITD")
							$llll = "https://www.dropbox.com/s/3dxufqovt6uaxrb/itd.png";
						else if($hoonname=="scb" or $hoonname=="SCB")
							$llll = "https://www.dropbox.com/s/hyfmb2n26amlsrx/scb.png";
						else if($hoonname=="kbank" or $hoonname=="KABNK")
							$llll = "https://www.dropbox.com/s/fy82hqmdvmfvvv9/kbank.png";
						else if($hoonname=="thai" or $hoonname=="THAI")
							$llll = "https://www.dropbox.com/s/5i185iegk3755tp/thai.png";
						else if($hoonname=="true" or $hoonname=="TRUE")
							$llll = "https://www.dropbox.com/s/j2rtcfffybha6bn/true.png";
						else
							$llll = "https://www.dropbox.com/s/h6yztz70os1ily8/pic.png";
						// Build message to reply back
						$messages = ['type' => 'text','text' => $meta['displayName']];
						sleep(5);
						$messages3 = ['type' => 'text','text' => $hoonname];
			
						$messages1 = ['type' => 'text','text' => $llll];
						
						$messages2 = ['type' => 'image',
								 'originalContentUrl' => 'https://www.dropbox.com/s/h6yztz70os1ily8/$hoonname.png',
								 'previewImageUrl' => 'https://www.dropbox.com/s/h6yztz70os1ily8/$hoonname.png'
						];
			
						// Make a POST Request to Messaging API to reply to sender
						$url = 'https://api.line.me/v2/bot/message/reply';
						$data = [
							'replyToken' => $replyToken,
							'messages' => [$messages,$messages1]
						];
						$post = json_encode($data);
						$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			
						$ch = curl_init($url);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						$result = curl_exec($ch);
						curl_close($ch);
						
						
						#echo "check1";
						#sleep(10);
						#echo $result . "\r\n";
					}
			
				
				
			}
		}
	}
}

#echo "OK11";