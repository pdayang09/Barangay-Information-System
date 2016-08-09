 <?php session_start();?>
<!DOCTYPE html>

    <?php require('header.php');?>
    <?php require('sidebar.php');?>
	
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
		
	<?php 
		
	
	//Initialize variables
			
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
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Reservation Requests</font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="searchr" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Search Reservation ID">					
			</div>				
			<div class="col-sm-2">
				<button class="btn btn-info btn-round btn-xs  " id = "searchst" name = "btnSearch" value = 2 onclick = "search(this.value)"><i class = "glyphicon glyphicon-search"></i></button>
			</div> <!-- 1 = FacilityEquipmentL -->
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
				$statement = "SELECT r.`strReservationID`, r.`strRSapplicantId`, r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, p.`intRequestORNo` FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` WHERE r.`strRSapprovalStatus` = 'For Approval'";			
		?>
		
		<center>
		<div class = "showback" id = "tablestreet">	
			<table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'>
				<thead><tr>
					<th>Reservation ID</th>	
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
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[3];?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[4];?></td>
				<?php
					if($row[4] == "For Approval"){ 	//Personnel and Action if Status = For Approval, Approve ?>	
						      <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
							  <div class="switch switch-square" 
                                 data-on-label="<i class=' fa fa-check'></i>"
                                 data-off-label="<i class='fa fa-times'></i>">
				<?php echo"<input type='checkbox' name=approve[] value='$row[0]'/>"; ?>
                              </div></td>
				<?php		
					}else if($row[4] == "Approved"){  //Personnel and Action if Status = Approved, Collect ?>
							  <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
							  <div class="switch switch-square" 
                                 data-on-label="<i class=' fa fa-check'></i>"
                                 data-off-label="<i class='fa fa-times'></i>">
				<?php echo"<input type='checkbox' name=disapprove[] value='$row[0]' />"; ?>
                              </div></td>
				<?php		
					}else if($row[4] == "Paid"){  //Personnel and Action if Status = Paid, Confirm		
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnView' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-check'></i></button>";
					}
				
			}?>
			
			</tbody>
			</table>
		</div></center> <!-- Table-responsive -->    
		</div><br><br>
		
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
				<input type = "submit" name="ftrApproval" id="ftrApproval" class="btn btn-warning" value="For Approval">
			</div>
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrApproved" id="ftrApproved" class="btn btn-success" value="Approved">
			</div>
		</div>
		</div><br><br><br>
		
		<?php
			if(isset($_POST['btnSearch'])){
				$search = $_POST['search'];
				
				if(!empty($search)){ 
					$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid HAVING Name LIKE ('%$search%');";
				}else if(empty($search)){ //Notifies User if Search is empty
					echo"<script> alert('Pls Input Last Name or Reservation ID')</script>";
					$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '2'";
				}
				
			}else if(isset($_POST['ftrApproval'])){
				
				$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '2'";
				
			}else if(isset($_POST['ftrApproved'])){
				
				$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '3'";
				
			}else{
				$statement = "SELECT r.strdocrequestid, r.strdrapplicantid, CONCAT(a.strapplicantlname,' ', a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strdocpurposeid, r.datdrdaterequested, r.strdrapprovedby FROM tbldocumentrequest r INNER JOIN tblapplicant a ON a.strapplicantid = r.strdrapplicantid WHERE r.strdrapprovedby = '2'";
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
			$Dapprove[] = array();
			$Ddisapprove[] = array();
			
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
				<tr>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[4]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[5];?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[6];?></td>
				<?php
					if($row[6] == "2"){ 	//Personnel and Action if Status = For Approval, Approve ?>	
						      <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
							  <div class="switch switch-square" 
                                 data-on-label="<i class=' fa fa-check'></i>"
                                 data-off-label="<i class='fa fa-times'></i>">
				<?php echo"<input type='checkbox' name=Dapprove[] value='$row[0]'/>"; ?>
                              </div></td>
				<?php		
					}else if($row[6] == "3"){  //Personnel and Action if Status = Approved, Collect ?>
							  <td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
							  <div class="switch switch-square" 
                                 data-on-label="<i class=' fa fa-check'></i>"
                                 data-off-label="<i class='fa fa-times'></i>">
				<?php echo"<input type='checkbox' name=Ddisapprove[] value='$row[0]' />"; ?>
                              </div></td>
				<?php		
					}else if($row[6] == "Paid"){  //Personnel and Action if Status = Paid, Confirm		
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnView' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-check'></i></button>";
					}
				
			}?>
			
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive -->    
		
		<div class="col-sm-3">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<input type = "submit" name="btnConfirm" id="btnConfirm" class="btn btn-warning" value="Confirm Action">
			</div>
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
					
					//echo"<script> alert(' $reservation');</script>";
					
					mysqli_query($con, "UPDATE tblreservationrequest SET strrrapprovalstatus = 'Approved' WHERE strreservationid = '$reservation'");
					}

					unset($approve);
				
				}else{
					
				} 
					
				if(!empty($_POST['disapprove'])){					
					$disapprove = $_POST['disapprove'];	
					
					for($intCtr = 0; $intCtr < sizeof($disapprove); $intCtr++){ 		
					$reservation = $disapprove[$intCtr];
										
					mysqli_query($con, "UPDATE tblreservationrequest SET strrrapprovalstatus = 'For Approval' WHERE strreservationid = '$reservation'");
					}
					
					unset($disapprove);
				}else{
					
				}
				
				if(!empty($_POST['Dapprove'])){					
					$Dapprove = $_POST['Dapprove'];	
					
					for($intCtr = 0; $intCtr < sizeof($Dapprove); $intCtr++){ 		
					$reservation = $Dapprove[$intCtr];
										
					mysqli_query($con, "UPDATE tbldocumentrequest SET strdrapprovedby = '3' WHERE strdocrequestid = '$reservation'");
					}
					
					unset($Dapprove);
				}else{
					
				}
				
				if(!empty($_POST['Ddisapprove'])){					
					$Ddisapprove = $_POST['Ddisapprove'];	
					
					for($intCtr = 0; $intCtr < sizeof($Ddisapprove); $intCtr++){ 		
					$reservation = $Ddisapprove[$intCtr];
										
					mysqli_query($con, "UPDATE tbldocumentrequest SET strdrapprovedby = '2' WHERE strdocrequestid = '$reservation'");
					}
					
					unset($Ddisapprove);
				}else{
					
				}

				echo "<meta http-equiv=\"refresh\" content=\"0;URL=reservation_kapitanl.php\">";
			}
		?>

		
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
	var a = document.getElementById('searchr').value;

	$.ajax({
		type: "POST",
		url: "getKapitan.php",
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
	  
<?php require("footer.php"); ?>