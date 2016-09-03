<!DOCTYPE html>
<?php session_start();
require('connection.php');

$id = $_SESSION['ID'];

$sql = "SELECT `strOfficerID`,`strUsername`,`strPassword`,`intForeignPositionId` ,`strEmailAdd`, concat(strLastName,',',strFirstName,' ',strMiddleName) as 'Name',concat(strBuildingNo,' , ',strStreetName,' ',strPurok) as 'Street', `dtStart`,`dtEnd` 
FROM `tblaccount` as a inner join `tblhousemember` as b on b.intMemberNo = a.intForeignMemberNo inner join tblhousehold as d on b.intForeignHouseholdNo = d.intHouseholdNo inner join tblstreet as c on d.intForeignStreetId = c.intStreetId where strOfficerID = $id";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_object($query);
require('header.php');?>
<?php require('sidebar.php');?>
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->

<section id="main-content">
	<br>
	<section class="wrapper site-min-height">
		<button class="btn btn-theme" onclick="window.location.href='AccountMaintenance.php'">Back to the Previous Page</button>
		<form method = POST>
			<legend ><font face = "cambria" size = 8 color = "grey"> Edit Account </font></legend><br>
			<div class = "showback" >
				
				
				<div class = "form-group">



					<div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey"> Resident's Full Name: </font></p>			
						<div class="col-sm-10">
							<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  value = '<?php echo $row->Name?>' readonly>		
						</div> </div>
						
						
						
					</div>




					<div class="form-group" id = "SSS-div">				
						<div class="col-sm-5">
							<p><font face = "cambria" size = 4 color = "grey"> Username </font></p>

							<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" value = '<?php echo $row->strUsername?>'  type="text"  readonly>	
						</div> </div> <br><br><br><br><br></div>			 
						
						
						
						<div class = "form-group">



							<div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey"> Password: </font></p>			
								<div class="col-sm-10">
									<input id="Pass1" name = "Pass" class="form-control input-group-lg reg_name" type="password" value = '<?php echo $row->strPassword?>'>		
								</div> </div>
								
								
								
							</div>




							<div class="form-group" id = "SSS-div">				
								<div class="col-sm-5">
									<p><font face = "cambria" size = 4 color = "grey"> Confirm Password </font></p>

									<input id="Pass2" name = "StreetName" class="form-control input-group-lg reg_name" type="password" required >		
								</div> </div> <br><br><br><br><br></div>			
								
								
								
								<div class = "form-group">



									<div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey">Position: </font></p>			
										<div class="col-sm-10">
											<select class ="form-control input-group-lg reg_name" name = "Position">
												<?php
												$sql1 = mysqli_query($con,"Select intPositionId,strPositionName from tblbrgyposition");
												while($row1 = mysqli_fetch_object($sql1)){
												$sql2 = mysqli_query($con,"select intNumber,count(intForeignPositionId) as num from tblaccount as a INNER join tblbrgyposition as b on a.intForeignPositionId = b.intPositionId where intForeignPositionId = ".$row1->intPositionId." AND strStatus != 'Disabled' ;");
												$row2 = mysqli_fetch_object($sql2);
												if(($row2->intNumber != $row2->num)||($row->intForeignPositionId == $row1->intPositionId)){
												?><option value = <?php echo "'".$row1->intPositionId."' ";
																	if ($row->intForeignPositionId == $row1->intPositionId){
																		echo "selected";
																	}?> ><?php echo $row1->strPositionName; ?></option><?php }
											}
											
											?>
										</select>
									</div> </div>
									
									
									
								</div>




								<div class="form-group" id = "SSS-div">				
									<div class="col-sm-5">
										<p><font face = "cambria" size = 4 color = "grey"> Email Address </font></p>

										<input id="controlno" name = "Email" class="form-control input-group-lg reg_name" type="text" value = '<?php echo $row->strEmailAdd?>'  >		
									</div> </div> <br><br><br><br><br></div>		
									
									
									
									<div class = "form-group">



										<div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey">Start Date: </font></p>			
											<div class="col-sm-10">
												<input id="controlno" name = "Sdate" class="form-control input-group-lg reg_name" type="date"  value = '<?php echo $row->dtStart?>' required>	
											</div> </div>
											
											
											
										</div>




										<div class="form-group" id = "SSS-div">				
											<div class="col-sm-5">
												<p><font face = "cambria" size = 4 color = "grey"> End Date </font></p>

												<input id="controlno" name = "Edate" class="form-control input-group-lg reg_name" type="date"  value = '<?php echo $row->dtEnd?>' min = <?php echo date('Y-m-d');?> required>			
											</div> </div> <br><br><br><br><br></div>			
											
											
											
											
											
											
											
							
											
											<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record" onclick = "return check();" > </div>
											
											<?php
											if(isset($_POST['btnAdd'])){
												$password = $_POST['Pass'];
												$position = $_POST['Position'];
												$Email = $_POST['Email'];
												$start = $_POST['Sdate'];
												$end = $_POST['Edate'];
												$_pass = mysqli_real_escape_string($con,$password);
												mysqli_query($con,"Update tblaccount set strPassword = '$_pass', intForeignPositionId = '$position', strEmailAdd = '$Email', dtStart = '$start', dtEnd = ' $end' where strOfficerID = $id");
												
												echo "<script> window.location = 'AccountMaintenance.php'; </script>";
											
												
											}?>
										
												
			</center><br><br>
			<!-- /#page-content-wrapper -->
		</form>

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





function check(){
	var x = document.getElementById('Pass1').value;
	var y = document.getElementById('Pass2').value;
	if(x != y){
		alert("Password doesn't match");
		return false;
	}
	else{
		var conf = confirm("Are you sure with the changes you made?");
		if(conf == true){
			return true;
		}
		else{
			return false;
		}
	}
}
$(function(){
	$('select.styled').customSelect();
});

</script>

</body>
</html>
