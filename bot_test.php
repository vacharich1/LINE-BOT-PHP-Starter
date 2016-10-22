<?php
 
	$HOST_NAME = "http://botlinebyjfourtwins.orgfree.com/pma/index.php?db=1246984&token=73b82e1c10c93817bdcca80dd457c144";
	$DB_NAME = "1246984";
	$CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
 
	$USERNAME = "1246984";     // ตั้งค่าตามการใช้งานจริง
	$PASSWORD = "1234";  // ตั้งค่าตามการใช้งานจริง
 
 
	try {
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
	
		echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
	
	
	} catch (PDOException $e) {
	
		echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
	
	}
 
?>