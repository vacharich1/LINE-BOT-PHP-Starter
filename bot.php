<?php


header("Content-type:text/html; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);         
if($_GET['rev']==1){  
    echo date("Y-m-d H:i:s");  
    exit;  
}  


$access_token = 'AYydB5m2TZasBEFQaZjNRTCTeC3d3oNKw77jzKd/mj3SAMlkABDK74AAJ6eN00no1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH6TY6AZoQrYmAP/ny8krS0KwSMDOokFaUouicUyyIKmhQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');

$myfile = fopen("hoon.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);


// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];

			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = ['type' => 'text',
				     'text' => $text
			];

			$messages1 = ['type' => 'text',
				     'text' => 'hello'
			];

			$messages2 = ['type' => 'image',
				     'originalContentUrl' => 'https://raw.githubusercontent.com/vacharich1/LINE-BOT-PHP-Starter/master/golf-ball-clip-art-black-and-white-niX89GjAT.gif',
				      'previewImageUrl' => 'https://raw.githubusercontent.com/vacharich1/LINE-BOT-PHP-Starter/master/golf-ball-clip-art-black-and-white-niX89GjAT.gif'
			];
			$imagemap = 	array(
   						'type' => 'imagemap',
   						'baseUrl' => 'https://raw.githubusercontent.com/vacharich1/LINE-BOT-PHP-Starter/master/golf-ball-clip-art-black-and-white-niX89GjAT.gif',
   						'altText' => 'this is an imagemap',
   						'baseSize' => 
 								array(
     									'height' => 240,
     									'width' => 240,
 									 ),
   						'actions' => 
  								array (
    								0 => 
    								array(
       									'type' => 'uri',
       									'linkUri' => 'https://example.com/',
       								'area' => 
      									array(
         									'x' => 0,
         									'y' => 0,
         									'width' => 520,
     									        'height' => 1040,
      									      ),
    								),   
    								array(
       									'type' => 'message',
       									'text' => 'hello',
      								'area' => 
     								array(
         								'x' => 520,
         								'y' => 0,
         								'width' => 520,
         								'height' => 1040,
      									)
    								)
  							)
						)
                                    








			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages,$messages1,$messages2,$imagemap]
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

			echo $result . "\r\n";
		}
	}
}


echo "OK11";