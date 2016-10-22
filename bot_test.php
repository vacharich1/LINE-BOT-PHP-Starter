<?php
 
	$HOST_NAME = "sql6.freemysqlhosting.net";
	$DB_NAME = "sql6141179";
	$CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
 
	$USERNAME = "sql6141179";     // ตั้งค่าตามการใช้งานจริง
	$PASSWORD = "2VSm3JEfdX";  // ตั้งค่าตามการใช้งานจริง
 
 
	try {
		
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
	
		echo "connect";
	
	
	} catch (PDOException $e) {
	
		echo "connot connect".$e->getMessage();
		echo "assacc";
	
	}
 
?>