<?php

$host= "sql6.freemysqlhosting.net";
	$db = "sql6144521";
	$CHAR_SET = "charset=utf8"; 
 
	$username = "sql6144521";    
	$password = "IAC4FPTQV2";   
	

	$link = mysqli_connect($host, $username, $password, $db);
	if (!$link) {
    	die('Could not connect: ' . mysqli_connect_errno());
	}
	else
	{
		echo "connect";
	}
 
	/*try {
		
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);

		//echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
		
		$sql = "SELECT * FROM book";
	
		$query = $db->query($sql);
	
		//echo "<pre>".print_r($query->fetchAll(), true)."</pre>"; 
		
		// เปลี่ยนมาใช้ fecth()
		echo "<pre>".print_r($query->fetch(), true)."</pre>"; 
		
		// วนซ้ำ แสดงผลทั้งหมด
		while($row = $query->fetch()) {
			//echo "<pre>".print_r($row, true)."</pre>";
		}
	
		echo "connect";
	
	
	} catch (PDOException $e) {
	
		echo "connot connect".$e->getMessage();
		echo "assacc";
	
	}*/

$access_token = 'AYydB5m2TZasBEFQaZjNRTCTeC3d3oNKw77jzKd/mj3SAMlkABDK74AAJ6eN00no1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH6TY6AZoQrYmAP/ny8krS0KwSMDOokFaUouicUyyIKmhQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');

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
						
						//INSERT INTO `sql6144521`.`hoon_check` (`ID`, `hoonname`, `timeframe`, `room`) VALUES ('', 'aot', '30', '1');
						$sql = "INSERT INTO `hoon_check` (id, hoonname, timeframe)
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
						
						sleep(5);
							#echo "work code";
						// Get replyToken
						$replyToken = $event['replyToken'];
						
						$hoonname1 = strtoupper($hoonname);
						if($hoonname == '2S')
							$llll = "https://www.dropbox.com/s/cov1jrkmhe8q81n/2S.png";
						else if($hoonname == 'A')
							$llll = "https://www.dropbox.com/s/u6vltz9l2mmtjgr/A.png?dl";
						else if($hoonname == 'COM7')
							$llll = "https://www.dropbox.com/s/uy5kmbt35jutf2k/AA_COM.png?dl";
						else if($hoonname == 'ABC')
							$llll = "https://www.dropbox.com/s/xbwsfy70kcqzak1/ABC.png?dl=0";
						else if($hoonname == 'abico' || $hoonname == 'ABICO')
							$llll = "https://www.dropbox.com/s/ah601q4qkt8jff5/ABICO.png?dl";
						else if($hoonname == 'ABPIF')
							$llll = "https://www.dropbox.com/s/kg7d273yqlq9hu8/ABPIF.png?dl=0";
						else if($hoonname == 'AAV')
							$llll = "https://www.dropbox.com/s/6s4myka0qpqfy64/AAV.png?dl=0";
						else if($hoonname == 'TPCH')
							$llll = "https://www.dropbox.com/s/kde06zagtb302ec/tpch.png";
						else
							$llll = "https://www.dropbox.com/s/h6yztz70os1ily8/pic.png";
						// Build message to reply back
						$messages = ['type' => 'text','text' => $text];
						
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