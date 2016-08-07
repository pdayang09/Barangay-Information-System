 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
		<!-- Retrieve Personal Data -->
	<?php 
	
		//Personal Details
		$resId = $_SESSION['resId'];
		$payment = $_SESSION['payment'];
		$balance = $payment;
			
		//Gets Today's Date
		$today = date("Y-m-d"); // displays date today
		
	?>
	
	<form method = "POST">
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <legend ><font face = "cambria" size = 8 color = "grey"> Summary of Payment </font></legend>
					   	
						<div class = "bodybody">	
								<div class="panel-body">
									<div class="form-group">
																			
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Date
											<input id="payDate" class="form-control input-group-lg reg_name" type="text"  name="payDate" value = "<?php echo" $today"; ?>" disabled></font>											
										</div>

										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> OR No
											<input id="payOR" name="payOR" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" ></font>											
										</div><br><br>										
										</div> 
									</div> <!-- /#form-group -->
										
									<div class="col-sm-4">
									<font face = "cambria" size = 5 color = "grey"> Request ID
										<input id="payor" name="payor" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value = "<?php echo" $resId"; ?>"></font>	
									</div><br><br><br><br><br><br>
															
									<div class="form-group"> <!-- /Payment Details -->								
										<font face = "cambria" size = 5 color = "grey"> Payment Details</font>
									<br><br><br>
									
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Total Amount Due :
											<input id="total" name="total" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= " <?php echo"$payment";?>"disabled></font>											
										</div>
								
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Payment Status </font>
											<select name="cmbPayment" class="form-control input-group-lg reg_name" >
											<option value="Full"> Full </option>
											<option value="Partial"> Partial </option>
											</select>
										</div><br><br><br><br>
										
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Amount Rendered :
											<input id="amountR" name="amountR" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= " <?php ?>"></font>
										</div>
									
										<fieldset disabled>
                                            <div class="col-sm-6">
												<font face = "cambria" size = 5 color = "grey"> Balance :
												<input id="balance" name="balance" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= " <?php echo"$payment";?>"></font>												
											</div>
										</fieldset><br> <!-- /#fieldset -->
										
										<input type="submit" class="btn btn-outline btn-success" name = "btnAssess" id = "btnAssess" value = "ASSESS">
									</div> <!-- /#form-group -->
									
									<?php
									if(isset($_POST['btnAssess'])){
										$payOR = $_POST['payOR'];
										$amountR = $_POST['amountR'];
										
										if(isset($_POST['cmbPayment'])){
											$paymentm = $_POST['cmbPayment'];
													
										if($payment == "Full"){
											$payment = $payment;
											$balance = 0.00;
														
										}else if($paymentm == "Partial"){
											$payment = $payment/2;
											$balance = $payment;
											}
										}else{
											$payment = $payment;
											$balance = 0.00;
										}
										
										if($amountR >= $payment){ //Receipt Details
											$change = $amountR - $payment;											
																				
											mysqli_query($con, "INSERT INTO `tblpaymenttrans`(`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES ('$payOR', NOW(), '$payment', '$amountR', '$balance')");
											
											mysqli_query($con, "UPDATE `tblpaymentdetail` SET `intRequestORNo`= '$payOR' WHERE strRequestID = '$resId'");
											
											mysqli_query($con, "UPDATE `tblreservationrequest` SET `strrrapprovalstatus`= 'Paid' WHERE strreservatonid = '$resId'");
											
											mysqli_query($con, "UPDATE `documentrequest` SET `strdrapprovedby`= '2' WHERE strdocrequestid = '$resId'");
											
											
											echo" <script> alert(' Successfully rendered Payment! Balance: $balance');</script>";
										}else if($amountR < $total){ //Invalid Amount Rendered
											echo" <script> alert(' You render invalid amount! $balance');</script>";
										}								
										
									}
								?>
								
						</form> <!-- /#form method -->									
									
						</div><br> <!-- /#bodybody -->
					</div> <!-- /#col-lg-12 -->
										
				</div>	<!-- /#row -->
			</div> <!-- /#container-fluid -->
			
		</div><br><br> <!-- /#page-content-wrapper -->
    </div> <!-- /#wrapper -->
					
								
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
	  
<?php require("footer.php"); ?>