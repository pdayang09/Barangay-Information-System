<?php

$sid = $_POST['sid'];?>
	
<form method = POST>
      <button = submit name = "Exist"  <?php echo "value = '".$sid."'";?> class="btn btn-default">Existing Household</button>
							   <button type = submit name = 'NewH' class="btn btn-default" <?php
							   echo "value = '".$sid."'";
							   
							   require('connection.php');
				
				 $sql = "Select dtBirthdate From tblhousemember where intMemberNo = '$sid'";
							   $query = mysqli_query($con,$sql);
							   $row = mysqli_fetch_object($query);
							   $bday = $row->dtBirthdate;
							   if((date("Y-m-d") - $bday)<18){
								   echo "disabled";
							   }
							   else{}?>>New Household</button>		  
							 </form>