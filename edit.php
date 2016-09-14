<?php	
	include_once('connection.php');
	if(isset($_GET['id']))
	{
		$id 	= $_GET['id'];
		$row	= mysql_fetch_object(mysql_query("SELECT * FROM tbimage WHERE id = '$id'"));
	}
?>
<html>
<head>
	<title>Edit</title>
</head>
<body>
		<form action="update_image.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="hidden" value="<?= $row->id ?>" name="id">
		<img width="200px" height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row->image) ?>">
		<input type="submit" value="Upload" name="update">
	</form>
</body>
</html>