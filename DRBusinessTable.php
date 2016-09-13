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
	//$resId = $clientId ="";
	$name ="";
	$contactno ="";	
	
	$add = $_SESSION['place'];
		  $resId = $_SESSION['clientID'];
		  $place = $_SESSION['place'];
		  $name = $_SESSION['name'];
		  $_POST['busLocation'] = $add;
		  //echo"<script> alert('$resId')</script>";
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
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Business Clearance </font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<font face = "cambria" size = 5 color = "black"> <?php echo "Name:"?> </font>
			<font face = "cambria" size = 5 color = "black"> <?php echo "$name"?> </font>
		</div>	<br><br><br>
		<div class="col-sm-5">
			<input type="submit" class="btn btn-outline btn-success" name = "ReqBus" id = "ReqBus"  value="Request New Business Clearance">
		
		</div>
		</div>
		
		<br>
		
		<?php
			
		?>
		
		<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<center><thead><tr>
					<th>Business ID</th>
					<th>Business Name</th>
					<th>Business Type</th>
					<th>Address</th>
					<th>Business Status</th>
					<th>Date Last Renewal</th>
					<th>Action</th>
				</tr></thead></center>
			
			<tbody>
			<?php
			$docReqPaymentSQL = "SELECT b.strBusinessID, b.strBusinessName, bc.strBusCateName, b.strBusinessLocation, bs.strBSbusinessStat, bs.datBCStat FROM tblbusiness b INNER JOIN tblbusinesscate bc ON b.strBusinessCateID = bc.strBusCatergory INNER JOIN tblbusinessstat bs ON b.strBusinessID = bs.strBusinessID WHERE bs.`strBusOwnerID` = '$resId' AND bs.strBusStatID = (SELECT `strBusStatID` FROM `tblbusinessstat` WHERE 1 ORDER BY `strBusStatID` DESC LIMIT 1)";
			
			$docReqPayment = mysqli_query($con, $docReqPaymentSQL);
			while($row = mysqli_fetch_array($docReqPayment)){?>
				<center><tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<td><?php echo $row[4]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td>
					<button type="submit" class="btn btn-theme" name="btnEdit" value="<?php echo $row[0]; ?>"><i class="fa fa-check"></i>Renew</button>
				</td>
				
				</center>
				<?php
					
				echo"</tr>";
			}?>
			
			</tbody>
			</table>
		</div></center><!-- Table-responsive -->              
		
	</form> 				
	
			<?php
			$plateNo = $row[0];
			if(isset($_POST['ReqBus'])){
				//Session Mode
				$_SESSION['clientID'] = $resId;
				$_SESSION['name'] = $name;
				$_SESSION['contactno'] = $contactno;
				$_SESSION['place'] = $add;
				$_SESSION['document']  = "Business Clearance";//Type of document
				if($docReqPayment == true){
				//echo"<script> alert('awsfyh')</script>";
				echo "<script>window.location = 'DRformBusClearanceNew.php';</script>";
				
				}
				
			}
			
		?>
		<?php
			if(isset($_POST['btnEdit'])){
				$busID = $_POST['btnEdit'];
				$operatorName = "";
					require("connection.php");
					//echo"<script> alert('$busID')</script>";
					$query = mysqli_query($con, "SELECT tblbusinessstat.strBusinessID, `tblbusinesscate`.`strBusCateName`, `tblbusiness`.`strBusinessDesc`, `tblbusiness`.`strBusinessLocation`, `tblbusiness`.`strBusinessContactPerson`, `tblbusiness`.`strContactNum`,  tblbusiness.strBusinessName, tblbusinesscate.strBusCatergory FROM `tblbusinesscate` INNER JOIN `tblbusiness`ON `tblbusinesscate`.`strBusCatergory` = `tblbusiness`.`strBusinessCateID` INNER JOIN tblbusinessstat ON tblbusiness.strBusinessID = tblbusinessstat.strBusinessID WHERE tblbusiness.strBusinessID = '$busID'");
					
					while($row = mysqli_fetch_row($query)){
						$_SESSION['busID'] = $row[0];
						$_SESSION['strBusCateName'] = $row[1];
						$_SESSION['strBusinessDesc'] = $row[2];
						$_SESSION['strBusinessLocation'] = $row[3];
						$_SESSION['strBusinessContactPerson'] = $row[4];
						$_SESSION['strContactNum'] = $row[5];
						$_SESSION['busName'] = $row[6];
						$_SESSION['busCateID'] = $row[7];	
					}
					
				echo "<script> window.location = 'DRformBusClearanceRenew.php';</script>";
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