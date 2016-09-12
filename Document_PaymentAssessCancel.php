 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
		<!-- Retrieve Personal Data -->
	<?php 
	
		//Personal Details
		//$resId = $_SESSION['resId'];
		//$clientID = $_SESSION['clientID'];
		//$name = $_SESSION['name'];
		//$contactno = $_SESSION['contactno'];
		//$address =  $_SESSION['address'];
		
		//$payOR = $_POST['payOR'];
		//$_POST['payOR'] = $payOR;
		$name = $_SESSION['name'];
		$clientID = $_SESSION['clientID'];
		//echo"<script> alert('$clientID')</script>";
		$amount = $_SESSION['amount'];
		$totalAmount = $amountRender = 0;
		 //$change = $_POST['change'];
		 //Listing all docs requested by applicant
		$listDocSQL = "SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', p.dblReqPayment as 'TotalAmount',  d.strDocName AS Document
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.strDocReqStat = 'Cancelled' AND a.intMemberNo = '$clientID'
			UNION  
SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', p.dblReqPayment as 'TotalAmount', d.strDocName AS Document 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Cancelled' AND v.intVehicleType = 1 AND a.intMemberNo = '$clientID'
			UNION 

SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID',  p.dblReqPayment as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Cancelled' AND v.intVehicleType = 0 AND a.intMemberNo = '$clientID'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Cancelled' AND a.intMemberNo = $clientID AND p.intRequestORNo = 0
			UNION
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Cancelled' AND a.intMemberNo = $clientID AND p.intRequestORNo = 0
			UNION
			SELECT CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Cancelled' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo = 0
			UNION
			SELECT CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Cancelled' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo = 0";
			$listDoc = mysqli_query($con, $listDocSQL);
			
		//Conversion of Time
		//$time1 = StrToTime ($resFrom);
		//$time2 = StrToTime ($resTo);
		//$diff = $time1 - $time2;
		//$hours = $diff / ( 60 * 60 );
		//$hours = -1 * $hours;
		
		//Gets Today's Date
		$today = date("m-d-Y");// displays date today
		
		//Payment
		$total =0;
		$amountR =0;
		$balance =0;
		$change =0;
	?>
	
	<form method = "POST">
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <legend ><font face = "cambria" size = 8 color = "grey"> Payment Assessment </font></legend>
					   	
						<div class = "bodybody">	
								<div class="panel-body">
									<div class="form-group">
																			
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Date
											<input id="payDate" class="form-control input-group-lg reg_name" type="text"  name="payDate" value = "<?php echo" $today"; ?>" disabled></font>											
										</div>

											
									</div><br><br><br><br> <!-- /#form-group -->
								
								
									<div class="form-group">
										
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Payor
											<input id="payor" name="payor" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value = "<?php echo" $name"; ?>" disabled></font>		
										</div>
									
										<br><br>
									
									</div>
								</div>
								<div class="col-lg-8">
								<div class="form-group"> <!-- /Reservation Details Facility-->
										<font face = "cambria" size = 5 color = "grey"> Document(s) Requested</font><br><br>
										
										<div class="col-sm-10">
										<div class="panel panel-default"><!-- Default panel contents -->
											<table class="table"'><!-- Table -->
												<thead>
												<tr>
													<th> Request ID </th>
													<th> Document </th>
													<th> Amount </th>
												</tr>
												</thead>
											<tbody>						
												<tr><?php
												 while($row = mysqli_fetch_row($listDoc))
												{?>
													<td> <?php echo $row[2];?> </td>
													<td> <?php echo $row[4];?> </td>
													<td> <?php echo $row[3];?> </td>
													
													<?php
													$totalAmount = $totalAmount + $row[3];
													echo "</tr>";
												}?>
													
												
											</tbody>
										</table>
										</div>
										
								
								
								</div>
								<br>
									</div>
									</div>
								<div class="form-group">
								<div class="col-sm-10">
									
										<?php
											if(isset($_POST['btnCancel']))
											{
												//Dpat moedal
												
												require('connection.php');
												$cancel = $_POST['btnCancel'];
												//echo"<script> alert('$cancel')</script>";
												//Cancel Rergular DOc
												$deleteDocReq = "UPDATE `tbldocumentrequest` SET `strDocReqStat` = 'Cancelled' WHERE `tbldocumentrequest`.`strDocRequestID` = '$cancel';";
												$deleteDoc = mysqli_query($con, $deleteDocReq);
												//Cancel Bus Cleara
												$deleteBusReq = "UPDATE `tblbusinessstat` SET `strClearanceStat` = 'Cancelle' WHERE `tblbusinessstat`.`strBusStatID` = '$cancel'";
												mysqli_query($con, $deleteBusReq);
												/*$deleteVehicle = "DELETE FROM `tbldocumentrequest` WHERE `tbldocumentrequest`.`strDocRequestID` = '$cancel';";
												mysqli_query($con, $deleteVehicle);*/
												if($deleteDoc  == true && $deleteBusReq == true ){
												echo"<script> alert('Cancelled.')</script>";}
												
											}
										?>
										</div> <!-- /#panel panel-default --> 
										</div><br><br> <!--col-sm-6-->
									
										<!-- /Reservation Details Equipment-->	
										<div class="col-sm-10">
										
									</div>
								</div><br><br><br><br>
																		
								<div class="col-sm-10">
									<!-- /Payment Details -->								
									<font face = "cambria" size = 5 color = "grey"> Payment Details</font>
									<br><br>
								</div>
								
								<div class="col-sm-3" id="showAmount">
									<font face = "cambria" size = 4.5 color = "grey"> Total Amount Due :
										<input id="demo" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" name="totalAmount" value= " <?php echo" $totalAmount";?>"disabled></font>
										
										
								</div>
								<div class="col-sm-2">
								<font face = "cambria" size = 4.5 color = "grey"> Amount Render
										<input name="amountRender" class="form-control input-group-lg reg_name" type="number"  title="generated brgyId" value= "<?php echo $_POST['amountRender']?>" required></font><br><br><br>
										<button type="submit" class="btn btn-outline btn-success" name="btnPay">Render Payment</button></center>
																				
								</div>
								<div class="col-sm-3">
											<font face = "cambria" size = 4.5 color = "grey"> OR No
											<input id="payOR" name="payOR" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "<?php //echo $_POST['payOR'];?>" required></font>											
								</div>
								<div class="col-sm-2" id="showAmount">
								<br><br><center>
								
								</div>
	
								<p id="demo"></p>

								<div class="col-sm-6">
									
								</div>

								
							
			<?php if(isset($_POST['btnPay']))
			{
				require('connection.php');
				$pay = $_POST['btnPay'];
				$updateOR = $updateReqStat = $proceed = "";
				//$totalAmount = $amount;
				$amountRender = $_POST['amountRender'];
				
					$payOR = $_POST['payOR'];
					//$render = $_POST['render'];

				if(!empty($amountRender) && !empty($totalAmount)){
					if($amountRender > $totalAmount){
						$change = $amountRender - $totalAmount;
						$proceed = 1;
						
					}else if($amountRender == $totalAmount){
						$change = 0;
						$proceed = 1;
					}else if($amountRender < $totalAmount){
						echo"<script> alert('Insufficient amount')</script>";
						$proceed = 0;
					}
					
				}else{
					echo"<script> alert('You have inserted invalid amount')</script>";
				}
				

				if($proceed == 1)
				{
					

					//$_POST['change'] = $change;
					//echo"<script> alert('$payOR')</script>";
					$paymentORSQL = "INSERT INTO `tblpaymenttrans` (`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES ('$payOR', NOW(), '$totalAmount', '$amountRender', '$change');";
					$paymentOR = mysqli_query($con, $paymentORSQL);
				
					if($paymentOR == true)
					{
						
						$listDoc = mysqli_query($con, $listDocSQL);
						while($row = mysqli_fetch_row($listDoc))
						{
							//echo"<script> alert('yhayhayh')</script>";
							//UPDATE `tblpaymentdetail` SET `intRequestORNo` = '1234567' WHERE `strRequestID` = '49'
							$updateORSQL = "UPDATE `tblpaymentdetail` SET `intRequestORNo` = '$payOR' WHERE `tblpaymentdetail`.`strRequestID` = '$row[2]';";
							$updateOR = mysqli_query($con, $updateORSQL);
							
							$updateReqStatSQL = "UPDATE `tbldocumentrequest` SET `strDocReqStat` = 'Paid' WHERE `tbldocumentrequest`.`strDocRequestID` = '$row[2]'";
							$updateReqStat = mysqli_query($con, $updateReqStatSQL);
							
							
							$updateBusStatSQL = "UPDATE `tblbusinessstat` SET `strClearanceStat` = 'Paid' WHERE `tblbusinessstat`.`strBusStatID` = '$row[2]'";
							$updateBusStat = mysqli_query($con, $updateBusStatSQL);
							
							$updateVehicleStatSQL = "UPDATE `tblvehicleclearance` SET `strClearanceStat` = 'Paid' WHERE `tblvehicleclearance`.`strVCplateNo` = '$row[2]'";
							$updateVehicleStat = mysqli_query($con, $updateVehicleStatSQL);
							//dr.datDRdateRequested = CURDATE() vc.datVCStat = CURDATE() bs.
					 
							//$updateReqStat = mysqli_query($con, $updateReqStatSQL);
							
						}
						if($updateReqStat == true && $updateVehicleStatSQL == true && $updateVehicleStat== true )
						{
							echo"<script> alert('Payment Received')</script>";
							$_SESSION['name'] = $name;
							$_SESSION['payOR'] = $payOR;
							$_SESSION['name'] = $name;
							$_SESSION['totalAmount'] = $totalAmount;
							$_SESSION['amountRender'] = $amountRender;
							$_SESSION['change'] = $change;
							echo "<script> window.location = 'Document_PaymentSummary.php';</script>";
						}
					}//if($paymentOR == true)
				}
			}// if(isset($_POST['btnPay']))
			
			?>							
									
						</div><br> <!-- /#bodybody -->
					</div> <!-- /#col-lg-12 -->
										
				</div>	<!-- /#row -->
			</div> <!-- /#container-fluid -->
			
		</div><br><br> <!-- /#page-content-wrapper -->
    </div> <!-- /#wrapper -->
				
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>

<?php require("footer.php");?>