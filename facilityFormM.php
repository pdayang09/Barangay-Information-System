
	<?php
	require("connection.php");
	$query = mysqli_query($con, "SELECT `strFaciNo`, `strFaciName` FROM tblfacility where `strFaciStatus` = 'Good Condition'");

  	 while($row = mysqli_fetch_row($query)){
	  
	   	echo "  
		<p><font face='cambria' size=4 color='grey'><input id='facility' type='radio' name='resFacility' value='$row[0]'/> $row[1] 
		</font></p>";		
		
   	} ?>
	