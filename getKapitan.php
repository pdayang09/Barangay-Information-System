<?php

require("connection.php");

if($_POST['bid']==2){
	
		$statement = "SELECT r.`strReservationID`, r.`strRSapplicantId`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.`intRequestORNo` FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` WHERE r.`strRSapprovalStatus` = 'For Approval'";
}else if($_POST['bid']==3){
	
		$statement = "SELECT r.`strReservationID`, r.`strRSapplicantId`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.`intRequestORNo` FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` WHERE r.`strRSapprovalStatus` = 'Approved'";	
}else if($_POST['bid']==4){
	
		$statement = "SELECT r.`strReservationID`, r.`strRSapplicantId`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.`intRequestORNo` FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` WHERE r.`strRSapprovalStatus` = 'Paid'";
}
?>
	<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>Reservation ID</th>	
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
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[3];?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[4];?></td>
				<?php
					if($row[4] == "For Approval"){ 	//Personnel and Action if Status = For Approval, Approve ?>	
						      <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
							  <div class="switch switch-square" 
                                 data-on-label="<i class=' fa fa-check'></i>"
                                 data-off-label="<i class='fa fa-times'></i>">
				<?php echo"<input type='checkbox' name=approve[] value='$row[0]'/>"; ?>
                              </div></td>
				<?php		
					}else if($row[4] == "Approved"){  //Personnel and Action if Status = Approved, Collect ?>
							  <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
							  <div class="switch switch-square" 
                                 data-on-label="<i class=' fa fa-check'></i>"
                                 data-off-label="<i class='fa fa-times'></i>">
				<?php echo"<input type='checkbox' name=disapprove[] value='$row[0]' />"; ?>
                              </div></td>
				<?php		
					}else if($row[4] == "Paid"){  //Personnel and Action if Status = Paid, Confirm		
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnView' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-check'></i></button>";
					}
				
			}?>
			
			</tbody>
			</table>
		</div></center><!-- Table-responsive -->
