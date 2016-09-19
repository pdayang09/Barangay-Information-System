 <?php session_start();?>
<!DOCTYPE html>
	
	<link rel="stylesheet" href="components/bootstrap2/css/bootstrap.css">
	<link rel="stylesheet" href="components/bootstrap2/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/calendar.css">
	
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

    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">	
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Request List </font></legend>
				
		<!-- Filters Resident / Applicant -->	
		<div class="col-sm-6">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button class="btn btn-warning" id = "searcht" name = "btnSearch" value = 2 onclick = "select(this.value)">For Approval</button>
			</div>
			<div class="btn-group" role="group">
				<button class="btn btn-success" id = "searcht" name = "btnSearch" value = 3 onclick = "select(this.value)">Approved</button>
			</div>
		</div>
		</div><br><br><br>

<form method="POST">		
		<?php
				$statement = "SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`, ', ', re.`strMiddleName`) AS 'Name', re.`strContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` WHERE r.`strRSapprovalStatus` = 'For Approval' UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE r.`strRSapprovalStatus` = 'For Approval'";			
		?>
		
		<center>
		<div class = "showback" id = "tablestreet">	
			<table id="dataTable" class="table table-hover" style="height: 40%; overflow: scroll; "'>
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
			
			$query = mysqli_query($con, $statement);
			while($row = mysqli_fetch_array($query)){?>
				<tr>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[4]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[5];?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[6];?></td>
				<?php
					if($row[6] == "For Approval"){	//Personnel and Action if Status = For Approval, Approve	
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><input type='checkbox' name= approve[] value = '$row[0]' data-toggle='switch' />";
						
					}else if($row[6] == "Approved"){  //Personnel and Action if Status = Approved, Collect
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnCollect' value = '$row[0]' class='btn btn-success btn-xs'><i class='fa fa-edit'></i></button>";
						
					}else if($row[6] == "Paid"){  //Personnel and Action if Status = Paid, Confirm			
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnConfirm' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-check'></i></button>";
					}
				echo"</tr>";
			}?>
			
			</tbody>
			</table>
		</div></center><!-- Table-responsive -->              
		
	</form> 				
	
			<?php
			if(isset($_POST['btnApprove'])){
				
				if(isset($_POST['approve'])){
					$approve = $_POST['approve'];	
				}
				
				for($intCtr = 0; $intCtr < sizeof($approve); $intCtr++){ 		
					$reservation = $approve[$intCtr];
					
					//echo"<script> alert(' $reservation');</script>";
					
					mysqli_query($con, "UPDATE tblreservationrequest SET strrrapprovalstatus = 'Approved' WHERE strreservationid = '$reservation'");
				}

				foreach ($approve as $i => $temp) {
					unset($temp[$i]);
				}
				
			}else {
				
			}
		?>
		
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->	
		<?php include("calendar.php");?>
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
		
	
	</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
	  
	<script>
      //custom select box
function search(val){
	var a = document.getElementById('searchr').value;

	$.ajax({
		type: "POST",
		url: "gettable1.php",
		data: 'sid=' + a +'&bid='+val,
		success: function(data){
			//alert(data);
			$("#tablestreet").html(data);
		}		
	});
}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  
 	<script>
      //custom select box
function select(val){
	var a;

	$.ajax({
		type: "POST",
		url: "getLiason.php",
		data: 'sid=' + a +'&bid='+val,
		success: function(data){
			//alert(data);
			$("#tablestreet").html(data);
		}		
	});
}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

       <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              CPS BIS 2016
              <a href="index.php" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
	  
  </section>

<!-- Menu Toggle Script -->
   <script>
   $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
   });
   </script>
  
<!-- jQuery -->
   <script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
  
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

<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>

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
	$('#getLiason').dataTable();	
    });
  </script>
	 
   </body>
</html>