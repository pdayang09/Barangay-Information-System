	<link href="dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
<?php

require("connection.php");

if($_POST['bid']==2){
	
		$statement = "SELECT a.`strApplicantID`, CONCAT(a.`strApplicantLName`, ', ', a.`strApplicantFName`, ' ', a.`strApplicantMName`, ' ', a.`strNameExtension`) AS 'Name', a.`strApplicantContactNo`, CONCAT(a.`strApplicantAddress_street`, ' ', a.`strApplicantAddress_brgy`,', ',a.`strApplicantAddress_city`) AS 'Place' FROM tblapplicant a";
}else if($_POST['bid']==1){
	
		$statement = "SELECT a.`intMemberNo`, CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', a.`strContactNo`, CONCAT(s.`strStreetName`, ', ', s.`strPurok`) AS 'Place', YEAR(Now()) - YEAR(a.`dtBirthdate`) AS 'Age' FROM tblhousemember a INNER JOIN tblhousehold h ON h.`intHouseholdNo` = a.`intForeignHouseholdNo` INNER JOIN tblstreet s ON s.`intStreetId` = h.`intForeignStreetId`WHERE YEAR(Now()) - YEAR(a.`dtBirthdate`) >= 16 AND (strVotersId != '' || MONTH(NOW()) - MONTH(a.dtEntered) >=6)";	
}?>

<center>
		<div class="panel panel-default" >	
			<table  id = "nonResident" class="table table-hover" style="height: 40%; overflow: scroll; ">
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

   <!-- DATA TABLE -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

  <script src="dataTables/jquery.dataTables.js"></script>
  <script src="dataTables/dataTables.bootstrap.js"></script>  

  <script>
    $(document).ready(function() {
    $('#dataTable').dataTable();
	$('#nonResident').dataTable();	
    });
  </script>