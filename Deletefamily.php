
<?php
require('connection.php');

$id = $_POST['sid'];
$query = "    Select concat(strLastName,', ',strFirstName,' ',strMiddleName,' ',strNameExtension) as Name, concat(strBuildingNo,', ',strStreetName ) as Address, strResidence from tblhousehold inner join tblhousemember on intHouseholdNo = intForeignHouseholdNo inner join tblStreet on intForeignStreetId = intStreetId where intHouseholdNo = $id and tblhousemember.strStatus = 'Head'";
$sql = mysqli_query($con,$query);
$row = mysqli_fetch_object($sql);

$name = $row->Name;
$bday = $row->Address;
$g = $row->strResidence;

?>
<div class="form-group" id = "contact-div">				<p><font face = "cambria" size = 4 color = "grey"> Household Head Name: </font></p>
	<div class="col-sm-9">

		<input id="DelName" class="form-control input-group-lg reg_name" type= text value = '<?php echo $name?>'  readonly> 
		
	</div>
	
	
</div>
<br><br><br>
<div class="form-group" id = "contact-div">				<p><font face = "cambria" size = 4 color = "grey"> Current Address: </font></p>
	<div class="col-sm-9">

		<input id="DelBday" class="form-control input-group-lg reg_name" type= text value = '<?php echo $bday?>'  readonly> 
		
	</div>
	
	
</div>
<br><br><br>
<div class="form-group" id = "contact-div">				<p><font face = "cambria" size = 4 color = "grey"> Residence: </font></p>
	<div class="col-sm-9">

		<input id="DelGend" class="form-control input-group-lg reg_name" type= text value = <?php echo $g?>  readonly> 
		
	</div>
	
	
</div><br><br><br>
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-default"  value = <?php echo $id?> name = "del" onclick = "return confirm('Are you sure with your decision?')">Submit</button>