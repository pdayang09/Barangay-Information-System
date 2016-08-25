<?php
include('connection.php');
$id =  $_POST['sid'];
$query = "SELECT  intMemberNo,concat(strLastName,' ,',strFirstName) as 'Name', concat(strBuildingNo,' , ',strStreetName) as 'Street',Timestampdiff(YEAR,dtBirthdate,NOW()) as Age   FROM `tblhousemember` as a inner join `tblhousehold` as b on  a.intForeignHouseholdNo = b.intHouseholdNo inner join tblaccount as c on !(a.intMemberNo = c.intForeignMemberNo) inner join tblstreet as d on b.intForeignStreetId = d.intStreetId where intMemberNo = '$id'";
$sql = mysqli_query($con,$query);
$row = mysqli_fetch_object($sql);
?>
<div class = "showback" >

		<p><font face = "cambria" size = 5 color = "grey"> Resident's Full Name </font></p>
		<div class = "form-group">
			<div class="col-sm-12">
				<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text" value = '<?php echo $row->Name?>' readonly>			 
           </div>
		</div><br><br><br>
		
		<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Resident's Address</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  value = '<?php echo $row->Street?>'  readonly>	
			</div>
		</div>
	<br><br><br>	
  <div class="split-para"><font face = "cambria" size = 5 color = "grey"> Username</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "UserN" class="form-control input-group-lg reg_name" type="text" required>	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Password</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "Pass" class="form-control input-group-lg reg_name" type="text"  required>	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Email Address</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "Email" class="form-control input-group-lg reg_name" type="text"  >	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Start Date</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "Start" class="form-control input-group-lg reg_name" type="date" value = <?php echo date('Y-m-d');?> min = <?php echo date('Y-m-d');?>  required>	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey">End Date</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "End" class="form-control input-group-lg reg_name" type="date" min = <?php echo date('Y-m-d');?> required>	
			</div>
		</div>
	<br><br><br>	
		<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  value = value = '<?php echo $row->intMemberNo?>' > </div>