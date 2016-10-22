<?php
 
$HOST_NAME = "http://botlinebyjfourtwins.orgfree.com/pma/";
	$DB_NAME = "1246984";
 
	$USERNAME = "1246984";     // ตั้งค่าตามการใช้งานจริง
	$PASSWORD = "1234";  // ตั้งค่าตามการใช้งานจริง
 
 
	try {
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
	
		echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
	
	
	} catch (PDOException $e) {
	
		echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
	
	}
 
?>