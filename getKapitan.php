<?php

require("connection.php");

if($_POST['bid']==2){
	
		$statement = "SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`, ', ', re.`strMiddleName`) AS 'Name', re.`strContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` WHERE r.`strRSapprovalStatus` = 'For Approval' UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE r.`strRSapprovalStatus` = 'For Approval'";
}else if($_POST['bid']==3){
	
		$statement = "SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`, ', ', re.`strMiddleName`) AS 'Name', re.`strContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` WHERE r.`strRSapprovalStatus` = 'Approved' UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE r.`strRSapprovalStatus` = 'Approved'";	
}else if($_POST['bid']==4){
	
		$statement = "SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`, ', ', re.`strMiddleName`) AS 'Name', re.`strContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` WHERE r.`strRSapprovalStatus` = 'Paid' UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE r.`strRSapprovalStatus` = 'Paid'";
}
?>
	<center>
		<div class="panel panel-default" id = "tablestreet"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>Full Name</th>					
					<th>Contact No</th>
					<th>Purpose</th>
					<th>Reservation Date</th>
					<th>Status</th>
					<th>Action</th>
				</tr></thead>
			
			<tbody>
			<?php
			$approve[] = array();
			$disapprove[] = array();
			
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
				<tr>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[4];?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[5];?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[6];?></td>
				<?php
					if($row[6] == "For Approval"){ 	//Personnel and Action if Status = For Approval, Approve ?>	
						      <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
								<?php echo"<input type='checkbox' name=Ddisapprove[] value='$row[0]' />"; ?>
                             </td>
				<?php		
					}else if($row[6] == "Approved"){  //Personnel and Action if Status = Approved, Collect ?>
							  <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
								<?php echo"<input type='checkbox' name=Ddisapprove[] value='$row[0]' />"; ?>
                             </td>
				<?php		
					}else if($row[6] == "Paid"){  //Personnel and Action if Status = Approved, Collect ?>
							 <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
							<?php echo"<button type = 'submit' name='btnDisapprove' value = '$row[0]' class='btn btn-primary btn-xs'>Disapprove</button>"; ?>
                             </td>		
				<?php	}
				
			}?>
			
			</tbody>
			</table>
		</div></center><!-- Table-responsive -->
