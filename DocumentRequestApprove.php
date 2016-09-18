			
	<?php //Initialize variables
			
	//Gets Today's Date
	$today = date("Y-m-d"); // displays date today
	
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

	
	<form method="POST">
		
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="search" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Search Last Name">					
			</div>				
			<div class="col-sm-2">
				<input type="submit" class="btn btn-outline btn-success" name = "btnSearch" id = "btnSearch" value = "Search">
			</div>			
		</div><br><br><br><br>
		
		<!-- Filters Resident / Applicant -->	
		<?php
			if(isset($_POST['btnSearch'])){
				$search = $_POST['search'];
				
				if(!empty($search)){ 
					$docReqPaymentSQL = "SELECT Oll.ID, Oll.Name, SUM(Oll.TotalAmount), Oll.Status  FROM ( 
             SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', dr.strDocReqStat as Status 
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.strDocReqStat = 'Unpaid'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat as Status 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 1
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 0
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Unpaid'
			UNION
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Unpaid'
			UNION
			SELECT app.`strApplicantID`, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name',  (SUM(p.dblReqPayment)/2) as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Unpaid'
			) Oll
            WHERE Oll.Name LIKE ('%$search%')
			GROUP BY Oll.ID, Oll.Name, Oll.Status;";
				}else if(empty($search)){ //Notifies User if Search is empty
					echo"<script> alert('Pls Input Last Name')</script>";
					$docReqPaymentSQL = "SELECT Oll.ID, Oll.Name, SUM(Oll.TotalAmount), Oll.Status  FROM ( 
             SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', dr.strDocReqStat as Status 
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.strDocReqStat = 'Unpaid'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat as Status 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 1
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 0
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Unpaid'
			UNION
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Unpaid'
			UNION
			SELECT app.`strApplicantID`, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name',  (SUM(p.dblReqPayment)/2) as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Unpaid'
			) Oll
            WHERE Oll.ID IS NOT NULL
			GROUP BY Oll.ID, Oll.Name, Oll.Status;";
				}
				
			}else if(isset($_POST['ftrUnpaid']))
			{
			
				
			}else if(isset($_POST['ftrCancelled']))
			{
				echo "<script> window.location = 'DocumentRequestCancel.php';</script>";
			}else if(isset($_POST['ftrPaid']))
			{
			}
				else{
				$docReqPaymentSQL = "SELECT dr.strDocRequestID, CONCAT(h.strLastName, ', ', h.strFirstName, ' ', h.strMiddleName, ' ', h.strNameExtension) as 'Full Name', d.strDocName from tbldocumentrequest dr INNER JOIN tbldocument d on dr.strDRdocCode = d.intDocCode INNER JOIN tblhousemember h ON h.intMemberNo = dr.strDRapplicantID 
WHERE dr.strDocReqStat = 'Paid' 
UNION
SELECT dr.strDocRequestID, CONCAT(h.strLastName, ', ', h.strFirstName, ' ', h.strMiddleName, ' ', h.strNameExtension) as 'Full Name', d.strDocName from tbldocumentrequest dr INNER JOIN tbldocument d on dr.strDRdocCode = d.intDocCode INNER JOIN tblhousemember h ON h.intMemberNo = dr.strDRapplicantID 
WHERE dr.strDocReqStat LIKE 'For approval'
			UNION  
SELECT vc.strVCplateNo, CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Full Name', d.strDocName AS Document 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Paid' AND v.intVehicleType = 1
UNION
SELECT vc.strVCplateNo, CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Full Nme1', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Paid' AND v.intVehicleType = 0
UNION 
			SELECT bs.strBusStatID, CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Paid'
            UNION
			SELECT bs.strBusStatID, CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', d.strDocName AS Document FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID INNER JOIN tbldocument d ON d.intDocCode = bs.intBusinessDoc
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Paid'
			UNION
			SELECT bs.strBusStatID, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name', d.strDocName as Document FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.intDocCode = 3 AND bs.strClearanceStat = 'Paid'
			UNION
			SELECT bs.strBusStatID, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name',  d.strDocName as Document FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.intDocCode = 7 AND bs.strClearanceStat = 'Paid'";
			} 
		?>
		
		<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
				<th><font face = "cambria" size = 4.5 color = "grey">Request ID</font></th>
					<th><font face = "cambria" size = 4.5 color = "grey">Full Name</font></th>
					<th><font face = "cambria" size = 4.5 color = "grey">Document Name</font></th>
					<th><font face = "cambria" size = 4.5 color = "grey">Action</font></th>
				</tr></thead>
			
			<tbody>
			<?php
			/*$docReqPaymentSQL = "SELECT Oll.ID, Oll.Name, SUM(Oll.TotalAmount), Oll.Status  FROM ( 
             SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', dr.strDocReqStat as Status 
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.datDRdateRequested = CURDATE() AND dr.strDocReqStat = 'Unpaid'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat as Status 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND (vc.datVCStat = CURDATE() AND vc.strClearanceStat = 'Unpaid') AND v.intVehicleType = 1
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblhousehold h ON h.intHouseholdNo = a.intForeignHouseholdNo INNER JOIN tblstreet s ON s.intStreetId = h.intForeignStreetId INNER JOIN tblzone z ON z.intZoneId = s.intForeignZoneId INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.datVCStat = CURDATE() AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 0
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND (bs.datBCStat = CURDATE() AND bs.strClearanceStat = 'Unpaid')) Oll
			GROUP BY Oll.ID, Oll.Name, Oll.Status";*/
			$approve[] = array();
			
			$query = mysqli_query($con, $docReqPaymentSQL);
			while($row = mysqli_fetch_array($query)){?>
				<center><tr>
				<td><font face = "arial" size = 3.5 color = "grey"><?php echo $row[0]; ?></font></td>
				<td><font face = "arial" size = 3.5 color = "grey"><?php echo $row[1]; ?></font></td>
				<td><font face = "arial" size = 3.5 color = "grey"><?php echo $row[2]; ?></font></td>
				</center>
				<td><button type="button" class="btn btn-theme" value = "<?php echo $row[0]?>" name= 'btnPrint' >Print</button></td>
				<?php  echo"</tr>";
					
				?>
			<?php
			}
			//$fullName = $row[1].$row[2];?>
			
			</tbody>
			</table>
		</div></center><!-- Table-responsive -->              
		
	</form> 				
	
			<?php 
				
			if(isset($_POST['btnPrint'])){
				$requestID = "";
				$requestorID = $_POST['btnRenderD'];
					
				
			}
			/*require('connection.php');
												$cancel = $_POST['btnCancel'];
												//echo"<script> alert('$cancel')</script>";
												//Cancel Rergular DOc
												$deleteDocReq = "UPDATE `tbldocumentrequest` SET `strDocReqStat` = 'Cancelled' WHERE `tbldocumentrequest`.`strDocRequestID` = '$cancel';";
												$deleteDoc = mysqli_query($con, $deleteDocReq);
												//Cancel Bus Cleara
												$deleteBusReq = "UPDATE `tblbusinessstat` SET `strClearanceStat` = 'Cancelle' WHERE `tblbusinessstat`.`strBusStatID` = '$cancel'";
												mysqli_query($con, $deleteBusReq);*/
		?>
	