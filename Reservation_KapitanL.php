
<?php 
	require("connection.php");	

	//Gets Today's Date
	$today = date("F j, Y, g:i a"); // displays date today
	
	//Personal Details
	$resId ="";
	$name ="";
	$contactno ="";	
	
	//Reservation Details
	//$resPurpose ="";
	$resDate = "";
	$resFrom = "";
	$resTo = "";
	$quantity = array();
	$returnedTemp =0;
	$unreturnedTemp =0;
	
	$returned =0;
	$unreturned =0;
?>

    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
				
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="searchr" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Search Last name">					
			</div>				
			<div class="col-sm-2">
				<button class="btn btn-info btn-round btn-s  " id = "searchst" name = "btnSearch" value = 2 onclick = "search(this.value)"><i class = "glyphicon glyphicon-search"></i></button>
			</div> <!-- 1 = Reservation_Kapitanl -->
		</div><br><br><br><br>
		
		<!-- Filters Resident / Applicant -->	
		<div class="col-sm-6">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button class="btn btn-warning" id = "searcht" name = "btnSearch" value = 2 onclick = "select(this.value)">For Approval</button>
			</div>
			<div class="btn-group" role="group">
				<button class="btn btn-success" id = "searcht" name = "btnSearch" value = 3 onclick = "select(this.value)">Approved</button>
			</div>
			<div class="btn-group" role="group">
				<button class="btn btn-primary" id = "searcht" name = "btnSearch" value = 4 onclick = "select(this.value)">Paid</button>
			</div>
		</div>
		</div><br><br><br>

<form method="POST">		
		<?php
				$statement = "SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`, ', ', re.`strMiddleName`) AS 'Name', re.`strContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` WHERE r.`strRSapprovalStatus` = 'For Approval' UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE r.`strRSapprovalStatus` = 'For Approval'";			
		?>
		
		<center>
		<div class = "showback" id = "tablestreet">	
			<table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'>
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
								<?php echo"<input type='checkbox' name= approve[] value='$row[0]' />"; ?>
                             </td>
				<?php		
					}else if($row[6] == "Approved"){  //Personnel and Action if Status = Approved, Collect ?>
							  <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
								<?php echo"<input type='checkbox' name= disapprove[] value='$row[0]' />"; ?>
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
		</div></center> <!-- Table-responsive -->    
		</div><br><br>
				
		<div class="col-sm-3">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<input type = "submit" name="btnConfirm" id="btnConfirm" class="btn btn-warning" value="Confirm Action">
			</div>
		</div>
		</div>	
		
	</form> 				
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
		 
		
		<?php
			if(isset($_POST['btnConfirm'])){
				
				if(!empty($_POST['approve'])){
					$approve = $_POST['approve'];	
					
					for($intCtr = 0; $intCtr < sizeof($approve); $intCtr++){ 		
					$reservation = $approve[$intCtr];
					
					require("connection.php");
					$statement = "SELECT `dblReqPayment` FROM `tblpaymentdetail` WHERE `strRequestID` = '$reservation'";

					require("connection.php");
					$query = mysqli_query($con, $statement);
										
					while($row = mysqli_fetch_array($query)){
						$payment = $row[0];

						mysqli_query($con, "UPDATE tblreservationrequest SET `strRSapprovalStatus` = 'Approved' WHERE `strReservationID` = '$reservation'");
						mysqli_query($con, "INSERT INTO `tblpaymenttrans`(`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES ('$reservation','','$payment','0','$payment')");	
					}
				}

					unset($approve);				
				}else{
					
				} 
					
				if(!empty($_POST['disapprove'])){					
					$disapprove = $_POST['disapprove'];	
					
					for($intCtr = 0; $intCtr < sizeof($disapprove); $intCtr++){ 		
					$reservation = $disapprove[$intCtr];
										
					mysqli_query($con, "UPDATE tblreservationrequest SET `strRSapprovalStatus` = 'For Approval' WHERE `strReservationID` = '$reservation'");
					}
					
					unset($disapprove);
				}else{
					
				}
				
				echo"<script> window.location='view_kapitan.php';</script>";

			}else if(isset($_POST['btnDisapprove'])){
				$reservation = $_POST['btnDisapprove'];

				$statement = "SELECT eq.`dtmREFrom`, eq.`dtmRETo`, eq.`strREEquipCode` FROM tblreserveequip eq INNER JOIN tblreservationrequest r ON r.strReservationID = eq.strReservationID WHERE eq.`strReservationID` = '$reservation' UNION SELECT f.`dtmREFrom`, f.`dtmRETo`, f.`strREFaciCode` FROM tblreservefaci f INNER JOIN tblreservationrequest r ON r.strReservationID = f.`strReservationID` WHERE f.`strReservationID` = '$reservation'";

				$query = mysqli_query($con,$statement);				
				while($row = mysqli_fetch_array($query)){
					$resFrom = $row[0];
					$resTo = $row[1];
					$facino = $row[2];

					$_SESSION['resFrom'] = $resFrom;
					$_SESSION['resTo'] = $resTo;
					$_SESSION['facino'] = $facino;
				}

				$statement = "SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`,', ',re.`strMiddleName`) AS 'Name', re.`strContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` WHERE r.`strReservationID` LIKE ('%$reservation%') UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE r.`strReservationID` LIKE ('%$reservation%')";
									
				$query = mysqli_query($con,$statement);				
				while($row = mysqli_fetch_array($query)){
					
					$resId = $row[0];
					$clientID = $row[1];
					$name = $row[2];
					$contactno = $row[3];	
					$respurpose = $row[4];
					$resdate = $row[5];

					$_SESSION['resId'] = $resId;
					$_SESSION['clientID'] = $clientID;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['resPurpose'] = $respurpose;	
					$_SESSION['resDate'] = $resdate;	
				}

				echo "<script> window.location = 'ChangeSched.php';</script>";
			}
		?>
	  

	  