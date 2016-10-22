<?php  
// ส่วนกำหนดการเชื่อมต่อฐานข้อมูล  
$hostname_connection = "localhost";  
$database_connection = "test";  
$username_connection = "admin";  
$password_connection = "";  

 
$db = mysqli_connect($hostname_connection,$username_connection,$password_connection,"test"); //keep your db name

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
 
    // เริ่มต้นใช้งาน class.upload.php ด้วยการสร้าง instant จากคลาส
    $upload_image = new upload($_FILES['image_name']) ; // $_FILES['image_name'] ชื่อของช่องที่ให้เลือกไฟล์เพื่ออัปโหลด
 
    //  ถ้าหากมีภาพถูกอัปโหลดมาจริง
    if ( $upload_image->uploaded ) {
 
        // ย่อขนาดภาพให้เล็กลงหน่อย  โดยยึดขนาดภาพตามความกว้าง  ความสูงให้คำณวนอัตโนมัติ
        // ถ้าหากไม่ต้องการย่อขนาดภาพ ก็ลบ 3 บรรทัดด้านล่างทิ้งไปได้เลย
        $upload_image->image_resize         = true ; // อนุญาติให้ย่อภาพได้
        $upload_image->image_x              = 400 ; // กำหนดความกว้างภาพเท่ากับ 400 pixel 
        $upload_image->image_ratio_y        = true; // ให้คำณวนความสูงอัตโนมัติ
 
        $upload_image->process( "upload_images" ); // เก็บภาพไว้ในโฟลเดอร์ที่ต้องการ  *** โฟลเดอร์ต้องมี permission 0777
		
		
		$image = addslashes(file_get_contents($_FILES[$upload_image]['tmp_name']));
		//you keep your column name setting for insertion. I keep image type Blob.
		$query = "INSERT INTO image (id,image) VALUES('','$image')";  
		$qry = mysqli_query($db, $query);

    }//END if ( $upload_image->uploaded )
 
 
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Image To Database</title>
</head>
 
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>Image_name 
    <input name="image_name" type="file" id="image_name" size="40" />
  </p>
  <p>
    <input type="submit" value="Upload" />
    <input type="hidden" name="MM_insert" value="form1" />
  </p>
</form>
</body>
 
</html>