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
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.strDocReqStat = 'Unpaid' AND a.intMemberNo = '$clientID'
			UNION  
SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', p.dblReqPayment as 'TotalAmount', d.strDocName AS Document 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 1 AND a.intMemberNo = '$clientID'
			UNION 

SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID',  p.dblReqPayment as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 0 AND a.intMemberNo = '$clientID'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Unpaid' AND a.intMemberNo = $clientID AND p.intRequestORNo = 0
			UNION
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Unpaid' AND a.intMemberNo = $clientID AND p.intRequestORNo = 0
			UNION
			SELECT CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Unpaid' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo = 0
			UNION
			SELECT CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Unpaid' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo = 0";
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
													<th> Action </th>
												</tr>
												</thead>
											<tbody>						
												<tr><?php
												 while($row = mysqli_fetch_row($listDoc))
												{?>
													<td> <?php echo $row[2];?> </td>
													<td> <?php echo $row[4];?> </td>
													<td> <?php echo $row[3];?> </td>
													<td><button type="submit" class="btn btn-round btn-danger" name="btnCancel" value="<?php echo $row[2];?>">Cancel</button>
													</td>
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
								
								<div class="col-sm-4" id="showAmount">
									<font face = "cambria" size = 5 color = "grey"> Total Amount Due :
										<input id="demo" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" name="totalAmount" value= " <?php echo" $totalAmount";?>"disabled></font>
										
										
									</div>
								<div class="col-sm-4" id="showAmount">
								<br><br>
								<button type="submit" class="btn btn-outline btn-success" name="btnPay">Render Payment</button>
								</div>
	
								<p id="demo"></p>

								<div class="col-sm-6">
									
								</div>

								
							
			<?php if(isset($_POST['btnPay']))
			{
				$requestID = "";
				$requestorID = $clientID;
				
				//echo "<script> alert('$docID')</script>";
				require('connection.php');
				$regularDocSQL = "SELECT CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', d.strDocName as Document, p.dblReqPayment as Amount, dr.strDocReqStat as Status FROM 
				tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode 
				WHERE dr.strDocReqStat = 'Unpaid' AND a.intMemberNo = '$clientID'
				UNION 
				SELECT CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', d.strDocName as Document, p.dblReqPayment as Amount, vc.strClearanceStat as Status 
				FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
				WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 1 AND a.intMemberNo = '$clientID'
				UNION 
				SELECT CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', d.strDocName as Document, p.dblReqPayment as Amount, vc.strClearanceStat  as Status 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d
			WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 0 AND a.intMemberNo = '$clientID'
			UNION 
			SELECT CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as Amount, bs.strClearanceStat  as Status 
			FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business Clearance New%' AND bs.strClearanceStat = 'Unpaid' AND bs.strBusOwnerID = '$clientID' AND p.intRequestORNo = 0
			UNION 
			SELECT CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as Amount, bs.strClearanceStat  as Status 
			FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business Clearance Renewal%' AND bs.strClearanceStat = 'Unpaid' AND bs.strBusOwnerID = '$clientID' AND p.intRequestORNo = 0
           
			UNION
			SELECT CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business Clearance New%' AND bs.strClearanceStat = 'Unpaid' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo = 0
			UNION
			SELECT CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business Clearance Renewal%' AND bs.strClearanceStat = 'Unpaid' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo = 0";
				
				/*$regularDoc = mysqli_query($con, $regularDocSQL);
				while($row = mysqli_fetch_row($regularDoc))
				{
					
					$clientID = $row[0];
					$name = $row[1];
					$amount = $row[2];
				}*/
				$_SESSION['name'] = $name;
				$_SESSION['clientID'] = $clientID;
				$_SESSION['amount'] = $amount;
				//echo"<script> alert('$name')</script>";
				echo "<script>window.location = 'Document_Payment.php';</script>";
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