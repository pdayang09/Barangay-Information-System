<?php
require('connection.php');
if(!empty($_POST["zid"])){
	$zid = $_POST["zid"];
	$query = "select * from tblstreet where intForeignZoneId = $zid";
	$sql = mysqli_query($con,$query);
	
	foreach($sql as $street){
		?><option value = "<?php echo $street['intStreetId'];?>"> <?php echo $street['strStreetName'];?></option>
		<?php
	}
}
else{
	echo "<script>alert('no data');</script>";
}
?>