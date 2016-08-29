 <?php session_start();
 if(isset($_SESSION['Treasurer'])){?>
<!DOCTYPE html>
    <?php require('header.php');?>
        <!--sidebar start-->
   <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"> </h5>
              	  	
                  

                  
				    
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Example Report</a></li>
                      </ul>
                  </li>
				  
				 
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
		
		<?php
		
	//Initialize variables
	
	//Gets Today's Date
	$today = date("F j, Y, g:i a"); // displays date today
	
	//Personal Details
	$resId ="";
	
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
	
	$payment = 0;
	$balance =0;
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
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Reservation Payment </font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="search" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Search Reservation ID">					
			</div>				
			<div class="col-sm-2">
				<input type="submit" class="btn btn-outline btn-success" name = "btnSearch" id = "btnSearch" value = "Search">
			</div>			
		</div><br><br><br><br><br><br>
		
		<!-- Filters Resident / Applicant -->	
		<div class="col-sm-5">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrPaid" class="btn btn-primary" value="Paid">
			</div>
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrUnpaid" class="btn btn-success" value="Unpaid">
			</div>
		</div>
		</div><br><br><br>
		
		<?php
			if(isset($_POST['btnSearch'])){
				$search = $_POST['search'];
				
				if(!empty($search)){ 
					$statement = "SELECT p.strrequestid, r.strrrapplicantid, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strrrapprovalstatus FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.strreservationid = p.strrequestid INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo HAVING p.strrequestid LIKE ('%$search%');";
				}else if(empty($search)){ //Notifies User if Search is empty
					echo"<script> alert('Pls Input Last Name or Reservation ID')</script>";
					$statement = "SELECT p.strrequestid, r.strrrapplicantid, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strrrapprovalstatus FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.strreservationid = p.strrequestid INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE r.strrrapprovalstatus = 'Approved'";
				}
				
			}else if(isset($_POST['ftrPaid'])){
				
				$statement = "SELECT p.strrequestid, r.strrrapplicantid, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strrrapprovalstatus FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.strreservationid = p.strrequestid INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE r.strrrapprovalstatus = 'Paid'";
				
			}else if(isset($_POST['ftrUnpaid'])){
				
				$statement = "SELECT p.strrequestid, r.strrrapplicantid, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strrrapprovalstatus FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.strreservationid = p.strrequestid INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE r.strrrapprovalstatus = 'Approved'";
				
			}else{
				$statement = "SELECT p.strrequestid, r.strrrapplicantid, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strrrapprovalstatus FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.strreservationid = p.strrequestid INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE r.strrrapprovalstatus = 'Approved'";
			}
		?>
		
		<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>Reservation ID</th>				
					<th>Payment</th>
					<th>Balance</th>
					<th>Status</th>
					<th>Action</th>
				</tr></thead>
			
			<tbody>
			<?php
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
			
			<?php
					if(empty($row[4]) && $row[3] > 0){								
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'> $row[3]</td>";
						
					}else if($row[4] > 0 && $row[3] > 0){							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'> $row[4]</td>";
						
					}else if($row[4] == 0 && $row[3] == 0){							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'> $row[4]</td>";
						
					}
			?>
					<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[5] ?></td>			
			
			<?php
					if($row[5] == "Approved" && ($row[4] == 0 && $row[3] == 0)){	//Personnel and Action if Status = For Approval, Approve							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' data-toggle='modal' data-target='#myModal' value='$row[0]' name= 'btnRenderF' disabled> Render Payment </button></td>";
						
					}else if($row[5] == "Approved" ){	//Personnel and Action if Status = For Approval, Approve							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' data-toggle='modal' data-target='#myModal' value='$row[0]' name= 'btnRenderF'> Render Payment </button></td>";
						
					}else if($row[5] == "Paid"){  //Personnel and Action if Status = Approved, Collect						
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnPaid' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-check'></i></button>";
						
					}else {
						
					}			
			}?>
			
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive -->              
	
		<legend ><font face = "cambria" size = 10 color = "grey"> Document Request Payment </font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="search" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Search Reservation ID">					
			</div>				
			<div class="col-sm-2">
				<input type="submit" class="btn btn-outline btn-success" name = "btnSearch" id = "btnSearch" value = "Search">
			</div>			
		</div><br><br><br><br><br><br>
		
		<!-- Filters Resident / Applicant -->	
		<div class="col-sm-5">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrPaid" class="btn btn-primary" value="Paid">
			</div>
			<div class="btn-group" role="group">
				<input type = "submit" name="ftrUnpaid" class="btn btn-success" value="Unpaid">
			</div>
		</div>
		</div><br><br><br>
		
		<?php
			if(isset($_POST['btnSearch'])){
				$search = $_POST['search'];
				
				if(!empty($search)){ 
					$statement = "SELECT p.strrequestid, r.strDRapplicantID, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strDRapprovedBy FROM tblpaymentdetail p INNER JOIN tbldocumentrequest r ON r.strDocRequestID = p.strRequestID INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo HAVING p.strrequestid LIKE ('%$search%');";
				}else if(empty($search)){ //Notifies User if Search is empty
					echo"<script> alert('Pls Input Last Name or Reservation ID')</script>";
					$statement = "SELECT p.strrequestid, r.strDRapplicantID, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strDRapprovedBy FROM tblpaymentdetail p INNER JOIN tbldocumentrequest r ON r.strDocRequestID = p.strRequestID INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE r.strDRapprovedBy = '1'";
				}
				
			}else if(isset($_POST['ftrPaid'])){
				
				$statement = "SELECT p.strrequestid, r.strDRapplicantID, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strDRapprovedBy FROM tblpaymentdetail p INNER JOIN tbldocumentrequest r ON r.strDocRequestID = p.strRequestID INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE r.strDRapprovedBy = '2'";
				
			}else if(isset($_POST['ftrUnpaid'])){
				
				$statement = "SELECT p.strrequestid, r.strDRapplicantID, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strDRapprovedBy FROM tblpaymentdetail p INNER JOIN tbldocumentrequest r ON r.strDocRequestID = p.strRequestID INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE r.strDRapprovedBy = '1'";
				
			}else{
				$statement = "SELECT p.strrequestid, r.strDRapplicantID, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strDRapprovedBy FROM tblpaymentdetail p INNER JOIN tbldocumentrequest r ON r.strDocRequestID = p.strRequestID INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE r.strDRapprovedBy = '1'";
			}
		?>
		
		<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>Reservation ID</th>				
					<th>Payment</th>
					<th>Balance</th>
					<th>Status</th>
					<th>Action</th>
				</tr></thead>
			
			<tbody>
			<?php
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
			
			<?php
					if(empty($row[4]) && $row[3] > 0){								
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'> $row[3]</td>";
						
					}else if($row[4] > 0 && $row[3] > 0){							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'> $row[4]</td>";
						
					}else if($row[4] == 0 && $row[3] == 0){							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'> $row[4]</td>";
						
					}
			?>
					<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[5] ?></td>			
			
			<?php
					if($row[5] == "1" && ($row[4] == 0 && $row[3] == 0)){	//Personnel and Action if Status = For Approval, Approve							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' data-toggle='modal' data-target='#myModal' value = '$row[0]' name= 'btnRenderD' disabled> Render Payment </button></td>";
						
					}else if($row[5] == "1" ){	//Personnel and Action if Status = For Approval, Approve							
						echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' data-toggle='modal' data-target='#myModal' value = '$row[0]' name= 'btnRenderD'> Render Payment </button></td>";
						
					}else if($row[5] == "2"){  //Personnel and Action if Status = Approved, Collect						
						//echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnPaid' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-check'></i></button>";
						
					}else {
						
					}			
			}?>
			
			</tbody>
			</table>
		</div></center>
		<?php 
		
		
			if(isset($_POST['btnRenderF'])){
				$resId = $_POST['btnRenderF'];
								 
				mysqli_query($con, "SELECT p.strrequestid, r.strrrapplicantid, p.intrequestorno, p.dblreqpayment, r.strrrapprovalstatus FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.strreservationid = p.strrequestid WHERE p.strRequestID = $resId ");
				
				$query = mysqli_query($con,$statement);
					while($row = mysqli_fetch_array($query)){
						
						$resid = $row[0];
						$payment = $row[3];
						$balance = $row[3];
					}
				
				$_SESSION['resId'] = $resId;
				$_SESSION['payment'] = $payment;			
			
				 echo "<script> window.location = 'ReservationPayment.php';</script>";
				 
			}else if(isset($_POST['btnRenderD'])){
				$resId = $_POST['btnRenderD'];
					 
				 mysqli_query($con, "SELECT p.strrequestid, r.strDRapplicantID, p.intrequestorno, p.dblreqpayment, t.dblremaining, r.strDRapprovedBy FROM tblpaymentdetail p INNER JOIN tbldocumentrequest r ON r.strDocRequestID = p.strRequestID INNER JOIN tblpaymenttrans t ON t.intORNo = p.intRequestORNo WHERE p.strrequestid = $resId");
				 
				 $query = mysqli_query($con,$statement);
					while($row = mysqli_fetch_array($query)){
						
						$resid = $row[0];
						$payment = $row[3];
						$balance = $row[3];
					}
				 
				$_SESSION['resId'] = $resId;
				$_SESSION['payment'] = $payment;
				$_SESSION['balance'] = $balance;
			
			
				 echo "<script> window.location = 'ReservationPayment.php';</script>"; 
			}
			?>
					
								</div> <!-- panel-body -->
								
	</form> 
							</div> <!-- bodybody -->			
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
		
		
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

		
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
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
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
 <?php }
 else{
	 echo"<h1>FORBIDDEN ACCESS!</h1>";
 }?>