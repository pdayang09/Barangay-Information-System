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
		  $plateNo = $_SESSION['plateNo'];
		  $_POST['ownerName'] = $name;
		  
		  //Date Today
		  $today = date("Y-m-d"); 
		  //$docPrice = 0;
		  //for retrieving docID and name
		  $certiDocNameSQL = "SELECT intDocCode, strDocName, dblDocFee FROM `tbldocument` WHERE `strDocName` LIKE 'TRU%'";
		  $certiDocName = mysqli_query($con, $certiDocNameSQL);
		  //TODA
		  $todaType = "SELECT `intTODAID`, `strTODAName` FROM `tbltoda`";
		  $todaResult = mysqli_query($con, $todaType);
		  while($row = mysqli_fetch_row($certiDocName))
			{
				$docCode= $row[0];
				$docPrice = $row[2];
			}
			$operatorName = $_SESSION['operatorName'];
						$vehicleMode = $_SESSION['vehicleMode'];
						$motorNo = $_SESSION['motorNo'];
						$chassisNo = $_SESSION['chassisNo'];
						$vehicleNo = $_SESSION['vehicleNo']; 
						$toda = $_SESSION['toda'];
						$vehicleColor = $_SESSION['vehicleColor'];
						
				$_POST['operatorName'] = $operatorName;
				$_POST['toda'] = $toda;
				$_POST['plateNo'] = $plateNo;
				$_POST['vehicleMode'] = $vehicleMode;
				$_POST['motorNo'] = $motorNo;
					$_POST['chassisNo'] = $chassisNo;
					$_POST['vehicleNo'] = $vehicleNo; 
					$_POST['vehicleColor'] = $vehicleColor;
					
				$todaIDSQL = "SELECT `intTODAID` FROM `tbltoda` WHERE `strTODAName`= '$toda';";
				$todaIDOut = mysqli_query($con, $todaIDSQL);
				while($row = mysqli_fetch_row($todaIDOut))
				{
					$todaID= $row[0];
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
							<label><input type="checkbox" value="" id= "requirements" onclick="sample2(this.checked, 'operatorName', 'toda', 'vehicleMode', 'motorNo', 'chassisNo',  'vehicleNo', 'vehicleColor', 'btnSubmit')">
							<font face="cambria" size=4.5 color="red"><?php echo " Select All"?></label>
							<form method="POST">
							<div class = "form-group" id = "Form1">
							<?php

								$query = mysqli_query($con, "Select strRequirementName,intReqID from tbldocRequirements as a, tblrequirements as b,tblDocument where strReqId = intReqId and strDocName = 'TRU Clearance' and strDocId = intDocCode;");
								while($row = mysqli_fetch_object($query)){
									?>
									<div class="checkbox">
								<label><input type="checkbox" value="" name = "requirement" onclick="sample(this.checked, 'operatorName', 'toda', 'vehicleMode', 'motorNo', 'chassisNo', 'vehicleNo', 'vehicleColor', 'btnSubmit')">
								<font face="cambria" size=4.5 color="black"><?php echo "$row->strRequirementName"?></label>
								
								</div>
								<?php
								 }
							?>
						</div>
						</form></div>
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
								<input id="operatorName" class="form-control input-group-lg reg_name" type="text" name="operatorName" title="system-generated" value = "<?php if(isset($_POST['operatorName'])){echo $_POST['operatorName'];}else{} ?>" disabled>
							</div>
							<div class="col-sm-5">
								<p><font face="cambria" size=5 color="grey"> Plate No. </font></p>			
								<input id="plateNo" class="form-control input-group-lg reg_name" type="text" name="plateNo" title="system-generated" value = "<?php if(isset($_POST['plateNo'])){echo $_POST['plateNo'];}else{} ?>"disabled>
							</div>
							<?php
							$toda = $_POST['toda'];
								echo "<div class='col-sm-6'>
								
								<p><font face='cambria' size=5 color='grey'> TODA </font></p>
								<select class='form-control' id='toda' name='toda' value='' disabled>
								<option selected='selected' value='$todaID'>$toda";	
								while($row = mysqli_fetch_row($todaResult))
								{
									if($row[1] == $toda)
									{
										
									}
									else
										echo "<option value='$row[0]'>$row[1]";
								}
									echo "
								</select>
								</div>";
							?>
							
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Vehicle Model </font></p>			
								<input id="vehicleMode" class="form-control input-group-lg reg_name" type="text" name="vehicleMode" title="system-generated" value = "<?php if(isset($_POST['vehicleMode'])){echo $_POST['vehicleMode'];}else{} ?>" disabled>
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Motor No. </font></p>			
								<input id="motorNo" class="form-control input-group-lg reg_name" type="text" name="motorNo" title="system-generated" value = "<?php if(isset($_POST['motorNo'])){echo $_POST['motorNo'];}else{} ?>" disabled>
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Chassis No. </font></p>			
								<input id="chassisNo" class="form-control input-group-lg reg_name" type="text" name="chassisNo" title="system-generated" value = "<?php if(isset($_POST['chassisNo'])){echo $_POST['chassisNo'];}else{} ?>" disabled>
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Sidecar No. </font></p>			
								<input id="vehicleNo" class="form-control input-group-lg reg_name" type="text" name="vehicleNo" title="system-generated" value = "<?php if(isset($_POST['vehicleNo'])){echo $_POST['vehicleNo'];}else{} ?>" disabled required>
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Sidecar Color </font></p>			
								<input id="vehicleColor" class="form-control input-group-lg reg_name" type="text" name="vehicleColor" title="system-generated" value = "<?php if(isset($_POST['vehicleColor'])){echo $_POST['vehicleColor'];}else{} ?>" disabled required>
							</div>
							<br><br><br><br><br><br><br><br><br><br><br><br><br>
							<center><input id="btnSubmit" type="submit" class="btn btn-success" name = "btnSubmit" value = "Submit" disabled></center>

						
						<script language="javascript">
						function sample(bEnable,operatorName, toda, vehicleMode, motorNo, chassisNo, vehicleNo, vehicleColor, btnSubmit)
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
									document.getElementById(toda).disabled = !bEnable;
									document.getElementById(vehicleMode).disabled = !bEnable;
									document.getElementById(motorNo).disabled = !bEnable;
									document.getElementById(chassisNo).disabled = !bEnable;
									document.getElementById(vehicleNo).disabled = !bEnable;
									document.getElementById(vehicleColor).disabled = !bEnable;
									document.getElementById(btnSubmit).disabled = !bEnable;
									
									
									  
								}else{
									document.getElementById(operatorName).disabled = true;
									document.getElementById(toda).disabled = true;
									document.getElementById(vehicleMode).disabled = true;
									document.getElementById(motorNo).disabled = true;
									document.getElementById(chassisNo).disabled = true;
									document.getElementById(vehicleNo).disabled = true;
									document.getElementById(vehicleColor).disabled = true;
									document.getElementById(btnSubmit).disabled = true;
								}
						}
						function sample2(bEnable, operatorName, toda, vehicleMode, motorNo, chassisNo, vehicleNo, vehicleColor, btnSubmit){
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
									document.getElementById(motorNo).disabled = !bEnable;
									document.getElementById(chassisNo).disabled = !bEnable;
									document.getElementById(vehicleNo).disabled = !bEnable;
									document.getElementById(vehicleColor).disabled = !bEnable;
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
									document.getElementById(motorNo).disabled = true;
									document.getElementById(chassisNo).disabled = true;
									document.getElementById(vehicleNo).disabled = true;
									document.getElementById(vehicleColor).disabled = true;
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
				
				if(isset($_POST['operatorName']) || isset($_POST['operatorName']) || 
				   isset($_POST['toda']) || isset($_POST['plateNo']) || 
				   isset($_POST['vehicleMode'])|| isset($_POST['motorNo']) || 
				   isset($_POST['chassisNo']) || isset($_POST['vehicleNo'])|| isset($_POST['vehicleColor']))
				{
					$ownerName = $_POST['ownerName'];
					$operatorName = $_POST['operatorName'];
					$toda = $_POST['toda'];
					$plateNo = $_POST['plateNo'];
					$vehicleMode = $_POST['vehicleMode'];
					$motorNo = $_POST['motorNo'];
					$chassisNo = $_POST['chassisNo'];
					$vehicleNo = $_POST['vehicleNo']; 
					$vehicleColor = $_POST['vehicleColor'];
					$sideCarDesc = $vehicleNo.$vehicleColor;
					
				}else{
					echo "<script>alert('Pls Complete Form');</script>";
				}
								
				$error = 0;
				//Assuming all fields are validated!
				//Only tblDocRequest will update
				if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $operatorName) ||    
					preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬]/', $plateNo) || 
					preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $vehicleMode) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $motorNo) || 
					preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $vehicleNo) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $chassisNo) ||
					preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $vehicleColor))
				{
						echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ not allowed');</script>";
				}else{
					require('connection.php');
					//SQL Statements 
					
					$vehicleSQL = "UPDATE `tblvehicle` SET `strOperatorName` = '$operatorName', `strVehicleModel` = '$vehicleMode', `strMotorNo` = '$motorNo', `strChassisNo` = '$chassisNo', `strVehicleNo` = '$vehicleNo', `strVehicleColor` = '$vehicleColor' WHERE `tblvehicle`.`strVplateNo` = '$plateNo'";
					
					//$vehicleSQL = "INSERT INTO `tblvehicle` (`strVplateNo`, `strOperatorName`, `strOwnerName`, `strVehicleModel`, `strMotorNo`, `strChassisNo`, `strVehicleNo`, `strVehicleColor`, `intVehicleType`, `strVehicleStat`) VALUES ('$plateNo', '$operatorName', '$name', '$vehicleMode', '$motorNo', '$chassisNo', '$sideCarDesc', '1', 'Active');";
					
					$truSQL = "UPDATE `tbltru` SET `intTODA` = '$toda' WHERE `tbltru`.`strTRUplateNo` = '$plateNo';";
					$vehicleStatSQL = "INSERT INTO `tblvehicleclearance` (`strVCplateNo`, `strVCvehicleStat`, `datVCStat`, 	`strClearanceStat`, `strResidentID`) VALUES ('$plateNo', 'Renewal', NOW(), 'Unpaid', '$resid');";
					
					//echo "<script>alert('$vehicleSQL');</script>";
					//Execute Query
					$vehicleSave = mysqli_query($con, $vehicleSQL);
					
					if($vehicleSave == true ){
					
						$truSave = mysqli_query($con, $truSQL);
						if($truSave == true){
							echo"<script> alert('Details updated.')</script>";
							$vehicleStatSave = mysqli_query($con, $vehicleStatSQL);
							if($vehicleStatSave == true)
							{
								
								mysqli_query($con, "INSERT INTO `tblpaymentdetail` (`intNum`, `strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES (NULL, '$plateNo', '$docPrice', '01');");
								$_SESSION['clientID'] = $resid;
								$_SESSION['name'] = $name;
								$_SESSION['contactno'] = $contactno;
								$_SESSION['place'] = $add;
								$_SESSION['document']  = $doc;//Type of document
								
								echo"<script> alert('Details updated.')</script>";
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


  