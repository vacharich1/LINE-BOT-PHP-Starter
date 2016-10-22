<?php
 
$HOST_NAME = "http://botlinebyjfourtwins.orgfree.com/";
	$DB_NAME = "test";
	$CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
 
	$USERNAME = "1246984";     // ตั้งค่าตามการใช้งานจริง
	$PASSWORD = "p1a6n3g1ya";  // ตั้งค่าตามการใช้งานจริง
 
 
	try {
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
	
		echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
	
	
	} catch (PDOException $e) {
	
		echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
	
	}
 
?>