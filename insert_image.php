<?php	
	include_once('connection.php');
	
	$image 		= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	
	$sql = "INSERT INTO tbimage(name,image) VALUES('{$image_name}','{$image}')";
	
	if(mysql_query($sql))
	{
		header('location: changeSettings.php');
	}
	else
	{
		echo "Error";
	}
?>

