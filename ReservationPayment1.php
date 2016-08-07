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
		$name = $_SESSION['name'];
		$contactno = $_SESSION['contactno'];
		$address =  $_SESSION['address'];
		
		//Purpose
		$resPurpose = $_SESSION['resPurpose'];
		
		//Facility		
		$resFacility = $_SESSION['resFacility'];
		$resFrom = $_SESSION['resfrom'];
		$resTo = $_SESSION['resto'];
		$resfee = $_SESSION['resfee'];
		//$dayresfee = $_SESSION['dayresfee'];
		//$nightresfee = $_SESSION['nightresfee'];
		
		//Equipment
		$equipment = $_SESSION['equipment'];
		$quantity = $_SESSION['quantity'];		
		$quantity1[] = array(); //Temporary storage for quantity array	
		$equipfee1[] = array(); //Temporary storage for quantity array
		
		$equipmentF = 0;
		if(!empty($equipment)){
			
			$intCtr =0;
			foreach($equipment as $a){
				if(!empty($a)){
					
					require("connection.php");
					$query = mysqli_query($con, "select dblequipfee from tblequipment where strequipname = '$a'");
					
					while($row = mysqli_fetch_row($query)){
						$equipfee1[$intCtr] = $row[0];
					}
					
					$intCtr++;
					//echo $i;
				}					
			}
			
			$intCtr =0;
			foreach($quantity as $i){
				if(!empty($i)){
					$quantity1[$intCtr] = $i;
					$intCtr++;
					//echo $i;
				}					
			}
			$equipmentF = 1;
			
		}else{
			$equipmentF = 0; //EquipmentF tells whether array $equipment is empty or not
		}
		
		//Conversion of Time
		$time1 = StrToTime ($resFrom);
		$time2 = StrToTime ($resTo);
		$diff = $time1 - $time2;
		$hours = $diff / ( 60 * 60 );
		$hours = -1 * $hours;
		
		//Gets Today's Date
		$today = date("F j, Y, g:i a"); // displays date today
		
		//Payment
		$total =0;
		$amountR =0;
		$balance =0;
		$change =0;
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
								<div class="panel-body">
									<div class="form-group">
																			
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Date
											<input id="payDate" class="form-control input-group-lg reg_name" type="text"  name="payDate" value = "<?php echo" $today"; ?>" disabled></font>											
										</div>

										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> OR No
											<input id="payOR" name="payOR" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" disabled></font>											
										</div>	
									</div><br><br><br><br> <!-- /#form-group -->
								
								
									<div class="form-group">
										
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Payor
											<input id="payor" name="payor" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value = "<?php echo" $name"; ?>"></font>		
										</div>
									
										<div class="col-sm-4">
											<font face = "cambria" size = 5 color = "grey"> Contact Number
											<input id="busId" name="payName" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value = "<?php echo" $contactno"; ?>"></font>	
										</div><br><br>
									
									</div>
								</div><br><br>
									
								<div class="form-group">
								<div class="col-sm-10">
									<div class="form-group"> <!-- /Reservation Details Facility-->
										<font face = "cambria" size = 5 color = "grey"> Reservation Details</font><br><br><br>
										
										<div class="col-sm-10">
										<div class="panel panel-default"><!-- Default panel contents -->
											<table class="table"'><!-- Table -->
												<thead>
												<tr><th> Faclity Name </th>
													<th> Per Hour </th>
													<th> Duration (Hours) </th>
												</tr>
												</thead>
											<tbody>
												<tr><td> <?php echo" $resFacility";?> </td>
													<td> <?php echo" $resfee";?> </td>
													<td> <?php echo" $hours";?></td>
												</tr>
											</tbody>
										</table>										
										
										</div> <!-- /#panel panel-default --> 
										</div><br><br><br><br><br> <!--col-sm-6-->
									
										<!-- /Reservation Details Equipment-->	
										<div class="col-sm-10">
										<div class="panel panel-default"><!-- Default panel contents -->
											<table class="table"><!-- Table -->
												<thead>
												<tr><th> Equipment Name </th>
													<th> Quantity </th>
													<th> Per Hour</th>
												</tr>
												</thead>
											<tbody>											
												<?php 
												if($equipmentF == 1){
												
												for($intCtr = 0; $intCtr < sizeof($equipment); $intCtr++){ ?>		
												<tr>
													<td> <?php echo" $equipment[$intCtr]";?> </td>
													<td> <?php echo" $quantity1[$intCtr]";?> </td>
													<td> <?php echo" $equipfee1[$intCtr]";?></td>
												</tr>
												<?php 
													$total = $total + $quantity1[$intCtr] * $equipfee1[$intCtr];
													} 
											
												}else{
												}?>											
											</tbody>
											</table>										
										
										</div> <!-- /#table-responsive -->
										</div>
									</div>
								</div><br><br>
									
									<?php 
										$total = $total + $resfee * $hours;
									?>
																		
								<div class="col-sm-10">
									<!-- /Payment Details -->								
									<font face = "cambria" size = 5 color = "grey"> Payment Details</font>
									<br><br><br>
								</div>
								
								<div class="col-sm-4">
									<font face = "cambria" size = 5 color = "grey"> Total Amount Due :
										<input id="total" name="total" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= " <?php echo" $total";?>"disabled></font><br><br>

									<a href="FacilityEquipmentT.php"><input type="button" class="btn btn-outline btn-success" name = "btnGoBack" value = "Go Back"></a>
									<input type="submit" class="btn btn-outline btn-success" name = "btnNote" value = "Note Reservation">
								</div>														
								
								</div>
								
								<?php
								if(isset($_POST['btnNote'])){
									include("saveReservation1.php");
								}?>
							
			<button type="submit" name="btnProceed">Facility Equipment List</button>
	
			<?php if(isset($_POST['btnProceed'])){
					session_destroy();
					echo"<script> window.location = 'FacilityEquipmentL.php'</script>";
			}?>
								
						</form> <!-- /#form method -->									
									
						</div><br> <!-- /#bodybody -->
					</div> <!-- /#col-lg-12 -->
										
				</div>	<!-- /#row -->
			</div> <!-- /#container-fluid -->
			
		</div><br><br> <!-- /#page-content-wrapper -->
    </div> <!-- /#wrapper -->
				
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php require("footer.php");?>