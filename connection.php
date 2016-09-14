
<?php
	if($con= mysqli_connect("localhost","root","","brgydb")){
		
	}else{
		die("unable to connect because".mysql_error());
	}
	mysqli_select_db($con, "brgydb");
?>