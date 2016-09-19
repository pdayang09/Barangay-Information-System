<link href="dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<?php

require("connection.php");

if($_POST['bid']==1){

	 $statement = "SELECT p.`strRequestID`, r.`strRSresidentId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.`intORNo` = p.`intRequestORNo` WHERE r.`strRSresidentId` != '' AND r.`strRSapprovalStatus`='Approved' AND t.`dblRemaining` > 0 UNION SELECT p.`strRequestID`, r.`strRSapplicantId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.`intORNo` = p.`intRequestORNo` WHERE r.`strRSapplicantId` != '' AND r.`strRSapprovalStatus`='Approved' OR r.`strRSapprovalStatus`='Half Paid' AND t.`dblRemaining` > 0";

}else if($_POST['bid']==2){

	$statement = "SELECT p.`strRequestID`, r.`strRSresidentId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSresidentId` != '' AND r.`strRSapprovalStatus`='Paid' UNION SELECT p.`strRequestID`, r.`strRSapplicantId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSapplicantId` != '' AND r.`strRSapprovalStatus`='Paid'";
}
					
		?>

	<center>
		<div class="panel panel-default" id="tablestreet">	
			<table id="getTreasurer" class="table table-hover" style="height: 40%; overflow: scroll;">
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
				if($_POST['bid']==1){
					echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' type='submit' value = '$row[0]' name= 'btnRenderF'> Render Payment </button></td>"; 
				}else if($_POST['bid']==2){
					echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'></td>";
				}
				

			} ?>
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
	$('#getTreasurer').dataTable();	
    });
  </script>