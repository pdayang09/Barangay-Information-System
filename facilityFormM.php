	<p><font face='cambria' size=4 color='grey'><input type='radio' name='resFacility' value='' checked="checked" /> None
	</font></p>		

	<?php
	require("connection.php");
	$query = mysqli_query($con, "SELECT `strFaciName`, `strFaciNo` FROM tblfacility where `strFaciStatus` = 'Good Condition'");

  	 while($row = mysqli_fetch_row($query)){
	  
	   	echo "<p><font face='cambria' size=4 color='grey'><input type='radio' name='resFacility' value='$row[1]'/> $row[0] 
		</font></p>";		
		
   	} ?>

<!-- change into correct query of the facility maintenance -->