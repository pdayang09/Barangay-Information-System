 <?php session_start();?>
<!DOCTYPE html>
		
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
	
      <section id="main-content">
        <section class="wrapper site-min-height">
			
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
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Document Request </font></legend>
		
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
		<div class="col-sm-6">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrUnpaid" class="btn btn-danger" value="Unpaid">
			</div>
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrCancelled" class="btn btn-warning" value="Cancelled">
			</div>
			
		</div>
		</div><br><br><br>
		
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
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.strDocReqStat = 'Cancelled'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat as Status 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Cancelled' AND v.intVehicleType = 1
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Cancelled' AND v.intVehicleType = 0
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Cancelled'
			UNION
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Cancelled'
			UNION
			SELECT app.`strApplicantID`, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name',  (SUM(p.dblReqPayment)/2) as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Cancelled'
			) Oll
            WHERE Oll.ID IS NOT NULL
			GROUP BY Oll.ID, Oll.Name, Oll.Status;";
				}
				
			}else if(isset($_POST['ftrUnpaid']))
			{
				echo "<script> window.location = 'view_Secretary.php';</script>";
				
			}else if(isset($_POST['ftrCancelled']))
			{
				$docReqPaymentSQL = "SELECT Oll.ID, Oll.Name, SUM(Oll.TotalAmount), Oll.Status  FROM ( 
             SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', dr.strDocReqStat as Status 
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE dr.strDocReqStat = 'Cancelled'
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat as Status 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Cancelled' AND v.intVehicleType = 1
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', vc.strClearanceStat  as Status FROM tblhousemember a  INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Cancelled' AND v.intVehicleType = 0
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Cancelled'
			UNION
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', p.dblReqPayment as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business Clearance New%' AND bs.strClearanceStat = 'Cancelled'
			UNION
			SELECT app.`strApplicantID`, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name',  (SUM(p.dblReqPayment)/2) as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business Clearance New%' AND bs.strClearanceStat = 'Cancelled'
			) Oll
			WHERE Oll.ID IS NOT NULL
			GROUP BY Oll.ID, Oll.Name, Oll.Status";
			}else if(isset($_POST['ftrPaid']))
			{
				
			}
				else{
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
			GROUP BY Oll.ID, Oll.Name, Oll.Status";
			}
		?>
		
		<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>ID</th>
					<th>Full Name</th>
					<th>Total Amount</th>
					<th>Request Status</th>
					<th>Action</th>
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
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[3]; ?></td>
				</center>
				<td><button class='btn btn-success btn-xs' data-toggle='modal' data-target='#myModal' value = "<?php echo $row[0]?>" name= 'btnRenderD'> Assess </button></td>
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
				
			if(isset($_POST['btnRenderD'])){
				$requestID = "";
				$requestorID = $_POST['btnRenderD'];
					
				//echo "<script> alert('$requestorID')</script>";
				require('connection.php');
				$regularDocSQL = "SELECT Oll.ID, Oll.Name, SUM(Oll.TotalAmount), Oll.Status FROM (SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', SUM(p.dblReqPayment) as 'TotalAmount', dr.strDocReqStat as Status 
			FROM tblhousemember a INNER JOIN tbldocumentrequest dr ON a.intMemberNo = dr.strDRapplicantID INNER JOIN tblpaymentdetail p ON dr.strDocRequestID = p.strRequestID INNER JOIN tbldocument d ON d.intDocCode = dr.strDRdocCode  WHERE  dr.strDocReqStat = 'Unpaid' AND a.intMemberNo = '$requestorID' LIMIT 1
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', SUM(p.dblReqPayment) as 'TotalAmount', vc.strClearanceStat as Status 
			FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tbltru tru ON vc.strVCplateNo = tru.strTRUplateNo INNER JOIN tblpaymentdetail p ON p.strRequestID = tru.strTRUplateNo INNER JOIN tblvehicle v ON v.strVplateNo = tru.strTRUplateNo, tbldocument d
			WHERE d.strDocName LIKE '%TRU%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 1 AND a.intMemberNo = '$requestorID' LIMIT 1
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', SUM(p.dblReqPayment) as 'TotalAmount', vc.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblvehicleclearance vc ON a.intMemberNo = vc.strResidentID INNER JOIN tblvehicle v ON v.strVplateNo = vc.strVCplateNo INNER JOIN tblpaymentdetail p ON vc.strVCplateNo  = p.strRequestID, tbldocument d WHERE d.strDocName LIKE '%Uti%' AND vc.strClearanceStat = 'Unpaid' AND v.intVehicleType = 0 AND a.intMemberNo = '$requestorID' LIMIT 1
			UNION 
			SELECT a.intMemberNo as 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', SUM(p.dblReqPayment) as 'TotalAmount', bs.strClearanceStat  as Status FROM tblhousemember a INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = a.intMemberNo INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Unpaid' AND a.intMemberNo = '$requestorID' LIMIT 1
			UNION
			SELECT app.strApplicantID, CONCAT(app.strApplicantLName, ', ', app.strApplicantFName, ' ', app.strApplicantMName, ' ', app.strNameExtension) as 'Name',  (SUM(p.dblReqPayment)/2) as 'TotalAmount', bs.strClearanceStat  as Status FROM tblapplicant app INNER JOIN tblbusinessstat bs ON bs.strBusOwnerID = app.strApplicantID INNER JOIN tblpaymentdetail p ON bs.strBusStatID = p.strRequestID INNER JOIN tblbusiness b ON bs.strBusinessID = b.strBusinessID, tbldocument d
			WHERE d.strDocName LIKE '%Business%' AND bs.strClearanceStat = 'Unpaid' AND app.strApplicantID LIKE '%$requestorID%')
			Oll
			WHERE Oll.ID IS NOT NULL
			GROUP BY Oll.ID, Oll.Name, Oll.Status";
				
				$regularDoc = mysqli_query($con, $regularDocSQL);
				
				while($row = mysqli_fetch_row($regularDoc))
				{
					
					$clientID = $row[0];
					$name = $row[1];
					$amount = $row[2];
				}
				//echo "<script>alert('$name');</script>";
				$_SESSION['name'] = $name;
				$_SESSION['clientID'] = $requestorID;
				$_SESSION['amount'] = $amount;
				//echo "<script> alert('$name')</script>";
				echo "<script> window.location = 'Document_PaymentAssessCancel.php';</script>";
			
			}
			
		?>
										</div> <!-- panel-body -->
							</div> <!-- bodybody -->	
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
		
	
	</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
	</section>
	
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    <script type = "text/javascript">
				$(document).ready(function(){
					$('#btnApprove').show();
										
					$('#ftrApproval').click(function(){
						$('#btnApprove').show();
					})
					
					$('#ftrApproved').click(function(){
						$('#btnApprove').hide();
					})

					$('#ftrPaid').click(function(){
						$('#btnApprove').hide();
					})
					
				});
		
	</script>
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
</html>