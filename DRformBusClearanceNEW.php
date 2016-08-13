 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
		
		<?php //Initialize variables
	
			//Gets Today's Date
			$today = date("Y-m-d"); // displays date today
			$doc = $_SESSION['document'];//Type of document
			require('connection.php');
			//Retrieval of Personal Data (Session Mode)
		  $add = $_SESSION['place'];
		  $clientId = $_SESSION['clientID'];
		  $place = $_SESSION['place'];
		  $name = $_SESSION['name'];
		  
		  //for Retrieving Business Category in DB
		  $BusCateSQL = "SELECT strBusCatergory, strBusCateName, dblAmount FROM tblbusinesscate";
		  $BusCateResult = mysqli_query($con, $BusCateSQL);
		?>
	<section id="main-content">
		<section class="wrapper site-min-height">
			<div class="row">
                <div class="col-lg-12">
								
					<?php echo "<legend><font face = 'cambria' size = 10 color = 'grey'> $doc </font></legend><br>";?>		
					<br>
					<form method = "POST" id = "Form1">
			<div class="showback">
				<font face="cambria" size=5 color="grey"><center><b>REQUIREMENTS</b></center></font>
				
				
						<form method="POST">
						<div class = "form-group">
							
							<?php

								$query = mysqli_query($con, "Select strRequirementName,intReqID from tbldocRequirements as a, tblrequirements as b,tblDocument where strReqId = intReqId and strDocName = 'Business Clearance New' and strDocId = intDocCode;");
								while($row = mysqli_fetch_object($query)){
									?>
									<div class="checkbox">
								<label><input type="checkbox" value="" name = "requirement" onclick="sample(this.checked,'busName', 'contactPerson', 'contactNo','busCategoryID','busDesc', 'btnSubmitU','chkAdd','SignageCheck')">
								<font face="cambria" size=5 color="black"><?php echo "$row->strRequirementName"?></label>
								</div>
								<?php
								 }
							?>
							
						</form>
					</div>
				
			</div><!--<div class="showback"> -->
			
					<br>
					<div class="showback">
						<form method="POST" >
						<div class = "form-group">							
							
							<font face="cambria" size=5 color="grey"><center><b>Details</b></center></font><br>				
						
							<div class="col-sm-3">
								<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>						
									<input id='DRdatereq' class='form-control input-group-lg reg_name' type='date' name="DRdtereq" title='system-generated' 
										value = "<?php echo"$today"; ?>" disabled>							
							</div>
							
							<div class="col-sm-9">
								<!--No invalid characters, just required -->
								<p><font face="cambria" size=5 color="grey"> Business Name </font></p>
								<input id="busName" class="form-control input-group-lg reg_name" type="text" name="busName" title="system-generated" 
									placeholder="Business Name" disabled>
							</div>
							<div class="col-sm-6">
								<!-- Name Validation-->
								<p><font face="cambria" size=5 color="grey"> Contact Person </font></p>			
								<input id="contactPerson" class="form-control input-group-lg reg_name" type="text" name="contactPerson" 
									title="system-generated" placeholder="Contact Person" disabled>
							</div>
							
							<div class="col-sm-3">
								<!--Contact Num: valid char onlny: ()+-   -->
								<p><font face="cambria" size=5 color="grey"> Contact Number </font></p>			
								<input id="contactNo" class="form-control input-group-lg reg_name" type="text" name="contactNo" title="system-generated" 
									placeholder="Contact Number" disabled>
							</div>
							<?php
								echo "<div class='col-sm-3'>
								<p><font face='cambria' size=5 color='grey'> Business Category </font></p>
								<select class='form-control' id='busCategoryID' name='busCategory' value='' disabled>
								<option selected='selected' value='' disabled>Choose Business Type";	
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
								
									<p><b><input type="checkbox" id = "chkAdd" disabled value="$add"  onclick="enableDisable(this.checked, 'busLoc')" name="addressCheckbox"><font face="cambria" 
										size=4.5 color="grey" > Business Address is different from House Address
									</b></font>
									 </p>
									 
								  </label>
							  <?php echo "<input id='busLoc' class='form-control input-group-lg reg_name' type='text' name='busLocation' title='system-generated' 
								value='$add' disabled>";
								?>
								
							</div>
							
							
							<div class="col-sm-12">
								 <label><br>
									<p><b><input type="checkbox"  id="SignageCheck" value="" disabled onclick = "withSignage(this.checked, 'signSingle','signDouble','signageSize')"><font face="cambria" size=4.5 
									color="grey" name="SignageCheck" > With Signage</b></font></p> 
								  </label>	
							</div>
							<div id="hidden"> 	
								<div class="col-sm-1"></div>
								
								<div class="form-inline" role="form">
									<p><font face="cambria" size=4 color="grey">Signage Type: &nbsp;&nbsp;&nbsp;&nbsp;</font>
										<font size=3>
											<label class="radio-inline">
											<input type="radio" name="Signage" id="signSingle" value="Single" disabled>Single</label>&nbsp;&nbsp;&nbsp;&nbsp;
											<label class="radio-inline">
											<input type="radio" name="Signage" id="signDouble" value="Double" disabled >Double</label><br>
										</font>
									<div class="col-sm-1"></div>
									<p><font face="cambria" size=4 color="grey">Signage Size: &nbsp;&nbsp;&nbsp;&nbsp;</font>
									<input id="signageSize" class="form-control input-group-lg reg_name" type="text" name="signageSized" 
									title="system-generated" placeholder="Signage Size" id="signageSize"disabled><br>
								</div>
							</div>
							<div class="col-sm-12"> <!-- text area -->
								<p><font face="cambria" size=5 color="grey"> Description </font></p>			
								<textarea class="form-control" rows="4" id="busDesc" name="busDesc" disabled></textarea><br>
							</div><br>
							<center><input type="submit" disabled id = "btnSubmitU" class="btn btn-success" name = "btnSubmit" value = "Submit"></center>

							
							
							<!-- Javascript for checkbox in Location-->
							<script language="javascript">
								function enableDisable(bEnable, busLoc)
								{
									document.getElementById(busLoc).disabled = !bEnable;
									
								}
								
							function withSignage(bEnable, signSingle,signDouble,signageSize)
							{

								document.getElementById(signSingle).disabled = !bEnable;
								document.getElementById(signDouble).disabled = !bEnable;
								document.getElementById(signageSize).disabled = !bEnable;
								
							}
							function sample(bEnable,busName,contactPerson,contactNo,busCategoryID,busDesc,btnSubmitU,chkAdd,SignageCheck){
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
									document.getElementById(busName).disabled = !bEnable;
									document.getElementById(contactPerson).disabled = !bEnable;
									document.getElementById(contactNo).disabled = !bEnable;
									document.getElementById(busCategoryID).disabled = !bEnable;
									document.getElementById(btnSubmitU).disabled = !bEnable;
									document.getElementById(chkAdd).disabled = !bEnable;
									document.getElementById(busDesc).disabled = !bEnable;
									document.getElementById(SignageCheck).disabled = !bEnable;
									
									
									  
								}else{
									document.getElementById(busName).disabled = true;
									document.getElementById(contactPerson).disabled = true;
									document.getElementById(contactNo).disabled = true;
									document.getElementById(busCategoryID).disabled = true;
									document.getElementById(busDesc).disabled = true;
									document.getElementById(btnSubmitU).disabled = true;
									document.getElementById(busDesc).disabled = true;
									document.getElementById(addressed).disabled = true;
									document.getElementById(SignageCheck).disabled = true;
								}
							}
						</script>
						</div>
						</form>
					</div>
				</div>
			</div>
			
		
		
		<?php
		
			if(isset($_POST['btnSubmit']))
			{
				//$busDesc = $Signage = $signageSize = "";
				
				//Para walang error sa declaration ng mga variables :(
				$busDesc = $_POST['busDesc'];
				$Signage= isset($_POST['Signage']) ? $_POST['Signage'] : '';
				$signageSize = isset($_POST['signageSized']) ? $_POST['signageSized'] : '';
				$contactPerson = isset($_POST['contactPerson']) ? $_POST['contactPerson'] : '';
				$contactNo = isset($_POST['contactNo']) ? $_POST['contactNo'] : '';
				$busName  = isset($_POST['busName']) ? $_POST['busName'] : '';
				$contactPerson  = isset($_POST['contactPerson']) ? $_POST['contactPerson'] : '';
				$contactNo  = isset($_POST['contactNo']) ? $_POST['contactNo'] : '';
				$busCategory  = isset($_POST['busCategory']) ? $_POST['busCategory'] : '';
				$busLoc  = isset($_POST['busLocation']) ? $_POST['busLocation'] : '';
					
				//$Signage = $_POST['Signage'];
				//$signageSize = $_POST['signageSized'];
				if(isset($_POST['busName']) && isset($_POST['contactPerson']) && isset( $_POST['contactNo']) && isset($_POST['busCategory']) && isset($_POST['busLocation'])){
					$busName = $_POST['busName'];
					$contactPerson = $_POST['contactPerson'];
					$contactNo = $_POST['contactNo'];
					$busCategory = $_POST['busCategory'];
					$busLoc = $_POST['busLocation'];
					
				
				}else{
					echo "<script>alert('$busName');</script>";
				}
				
				
				$busPrice = "";
				while($row = mysqli_fetch_row($BusCateResult))
				{
					if($busCategory == $row[1])
					{
						$busPrice = $row[3];
					}
				}
				
				
				if ( preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $signageSize) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $contactPerson) || preg_match('/[\^£$%&*}{@#~?><>,|=_¬]/', $contactNo))
					{
						$error = 1;
					}

				if($error = 1)
				{
					echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ are not allowed');</script>";
				}
				//First of all dpat may value na yung docRequestID
				else{
					require("connection.php");
					//Update tblbusiness first
					$saveBusinessSQL = "INSERT INTO `tblbusiness` ( `strBusinessName`, `strBusinessCateID`, `strBusinessDesc`, `strBusinessLocation`, `strBusinessContactPerson`, `strContactNum`, `strSignageType`, `strSignageSize`) VALUES ('$busName', '$busCategory', '$busDesc', '$busLoc', '$contactPerson', '$contactNo', '$Signage', '$signageSize');";
					
					//Save business details
					$saveBusiness = mysqli_query($con, $saveBusinessSQL);
					if($saveBusiness == true)
					{
						echo"<script> alert('Request Saved.')</script>";
					}else
						echo "<script>alert('".mysqli_error($con)."');</script>";
					//Update tblbusinessstat
					//$saveBusStat = "New";
					$lastID = mysqli_query($con, "SELECT `strBusinessID` FROM `tblbusiness` WHERE 1 ORDER BY `strBusinessID` DESC LIMIT 1");
					while($row = mysqli_fetch_row($lastID))
					{
						$docIDPayment = $row[0];
					}
					
					$saveBusStatSQL = "INSERT INTO `tblbusinessstat` (`strBusinessID`, `strBSbusinessStat`, `strClientID`, `datBCStat`) VALUES ('$docIDPayment', 'New', '$clientId', 'NOW()');";
					$saveBusStat = mysqli_query($con, $saveBusinessSQL);
					
					//Payment Details
					mysqli_query($con, "INSERT INTO `tblpaymentdetail`(`strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES ('$docIDPayment','$busPrice','0');");
					
					$save = mysqli_query($con, $saveCertiSQL);
					if($save == true && $saveBusiness == true && $saveBusStat == true){
						echo"<script> alert('Request Saved.')</script>";
					}
					//
					$_SESSION['clientID'] = $clientID;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $add;
					$_SESSION['document']  = $doc;//Type of document
					echo "<script> window.location = 'DocumentRequestL.php';</script>";
				
				}//else
				
				
				
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


  