<?php
$access_token = 'KXjRt7pljK57u0mnZbtgwTyF0LDTdZkQ0HQnNEGTwGsjSvSefr4EwhvN+kjrXUEN1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH4Ij+IoYTF43sQ2bC1ztRhr+nw3ssRjmJMLP/5WwXtKfAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;