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
		  $_POST['busLocation'] = $add;
		  
		  //for Retrieving Business Category in DB
		  $BusCateSQL = "SELECT strBusCatergory, strBusCateName, dblAmount FROM tblbusinesscate WHERE strStatus LIKE '%Enable%'";
		  $BusCateResult = mysqli_query($con, $BusCateSQL);
		?>
	<section id="main-content">
		<section class="wrapper site-min-height">
			<div class="row">
                <div class="col-lg-12">
								
					<?php echo "<legend><font face = 'cambria' size = 10 color = 'grey'> $doc </font></legend><br>";?>		
					<br>
					<form method = "POST" >
			<div class="showback">
				<font face="cambria" size=5 color="grey"><center><b>REQUIREMENTS</b></center></font>
				<label><input type="checkbox" value="" id= "requirements" onclick="sample2(this.checked,'busName', 'contactPerson', 'contactNo','busCategoryID','busDesc', 'btnSubmitU','SignageCheck', 'busLocation')">
							<font face="cambria" size=4.5 color="red"><?php echo " Select All"?></label>
				
						<form method="POST">
						<div class = "form-group" id = "Form1">
							
							<?php

								$query = mysqli_query($con, "Select strRequirementName,intReqID from tbldocRequirements as a, tblrequirements as b,tblDocument where strReqId = intReqId and strDocName = 'Business Clearance New' and strDocId = intDocCode;");
								while($row = mysqli_fetch_object($query)){
									?>
									<div class="checkbox">
								<label><input type="checkbox" value="" name = "requirement" onclick="sample(this.checked,'busName', 'contactPerson', 'contactNo','busCategoryID','busDesc', 'btnSubmitU', 'SignageCheck', 'busLocation')">
								<font face="cambria" size=4.5 color="black"><?php echo "$row->strRequirementName"?></label>
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
							
							<div class="col-sm-5">
								<!--No invalid characters, just required -->
								<p><font face="cambria" size=5 color="grey"> Business Name </font></p>
								<input id="busName" class="form-control input-group-lg reg_name" type="text" name="busName" title="system-generated" 
									placeholder="Business Name" disabled required>
							</div>
							<?php
								echo "<div class='col-sm-4'>
								<p><font face='cambria' size=5 color='grey'> Business Category </font></p>
								<select class='form-control' id='busCategoryID' name='busCategory' value='' disabled required>
								<option selected='selected' value='' disabled >Choose Business Type";	
								while($row = mysqli_fetch_row($BusCateResult))
								{
									echo "<option value='$row[0]'>$row[1]";
								}
									echo "
								</select>
								</div>";
							?>
							<div class="col-sm-3">
								<!-- Name Validation-->
								<p><font face="cambria" size=5 color="grey"> Contact Person </font></p>			
								<input id="contactPerson" class="form-control input-group-lg reg_name" type="text" name="contactPerson" 
									title="system-generated" placeholder="Contact Person" disabled required>
							</div>
							
							<div class="col-sm-3">
								<!--Contact Num: valid char onlny: ()+-   -->
								<p><font face="cambria" size=5 color="grey"> Contact Number </font></p>			
								<input id="contactNo" class="form-control input-group-lg reg_name" type="text" name="contactNo" title="system-generated" 
									placeholder="Contact Number" disabled required>
							</div>
							
							<div class="col-sm-6">
								<p><font face="cambria" size=5 color="grey"> Location </font></p>
								<!-- May validation sa Address? -->
								
							  <input id='busLocation' class='form-control input-group-lg reg_name' type='text' name='busLocation' title='system-generated' 
								value="<?php if(isset($_POST['busLocation'])){echo $_POST['busLocation'];}else{} ?>" disabled required>
								
							</div>
							
							<br><br><br><br>
							<div class="col-sm-12">
								 <label><br>
									<p><b><input type="checkbox"  id="SignageCheck" value="" disabled onclick = "withSignage(this.checked, 'signSingle','signDouble')"><font face="cambria" size=4.5 
									color="grey" name="SignageCheck" > With Signage</b></font></p> 
								  </label>	
								  <table class="table">
								<thead>
								<tr>
								<th><font face="cambria" size=4 color="grey">Signage Type</font></th>				
								<th><font face="cambria" size=4 color="grey">Signage Size</font></th>
								</tr></thead>
			
								<tbody>
								<tr>
								<td>
								
								<label class="radio-inline">
								<input type="checkbox"  id="signSingle" value="1" name="signSingle" onclick = "SignageSingle(this.checked,'signageSingleSize')" disabled ><font face="cambria" size=4.5 
									color="grey">Single-faced</label></td>
								<td>
								<div class="col-sm-5">
								<input id="signageSingleSize" class="form-control input-group-lg reg_name" type="number" name="signageSingleSize" title="system-generated" placeholder="Square foot" min="1" disabled>
									
								</div></td>
								</tr>
								
								<tr>
								<td>
								<label class="radio-inline">
								<input type="checkbox"  id="signDouble" value="1" name="signDouble" onclick = "SignageDouble(this.checked,'signageDoubleSize')" disabled ><font face="cambria" size=4.5 
									color="grey">Double-faced</label>
								</td>
								<td>
								<div class="col-sm-5">
								<input id="signageDoubleSize" class="form-control input-group-lg reg_name" type="number" name="signageDoubleSize" 
									title="system-generated" placeholder="Square foot" id="signageSize" min="1" disabled>
								</div></td>
								</tr>
		
								</tbody>
								</table>
							</div>
							<script language="javascript">
							function withSignage(bEnable, signSingle,signDouble)
							{

								document.getElementById(signSingle).disabled = !bEnable;
								document.getElementById(signDouble).disabled = !bEnable;
								
							}
							function SignageSingle(bEnable, signageSingleSize)
							{

								document.getElementById(signageSingleSize).disabled = !bEnable;
								
							}
							function SignageDouble(bEnable, signageDoubleSize)
							{

								document.getElementById(signageDoubleSize).disabled = !bEnable;
								
							}
							</script>
							<div id="hidden"> 	
								<div class="col-sm-12"></div>
								
								
							</div><br><br><br><br>
							<div class="col-sm-12"> <!-- text area -->
								<p><font face="cambria" size=5 color="grey"> Description </font></p>			
								<textarea class="form-control" rows="4" id="busDesc" name="busDesc" disabled></textarea><br>
							</div><br><br><br><br>
							
							<center><input type="submit" disabled id = "btnSubmitU" class="btn btn-success" name = "btnSubmit" value = "Submit"></center>
							

							
							
							<!-- Javascript for checkbox in Location-->
							<script language="javascript">
								
								
							function withSignage(bEnable, signSingle,signDouble,signageSize)
							{

								document.getElementById(signSingle).disabled = !bEnable;
								document.getElementById(signDouble).disabled = !bEnable;
								
							}
							function sample(bEnable,busName,contactPerson,contactNo,busCategoryID, busDesc, btnSubmitU, SignageCheck, busLocation){ 
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
									document.getElementById(busDesc).disabled = !bEnable;
									document.getElementById(SignageCheck).disabled = !bEnable;
									document.getElementById(busLocation).disabled = !bEnable;
									
									
									  
								}else{
									document.getElementById(busName).disabled = true;
									document.getElementById(contactPerson).disabled = true;
									document.getElementById(contactNo).disabled = true;
									document.getElementById(busCategoryID).disabled = true;
									document.getElementById(busDesc).disabled = true;
									document.getElementById(btnSubmitU).disabled = true;
									document.getElementById(busDesc).disabled = true;
									document.getElementById(SignageCheck).disabled = true;
									document.getElementById(busLocation).disabled = true;
								}
							}
							function sample2(bEnable,busName,contactPerson,contactNo,busCategoryID,busDesc,btnSubmitU,SignageCheck, busLocation){
								var o = document.getElementById("Form1").getElementsByTagName("input");
								var max = o.length;
								if(bEnable){
									var allischecked = (function(){
								  for(var i=0,l=o.length;i<l;i++){
								    if((o[i].type == "checkbox" && o[i].name == "requirement" && !o[i].checked)) {
								    	o[i].checked = true;
								  	}
								  }
								  	document.getElementById(busName).disabled = !bEnable;
									document.getElementById(contactPerson).disabled = !bEnable;
									document.getElementById(contactNo).disabled = !bEnable;
									document.getElementById(busCategoryID).disabled = !bEnable;
									document.getElementById(btnSubmitU).disabled = !bEnable;
									document.getElementById(busDesc).disabled = !bEnable;
									document.getElementById(SignageCheck).disabled = !bEnable;
									document.getElementById(busLocation).disabled = !bEnable;
								})();

								}else{
									var allischecked = (function(){
								  for(var i=0,l=o.length;i<l;i++){
								    if((o[i].type == "checkbox" && o[i].name == "requirement" && o[i].checked)) {
								    	o[i].checked = false;
								  	}
								  }
								})();

									document.getElementById(busName).disabled = true;
									document.getElementById(contactPerson).disabled = true;
									document.getElementById(contactNo).disabled = true;
									document.getElementById(busCategoryID).disabled = true;
									document.getElementById(busDesc).disabled = true;
									document.getElementById(btnSubmitU).disabled = true;
									document.getElementById(busDesc).disabled = true;
									document.getElementById(SignageCheck).disabled = true;	
									document.getElementById(busLocation).disabled = true;
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
				//$Signage = $signageSize = "";
				//Para walang error sa declaration ng mga variables :(
				$busDesc = $_POST['busDesc'];
				$signageSingleSize = isset($_POST['Signage']) ? $_POST['Signage'] : '';
				$signageDoubleSize = isset($_POST['Signage']) ? $_POST['Signage'] : '';
				//$Signage= isset($_POST['Signage']) ? $_POST['Signage'] : '';
				//$signageSize = isset($_POST['signageSized']) ? $_POST['signageSized'] : '';
				$contactPerson = isset($_POST['contactPerson']) ? $_POST['contactPerson'] : '';
				$contactNo = isset($_POST['contactNo']) ? $_POST['contactNo'] : '';
				$busName  = isset($_POST['busName']) ? $_POST['busName'] : '';
				$contactPerson  = isset($_POST['contactPerson']) ? $_POST['contactPerson'] : '';
				$contactNo  = isset($_POST['contactNo']) ? $_POST['contactNo'] : '';
				$busCategory  = isset($_POST['busCategory']) ? $_POST['busCategory'] : '';
				$busLoc  = isset($_POST['busLocation']) ? $_POST['busLocation'] : '';
				
				if(isset($_POST['busName']) && isset($_POST['contactPerson']) && isset( $_POST['contactNo']) && isset($_POST['busCategory']) && isset($_POST['busLocation']))
				{
					$busName = $_POST['busName'];
					$contactPerson = $_POST['contactPerson'];
					$contactNo = $_POST['contactNo'];
					$busCategory = $_POST['busCategory'];
					
					$busLoc = $_POST['busLocation'];
					
					if ( preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬;:-]/', $signageSingleSize) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬;:-]/', $signageDoubleSize) || preg_match('/[\;:^£$%&*()}{@#~?><>,|=_+¬]/', $contactPerson) || preg_match('/[\^£$%&*}{@#~?>;:<>,|=_¬]/', $contactNo))
					{
						echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ are not allowed');</script>";
					}
					else
					{
						require("connection.php");
						$saveBusiness = "";
						//Getting the price of bus category + SIGNAGE IF MERON
						$BusCatePriceSQL = "SELECT strBusCatergory, strBusCateName, dblAmount FROM tblbusinesscate WHERE strBusCatergory = '$busCategory'";
							$BusCatePrice = mysqli_query($con, $BusCatePriceSQL);
							while($row = mysqli_fetch_row($BusCatePrice))
							{
									$busCatePrice = $row[2];
							}
							//if may signage
							if($signageSingleSize == NULL && $signageDoubleSize == NULL)
							{
								$busPrice = $busCatePrice;
								
							}/*
							else if($signageSingleSize != NULL && $signageDoubleSize == NULL)
							{
								$signageTypeSQL = "SELECT `strSignagePrice` FROM `tblbusinessSignage` WHERE `strSignageType` LIKE '%Single%';";
								$signageType = mysqli_query($con, $signageTypeSQL);
								while($row = mysqli_fetch_row($signageType))
								{
									$signagePrice = $row[0];
								}
								$signagePriceSum = $signageSingleSize * $signagePrice;
								$busPrice = $signagePriceSum + $busCatePrice;
								echo"<script> alert('$busPrice')</script>";
							}
							else if($signageSingleSize == NULL && $signageDoubleSize != NULL)
							{
								//if (nakacheck ung wth signage)
								$signageTypeSQL = "SELECT `strSignagePrice` FROM `tblbusinessSignage` WHERE `strSignageType` LIKE '%Double%';";
								$signageType = mysqli_query($con, $signageTypeSQL);
								while($row = mysqli_fetch_row($signageType))
								{
									$signagePrice = $row[0];
								}
								$signagePriceSum = $signageDoubleSize * $signagePrice;
								$busPrice = $signagePriceSum + $busCatePrice;
								echo"<script> alert('$busPrice')</script>";
							}
							else if($signageSingleSize != NULL && $signageDoubleSize != NULL)
							{
								$signageSingleQL = "SELECT `strSignagePrice` FROM `tblbusinessSignage` WHERE `strSignageType` LIKE '%Single%';";
								$singlePrice = mysqli_query($con, $signageSingleQL);
								while($row = mysqli_fetch_row($singlePrice))
								{
									$signageSinglePrice = $row[0];
								}
								$signageDoubleSQL = "SELECT `strSignagePrice` FROM `tblbusinessSignage` WHERE `strSignageType` LIKE '%Double%';";
								$doublePrice = mysqli_query($con, $signageDoubleSQL);
								while($row = mysqli_fetch_row($doublePrice))
								{
									$signageDoublePrice = $row[0];
								}
								$totalSingle = $signageSinglePrice * $signageSingleSize;
								
								$totalDouble = $signageDoubleSize * $signageDoublePrice;
								$totalSignage = $totalSingle + $totalDouble;
								$busPrice = $totalSignage + $busCatePrice;
								echo"<script> alert('$busPrice')</script>";
							}
							else{}
							*/
						
						
						
						
						//Update tblbusiness first
						/*$saveBusinessSQL = INSERT INTO `tblbusiness` (`strBusinessID`, `strBusinessName`, `strBusinessCateID`, `strBusinessDesc`, `strBusinessLocation`, `strBusinessContactPerson`, `strContactNum`, `intSignageSingle`, `intSingleSize`, `intSignageDouble`, `intDoubleSize`) VALUES (NULL, 'GG COFFEE SHOP', '1', '', 'Carolina Street, Dies', 'Ala', '798456', '";
						if (isset($_POST['signSingle']) && ($signageSingleSize != NULL )) {
						$saveBusinessSQL .= "'1','".$signageSingleSize.",";
						} else {
						$saveBusinessSQL .= "'0','',";
						}
						if (isset($_POST['signDouble']) && ($signageDoubleSize != NULL )) {
						$saveBusinessSQL .= "'1','".$signageDoubleSize.");";
						} else {
						$saveBusinessSQL .= "'0','');";
						}
						$saveBusinessSQL .= "'1', '20', '1', '20');*/
						
						$saveBusinessSQL = "INSERT INTO `tblbusiness` (`strBusinessID`,`strBusinessName`, `strBusinessCateID`, `strBusinessDesc`, `strBusinessLocation`, `strBusinessContactPerson`, `strContactNum`) VALUES (NULL, '$busName', '$busCategory', '$busDesc', '$busLoc', '$contactPerson', '$contactNo');";
					
						//Save business details
						$saveBusiness = mysqli_query($con, $saveBusinessSQL);
						if($saveBusiness == true)//if nagsave go here
						{
						//Get last busID
						$lastID = mysqli_query($con, "SELECT `strBusinessID` FROM `tblbusiness` WHERE 1 ORDER BY `strBusinessID` DESC LIMIT 1");
						while($row = mysqli_fetch_row($lastID))
						{
							$lastBusID = $row[0];
						}
						
						//Update tblbusinessstat
						$saveBusStatSQL = "INSERT INTO `tblbusinessstat` (`strBusStatID`, `strBusinessID`, `strBSbusinessStat`, `strBusOwnerID`, `datBCStat`, `strClearanceStat`) VALUES (NULL, '$lastBusID', 'New', '$clientId', NOW(), 'Unpaid' );";
						$saveBusStat = mysqli_query($con, $saveBusStatSQL);
						
						
						//echo"<script> alert('$busPrice')</script>"; 
						
						
						
						if($saveBusStat == true)
						{
							
							echo"<script> alert('$busCatePrice')</script>";
								//Payment Details
								//SELECT `strBusStatID` FROM `tblbusinessstat` WHERE 1 ORDER BY `strBusStatID` DESC LIMIT 1
								$lastReqID = mysqli_query($con, "SELECT `strBusStatID` FROM `tblbusinessstat` WHERE 1 ORDER BY `strBusStatID` DESC LIMIT 1");
								while($row = mysqli_fetch_row($lastReqID))
								{
									$requestID = $row[0];
								}
								$busPayment = mysqli_query($con, "INSERT INTO `tblpaymentdetail`(`strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES ('$requestID', '$busPrice', '0');");
					
							$_SESSION['clientID'] = $clientId;
							$_SESSION['name'] = $name;
							$_SESSION['contactno'] = $contactno;
							$_SESSION['place'] = $add;
							$_SESSION['document']  = $doc;//Type of document
							echo "<script> window.location = 'DocumentRequestL.php';</script>";
						}
					}else
					{
						echo "<script>alert('".mysqli_error($con)."');</script>";

					}
						
					}//else ng if ( preg_match('/[\^
				
					}//if ( preg_match('/[\^
					else{	
						echo "<script>alert('Complete form');</script>";
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


  