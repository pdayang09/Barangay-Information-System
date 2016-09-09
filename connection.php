<?php
	if($con= mysqli_connect("localhost","root","","brgydb")){
		
	}else{
		die("Unable to connect to database1".mysql_error());
	}
	mysqli_select_db($con, "brgydb");
?>
<?php
	$cn = mysql_connect('localhost','root','') or die ('Can not');

	if ($cn)
	{
		mysql_select_db('brgydb',$cn) or die('Can not connect with database!');
	}
?>
