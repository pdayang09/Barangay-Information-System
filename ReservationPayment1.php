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
		$residency = $_SESSION['residency'];
		$clientID = $_SESSION['clientID'];
		$name = $_SESSION['name'];
		$contactno = $_SESSION['contactno'];	
		$resId = $_SESSION['resId'];
		$resPurpose = $_SESSION['resPurpose'];
		$num = $_SESSION['num']; 

		$resFrom = $_SESSION['resFrom']; 
		$resTo = $_SESSION['resTo']; 
		$resFacility = $_SESSION['resFacility'];
		$resFacName = $_SESSION['resFacName'];
			
		//EQUIPMENT
		$equipment[] = array();
		$quantity[] = array();		
		$quantity1[] = array(); //Temporary storage for quantity array	
		$equipfee1[] = array(); //Equipment Fee
		
		$temp = explode(",",$_SESSION['equipment']);
		$equipment = array_merge($equipment, $temp);

		$temp1 = explode(",",$_SESSION['quantity']);
		$quantity = array_merge($quantity, $temp1);

		if(!empty($equipment)){
			
			$intCtr =0;
			foreach($equipment as $a){
				if(!empty($a)){
					
					require("connection.php");
					$query = mysqli_query($con, "select dblequipfee from tblequipment where strequipname = '$a'");
					
					//echo $a;

					while($row = mysqli_fetch_row($query)){
						$equipfee1[$intCtr] = number_format($row[0],2);
						//echo $equipfee1[$intCtr];
						//echo "$intCtr";
					}
					
					//echo $equipment[$intCtr];
					//echo "<br>";

					$intCtr++;
				}				
			}


			$intCtr =0;
			foreach($quantity as $i){
				if(!empty($i)){
					$quantity1[$intCtr] = number_format($i,0);
									
					//echo $quantity[$intCtr];
					//echo $quantity1[$intCtr];
					//echo "<br>";

				$intCtr++;
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
		$today = date("Y-m-d"); // displays date today
		
		//Payment
		$total =0;
		$amountR =0;
		$balance =0;
		$change =0;
		
		include("paymentconfig.php");
		$hours = round($hours)
	?>
	
	<form method = "POST">
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <legend ><font face = "cambria" size = 8 color = "grey"> Assessment </font></legend>
					   	
						<div class = "bodybody">	
									
							<div class="form-group">
								<div class="col-sm-6">
									<div class="showback">
										<font face = "cambria" size = 5 color = "grey"> Reservation Details</font><br><br><br>
										
										<div class="panel panel-default"><!-- Default panel contents -->
											<table class="table"'><!-- Table -->
												<thead>
												<tr><th> Faclity</th>
													<th> Per Hour </th>
													<th> Duration (Hours) </th>
												</tr>
												</thead>
											<tbody>
												<tr><td> <?php echo" $resFacName";?> </td>
													<td> <?php echo" $resfee";?> </td>
													<td> <?php echo" $hours";?></td>
												</tr>
											</tbody>
										</table>	
										</div><br> <!--col-sm-6-->
									
										<!-- /Reservation Details Equipment-->	
										<div class="panel panel-default"><!-- Default panel contents -->
											<table class="table"><!-- Table -->
												<thead>
												<tr><th> Equipment </th>
													<th> Quantity </th>
													<th> Per Hour</th>
												</tr>
												</thead>
											<tbody>											
										<?php 

										if($equipmentF == 1){

										$intCtr =0;
										foreach($equipment as $a){
											if(!empty($a)){
										?>

										<tr>
											<td> <?php echo $a;?> </td>
											<td> <?php echo $quantity1[$intCtr]; ?> </td>
											<td> <?php echo $equipfee1[$intCtr]; ?></td>
										</tr>

										<?php 
											$total = $total + $quantity1[$intCtr] * $equipfee1[$intCtr];
											$total = number_format($total, 2);
												
											$intCtr++;
											}
										}
											
										}else{
										}

										?>											
											</tbody>
											</table> <!-- /#table-responsive -->
										</div>
									</div>
								</div>					

								<div class="form-group">
									<div class="col-sm-5">
										<div class="showback">	
											<font face = "cambria" size = 5 color = "grey"> Reservation ID
											<input id="resId" class="form-control input-group-lg reg_name" type="text"  name="resId" value = "<?php echo" $resId"; ?>" disabled></font>	
											<font face = "cambria" size = 5 color = "grey"> Date
											<input id="payDate" class="form-control input-group-lg reg_name" type="text"  name="payDate" value = "<?php echo" $today"; ?>" disabled></font>		
										</div>
									</div>
								</div>
									
								<?php 
									$total = $total + $resfee * $hours;
									$total = number_format($total, 2);
								?>

								<div class="form-group">
									<div class="col-sm-5">
										<div class="showback">	
											<font face = "cambria" size = 6 color = "grey"> Total
											<input id="total" class="form-control input-group-lg reg_name" type="text"  name="total" value = "<?php echo" $total"; ?>" disabled></font>		
										</div>
									</div>
								</div>														
							</div><br><br><br><br>

							<center>
							<div class="form-group">
								<div class="col-sm-7">
									<a href="validityCheck.php"><input type="button" class="btn btn-outline btn-success" name = "btnGoBack" value = "Reserve Again"></a>
									<input type="submit" class="btn btn-outline btn-success" name = "btnNote" value = "Assess Payment">
									<a href="facilityequipmentL.php"><input type="button" class="btn btn-outline btn-success" name = "btnView" value = "View Reservation"></a>
								</div>
							</div></center>

								
			<?php
				if(isset($_POST['btnNote'])){
					include("saveReservation1.php");
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