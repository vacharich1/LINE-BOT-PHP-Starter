<?php
$access_token = '1l6c8hOlVNiLh23YRFrdl1TxJxK4KUZppI9dRaDscY5fX50D6xEBhb4D0ZglujEA1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH7ISxjUDK55FzS1B3DhC6X4/m4ZM0/0bN7HRNzLzKToewdB04t89/1O/w1cDnyilFU=';

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

			// Get replyToken
			$replyToken = $event['replyToken'];

			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '3692fbc3db90c226b12e3f91130e2f9f']);
			$response = $bot->replyText($replyToken, 'hello!');


		}
	}
}
echo "OK11";