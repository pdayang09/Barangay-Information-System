 <?php session_start();?>
 <!DOCTYPE html>
 <?php require('header.php');?>
 <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

      


      <!--main content start-->
      <?php require('Deceasedvalidate.php');?>
      <?php require('Removevalidate.php');?>
	   <?php require('TransferModal.php');?>
      <section id="main-content">
      	<section class="wrapper site-min-height">		
      		<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>

      		<button  class="btn btn-info" onclick="window.location.href='Hholdview.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
      		<br>
      		<br>
      		<form method = POST>

      			<div class="showback">     
      				<?php
      				require('connection.php');
      				$Hno = $_SESSION['Hno'];
      				$sql = "SELECT * from tblhousemember where intForeignHouseholdNo = '$Hno' AND strStatus = 'Head'";
      				$query = mysqli_query($con, $sql);
      				$row = mysqli_fetch_object($query);
      				$Gend = "";
      				$Mid = "";
      				$Ext = "";

      				if($row->charGender == "M"){
      					$Gend = "Male";
      				}
      				else{
      					$Gend = "Female";
      				}
      				if($row->strMiddleName == NULL){
      					
      				}
      				else{
      					$Mid = $row->strMiddleName;
      				}

      				if($row->strNameExtension == NULL){
      					
      				}
      				else{
      					$Ext = $row->strNameExtension;
      				}
					echo'<img width = 195 height = 195 border= 8 align="left" hspace="10" src = "'.$row->strImage.'">';
      				echo "<font size = 3><strong>Head of Household:</strong></font><font size = 3> ".$row->strFirstName.",".$Mid." ".$row->strLastName." ".$Ext."</font>"?>
					<div class="btn-group " role="group"style="float: right; margin-right: 5cm;"> 
						<div class="btn-group" role="group"  >
						<button type = submit  class="btn btn-info btn-round btn-sm"   value = <?php echo $row->intMemberNo?> name = 'Edit'  <?php if($row->strLifeStatus == 'Deceased'){ echo 'Disabled';}?> >Edit Head Detail</button>
						</div>
					     <div class="btn-group" role="group"> 
      					<button class="btn btn-primary btn-round btn-sm" type = submit  value = <?php echo $row->intMemberNo?>  name = 'View' >View</button>
      					</div>	

						<div class="btn-group" role="group">
						<button type = button  class="btn btn-danger btn-round btn-sm"    onclick = "DecHead(this.value)" data-toggle="modal" data-target="#DeceasedModal"  value = <?php echo $row->intMemberNo?> name = 'HDec'  <?php if($row->strLifeStatus == 'Deceased'){ echo 'Disabled';}?> >Deceased</button>
						</div>
						</div><br><?php
      				echo "<font size = 3><strong>Gender:</strong></font><font size = 3> ".$Gend."</font><br>";
      				echo "<font size = 3><strong>Date of Birth:</strong></font><font size = 3> ".$row->dtBirthdate."</font><br>";
      				echo "<font size = 3><strong>Contact Number:</strong></font><font size = 3> ".$row->strContactNo."</font><br>";
      				echo "<font size = 3><strong>Occupation:</strong></font><font size = 3> ".$row->strOccupation."</font><br>";
					echo "<font size = 3><strong>Voter's Id:</strong></font><font size = 3> ".$row->strVotersId."</font><br>";
					echo "<font size = 3><strong>Life Status:</strong></font><font size = 3> ".$row->strLifeStatus."</font><br><br>";
      				?>
      				<br><br>
      				<a class="btn btn-info btn-sm" href = 'AddSpouse.php' <?php
      				$sql = "Select * from tblhousemember where intForeignHouseholdNo = '$Hno' AND strStatus = 'spouse' AND strLifeStatus = 'Alive' Order by intMemberNo desc";
      				$query = mysqli_query($con,$sql);
      				$row2 = mysqli_fetch_array($query);
					if($row->strLifeStatus == 'Deceased'){ echo 'Disabled';}
      				else if($row->strLifeStatus == 'Alive' && $row2>0){echo "disabled";}
      				else{}
      					?>>Add Spouse</a>
      				<a class="btn btn-info btn-sm" data-toggle="tooltip" title="Hooray!" href = 'AddChildren.php'>Add Children</a>
      				<a class="btn btn-info btn-sm" href = 'AddOther.php'>Add Other Member of the Household</a>
      			</div>
      			<br>
      			
      			<div class="showback">                            
      				<h4>Member/s of the Household</h4>

      				<table class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'>
      					<tr>
      						<th>Name</th>
      						<th>Gender</th>
      						<th>Relation to the Owner</th>
      						<th>Action</th>
      					</tr>
      					<?php
      					require('connection.php');
      					$sql = "SELECT concat(strLastname,',',strFirstname,' ',strMiddleName,' ',strNameExtension) as 'Name',charGender,strStatus,intMemberNo FROM `tblhousemember` where intForeignHouseholdNo = '$Hno' AND (strLifeStatus  NOT LIKE 'Moved' AND strLifeStatus NOT LIKE 'Dead') AND !(strStatus = 'Tenant' || strStatus = 'Head' )
						order by strStatus = 'Spouse' desc, strStatus = 'Children' desc";
      					$query = mysqli_query($con, $sql);
      					if(mysqli_num_rows($query) > 0){
      						
      						while($row = mysqli_fetch_object($query)){
      							$Gend = "";
      							if($row->charGender == 'F'){
      								$Gend = "Female";
      							}
      							else{
      								$Gend = "Male";
      							}?>
      							<tr> <td><?php echo $row->Name?></td>
      								<td><?php echo $Gend?></td>
      								<td><?php echo $row->strStatus?></td>
      								
      								<td>
      									<div class="btn-group " role="group" aria-label="..." >	
      										<div class="btn-group" role="group"> 
      											<button class="btn btn-primary btn-round btn-sm" type = submit  value = <?php echo $row->intMemberNo?>  name = 'View' >View</button>
      										</div>	
      										<div class="btn-group" role="group"> 
      											<button class="btn btn-info btn-sm" type = button value = <?php echo $row->intMemberNo?> onclick = 'Del(this.value);' data-toggle="modal" data-target="#RemoveModal" name = 'Move' >Remove</button>
      										</div>	
      										<div class="btn-group" role="group">
      											<button class="btn btn-info btn-sm" type = button onclick = "getTrans(this.value)" value = <?php echo $row->intMemberNo?> name = 'Transfer' data-toggle="modal" data-target="#TransferModal" >Transfer</button>
      										</div>	
      										
      										<div class="btn-group" role="group">
      											<button  class="btn btn-info btn-sm"type = submit value = <?php echo $row->intMemberNo?> name = 'Edit' >Edit</button>
      											</div>
												<div class="btn-group" role="group">
											
      											<button class="btn btn-danger btn-round btn-sm" type = button value = <?php echo $row->intMemberNo?> onclick = 'Dec(this.value);' data-toggle="modal" data-target="#DeceasedModal"  name = 'Deceased' >Deceased</button>
      										</div></div></td>
      											

      										</tr>
      										<?php }}?>

      									</table>
      								</div></form>
      								<br>
      								<form method = POST>
      									<div class="showback">                         
      										<h4>Tenant/s of the Household</h4>
      										<table class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'>
      											<tr>
												
      												<th>Name</th>
      												<th>Gender</th>
      												<th>Relation to the Owner</th>
      												<th>Action</th>
      											</tr>
      											<?php
      											require('connection.php');
      											$sql = "SELECT concat(strLastname,',',strFirstname,' ',strMiddleName,' ',strNameExtension) as 'Name',charGender,strStatus,intMemberNo FROM `tblhousemember` where intForeignHouseholdNo = '$Hno' AND strStatus = 'Tenant'";
      											$query = mysqli_query($con, $sql);
      											if(mysqli_num_rows($query) > 0){
      												
      												while($row = mysqli_fetch_object($query)){
      													$Gend = "";
      													if($row->charGender == 'F'){
      														$Gend = "Female";
      													}
      													else{
      														$Gend = "Male";
      													}?>
      													<tr> <td><?php echo $row->Name?></td>
      														<td><?php echo $Gend?></td>
      														<td><?php echo $row->strStatus?></td>
      														
      														<td>
      															<div class="btn-group " role="group" aria-label="..." >	
      																<div class="btn-group" role="group"> 
      																	<button class="btn btn-primary btn-round btn-sm" type = submit  value = <?php echo $row->intMemberNo?>  name = 'View' >View</button>
      																</div>	
      																<div class="btn-group" role="group"> 
      																	<button class="btn btn-info btn-sm" type = button value = <?php echo $row->intMemberNo?> onclick = 'Del(this.value);' data-toggle="modal" data-target="#RemoveModal" name = 'Move' >Remove</button>
      																</div>	
      																<div class="btn-group" role="group">
      																	<button class="btn btn-info btn-sm" type = button  onclick = "getTrans(this.value)" value = <?php echo $row->intMemberNo?> name = 'Transfer' data-toggle="modal" data-target="#TransferModal" >Transfer</button>
      																</div>	
      																
      																<div class="btn-group" role="group">
      																	<button  class="btn btn-info btn-round btn-sm"type = submit value = <?php echo $row->intMemberNo?> name = 'Edit' >Edit</button>
      																	</div>
																		<div class="btn-group" role="group">
      																	<button class="btn btn-danger btn-round btn-sm" type = button  value = <?php echo $row->intMemberNo?> onclick ='Dec(this.value);'  data-toggle="modal" data-target="#DeceasedModal" name = 'Deceased' >Deceased</button>
      																</div></div></td>
      																	

      																</tr>
      																<?php }}?>
      																<?php			
      																if(isset($_POST['View'])){
      																	$_SESSION['Memb']=$_POST['View'];
      																	echo "<script>window.location = 'Memberview.php';</script>";
      																}
      														
      																if(isset($_POST['Edit'])){
      																	$_SESSION['Memb']=$_POST['Edit'];
      																	echo "<script>window.location = 'EditChildren.php';</script>";
      																}
      																?>

      															</table></div>
      														</form>
      														
      													</div>
      													
      												</section><! --/wrapper -->
      											</section><!-- /MAIN CONTENT -->

      											<!--main content end-->
      											
      										</section>

      										<!-- js placed at the end of the document so the pages load faster -->
      										<script src="assets/js/jquery.js"></script>
      										<script src="assets/js/bootstrap.min.js"></script>
      										<script src="assets/js/jquery.min.js"></script>
      										<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
      										<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
      										<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
      										<script src="assets/js/jquery.scrollTo.min.js"></script>
      										<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


      										<!--common script for all pages-->
      										<script src="assets/js/common-scripts.js"></script>

      										<!--script for this page-->
      										
      										<script>
											
											
											
											
											function getTrans(value){
												var x = value;
												//alert(x);
												$.ajax({
      											type: "POST",
      											url: "TransM.php",
      											data: 'sid=' + x,
      											success: function(data){
      											//alert(data);
      											$("#Transfer").html(data);
      										}
      									});
												
											}
											
      											function DecHead(val){
      											//alert(val);
      											$.ajax({
      											type: "POST",
      											url: "DeceasedHeadValidate.php",
      											data: 'sid=' + val,
      											success: function(data){
      											//alert(data);
      											$("#Decease").html(data);
      										}
      									});
      								}
      											//custom select box
												
      											function Del(val){
      											//alert(val);
      											$.ajax({
      											type: "POST",
      											url: "Deletemember.php",
      											data: 'sid=' + val,
      											success: function(data){
      											//alert(data);
      											$("#Remove").html(data);
      										}
      									});
      								}
								
									function Dec(a){
      											//alert(a);
      											$.ajax({
      											type: "POST",
      											url: "Deceasedmember.php",
      											data: 'sid=' + a,
      											success: function(data){
      											//alert(data);
      											$("#Decease").html(data);
      										}
      									});
      								}
									
      								$(function(){
      								$('select.styled').customSelect();
      							});

      						</script>

      					</body>
      					</html>
