<?php
    $host= "http://27.254.82.170:81/phpmyadmin/index.php?old_usr=ideatrad_bot";
	$db = "ideatrad_bot";
 
	$username = "ideatrad_bot";    
	$password = "akAtl7B206";   
	$CHAR_SET = "charset=utf8"; 

	$link = mysqli_connect($host, $username, $password, $db);
	if (!$link) {
			echo 'aaaaa';
    		die('Could not connect: ' . mysqli_connect_errno());
	}
	else
	{
		echo "connect";
	}
?>