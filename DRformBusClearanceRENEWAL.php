 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
		<?php //Initialize variables
	
			//Gets Today's Date
			$today = date("Y-m-d"); // displays date today
			
			// form variables declaration
				$DRdocreqID = $DRpurpose = $DRdocCode = $DRapplicantID = $DRapprovedBy = $DRdatereq = "";
				$plateNo = $reqType = $operatorName = $ownerName = $vehicleMode = $motorNo = $chassisNo = $vehicleNo = $vehicleStat = "";
				$toda = "";
		
			// form validation variables
				//$ctcdocreqIDErr = $ctcnumErr = $taxamtErr = "";
			

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
								
		<!-- div class="card card-inverse" style="background-color: #333; border-color: #333;">
			<div class="card-block">
				<h3 class="card-title">Special title treatment</h3>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				<a href="#" class="btn btn-primary">Button</a>
			</div>
		</div -->
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Barangay Business Clearance (RENEWAL)</font></legend><br>
		<!-- p><font face = "cambria" size =5 color = "red">* required fields</font -->
		
		<!-- Street Permit form section -->
		<!--div class="panel-group" -->
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>DOCUMENT REQUEST DETAILS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class = "form-group">
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Document Request ID </font></p>			
								<input id="DRdocreqID" class="form-control input-group-lg reg_name" type="text" name="DRdocreqID" title="system-generated">
							</div>
							<div class='col-sm-4'>
							<p><font face='cambria' size=5 color='grey'> Document Purpose </font></p>
						
								<select class='form-control' id='DRpurpose' name="DRpurpose">
									<option selected='selected' value='0'>Choose Document Purpose</option>							
							<?php							
									while($row = mysqli_fetch_array($certiPurpose))
									{
							?>		<option value='<?php echo "$row[0]";?>'><?php echo"$row[1]"; ?> </option>
							<?php	}?>
								</select>						
							</div>
							<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>						
							<input id='DRdatereq' class='form-control input-group-lg reg_name' type='date' name="DRdtereq" title='system-generated' value = "<?php echo"$today"; ?>" disabled>							
						</div>
							
							</form>
						</div>
					</div>
				</div>
			<br>
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>REQUIREMENTS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class = "form-group">
							<div class="checkbox">
								<label><input type="checkbox" value="">
								<font face="cambria" size=5 color="black">Old Photocopy of Business Permit (BPLO)</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">
								<font face="cambria" size=5 color="black">Photocopy of Business Permit (MDAD)</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Old Photocopy of Barangay Clearance</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Market Master's Certification</label>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br>
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>BUSINESS DETAILS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						
						<div class="col-sm-3">
							<p><font face="cambria" size=5 color="grey"> Business ID </font></p>			
							<input id="busID" class="form-control input-group-lg reg_name" type="text" name="busID" title="system-generated" disabled>
						</div>
						<div class="col-sm-9">
							<p><font face="cambria" size=5 color="grey"> Business Name </font></p>
							<input id="busName" class="form-control input-group-lg reg_name" type="text" name="busName" title="system-generated" disabled>
						</div>
						<div class="col-sm-6">
							<p><font face="cambria" size=5 color="grey"> Contact Person </font></p>			
							<input id="contactPerson" class="form-control input-group-lg reg_name" type="text" name="contactPerson" title="system-generated">
						</div>
						<div class="col-sm-3">
							<p><font face="cambria" size=5 color="grey"> Contact Number </font></p>			
							<input id="contactNo" class="form-control input-group-lg reg_name" type="text" name="contactNo" title="system-generated">
						</div>
						<div class="col-sm-3">
							<p><font face="cambria" size=5 color="grey"> Business Category </font></p>			
							<input id="busCategory" class="form-control input-group-lg reg_name" type="text" name="busCategory" title="system-generated" value='' disabled>
						</div>
						<div class="col-sm-12">
							<p><font face="cambria" size=5 color="grey"> Location </font></p>			
							<input id="busLoc" class="form-control input-group-lg reg_name" type="text" name="busLoc" title="system-generated" value="">
						</div>
						<div class="col-sm-12"> <!-- text area -->
							<p><font face="cambria" size=5 color="grey"> Description </font></p>			
							<textarea class="form-control" rows="4" id="busDesc"></textarea><br>
						</div>
						
							<input type="button" class="btn btn-success btn-lg btn-block" name = "btnSubmitU" id = "btnSubmitU" value = "Submit">
						</form>
			
						
						</div>
					</div>
				</div>
			<div>
			<br>
			<?php
		
				if(isset($_POST['btnSubmitID']))
				{
					//Assuming all fields are validated!
					$docReqID = $_POST['DRdocreqID'];
					$docPurpose = $_POST['DRpurpose'];
					$dateReq = $_POST['DRdtereq'];
					
					//Business Details
					$busID = $_POST['busID'];
					$busName = $_POST['busName'];
					$contactPerson = $_POST['contactPerson'];
					$contactNo = $_POST['contactNo'];
					$busCategory = $_POST['busCategory'];
					$busLoc = $_POST['busLoc'];
					$busDesc = $_POST['busDesc'];
					
					if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $docReqID) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $busID) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $contactPerson))
					{
						$error = 1;
					}
					if($busLoc  == NULL || $contactPerson == NULL || $contactNo  == NULL )
					{
						echo "<script>alert('Please Complete the form');</script>";
					}
					else if($error = 1)
					{
						echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ is not allowed');</script>";
					}else{
						//First of all dpat may value na yung docRequestID
						//Next yung tblDocRequest
						$docReqID = $_POST['DRdocreqID'];
						$docPurpose = $_POST['DRpurpose'];
						$dateReq = $_POST['DRdtereq'];
						$officer = "";//nag approved
					
						$saveDocRequestSQL = "INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDocPurposeID`, `strDRdocCode`, `strDRapplicantID`, `datDRdateRequested`) VALUES ('$docReqID', '$docPurpose', '$docCode', '$resId', '$dateReq');";
						$saveDocRequest = mysqli_query($con, $saveDocRequestSQL);
						if($saveDocRequest == true)
							echo"<script> alert('succe')</script>";
						else
							echo "<script>alert('".mysqli_error($con)."');</script>";
					
						//Update some business details
						$updateBusConSQL = "UPDATE `tblbusiness` SET `strBusinessContactPerson` = '$contactPerson', `strContactNum` = '$contactNo' WHERE `tblbusiness`.`strBusinessID` = '$busID';";
						$updateBusCon = mysqli_query($con, $updateBusConSQL);
						if($updateBusCon == true){
							echo"<script> alert('Request Saved.)</script>";}
						else{
							echo "<script>alert('".mysqli_error($con)."');</script>";}
						
						//Last update tblbusinessstat
						//$saveBusStat = "Renewal";
						$saveBusStatSQL = "INSERT INTO `tblbusinessstat` (`strBSbusinessID`, `strBSdocRequestID`, `strBSbusinessStat`) VALUES ('$busID', '$docReqID', Renewal');";
						$saveBusStat = mysqli_query($con, $saveBusStatSQL);
						if($saveBusStat == true)
							echo"<script> alert('succe')</script>";
						else
							echo "<script>alert('".mysqli_error($con)."');</script>";
					}
					//
				$_SESSION['clientID'] = $resid;
				$_SESSION['name'] = $name;
				$_SESSION['contactno'] = $contactno;
				$_SESSION['place'] = $add;
				$_SESSION['document']  = $doc;//Type of document
				//Echo another
					
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


  