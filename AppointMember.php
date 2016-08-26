<?php
include('connection.php');
$id =  $_POST['sid'];
$query = "SELECT  Lcase(concat(strLastName,'_',Replace(strFirstName,' ',''))) as 'user', intMemberNo,concat(strLastName,' ,',strFirstName) as 'Name', strLastName,strFirstName, concat(strBuildingNo,' , ',strStreetName) as 'Street',Timestampdiff(YEAR,dtBirthdate,NOW()) as Age   FROM `tblhousemember` as a inner join `tblhousehold` as b on  a.intForeignHouseholdNo = b.intHouseholdNo inner join tblaccount as c on !(a.intMemberNo = c.intForeignMemberNo) inner join tblstreet as d on b.intForeignStreetId = d.intStreetId where intMemberNo = '$id'";
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
			<input id="controlno" name = "UserN" class="form-control input-group-lg reg_name" value = '<?php echo $row->user;?>'type="text" readonly>	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Password</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "Pass" class="form-control input-group-lg reg_name" type="password"  required>	
			</div>
		</div>
	<br><br><br>	
		<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Position</font></p>
			<div class="col-sm-12">		
		<select class ="form-control input-group-lg reg_name" name = 'position'>
		<?php
		$sql = mysqli_query($con,"Select strPosition, count(strPosition) from tblaccount where strPosition like 'Barangay Captain' GROUP by strPosition");
		if(mysqli_num_rows($sql)<1){
			echo "<option>Barangay Captain</option>";
		}//Captain
		
		$sql = mysqli_query($con,"Select strPosition, count(strPosition) from tblaccount where strPosition like 'Barangay Councilor' GROUP by strPosition");
		if(mysqli_num_rows($sql)<7){
			echo "<option>Barangay Councilor</option>";
		}//Councilors
		
		$sql = mysqli_query($con,"Select strPosition, count(strPosition) from tblaccount where strPosition like 'Secretary' GROUP by strPosition");
		if(mysqli_num_rows($sql)<1){
			echo "<option>Secretary</option>";
		}//Secretary
		
		$sql = mysqli_query($con,"Select strPosition, count(strPosition) from tblaccount where strPosition like 'Treasurer' GROUP by strPosition");
		if(mysqli_num_rows($sql)<1){
			echo "<option>Treasurer</option>";
		}//Treasurer
		
		$sql = mysqli_query($con,"Select strPosition, count(strPosition) from tblaccount where strPosition like 'Liason' GROUP by strPosition");
		if(mysqli_num_rows($sql)<1){
			echo "<option>Liason</option>";
		}//Liason
		
		$sql = mysqli_query($con,"Select strPosition, count(strPosition) from tblaccount where strPosition like 'Clerk' GROUP by strPosition");
		if(mysqli_num_rows($sql)<1){
			echo "<option>Clerk</option>";
		}//Clerk
		?>
		</select>
			</div>
		</div>
	<br><br><br>
	<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Email Address</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "Email" class="form-control input-group-lg reg_name" value = "" type="text"  >	
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
		<center> <button type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd" = value = '<?php echo $row->intMemberNo?>' > Save Record</button></div>