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
	
	$appId  = $_SESSION['clientID'];
	$add = $_SESSION['place'];
	$resId = $_SESSION['clientID'];
	$contactno = $_SESSION['contactno'];		
	$name = $_SESSION['name'];
	$doc = $_SESSION['document'];
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
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> TRU Clearance </font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<font face = "cambria" size = 5 color = "black"> <?php echo "Name:"?> </font>
			<font face = "cambria" size = 5 color = "black"> <?php echo "$name"?> </font>
		</div>	<br><br><br>
		<div class="col-sm-5">
			<input type="submit" class="btn btn-outline btn-success" name = "ReqTRU" id = "ReqTRU"  value="Request New TRU Clearance">
		</div>
		</div>
		
		
		<?php
			if(isset($_POST['btnSearch'])){
				$search = $_POST['search'];
				
				if(!empty($search)){ 
					
				}else if(empty($search)){ //Notifies User if Search is empty
					
				}
				
			}else if(isset($_POST['ftrApproval'])){
				
				$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '1'";
				
			}else if(isset($_POST['ftrApproved'])){
				
				$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '3'";
				
			}else if(isset($_POST['ftrPaid'])){
				
				$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '2'";
				
			}else{
				$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '1'";
			}
		?>
		
		<center>
		
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<b><center><thead><tr>
					<th>Plate Number</th>					
					<th>Vehicle Model</th>
					<th>Motor Number</th>
					<th>TODA</th>
					<th>Date Last Renewal</th>
					<th>Action</th>
				</tr></thead></center></b>
			
			<tbody>
			<?php
			$docReqPaymentSQL = "SELECT `tbltru`.`strTRUplateNo` AS `Plate Number`, `tblvehicle`.`strVehicleModel` AS `Vehicle Model`, `tblvehicle`.`strMotorNo` AS `Motor Number`, `tbltoda`.`strTODAName` AS `TODA`, `tblvehicleclearance`.`datVCStat` AS `Date Last Renewal` FROM `tbltru`, `tblvehicle`, `tbltoda`, `tblvehicleclearance` WHERE `tblvehicleclearance`.`strVCplateNo`= `tblvehicle`.`strVplateNo` AND `tblvehicle`.`strVplateNo` = `tbltru`.`strTRUplateNo` AND `tbltoda`.`intTODAID` = `tbltru`.`intTODA` AND `tblvehicleclearance`.`strResidentID` = '$resId' ORDER BY `tblvehicle`.`strMotorNo` DESC";
			$approve[] = array();
			
			$query = mysqli_query($con, $docReqPaymentSQL);
			while($row = mysqli_fetch_array($query)){?>
				<center><tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<td><?php echo $row[4]; ?></td>
				<td>
					<button type="submit" class="btn btn-theme" name="btnEdit" value = "<?php echo $row[0];?>"><i class="fa fa-check"></i> Renew</button>
				</td>
				</center>
				<?php
					
				echo"</tr>";
			}?>
			
			</tbody>
			</table>
		</div></center><!-- Table-responsive -->              
		
	</form> 				
	
			<?php
			
			if(isset($_POST['ReqTRU']))
			{
				$_SESSION['document'] = "TRU Clearance";
				$_SESSION['clientID'] = $resId;
				$_SESSION['clientID'] = $appId;
				$_SESSION['name'] = $name;
				$_SESSION['contactno'] = $contactno;
				$_SESSION['place'] = $add;
				$_SESSION['stat'] = 1;
				echo "<script> window.location = 'DRformTRUNew.php';</script>";
			}
		
			if(isset($_POST['btnEdit'])){
				$plateNo = $_POST['btnEdit'];
				$operatorName = "";
					require("connection.php");
					$query = mysqli_query($con, "SELECT `strVplateNo`, `strOperatorName`, `strOwnerName`, `strVehicleModel`, `strMotorNo`, `strChassisNo`, `strVehicleNo`, `intVehicleType`, `tbltoda`.`strTODAName`, strVehicleColor FROM `tblvehicle` INNER JOIN tbltru on tblvehicle.strVplateNo = tbltru.strTRUplateNo INNER JOIN tbltoda on tbltru.intTODA = tbltoda.intTODAID WHERE tbltru.strTRUplateNo = '$plateNo'");
					
					while($row = mysqli_fetch_row($query)){
						$_SESSION['plateNo'] = $row[0];
						$_SESSION['operatorName'] = $row[1];
						$_SESSION['vehicleMode'] = $row[3];
						$_SESSION['motorNo'] = $row[4];
						$_SESSION['chassisNo'] = $row[5];
						$_SESSION['vehicleNo'] = $row[6]; 
						$_SESSION['toda'] = $row[8];
						$_SESSION['vehicleColor'] = $row[9];
					}
					
				echo "<script> window.location = 'DRformTRURenew.php';</script>";
					
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
					$('#ReqTRU').show();
										
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