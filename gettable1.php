<?php
require('connection.php');

if($_POST['bid']==1){ //FacilityEquipmentL
	$sid = $_POST["sid"];
		
		$statement = "SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`,', ',re.`strMiddleName`) AS 'Name', re.`strContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` WHERE re.`strLastName` LIKE ('%$sid%') UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE a.`strApplicantLName` LIKE ('%$sid%')";
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
			
			$query = mysqli_query($con, $statement);
			while($row = mysqli_fetch_array($query)){?>
				<tr>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[4]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[5];?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[6];?></td>
				<?php
					if($row[6] == "For Approval"){	//Personnel and Action if Status = For Approval, Approve	
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><input type='checkbox' name= approve[] value = '$row[0]' data-toggle='switch' />";
						
					}else if($row[6] == "Approved"){  //Personnel and Action if Status = Approved, Collect
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnCollect' value = '$row[0]' class='btn btn-success btn-xs'><i class='fa fa-edit'></i></button>";
						
					}else if($row[6] == "Paid"){  //Personnel and Action if Status = Paid, Confirm			
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnConfirm' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-check'></i></button>";
					}
				echo"</tr>";
			}?>
			
			</tbody>
			</table>
		</div></center><!-- Table-responsive -->
<?php }else if($_POST['bid']==2){ //Reservation_KapitanL
	$sid = $_POST["sid"];
		
		$statement = "SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`,', ',re.`strMiddleName`) AS 'Name', re.`strContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` WHERE re.`strLastName` LIKE ('%$sid%') UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE a.`strApplicantLName` LIKE ('%$sid%')";
?>
	<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
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
								<span class="input-group-addon"><?php echo"<input type='checkbox' name=approve[] value='$row[0]' />"; ?></span>
                             </td>
				<?php		
					}else if($row[6] == "Approved"){  //Personnel and Action if Status = Approved, Collect ?>
							  <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
								<span class="input-group-addon"><?php echo"<input type='checkbox' name=disapprove[] value='$row[0]' />"; ?></span>
                             </td>
				<?php		
					}
				
			}?>
			
			</tbody>
			</table>
		</div></center><!-- Table-responsive -->
<?php }else if($_POST['bid']==3){ //Reservation_PaymentL
	$sid = $_POST["sid"];
		
		$statement = "SELECT p.`strRequestID`, r.`strRSresidentId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSresidentId` != '' AND p.`strRequestID` LIKE('%$sid%') UNION SELECT p.`strRequestID`, r.`strRSapplicantId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSapplicantId` != '' AND p.`strRequestID` LIKE('%$sid%')";
?>
	<center>
		<div class="panel panel-default" id = "tablestreet"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>Reservation ID</th>				
					<th>Payment</th>
					<th>Balance</th>
					<th>Action</th>
				</tr></thead>
			
			<tbody>
			<?php
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[6]; ?></td>
			<?php
				echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' type='submit' value = '$row[0]' name= 'btnRenderF'> Render Payment </button></td>"; 

			} ?>
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive --> 
<?php } ?>