<?php
include('connection.php');
$id =  $_POST['sid'];
$query = "SELECT distinct Lcase(concat(strLastName,'_',Replace(strFirstName,' ',''))) as 'user', intMemberNo ,concat(strLastName,' ,',strFirstName) as 'Name', strLastName,strFirstName, concat(strBuildingNo,' , ',strStreetName) as 'Street',Timestampdiff(YEAR,dtBirthdate,NOW()) as Age FROM `tblhousemember` as a inner join `tblhousehold` as b on a.intForeignHouseholdNo = b.intHouseholdNo inner join tblaccount as c on !(a.intMemberNo = c.intForeignMemberNo) inner join tblstreet as d on b.intForeignStreetId = d.intStreetId where intMemberNo = $id";
$sql = mysqli_query($con,$query);
$row3 = mysqli_fetch_object($sql);
?>
<div class = "showback" >

		<p><font face = "cambria" size = 5 color = "grey"> Resident's Full Name </font></p>
		<div class = "form-group">
			<div class="col-sm-12">
				<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text" value = '<?php echo $row3->Name?>' readonly>			 
           </div>
		</div><br><br><br>
		
		<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Resident's Address</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  value = '<?php echo $row3->Street?>'  readonly>	
			</div>
		</div>
	<br><br><br>	
  <div class="split-para"><font face = "cambria" size = 5 color = "grey"> Username</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "UserN" class="form-control input-group-lg reg_name" value = '<?php echo $row3->user;?>'type="text" readonly>	
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
		$sql = mysqli_query($con,"Select intPositionId,strPositionName from tblbrgyposition");
		while($row = mysqli_fetch_object($sql)){
			$sql2 = mysqli_query($con,"select intNumber,count(intForeignPositionId) as num from tblaccount as a INNER join tblbrgyposition as b on a.intForeignPositionId = b.intPositionId where intForeignPositionId = ".$row->intPositionId.";");
			$row2 = mysqli_fetch_object($sql2);
			if($row2->intNumber != $row2->num){
			?><option value = '<?php echo $row->intPositionId ?>'><?php echo $row->strPositionName ?></option><?php }
		}
		
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
		<center> <button type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd" = value = '<?php echo $row3->intMemberNo?>' > Save Record</button></div>