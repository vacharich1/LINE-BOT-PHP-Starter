<?php
$access_token = '1l6c8hOlVNiLh23YRFrdl1TxJxK4KUZppI9dRaDscY5fX50D6xEBhb4D0ZglujEA1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH7ISxjUDK55FzS1B3DhC6X4/m4ZM0/0bN7HRNzLzKToewdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;