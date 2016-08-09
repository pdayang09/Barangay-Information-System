<?php
require('connection.php');


	$sid = $_POST["sid"];
	
	$query ="SELECT strHouseholdLname, concat(strBuildingNo,' ',strStreetName,',Purok ',strZoneName) as 'Address',strResidence , intHouseholdNo FROM `tblhousehold` inner join `tblstreet` on intStreetId = intForeignStreetId inner join tblzone on intZoneId = intForeignZoneId where !(strStatus = 'Disabled') && strHouseholdLname Like '$sid%'";
	$sql = mysqli_query($con,$query);
	?>
				<table  class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
<tr>
<th>Household Name</th>
<th>Address</th>
<th>Residence Status</th>
<th>Action</th>
</tr><?php
					while($row = mysqli_fetch_object($sql)){?>
					<tr> <td><?php echo $row->strHouseholdLname?></td>
					<td><?php echo $row->Address?></td>
				<td><?php echo $row->strResidence?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
					<div class="btn-group" role="group"> 
					<button class="btn btn-primary btn-round  btn-xs" type = submit value = <?php echo $row->intHouseholdNo?> name = 'Edit' >View</button>
					
					</div>	
					<div class="btn-group" role="group"> 
					 <button  class="btn btn-success  btn-xs" type = submit value = <?php echo $row->intHouseholdNo?> onClick="return confirm(
  'Do you really want to perform this action?');" name = 'Move' >Remove</button>
			
					</div>	
					<div class="btn-group" role="group">
				
					 <button class="btn btn-success btn-round btn-xs" type = submit value = <?php echo $row->intHouseholdNo?> name = 'transfer' >Transfer</button></td>
					</div>	
					</div>
			
					</tr>
				<?php }


?>
</tbody>
</table>