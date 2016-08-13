<?php

require("connection.php");

if($_POST['bid']==1){

	 $statement = "SELECT DISTINCT p.`strRequestID`, CONCAT(r.`strRSresidentId`,r.`strRSapplicantId`) AS ID, p.`intRequestORNo`, p.`dblReqPayment`, t.`dblRemaining`, r.`strRSapprovalStatus` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.strreservationid = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSapprovalStatus` = 'Approved' AND  p.`dblReqPayment` > 0";
}else if($_POST['bid']==2){

	$statement = "SELECT DISTINCT p.`strRequestID`, CONCAT(r.`strRSresidentId`,r.`strRSapplicantId`) AS ID, p.`intRequestORNo`, p.`dblReqPayment`, t.`dblRemaining`, r.`strRSapprovalStatus` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.strreservationid = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSapprovalStatus` = 'Paid' AND  p.`dblReqPayment` > 0";
}
					
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
			
			<?php
					//Balance
					if($row[2]==0){	//Initial Payment				
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'> $row[3]</td>";
						
					}else if($row[2]>0 && $row[4]>0 && $row[3]>$row[4]){ //Partial Payment							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'> $row[4] </td>";
						
					}else if($row[2]>0 && $row[4]==0){	//0 Balance				
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'>0 </td>";
						
					}

					echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' value='$row[0]' name= 'btnRenderF'> Render Payment </button></td></tr>";
								
			}?>
			
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive --> 