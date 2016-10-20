<?php
$access_token = 'AYydB5m2TZasBEFQaZjNRTCTeC3d3oNKw77jzKd/mj3SAMlkABDK74AAJ6eN00no1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH6TY6AZoQrYmAP/ny8krS0KwSMDOokFaUouicUyyIKmhQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');



// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {

	echo 'ok';


}


echo "OK11";