 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
		
		<?php 
		  require('connection.php');
		  
		  //Retrieval of Personal Data (Session Mode)
		  $appId  = $_SESSION['clientID'];
		  $add = $_SESSION['place'];
		  $resid = $_SESSION['clientID'];
		  $contactno = $_SESSION['contactno'];
		  $name = $_SESSION['name'];		  
		  $doc = $_SESSION['document'];//Type of document	

		  $_POST['ownerName'] = $name;
		  
		  //Date Today
		  $today = date("Y-m-d"); 
		  		  
		  //for retrieving docID and name
		  $certiDocNameSQL = "SELECT intDocCode, strDocName, dblDocFee FROM `tbldocument` WHERE `strDocName` LIKE 'Utility%'";
		  $certiDocName = mysqli_query($con, $certiDocNameSQL);
		 
		  while($row = mysqli_fetch_row($certiDocName))
			{
				$docCode= $row[0];
				$docPrice = $row[2];
			} 
		  //Determines if the document has an amount to be paid
		  $docPayment = 1;
		  
		?>
		
	<section id="main-content">
		<section class="wrapper site-min-height">
			<div class="row">
                <div class="col-lg-12">
								
					<?php echo "<legend><font face = 'cambria' size = 10 color = 'grey'> $doc </font></legend><br>";?>		
					<br>
					<div class="showback">
						<form method="POST">
						<div class = "form-group">							
							
							<font face="cambria" size=5 color="grey"><center><b>Requirements</b></center></font><br>
							<label><input type="checkbox" value="" id= "requirements" onclick="sample2(this.checked, 'operatorName', 'plateNo', 'vehicleMode', 'motorNo', 'chassisNo',  'vehicleNo', 'btnSubmit')">
							<font face="cambria" size=4.5 color="red"><?php echo " Select All"?></label>
							<form method="POST">
							<div class = "form-group" id = "Form1">
							<?php

								$query = mysqli_query($con, "Select strRequirementName,intReqID from tbldocRequirements as a, tblrequirements as b,tblDocument where strReqId = intReqId and strDocName = 'TRU Clearance' and strDocId = intDocCode;");
								while($row = mysqli_fetch_object($query)){
									?>
									<div class="checkbox">
								<label><input type="checkbox" value="" name = "requirement" onclick="sample(this.checked, 'operatorName', 'plateNo', 'vehicleMode', 'motorNo', 'chassisNo',  'vehicleNo', 'btnSubmit')">
								<font face="cambria" size=4.5 color="black"><?php echo "$row->strRequirementName"?></label>
								</div>
								<?php
								 }
							?>
							
						</div>
						</form>
						</div>
					</div>
					<br>
					<div class="showback">
						<form method="POST">
						<div class = "form-group" id='Form1'>							
							
							<font face="cambria" size=5 color="grey"><center><b>Details</b></center></font><br>				
						
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>						
								<input id='DRdatereq' class='form-control input-group-lg reg_name' type='date' name="DRdtereq" title='system-generated' 
								value = "<?php echo"$today"; ?>" disabled>		
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Owner Name </font></p>
								<input id="ownerName" class="form-control input-group-lg reg_name" type="text" name="ownerName" title="system-generated" value = "<?php if(isset($_POST['ownerName'])){echo $_POST['ownerName'];}else{} ?>" disabled>
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Operator Name </font></p>			
								<input id="operatorName" class="form-control input-group-lg reg_name" type="text" name="operatorName" title="system-generated" disabled>
							</div>
							<!-- 12-->
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Plate No. </font></p>			
								<input id="plateNo" class="form-control input-group-lg reg_name" type="text" name="plateNo" title="system-generated" disabled required>
							</div>
							
							
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Vehicle Model </font></p>			
								<input id="vehicleMode" class="form-control input-group-lg reg_name" type="text" name="vehicleMode" title="system-generated" disabled required>
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Motor No. </font></p>			
								<input id="motorNo" class="form-control input-group-lg reg_name" type="text" name="motorNo" title="system-generated" disabled required>
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Chassis No. </font></p>			
								<input id="chassisNo" class="form-control input-group-lg reg_name" type="text" name="chassisNo" title="system-generated" disabled required>
							</div>
							<!-- 12-->
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Sidecar No. </font></p>			
								<input id="vehicleNo" class="form-control input-group-lg reg_name" type="text" name="vehicleNo" title="system-generated" disabled required>
							</div>
							
							<br><br><br><br><br><br><br><br><br><br><br>
							<center><input id="btnSubmit" type="submit" class="btn btn-success" onclick = "return confirm('Do you want to save?')" name = "btnSubmit" value = "Submit" disabled></center>

						
						<script language="javascript">
						function sample(bEnable,operatorName, plateNo, vehicleMode, motorNo, chassisNo, vehicleNo, btnSubmit)
						{
								var isSelected = 0;
								var o = document.getElementById("Form1").getElementsByTagName("input");
								var max = o.length;
								var allischecked = (function(){
								  for(var i=0,l=o.length;i<l;i++){
								    if((o[i].type == "checkbox" && o[i].name == "requirement" && o[i].checked)) {
								    	isSelected++;
								  	}
								  }
								})();
								if(isSelected >= o.length){
									document.getElementById(operatorName).disabled = !bEnable;
									document.getElementById(plateNo).disabled = !bEnable;
									document.getElementById(vehicleMode).disabled = !bEnable;
									document.getElementById(motorNo).disabled = !bEnable;
									document.getElementById(chassisNo).disabled = !bEnable;
									document.getElementById(vehicleNo).disabled = !bEnable;
									document.getElementById(btnSubmit).disabled = !bEnable;
									
									
									  
								}else{
									document.getElementById(operatorName).disabled = true;
									document.getElementById(plateNo).disabled = true;
									document.getElementById(vehicleMode).disabled = true;
									document.getElementById(motorNo).disabled = true;
									document.getElementById(chassisNo).disabled = true;
									document.getElementById(vehicleNo).disabled = true;
									document.getElementById(btnSubmit).disabled = true;
								}
						}
						function sample2(bEnable, operatorName, plateNo, vehicleMode, motorNo, chassisNo, vehicleNo, btnSubmit){
								var o = document.getElementById("Form1").getElementsByTagName("input");
								var max = o.length;
								if(bEnable){
									var allischecked = (function(){
								  for(var i=0,l=o.length;i<l;i++){
								    if((o[i].type == "checkbox" && o[i].name == "requirement" && !o[i].checked)) {
								    	o[i].checked = true;
								  	}
								  }
								  	document.getElementById(operatorName).disabled = !bEnable;
									document.getElementById(plateNo).disabled = !bEnable;
									document.getElementById(vehicleMode).disabled = !bEnable;
									document.getElementById(motorNo).disabled = !bEnable;
									document.getElementById(chassisNo).disabled = !bEnable;
									document.getElementById(vehicleNo).disabled = !bEnable;
									document.getElementById(btnSubmit).disabled = !bEnable;
								})();

								}else{
									var allischecked = (function(){
								  for(var i=0,l=o.length;i<l;i++){
								    if((o[i].type == "checkbox" && o[i].name == "requirement" && o[i].checked)) {
								    	o[i].checked = false;
								  	}
								  }
								})();
									document.getElementById(operatorName).disabled = true;
									document.getElementById(plateNo).disabled = true;
									document.getElementById(vehicleMode).disabled = true;
									document.getElementById(motorNo).disabled = true;
									document.getElementById(chassisNo).disabled = true;
									document.getElementById(vehicleNo).disabled = true;
									document.getElementById(btnSubmit).disabled = true;
								}
							}
						</script>
						</form>
					</div>
				</div>
			
			
		
		<?php
			
			if(isset($_POST['btnSubmit']))
			{
				if(isset($_POST['operatorName']) || isset($_POST['plateNo']) || 
				   isset($_POST['vehicleMode'])|| isset($_POST['motorNo']) || 
				   isset($_POST['chassisNo']) || isset($_POST['vehicleNo']))
				{
					$ownerName = $_POST['ownerName'];
					$operatorName = $_POST['operatorName'];
					$plateNo = $_POST['plateNo'];
					$vehicleMode = $_POST['vehicleMode'];
					$motorNo = $_POST['motorNo'];
					$chassisNo = $_POST['chassisNo'];
					$vehicleNo = $_POST['vehicleNo'];
					
				}else{
					echo "<script>alert('Pls Complete Form');</script>";
				}
								
				if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $operatorName) ||    
					preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬]/', $plateNo) || 
					preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $vehicleMode) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $motorNo) || 
					preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $vehicleNo) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $chassisNo))
				{
						echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ not allowed');</script>";
				}else{
					require('connection.php');
					//SQL Statements 
					$vehicleSQL = "INSERT INTO `tblvehicle` (`strVplateNo`, `strOperatorName`, `strOwnerName`, `strVehicleModel`, `strMotorNo`, `strChassisNo`, `strVehicleNo`, `intVehicleType`, `strVehicleStat`) VALUES ('$plateNo', '$operatorName', '$name', '$vehicleMode', '$motorNo', '$chassisNo', '$vehicleNo', '0', 'Active');";
					
					$vehicleStatSQL = "INSERT INTO `tblvehicleclearance` (`strVCplateNo`, `strVCvehicleStat`, `datVCStat`, 	`strClearanceStat`, `strResidentID`) VALUES ('$plateNo', 'New', NOW(), 'Unpaid', '$resid');";
					
					//Execute Query
					$vehicleSave = mysqli_query($con, $vehicleSQL);
					
					
					if($vehicleSave == true){
						$vehicleStatSave = mysqli_query($con, $vehicleStatSQL);
						if($vehicleStatSave == true){
							
							$pay = mysqli_query($con, "INSERT INTO `tblpaymentdetail` (`intNum`, `strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES (NULL, '$plateNo', '$docPrice', '01');");
							if($pay == true)
							{
								echo"<script> alert('Request Saved.')</script>";
							
								$_SESSION['clientID'] = $resid;
								$_SESSION['name'] = $name;
								$_SESSION['contactno'] = $contactno;
								$_SESSION['place'] = $add;
								$_SESSION['document']  = $doc;//Type of document
								echo "<script> window.location = 'DocumentRequestL.php';</script>";
							}
						}
					}
					else
						echo "<script>alert('".mysqli_error($con)."');</script>";
				}
					
					
			}//IF(ISSET)
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
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - TEAM BARANGAY
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


  