<?php
session_start();
$var_value = $_SESSION['varname'];
echo $var_value;
if($var_value == "check1")
	echo "captureaaa";

?>