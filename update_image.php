<?php	
	include_once('connection.php');
	
	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		if(!empty($_FILES['image']['tmp_name']))
		{
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			
			$sql = "UPDATE tbimage
								SET name = '$image_name',
									image = '$image'
								WHERE id = '$id'";
			if(mysql_query($sql))
			{
				header('location: changeSettings.php');
			}
		}
	}
	
	
?>