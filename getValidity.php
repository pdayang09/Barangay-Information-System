<?php

require("connection.php");

if($_POST['bid']==2){
	
		$statement = "SELECT a.`strApplicantID`, CONCAT(a.`strApplicantLName`, ', ', a.`strApplicantFName`, ' ', a.`strApplicantMName`, ' ', a.`strNameExtension`) AS 'Name', a.`strApplicantContactNo`, CONCAT(a.`strApplicantAddress_street`, ' ', a.`strApplicantAddress_brgy`,', ',a.`strApplicantAddress_city`) AS 'Place' FROM tblapplicant a";
}else if($_POST['bid']==1){
	
		$statement = "SELECT a.`intMemberNo`, CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', a.`strContactNo`, CONCAT(s.`strStreetName`, ', ', s.`strPurok`) AS 'Place' FROM tblhousemember a INNER JOIN tblhousehold h ON h.intHouseholdNo = a.intForeignHouseholdNo INNER JOIN tblstreet s ON s.intStreetId = h.intForeignStreetId";	
}?>

<center>
		<div class="panel panel-default" id = "tablestreet">	
			<table class="table table-hover" style="height: 40%; overflow: scroll; "'>
				<thead><tr>
					<th>ID</th>
					<th>Full Name</th>
					<th>Contact No</th>
					<th>Place</th>
					<th>Action</th>
				</tr></thead>
			
			<tbody>
			<?php
			
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[1]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<?php
				if(strstr($row[0], 'app')){
												
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnProceed' value = '$row[0]' class='btn btn-success btn-xs'><i class='fa fa-calendar'></i></button><button type = 'submit' name='btnDocument' value = '$row[0]' class='btn btn-success btn-xs'><i class='fa fa-file'></i></button></td>";
						
					}
				else{						
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnProceed' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-calendar'></i></button><button type = 'submit' name='btnDocument' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-file'></i></button></td>";
						
					}
				
			}?>
			
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive -->