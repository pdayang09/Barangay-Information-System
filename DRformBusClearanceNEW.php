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
			$doc = $_SESSION['document'];//Type of document
			require('connection.php');
			//Retrieval of Personal Data (Session Mode)
		  $add = $_SESSION['place'];
		  $resId = $_SESSION['resId'];
		  $appId = $_SESSION['appId'];
		  $place = $_SESSION['place'];
		  $name = $_SESSION['name'];
		  
		  //for Retrieving Business Category in DB
		  $BusCateSQL = "SELECT strBusCatergory, strBusCateName FROM tblbusinesscate";
		  $BusCateResult = mysqli_query($con, $BusCateSQL);
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
								
		
		
		<?php echo "<legend ><font face = 'cambria' size = 10 color = 'grey'> $doc</font></legend><br>";?>
		<!-- p><font face = "cambria" size =5 color = "red">* required fields</font -->
		
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
			<!--<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>REQUIREMENTS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class = "form-group">
							<div class="checkbox">
								<label><input type="checkbox" value="">
								<font face="cambria" size=5 color="black">DTI/SEC Registration</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">
								<font face="cambria" size=5 color="black">Lease of Contract</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Land Title</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Market Master's Certification</label>
							</div>
						</form>
					</div>
				</div>
			</div> -->
			<br>
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>BUSINESS DETAILS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						
						<div class="col-sm-3">
							<p><font face="cambria" size=5 color="grey"> Business ID </font></p>			
							<input id="busID" class="form-control input-group-lg reg_name" type="text" name="busID" title="system-generated">
						</div>
						<div class="col-sm-9">
							<!--No invalid characters, just required -->
							<p><font face="cambria" size=5 color="grey"> Business Name </font></p>
							<input id="busName" class="form-control input-group-lg reg_name" type="text" name="busName" title="system-generated">
						</div>
						<div class="col-sm-6">
							<!-- Name Validation-->
							<p><font face="cambria" size=5 color="grey"> Contact Person </font></p>			
							<input id="contactPerson" class="form-control input-group-lg reg_name" type="text" name="contactPerson" title="system-generated">
						</div>
						
						<div class="col-sm-3">
							<!--Contact Num: valid char onlny: ()+-   -->
							<p><font face="cambria" size=5 color="grey"> Contact Number </font></p>			
							<input id="contactNo" class="form-control input-group-lg reg_name" type="text" name="contactNo" title="system-generated">
						</div>
						<?php
							echo "<div class='col-sm-3'>
							<p><font face='cambria' size=5 color='grey'> Business Category </font></p>
							<select class='form-control' id='busCategoryID' name='busCategory' value=''>
							<option selected='selected' value=''>Choose Business Type";
							while($row = mysqli_fetch_row($BusCateResult))
							{
								echo "<option value='$row[0]'>$row[1]";
							}
								echo "
							</select>
							</div>";
						?>
						<div class="col-sm-12">
							<p><font face="cambria" size=5 color="grey"> Location </font></p>
							<!-- May validation sa Address? -->
							 <label>
						    
						    <p><b><input type="checkbox" value="" onclick="enableDisable(this.checked, 'busLoc')"><font face="cambria" size=4.5 color="grey"> Business Address is different from House Address
							</b></font>
							 </p>
							 
						  </label>
						  <?php echo "<input id='busLoc' class='form-control input-group-lg reg_name' type='text' name='busLoc' title='system-generated' value='$place' disabled>";
							?>
							
						</div>
						
						<!-- Javascript for checkbox in Location-->
						<script language="javascript">
							function enableDisable(bEnable, busLoc)
							{
								document.getElementById(busLoc).disabled = !bEnable
								
							}
						</script>
						
						<div class="col-sm-12"> <!-- text area -->
							<p><font face="cambria" size=5 color="grey"> Description </font></p>			
							<textarea class="form-control" rows="4" id="busDesc"></textarea><br>
						</div>
						
							<input type="button" class="btn btn-success btn-lg btn-block" name = "btnSubmitID" id = "btnSubmitU" value = "Submit">
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
				
				
				$busID = $_POST['busID'];
				$busName = $_POST['busName'];
				$contactPerson = $_POST['contactPerson'];
				$contactNo = $_POST['contactNo'];
				$busCategory = $_POST['busCategory'];
				$busLoc = $_POST['busLoc'];
				$busDesc = $_POST['busDesc'];
				if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $docReqID) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $busID) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $contactPerson) || preg_match('/[\^£$%&*}{@#~?><>,|=_¬]/', $contactNo))
					{
						$error = 1;
					}
				if($docPurpose == NULL || $busCategory  == NULL || $busLoc  == NULL || $contactPerson == NULL || $contactNo  == NULL )
				{
					echo "<script>alert('Please Complete the form');</script>";
				}
				else if($error = 1)
				{
					echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ is not allowed');</script>";
				}
				//First of all dpat may value na yung docRequestID
				else{
					require("connection.php");
					//Update tblbusiness first
					$saveBusinessSQL = "INSERT INTO `tblbusiness` (`strBusinessID`, `strBusinessName`, `strBusinessCateID`, `strBusinessDesc`, `strBusinessLocation`, `strBusinessContactPerson`, `strContactNum`) VALUES ('$busID', '$busName', '$busCategory', '$busDesc', '$busLoc', '$contactPerson', '$contactNo');";
					$saveBusiness = mysqli_query($con, $saveBusinessSQL);
					if($saveBusiness == true)
						echo"<script> alert('succe')</script>";
					else
						echo "<script>alert('".mysqli_error($con)."');</script>";
				  
					//Next yung tblDocRequest
					$saveDocRequestSQL = "INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDocPurposeID`, `strDRdocCode`, `strDRapplicantID`, `datDRdateRequested`) VALUES ('$docReqID', '$docPurpose', '$docCode', '$resId', '$dateReq');";
					$saveDocRequest = mysqli_query($con, $saveBusinessSQL);
					if($saveBusiness == true)
						echo"<script> alert('succe')</script>";
					else
						echo "<script>alert('".mysqli_error($con)."');</script>";
					
					//Last update tblbusinessstat
					$saveBusStat = "New";
					$saveBusStatSQL = "INSERT INTO `tblbusinessstat` (`strBSbusinessID`, `strBSdocRequestID`, `strBSbusinessStat`) VALUES ('$busID', '$docCode', '$saveBusStat');";
					$saveDocRequest = mysqli_query($con, $saveBusinessSQL);
					if($saveBusiness == true)
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
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              TEAM BARANGAY 2016
              <a href="#" class="go-top">
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


  