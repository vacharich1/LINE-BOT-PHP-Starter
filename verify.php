<?php
session_start();
$var_value = $_SESSION['varname'];
if($var_value == "check1")
	echo "captureaaa";

?>