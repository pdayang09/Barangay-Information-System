<?php

$sid = $_POST['sid'];?>
	
<form method = POST>
<?php
require('connection.php');

$id = $_POST['sid'];
$query = "Select concat(strLastName,', ',strFirstName) as Name, TIMESTAMPDIFF(YEAR,dtBirthdate,curdate()) as age, charGender,intForeignHouseholdNo from tblHousemember where intMemberNo = '$id'";
$sql = mysqli_query($con,$query);
$row = mysqli_fetch_object($sql);

$name = $row->Name;
$bday = $row->age;
$g = $row->charGender;
$houseno = $row->intForeignHouseholdNo;
if($g == 'M'){
	$Gender = 'Male';
}
else{$Gender = 'Female';}

?>
<div class="form-group" id = "contact-div">				<p><font face = "cambria" size = 4 color = "grey"> Full Name: </font></p>
	<div class="col-sm-9">

		<input id="DelName" class="form-control input-group-lg reg_name" type= text value = '<?php echo $name?>'  readonly> 
		
	</div>
	
	
</div>
<br><br><br>
<div class="form-group" id = "contact-div">				<p><font face = "cambria" size = 4 color = "grey"> Age: </font></p>
	<div class="col-sm-9">

		<input id="DelBday" class="form-control input-group-lg reg_name" type= text value = <?php echo $bday?>  readonly> 
		
	</div>
	
	
</div>
<br><br><br>
<div class="form-group" id = "contact-div">				<p><font face = "cambria" size = 4 color = "grey"> Gender: </font></p>
	<div class="col-sm-9">

		<input id="DelGend" class="form-control input-group-lg reg_name" type= text value = <?php echo $Gender?>  readonly> 
		
	</div>
	<br><br><br>
	<center>
	<p>Transfer to a:</p>
      <button = submit name = "Exist"  <?php echo "value = '".$sid."'";?> class="btn btn-default">Existing Household</button>
							   <button type = submit name = 'NewH' class="btn btn-default" <?php
							   echo "value = '".$sid."'";
							   
				
				 $sql = "Select dtBirthdate From tblhousemember where intMemberNo = '$sid'";
							   $query = mysqli_query($con,$sql);
							   $row = mysqli_fetch_object($query);
							   $bday = $row->dtBirthdate;
							   if((date("Y-m-d") - $bday)<18){
								   echo "disabled";
							   }
							   else{}?>>New Household</button>	</center>	  
							 </form>