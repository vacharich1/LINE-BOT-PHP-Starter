<html>
<head>
<title>ThaiCreate.Com PHP & Write CSV</title>
</head>
<body>
<?php
$filName = "customer.csv";
$objWrite = fopen("customer.csv", "w");
fwrite($objWrite, "\"C001\",\"Win Weerachai\",\"win.weerachai@thaicreate.com\",\"TH\",\"1000000\",\"600000\" \n");
fwrite($objWrite, "\"C002\",\"John  Smith\",\"john.smith@thaicreate.com\",\"EN\",\"2000000\",\"800000\" \n");
fwrite($objWrite, "\"C003\",\"Jame Born\",\"jame.born@thaicreate.com\",\"US\",\"3000000\",\"600000\" \n");
fwrite($objWrite, "\"C004\",\"Chalee Angel\",\"chalee.angel@thaicreate.com\",\"US\",\"4000000\",\"100000\" \n");
fclose($objWrite);
echo "<br>Generate CSV Done.<br><a href=$filName>Download</a>";
?>
</body>
</html>