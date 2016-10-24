<?php
session_start();
require_once'bot.php';
$var_value = $_SESSION['varname'];
if($var_value == "check1")
	echo "capture";
else
	echo "no data base";

?>