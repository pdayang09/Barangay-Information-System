<html>
<body>
<div class="col-sm-3 col-md-6 col-lg-6">
			<div class = "showback">
				<form action='' method='POST' enctype='multipart/form-data'>
					
					<br>
					<input type='file' name='userFile'><br>
					
				</form>
				
				<?php
					if (isset($_POST['upload_btn'])){
						// $ImageName2 = $_POST['image_name_1'];

					//$info = pathinfo($_FILES['userFile']['name']);
					//$ext = $info['extension']; // get the extension of the file

					$originalname = $_FILES['userFile']['name'];
					$newname = "$originalname."; 

					$target = 'images/FacilityUpload/'.$newname;
					move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
					//echo $_FILES['userFile']['tmp_name'];

					require('connection.php');
					mysqli_query($con,"INSERT INTO `imageuploadtry`(`imageUpload`) VALUES ($originalname);");
					echo "<script>alert('Success');</script>";
							 }
				?>
			</div>
		</div>
</body>
		</html>