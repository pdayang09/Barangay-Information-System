<?php
require('connection.php');

if($_POST['bid']==2){
	$sid = $_POST["sid"];
	
	$query = "select intStreetId , strStreetName, strZoneName from tblStreet inner join tblZone on intForeignZoneId = intZoneId where strStreetName Like '$sid%'  order by intForeignZoneId , intStreetId desc";
	
	$sql = mysqli_query($con,$query);
	?>
	
	<table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'><!-- Table -->
		<thead><tr>
			<th> Street ID </th>
			<th> Street Name </th>
			<th> Purok Name </th>
			<th> Action </th>
		</tr></thead>
	
		<tbody><?php
			foreach($sql as $street){
				?><tr> <td><?php echo $street['intStreetId'];?></td>
					<td><?php echo $street['strStreetName'];?></td>
					<td><?php echo $street['strZoneName'];?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
						<div class="btn-group " role="group">	
							<button  class="btn btn-info btn-round" type = submit name = "btnEdit" value = <?php echo $street['intStreetId']; ?> >Edit</button>
						</div>
							
						<div class="btn-group " role="group" >	
							<button  class="btn btn-success btn-round" type = submit name = "btnDelete" value = <?php echo $street['intStreetId']; ?> >Delete</button>
						</div>
					</div></td>
				</tr>
		<?php
		}}
		else{
			$query = "select intStreetId , strStreetName, strZoneName from tblStreet inner join tblZone on intForeignZoneId = intZoneId  order by intForeignZoneId , intStreetId desc";
	$sql = mysqli_query($con,$query);
	?><table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'><!-- Table -->
					<thead><tr>
						<th> Street ID </th>
						<th> Street Name </th>
						<th> Purok Name </th>
						<th> Action </th>
					</tr></thead>
					
					<tbody><?php
	foreach($sql as $street){
		?><tr> <td><?php echo $street['intStreetId'];?></td>
									<td><?php echo $street['strStreetName'];?>				</td>
									<td><?php echo $street['strZoneName'];?></td>
									<td>
									<div class="btn-group " role="group" aria-label="..." >	
									<div class="btn-group " role="group">	
									<button  class="btn btn-info btn-round" type = submit name = "btnEdit" value = <?php echo $street['intStreetId']; ?> >Edit</button>
									</div>
									<div class="btn-group " role="group" >	
									<button  class="btn btn-success btn-round" type = submit name = "btnDelete" value = <?php echo $street['intStreetId']; ?> >Delete</button>
									</div>
									</div></td>
								</tr><?php 
								echo "<script>document.getElementById('searchr').value = '';</script>";
		}}


?>
</tbody>
</table>