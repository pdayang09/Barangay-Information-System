<div class="form-group">

	<?php
	require("connection.php");
	$query = mysqli_query($con, "SELECT `strFaciName`, `strFaciNo` FROM tblfacility where `strFaciStatus` = 'Good Condition'");

  	 while($row = mysqli_fetch_row($query)){
	  
	   	echo "<div class='col-sm-4'>  
		<p><font face='cambria' size=4 color='grey'><input type='radio' name='resFacility' value='$row[1]'/> $row[0] 
		</font></p>		
		</div>";		
		
   	} ?>
	
</div>

<!-- change into correct query of the facility maintenance -->