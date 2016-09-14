
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

<div class="form-group" id = "contact-div">				<p><font face = "cambria" size = 4 color = "grey"> Date Died: </font></p>
	<div class="col-sm-9">

		<input id="dtdied" name = 'dtdied' class="form-control input-group-lg reg_name" type=date max = "<?php echo date("Y-m-d"); ?>" required> 
		
	</div>
		
</div><br><br><br>
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-default"  value = <?php echo $id?> name = "Headdec" onclick = "return checkdied()">Submit</button>