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
		//$amount = $_SESSION['amount'];
			$name = $_SESSION['name'];
			$payOR = $_SESSION['payOR'];
			$name = $_SESSION['name'];
			$totalAmount = $_SESSION['totalAmount'];
			$amountRender = $_SESSION['amountRender'];
			$change = $amountRender - $totalAmount;
			
		//$totalAmount = $amountRender = 0;
		 //$change = $_POST['change'];
		 //Listing all docs requested by applicant 
		 /*SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', p.dblReqPayment as 'TotalAmount',  d.strDocName AS Document
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.strDocReqStat = 'Paid' AND a.intMemberNo = '$clientID' AND p.intRequestORNo =  '$payOR'
			UNION  
SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', p.dblReqPayment as 'TotalAmount', d.strDocName AS Document 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Paid' AND v.intVehicleType = 1 AND a.intMemberNo = '$clientID' AND p.intRequestORNo =  '$payOR'
			UNION 

SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID',  p.dblReqPayment as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Paid' AND v.intVehicleType = 0 AND a.intMemberNo = '$clientID' AND p.intRequestORNo =  '$payOR'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Unpaid' AND a.intMemberNo = $clientID AND p.intRequestORNo =  '$payOR'
			UNION
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Unpaid' AND a.intMemberNo = $clientID AND p.intRequestORNo =  '$payOR'
			UNION
			SELECT CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Unpaid' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo =  '$payOR'
			UNION
			SELECT CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Unpaid' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo = 0 AND p.intRequestORNo =  '$payOR'*/
		 
		 
		$listDocSQL = "
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', p.dblReqPayment as 'TotalAmount',  d.strDocName AS Document
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.strDocReqStat = 'Paid' AND a.intMemberNo = '$clientID' AND p.intRequestORNo = '$payOR'
			UNION  
SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', p.dblReqPayment as 'TotalAmount', d.strDocName AS Document 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Paid' AND v.intVehicleType = 1 AND a.intMemberNo = '$clientID' AND p.intRequestORNo =  '$payOR'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID',  p.dblReqPayment as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Paid' AND v.intVehicleType = 0 AND a.intMemberNo = '$clientID' AND p.intRequestORNo =  '$payOR'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Paid' AND a.intMemberNo = '$clientID' AND p.intRequestORNo = 0 AND p.intRequestORNo =  '$payOR'
			UNION
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.strRequestID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Paid' AND a.intMemberNo = '$clientID' AND p.intRequestORNo =  '$payOR'
			UNION
			SELECT app.strApplicantID, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', (p.dblReqPayment) as 'TotalAmount', d.strDocName AS Document FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Paid' AND app.strApplicantID LIKE '%$clientID%' AND  p.intRequestORNo = '$payOR'
			UNION
			SELECT app.strApplicantID, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', bs.strBusStatID as 'Request ID', d.strDocName as Document, p.dblReqPayment as 'TotalAmount' FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Paid' AND app.strApplicantID LIKE '%$clientID%' AND p.intRequestORNo = '$payOR'
			
			";
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
                    <legend ><font face = "cambria" size = 8 color = "grey"> Payment Summary </font></legend>
					   	
						<div class = "bodybody">	
								<div class="panel-body">
									<div class="form-group">
																			
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Date
											<input id="payDate" class="form-control input-group-lg reg_name" type="text"  name="payDate" value = "<?php echo" $today"; ?>" disabled></font>											
										</div>
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> OR No
											<input id="payOR" name="payOR" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "<?php echo "$payOR"; ?>"disabled required></font>											
										</div>

											
									</div><br><br><br><br> <!-- /#form-group -->
								
								
									<div class="form-group">
										
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Payor
											<input id="payor" name="payor" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value = "<?php echo" $name"; ?>" disabled></font>		
										</div>
									
										<br><br>
									
									</div>
								</div><br>
									
								<div class="form-group">
								<div class="col-sm-10">
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
												
												echo "</tr>";
												}?>
													
												
											</tbody>
										</table>										
										
										</div> <!-- /#panel panel-default --> 
										</div><br><br> <!--col-sm-6-->
									
										<!-- /Reservation Details Equipment-->	
										<div class="col-sm-10">
										
									</div>
								</div><br>
																		
								<div class="col-sm-10">
									<!-- /Payment Details <font face = "cambria" size = 5 color = "grey"> Payment Details</font>-->								
									
									
									<br><br>
								</div>
								
								<div class="col-sm-4" id="showAmount">
									<font face = "cambria" size = 5 color = "grey"> Total Amount:
										<input id="demo" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" name="totalAmount" value= " <?php echo" $totalAmount";?>"disabled></font>
									</div>	
								<div class="col-sm-4">
								
								<font face = "cambria" size = 5 color = "grey"> Amount Rendered
										<input name="amountRender" class="form-control input-group-lg reg_name" type="number"  title="generated brgyId" value= "<?php echo "$amountRender";?>" disabled required></font><br><br>
										
										<button  class="btn btn-info" name="btnBack" >  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to Treasurer's View</button>
										
								</div>
								<?php
									if(isset($_POST['btnBack']))
									{
										echo "<script> window.location = 'DocumentRequestL.php';</script>";
									}
								?>
								<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Change
											<input id="payOR" name="payOR" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "<?php $change = $amountRender - $totalAmount; echo "$change"; ?>" disabled required></font>											
										</div>
	
								<p id="demo"></p>
								
								<div class="col-sm-6">
									
								</div></form>

								</div>
							
			<?php if(isset($_POST['btnPay']))
			{
				
				
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