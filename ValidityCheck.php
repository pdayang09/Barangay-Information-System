 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
	
	
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
	
	$searchtemp =0;
	$preApp = "app-";
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
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> </font></legend> <!-- Insert Here -->	
		
		<div class="col-sm-6">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button class="btn btn-primary" id = "searcht" name = "btnSearch" value = 1 onclick = "select(this.value)">Resident</button>
			</div>
			<div class="btn-group" role="group">
				<button class="btn btn-success" id = "searcht" name = "btnSearch" value = 2 onclick = "select(this.value)">Non-Resident</button>
			</div>
		</div>
		</div>
		
		<div class="col-sm-2">
			<a href="RegisterApplicant.php"><input type="button" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd" href="RegisterApplicant.php" value="Add Applicant"></a>
		</div><br><br><br>
		
		<?php
		$statement = "SELECT a.`intMemberNo`, CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', a.`strContactNo`, CONCAT(s.`strStreetName`, ', ', s.`strPurok`) AS 'Place', YEAR(Now()) - YEAR(a.`dtBirthdate`) AS 'Age' FROM tblhousemember a INNER JOIN tblhousehold h ON h.`intHouseholdNo` = a.`intForeignHouseholdNo` INNER JOIN tblstreet s ON s.`intStreetId` = h.`intForeignStreetId`WHERE YEAR(Now()) - YEAR(a.`dtBirthdate`) >=16 AND (strVotersId != '' || MONTH(NOW()) - MONTH(a.dtEntered) >=6)";				
		?>

<form method="POST">		
		<center>
		<div class = "showback" id = "tablestreet">	
			<table  id = "dataTable" class="table table-hover" style="height: 40%; overflow: scroll; "'>
				<thead><tr>
					<th>ID</th>
					<th>Full Name</th>
					<th>Contact No</th>
					<th>Place</th>
					<th>Action</th>
				</tr></thead>
			
			<tbody>
			<?php
			
			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){ ?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[1]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[2]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[3]; ?></td>
				<?php
				if(strstr($row[0], $preApp)){
												
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnProceed' value = '$row[0]' class='btn btn-success btn-xs'><i class='fa fa-calendar'></i></button><button type = 'submit' name='btnDocument' value = '$row[0]' class='btn btn-success btn-xs'><i class='fa fa-file'></i></button></td>";
						
					}
				else{						
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button type = 'submit' name='btnProceed' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-calendar'></i></button><button type = 'submit' name='btnDocument' value = '$row[0]' class='btn btn-primary btn-xs'><i class='fa fa-file'></i></button></td>";
						
					}
				
			}?>
			
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive -->              
	
		<?php 
			if(isset($_POST['btnProceed'])){
				$proceed = $_POST['btnProceed'];
				
				$residency =0;
				if(strstr($proceed, $preApp)){
					$statement = "SELECT a.`strApplicantID`, CONCAT(a.`strApplicantLName`, ', ', a.`strApplicantFName`, ' ', a.`strApplicantMName`, ' ', a.`strNameExtension`) AS 'Name', a.`strApplicantContactNo`, CONCAT(a.`strApplicantAddress_street`, ' ', a.`strApplicantAddress_brgy`,', ',a.`strApplicantAddress_city`) AS 'Place' FROM tblapplicant a WHERE a.`strApplicantID` = '$proceed'";
					
					$residency = 2;
				}else{
					$statement = "SELECT a.`intMemberNo` AS 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', a.`strContactNo`, CONCAT(s.`strStreetName`, ', ', s.`strPurok`) AS 'Place' FROM tblhousemember a INNER JOIN tblhousehold h ON h.intHouseholdNo = a.intForeignHouseholdNo INNER JOIN tblstreet s ON s.intStreetId = h.intForeignStreetId WHERE a.`intMemberNo` = '$proceed'";
					
					$residency = 1;
				}
									
				$query = mysqli_query($con,$statement);
				
				while($row = mysqli_fetch_array($query)){
					
					$clientID = $row[0];
					$name = $row[1];
					$contactno = $row[2];	
					$place = $row[3];
						
					$_SESSION['clientID'] = $clientID;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;		
					$_SESSION['residency'] = $residency;

				}
				
				echo "<script> window.location = 'FacilityEquipment.php';</script>";
				
			}else if(isset($_POST['btnDocument'])){
				$btnDocument = $_POST['btnDocument'];
				
				$residency =0;
				if(strstr($btnDocument, $preApp)){
					
					$statement = "SELECT a.`strApplicantID`, CONCAT(a.`strApplicantLName`, ', ', a.`strApplicantFName`, ' ', a.`strApplicantMName`, ' ', a.`strNameExtension`) AS 'Name', a.`strApplicantContactNo`, CONCAT(a.`strApplicantAddress_street`, ' ', a.`strApplicantAddress_brgy`,', ',a.`strApplicantAddress_city`) AS 'Place' FROM tblapplicant a WHERE a.`strApplicantID` = '$btnDocument'";
					
					$residency = 2;
				}else{
					
					$statement = "SELECT a.`intMemberNo` AS 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', a.`strContactNo`, CONCAT(s.`strStreetName`, ', ', s.`strPurok`) AS 'Place' FROM tblhousemember a INNER JOIN tblhousehold h ON h.intHouseholdNo = a.intForeignHouseholdNo INNER JOIN tblstreet s ON s.intStreetId = h.intForeignStreetId WHERE a.`intMemberNo` = '$btnDocument'";
					
					$residency = 1;
				}
				
				$query = mysqli_query($con,$statement);
				
				while($row = mysqli_fetch_array($query)){
					
					$clientID = $row[0];
					$name = $row[1];
					$contactno = $row[2];	
					$place = $row[3];
						
					$_SESSION['clientID'] = $clientID;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;		
					$_SESSION['residency'] = $residency;
				}
				
				if($residency == 2)				
					echo "<script> window.location = 'DRselectDocNonResident.php';</script>";
				else if($residency == 1)
					echo "<script> window.location = 'DRselectDocResident.php';</script>";
			}
			
			?>
	</form> 				
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->			
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
				
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
	     
<script>
//custom select box
function search(val){
	var a ;

	$.ajax({
		type: "POST",
		url: "gettable1.php",
		data: 'sid=' + a +'&bid='+val,
		success: function(data){
			//alert(data);
			$("#dataTable").html(data);
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
	var a ;

	$.ajax({
		type: "POST",
		url: "getValidity.php",
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

      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              CPS BIS 2016
              <a href="index.php" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
	  
  </section>

<!-- Menu Toggle Script -->
   <script>
   $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
   });
   </script>
  
<!-- jQuery -->
   <script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
  
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

<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>

	<!-- DATA TABLE -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

  <script src="dataTables/jquery.dataTables.js"></script>
  <script src="dataTables/dataTables.bootstrap.js"></script>  

  <script>
    $(document).ready(function() {
    $('#dataTable').dataTable();
	$('#nonResident').dataTable();	
    });
  </script>
	 
   </body>
</html>