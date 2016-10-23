<body>
<form action="index.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="image" /><input type="submit" name="submit" value="upload" />
	
</form>
<?php


if(isset($_POST['submit']))
{
	
	//mysql_connect("sql6.freemysqlhosting.net","sql6141179","2VSm3JEfdX");
	$host= "sql6.freemysqlhosting.net";
	$db = "sql6141179";
	$CHAR_SET = "charset=utf8"; 
 
	$username = "sql6141179";    
	$password = "2VSm3JEfdX";   
	
	//mysqli_connect($host, $username, $password)or die('failed');
	//mysqli_query('set names utf8');
	//mysqli_select_db($db)or die('select filae');
	
		$link = mysqli_connect($host, $username, $password, $db);
		if (!$link) {
    			die('Could not connect: ' . mysqli_connect_errno());
		}

	//mysql_select_db("test");	
	
	$imageName = mysqli_real_escape_string($link, $_FILES["image"]["name"]);
	$imageData = mysqli_real_escape_string($link, file_get_contents($_FILES["image"]["tmp_name"]));
	$imageType = mysqli_real_escape_string($link, $_FILES["image"]["type"]);
	
	if(substr($imageType,0,5) == "image")
	{
		
		$sql = "INSERT INTO images (id, name, image)
				VALUES ('', '$imageName', '$imageData')";

		if (mysqli_query($link, $sql)) {
    			echo "New record created successfully";
		} else {
    			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		echo "work code";	
	}
	else
	{
		echo"Only images are allowed";	
	}
}
?>

</body>
