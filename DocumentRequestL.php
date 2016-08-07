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
				<input type = "submit" name="ftrApproval" class="btn btn-warning" value="For Approval">
			</div>
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrApproved" class="btn btn-success" value="Approved">
			</div>
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrPaid" class="btn btn-primary" value="Paid">
			</div>
		</div>
		</div><br><br><br>
		
		<?php
			if(isset($_POST['btnSearch'])){
				$search = $_POST['search'];
				
				if(!empty($search)){ 
					$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid HAVING r.strdocrequestid LIKE ('%$search%') OR Name LIKE ('%$search%');";
				}else if(empty($search)){ //Notifies User if Search is empty
					echo"<script> alert('Pls Input Last Name or Reservation ID')</script>";
					$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '1'";
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
			
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
				<tr>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[4]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[5];?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[6];?></td>
				<?php
					if($row[6] == "2"){	//Personnel and Action if Status = For Approval, Approve	
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><input type='checkbox' name= approve[] value = '$row[0]' data-toggle='switch' />";
						
					}else if($row[6] == "3"){  //Personnel and Action if Status = Approved, Collect
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