<?php
$search = $_POST['fid'];

require("connection.php");
 	$statement = "SELECT a.`intMemberNo` AS 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', a.`strContactNo`, CONCAT(s.`strStreetName`, ', ', s.`strPurok`) AS 'Place' FROM tblhousemember a INNER JOIN tblhousehold h ON h.`intHouseholdNo` = a.`intForeignHouseholdNo` INNER JOIN tblstreet s ON s.`intStreetId` = h.`intForeignStreetId` WHERE `strLastName` LIKE '$search'";

?>

 <p><font face="cambria" size=6 color="grey"> Results Found </font></p><br>
 <div id="showResult">
<table Border = '3' class="table table-striped table-bordered table-hover">
<tr>
	<th>Name</th>
	<th>Place</th>
	<th>Action</th>
</tr>
<?php
 $query = mysqli_query($con,$statement);
				
	while($row = mysqli_fetch_array($query)){
		$clientID = $row[0];
		$name = $row[1];
		$place = $row[3];
?>	
<tbody>
	<tr>
		<td><?php echo $name;?></td>
		<td><?php echo $place;?></td>
		<td><Button type="submit" name="btnTransfer" value = <?php echo $clientID; ?> >Click Me!</button>
		
		
		</td>
	</tr>
</tbody>
<?php	
	}

?>
</table>

</div>


