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
		$resId = $_SESSION['resId'];
		$clientID = $_SESSION['clientID'];
		$OR = $_SESSION['OR'];
		$payment = $_SESSION['payment'];
		$balance = $_SESSION['balance'];
				
		//Gets Today's Date
		$today = date("Y-m-d"); // displays date today
		
		//Payment
		$total = $balance;
		$amountR =0;
		$balance = $balance;
		$change =0;
		$payOR = $OR;

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
						
						<div class = "col-sm-7">	
							<div class="form-group">
								<div class = "showback">												
									<font face = "cambria" size = 5 color = "grey"> Payment Details</font><br><br>								
									<div class="panel panel-default"><!-- Default panel contents -->
										<table class="table"'><!-- Table -->
											<thead>
												<tr><th> Reservation ID </th>
													<th> Payment </th>
													<th> Balance (Hours) </th>
												</tr>
												</thead>
											<tbody>
												<tr><td> <?php echo"$resId"; ?> </td>
													<td> <?php echo"$payment"; ?> </td>
													<td> <?php echo"$balance"; ?></td>
												</tr>
											</tbody>
										</table>			
									</div>												
								</div>						
							</div>
						</div>

						<div class = "col-sm-4">	
							<div class="form-group">
								<div class = "showback">												
									<font face = "cambria" size = 5 color = "grey"> Date
									<input id="payDate" class="form-control input-group-lg reg_name" type="text"  name="payDate" value = "<?php echo" $today"; ?>" disabled></font>										
									<font face = "cambria" size = 5 color = "grey"> OR No
									<input id="payOR" name="payOR" class="form-control input-group-lg reg_name" type="text"  value="<?php if(isset($_POST['payOR'])){echo $_POST['payOR'];}else{echo $payOR;}?>" title="generated brgyId" required></font>	

									<font face = "cambria" size = 5 color = "grey"> Mode of Payment </font>
									<select class = "form-control" id = "mode" name = "mode" onchange = "myFunction()">
										<option value="Full"> Full </option>
										<option value="Partial"> Partial </option>
									</select><br>
									<center>		
									<font face = "cambria" size = 7 color = "grey" > <?php echo $balance;?> </font><br>

									<font face = "cambria" size = 5 color = "grey"> Amount Render </font>
									<input name="render" class="form-control put-group-lg reg_name" type="number"  title="generated brgyId" value="<?php if(isset($_POST['render'])){echo $_POST['render'];}else{}?>" min="0">			

									<font face = "cambria" size = 5 color = "grey" > ............................................
									
									<button type="submit" class="btn btn-outline btn-success" name = "btnPay" value = '<?php echo $resId;?>'> Render Payment </button></center></font>

									</div><br><br><br><br>							
							</div>
						</div>		

						<div class = "col-sm-7">	
							<div class="form-group">
								<div class = "showback">												
																
								</div>						
							</div>
						</div>		
						
				</div>
							
			<?php if(isset($_POST['btnPay'])){
				$pay = $_POST['btnPay'];

					$render = $_POST['render'];
					$payOR = $_POST['payOR'];

				if(isset($_POST['mode'])){
					$mode = $_POST['mode'];

					if($mode == "Partial"){
						$total = $total/2;
						$balance = $total;
					}else if($mode == "Full"){
						$total = $total;
						$balance = 0;
					}
				}else{
					$total = $total;
					$balance = 0;
				}

				if($render >= $total && !empty($total)){
					$change = $render - $total;				

					mysqli_query($con, "UPDATE `tblpaymentdetail` SET `intRequestORNo`= '$payOR' WHERE `strRequestID`= $pay");

					mysqli_query($con, "UPDATE `tblpaymenttrans` SET `intORNo`='$payOR',`dtmPaymentDate`= NOW(),`dblPaidAmount`='$render',`dblRemaining`= '$balance' WHERE `intORNo`= $pay");

				if($balance ==0){

					mysqli_query($con, "UPDATE `tblreservationrequest` SET `strRSapprovalStatus`='Paid' WHERE `strReservationID`= $pay");
				}else if($balance > 0){

				}

					echo"<script> alert('Your payment has been collected')</script>";
				}else{
					echo"<script> alert('You have inserted invalid amount')</script>";
				}

			}?>							
									
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
   	var x = document.getElementById("mode").value;
   	document.getElementById("total").innerHTML = x;
}
</script>

<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>

<?php require("footer.php");?>