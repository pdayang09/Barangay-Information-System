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
		<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
		<button  class="btn btn-info" onclick="window.location.href='Hholdview.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
		<br>
		<br>
		<form method = POST>
	<div class = "showback">		
	<h4>Member/s of the Household</h4>
			<table  border = '2' style = 'width:95%'>
				<tr>
					<th>Name</th>
					<th>Gender</th>
					<th>Relation to the Owner</th>
					<th>Action</th>
				</tr>
				<?php
				$Hno = $_SESSION['Hno'];
				require('connection.php');
				$sql = "SELECT concat(Lastname,',',Firstname,' ',MiddleName,' ',NameExtension) as 'Name',Gender,Status,Memberno FROM `tblhousemember` where ForeignHouseholdNo = '$Hno' AND (LifeStatus LIKE 'Moved' AND LifeStatus NOT LIKE 'Dead') AND (Status LIKE 'Spouse' OR Status LIKE 'Children')";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					
					while($row = mysqli_fetch_object($query)){
						$Gend = "";
						if($row->Gender == 'F'){
							$Gend = "Female";
						}
						else{
							$Gend = "Male";
						}?>
						<tr> <td><?php echo $row->Name?></td>
							<td><?php echo $Gend?></td>
							<td><?php echo $row->Status?></td>
							<td><button  class="btn btn-success" type = submit value = <?php echo $row->Memberno?> name = 'View' >Returning</button></td>
							

						</tr>
						<?php }}?>

					</table>
					<br>
					<h4>Other Member/s of the Household</h4>
					<table  border = '2' style = 'width:95%'>
						<tr>
							<th>Name</th>
							<th>Gender</th>
							<th>Relation to the Owner</th>
							<th>Action</th>
						</tr>
						<?php
						require('connection.php');
						$sql = "SELECT concat(Lastname,',',Firstname,' ',MiddleName,' ',NameExtension) as 'Name',Gender,Status,Memberno FROM `tblhousemember` where ForeignHouseholdNo = '$Hno' AND (LifeStatus LIKE 'Moved' AND LifeStatus NOT LIKE 'Dead') AND Status NOT LIKE 'Head' AND (Status NOT LIKE 'Spouse' AND Status NOT LIKE 'Children')";
						$query = mysqli_query($con, $sql);
						if(mysqli_num_rows($query) > 0){
							
							while($row = mysqli_fetch_object($query)){
								$Gend = "";
								if($row->Gender == 'F'){
									$Gend = "Female";
								}
								else{
									$Gend = "Male";
								}?>
								<tr> <td><?php echo $row->Name?></td>
									<td><?php echo $Gend?></td>
									<td><?php echo $row->Status?></td>
									<td><button  class="btn btn-success" type = submit value = <?php echo $row->Memberno?> name = 'View' >Returning</button></td>

									</tr>
									<?php }}
									
									if(isset($_POST['View'])){
										$Member = $_POST['View'];
										require('connection.php');
										mysqli_query($con,"Update tblhousemember set LifeStatus = 'Alive' where Memberno = '$Member'");
										echo "<script>window.location = 'HholdPersonal.php';</script>";
									}
									
									?>

								</table>
							</form>
							
						</div>
						
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

			<script>
//custom select box

$(function(){
	$('select.styled').customSelect();
});

</script>
