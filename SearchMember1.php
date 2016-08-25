<div class = "showback">
		<table  class="table table-striped table-bordered table-hover" >
		<thead>
		<th>Resident Name</th>
		<th>Resident Address</th>
		<th>Age</th>
		<th>Action</th>
		</thead>
		<tbody>
<?php
include('connection.php');
$id = $_POST['sid'];
$query = "SELECT  intMemberNo,concat(strLastName,' ,',strFirstName) as 'Name', concat(strBuildingNo,' , ',strStreetName) as 'Street',Timestampdiff(YEAR,dtBirthdate,NOW()) as Age   FROM `tblhousemember` as a inner join `tblhousehold` as b on  a.intForeignHouseholdNo = b.intHouseholdNo inner join tblaccount as c on !(a.intMemberNo = c.intForeignMemberNo) inner join tblstreet as d on b.intForeignStreetId = d.intStreetId where !(strVotersId = '') && Timestampdiff(YEAR,dtBirthdate,NOW()) && strLastName Like '$id%'";
$sql = mysqli_query($con,$query);
						if(mysqli_num_rows($sql) > 0){
							$i = 1;
					
							while($row = mysqli_fetch_object($sql)){?>
								<tr>
									<td><?php echo $row->Name?>				</td>
									<td><?php echo $row->Street?></td>
									<td><?php echo $row->Age?></td>
									<td> <button value = '<?php echo $row->intMemberNo?>' onclick = "Appoint(this.value)">Choose</button></td>
								</tr>
		<?php }} ?></tbody>
				</table></div>