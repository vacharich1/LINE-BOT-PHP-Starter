<?php

$HOST_NAME = "sql6.freemysqlhosting.net";
	$DB_NAME = "sql6141179";
	$CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
 
	$USERNAME = "sql6141179";     // ตั้งค่าตามการใช้งานจริง
	$PASSWORD = "2VSm3JEfdX";  // ตั้งค่าตามการใช้งานจริง
 
 
	try {
		
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
	
		echo "connect";
	
	
	} catch (PDOException $e) {
	
		echo "connot connect".$e->getMessage();
		echo "assacc";
	
	}

try {
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
	
		//echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
		
		// คำสั่ง SQL
		$sql = "SELECT * FROM book";
	
		$query = $db->query($sql);
	
		//echo "<pre>".print_r($query->fetchAll(), true)."</pre>"; 
		
		// เปลี่ยนมาใช้ fecth()
		//echo "<pre>".print_r($query->fetch(), true)."</pre>"; 
		
		// วนซ้ำ แสดงผลทั้งหมด
		while($row = $query->fetch()) {
			echo "<pre>".print_r($row, true)."</pre>";
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