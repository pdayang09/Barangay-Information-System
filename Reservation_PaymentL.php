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

    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey">  </font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="searchr" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Search Last name">					
			</div>				
			<div class="col-sm-2">
				<button class="btn btn-info btn-round btn-s  " id = "searchst" name = "btnSearch" value = 3 onclick = "search(this.value)"><i class = "glyphicon glyphicon-search "></i></button>
			</div> <!-- 3 = Reservation_PaymentL -->			
		</div><br><br><br><br>
		
		<!-- Filters Resident / Applicant -->	
		<div class="col-sm-6">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button class="btn btn-warning" id = "searcht" name = "btnUnpaid" value = 1 onclick = "select(this.value)">Unpaid</button>
			</div>
			<div class="btn-group" role="group">
				<button class="btn btn-success" id = "searcht" name = "btnPaid" value = 2 onclick = "select(this.value)">Paid</button>
			</div>
		</div>
		</div><br><br><br>

<form method="POST">		
		<?php
		$statement = "SELECT p.`strRequestID`, r.`strRSresidentId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSresidentId` != '' AND r.`strRSapprovalStatus`='Approved' AND t.dblRemaining > 0 UNION SELECT p.`strRequestID`, r.`strRSapplicantId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSapplicantId` != '' AND r.`strRSapprovalStatus`='Approved' AND t.dblRemaining > 0";			
		?>

	<center>
		<div class = "showback" id = "tablestreet">	
			<table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'>
				<thead><tr>
					<th>Reservation ID</th>				
					<th>Payment</th>
					<th>Balance</th>
					<th>Action</th>
				</tr></thead>
			
			<tbody>
			<?php
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[6]; ?></td>
			<?php
				echo"<td onmouseover='highlightCells(this.parentNode)'  onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' type='submit' value = '$row[0]' name= 'btnRenderF'> Render Payment </button></td>"; 

			} ?>
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive -->              
</form>

<?php
			if(isset($_POST['btnRenderF'])){
				$resId = $_POST['btnRenderF'];
								 
				$statement = "SELECT p.`strRequestID`, r.`strRSresidentId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSresidentId` != '' AND r.`strRSapprovalStatus`='Approved' AND t.dblRemaining > 0 AND p.`strRequestID` LIKE('%$resId%') UNION SELECT p.`strRequestID`, r.`strRSapplicantId`, p.`intRequestORNo`, p.`dblReqPayment`, r.`strRSapprovalStatus`, t.`dblPaidAmount`, t.`dblRemaining` FROM tblpaymentdetail p INNER JOIN tblreservationrequest r ON r.`strReservationID` = p.`strRequestID` INNER JOIN tblpaymenttrans t ON t.intORNo = p.`intRequestORNo` WHERE r.`strRSapplicantId` != '' AND r.`strRSapprovalStatus`='Approved' AND t.dblRemaining > 0 AND p.`strRequestID` LIKE('%$resId%')";
				
				require("connection.php");
				$query = mysqli_query($con, $statement);
					while($row = mysqli_fetch_array($query)){
						
						$resid = $row[0];
						$payor = $row[1];
						$OR = $row[2];
						$payment = $row[3];
						$balance = $row[6];

						$_SESSION['resId'] = $resId;
						$_SESSION['clientID'] = $payor;
						$_SESSION['OR'] = $OR;
						$_SESSION['payment'] = $payment;
						$_SESSION['balance'] = $balance;
					}						
			
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

<script>	 
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
		url: "getTreasurer.php",
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