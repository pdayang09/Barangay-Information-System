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
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Return Items </font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="search" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Search Reservation ID">					
			</div>				
			<div class="col-sm-2">
				<input type="submit" class="btn btn-outline btn-success" name = "btnSearch" id = "btnSearch" value = "Search">
			</div>			
			<div class="col-sm-3">
				<select name="cmbFilter" class="form-control input-group-lg reg_name" >
					<option value="1"> January </option>
					<option value="2"> February </option>
					<option value="3"> March </option>
					<option value="4"> April </option>
					<option value="5"> May </option>
					<option value="6"> June </option>
					<option value="7"> July </option>
					<option value="8"> August </option>
					<option value="9"> September </option>
					<option value="10"> October </option>
					<option value="11"> November </option>
					<option value="12"> December </option>
				</select>
			</div>
			<div class="col-sm-2">
				<input type="submit" class="btn btn-outline btn-inform" name = "btnFilter" id = "btnFilter" value = "Filter">			
			</div>
		</div><br><br><br><br>
		
		<?php
			if(isset($_POST['btnSearch'])){
				$search = $_POST['search'];
				
				if(!empty($search)){ //Notifies User if Search is empty
					$statement = "SELECT r.*, SUM(re.intreturned), SUM(re.intunreturned) FROM `tblreservationrequest` r INNER JOIN `tblReturnEquip` re ON re.strreservationid = r.strreservationid GROUP BY re.strreservationid HAVING r.strreservationid = $search;";
				}else if(empty($search)){
					echo"<script> alert('Pls Input Reservation ID')</script>";
					$statement = "SELECT r.*, SUM(re.intreturned), SUM(re.intunreturned) FROM `tblreservationrequest` r INNER JOIN `tblReturnEquip` re ON re.strreservationid = r.strreservationid GROUP BY re.strreservationid ORDER by r.datRReservedDate asc;";
				}
				
			}else if(isset($_POST['btnFilter'])){
				
				if(isset($_POST['cmbFilter'])){
					$mfilter = $_POST['cmbFilter'];
					
					$statement = "SELECT r.*, SUM(re.intreturned), SUM(re.intunreturned) FROM `tblreservationrequest` r INNER JOIN `tblReturnEquip` re ON re.strreservationid = r.strreservationid GROUP BY re.strreservationid HAVING YEAR(datrreserveddate) = YEAR(CURDATE()) AND MONTH(datrreserveddate) = $mfilter ORDER by r.datRReservedDate asc, re.intunreturned desc;";
				}else{
					
					$statement = "SELECT r.*, SUM(re.intreturned), SUM(re.intunreturned) FROM `tblreservationrequest` r INNER JOIN `tblReturnEquip` re ON re.strreservationid = r.strreservationid GROUP BY re.strreservationid ORDER by r.datRReservedDate asc, re.intunreturned desc;";
				}
				
			}else{
				$statement = "SELECT r.*, SUM(re.intreturned), SUM(re.intunreturned) FROM `tblreservationrequest` r INNER JOIN `tblReturnEquip` re ON re.strreservationid = r.strreservationid GROUP BY re.strreservationid ORDER by r.datRReservedDate asc;";
			}
		?><br>
		<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>Reservation ID</th>
					<th>Purpose</th>
					<th>Status</th>
					<th>Return</th>
				</tr></thead>
			
			<tbody>
			<?php
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[7];?></td>
				<?php
					if($row[9]==0){
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode' >Complete</td>";
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode' ><button disabled class='btn btn-success btn-xs' type ='submit' name = ''?>RETURN</button></td>";
						
					}else if($row[9]>0){
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>Incomplete</td>";
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' type ='submit' name = 'return' value = $row[0]>RETURN</button></td>
				";
					}
				?></tr><?php
				
			}?>
			
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive -->              
	
		<?php 
			if(isset($_POST['return'])){
				$return = $_POST['return'];
				$_SESSION['return'] = $return;
				
					//Reservation Details
					$query = mysqli_query($con,"select a.strApplicantFname AS Name,  a.strapplicantcontactno AS ContactNo, r.strreservationid AS ReservationID, r.datRReserveddate AS ReservationDate FROM tblApplicant a INNER JOIN tblreservationrequest r ON r.strrrapplicantid = a.strapplicantid WHERE r.strReservationID=$return ORDER BY r.datRReservedDate asc;");
					
					while($row = mysqli_fetch_array($query)){
						$name = $row[0];
						$contactno = $row[1];
						$resId = $row[2];
						$resDate = $row[3];
					}?>
					
			<div class="form-group">
				<div class="col-sm-5">
				<font face = "cambria" size = 6 color = "grey"> Reservation Details </font>
				<br>
				<font face = "cambria" size = 4 color  = "grey"> <?php echo"Date: $today";?></font>
				<br>
				<font face = "cambria" size = 4 color = "grey"> <?php echo"Reservation Id: $resId";?></font>
				<br>
				<font face = "cambria" size = 4 color = "grey"> <?php echo"Name: $name";?></font>
				<br>
				<font face = "cambria" size = 4 color = "grey"> <?php echo"Contact No: $contactno";?></font>
				<br><br>
				<!--<font face = "cambria" size = 5 color = "grey"> <?php echo"Purpose: $resPurpose";?></font>
				<br> 
				<font face = "cambria" size = 5 color = "grey"> <?php echo"From: $resFrom  <br> To: $resTo";?></font>
				<br><br> -->
				</div>
			</div>		

					<!-- Equipment Reservation Details -->
					<center>
				<div class="col-sm-7">
					<div class="panel panel-default"><!-- Default panel contents -->	
						<table class="table"><!-- Table -->
							<thead><tr>
								<th>Equipment</th>
								<th>Quantity</th>
								<th>Received</th>
								<th>Return</th>
							</tr></thead>
			
						<tbody>
						<?php
						$query = mysqli_query($con,"SELECT rt.strequipcode AS Equipment, rt.intreturned AS ReturnedQty, rt.intunreturned AS UnreturnedQty FROM tblreservationrequest r INNER JOIN tblreturnequip rt ON rt.strreservationid = r.strreservationid WHERE r.strreservationid = $return;");
						while($row = mysqli_fetch_array($query)){
					?>
							<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
							<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[1] + $row[2]; ?></td>
							<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[1]; ?></td>		
							<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><input type="number" min = "0" max = "<?php echo ($row[1] + $row[2])-$row[1]; ?>" class="form-control input-group-lg reg_name" name = quantity[] value = 0></td>
							</tr>
							
					<?php				
						}?>			
						</tbody>
						</table>
					</div><br><br>
					
					<input type="submit" class="btn btn-outline btn-success" name = "btnReturn" value="Update Return">					
				</div></center>		
	</form> 				
		<?php		
			}	
					if(isset($_POST['btnReturn'])){
							$return = $_SESSION['return']; 
						
							if(isset($_POST['quantity'])){
								$quantity = $_POST['quantity']; //gets return input	

							}
						
							//Gets Quantity of unreturned equipment first
							$query = mysqli_query($con,"SELECT * from tblreturnequip where `strreservationid` = $return;");
														
							$intCtr = 0;
							while($row = mysqli_fetch_array($query)){
								
								$returnedTemp = $row[4];   //gets original quantity of returned items
								$unreturnedTemp = $row[5]; //gets original quantity of unreturned items				
															
								$returned = $returnedTemp + $quantity[$intCtr]; //updates quantity of returned items
								$unreturned = $unreturnedTemp - $quantity[$intCtr]; //updates quantity of unreturned items								
								
								mysqli_query($con,"UPDATE `tblreturnequip` SET `intreturned`='$returned' WHERE `intreturned`= $returnedTemp and `intunreturned`= $unreturnedTemp;");
								mysqli_query($con,"UPDATE `tblreturnequip` SET `intunreturned`='$unreturned' WHERE `intreturned`= $returned and `intunreturned`= $unreturnedTemp;"); //Update statement
								
								$intCtr++;
							}
							
							unset($quantity);
							$unreturnedTemp = "";
							$returnedTemp = "";
							$returned = "";
							$unreturned = "";
							
							echo"<script> alert('You Successfully Updated Return Items')</script>";
							 echo "<script> window.location = 'returnitems.php'; </script>";
						}
		?>
			
								</div> <!-- panel-body -->
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