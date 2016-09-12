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
		$_POST['DRdocReqby'] = $name;
		  //Date Today
		  $today = date("Y-m-d"); 
		  
		  $docCode  = 0;
		  //for retrieving docID and name
		  $certiDocNameSQL = "SELECT intDocCode, strDocName FROM `tbldocument` WHERE `strDocName` LIKE 'Street'";
		  $certiDocName = mysqli_query($con, $certiDocNameSQL);
		  while($row = mysqli_fetch_row($certiDocName))
			{
				$docCode= $row[0];
			}
			
		  //for Retrieving Street (drop-down) in DB
		  $streetNameSQL = "SELECT `intStreetId`, `strStreetName` FROM `tblstreet`;";
		  $streetName = mysqli_query($con, $streetNameSQL);
		  		  
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
						<form method="POST" id="Form1">
						<div class = "form-group">							
							
							<font face="cambria" size=5 color="grey"><center><b>Requirements</b></center></font><br>
							<label><input type="checkbox" value="" id= "requirements" onclick="sample2(this.checked, 'SPdateOfUse', 'DRpurpose', 'btnSubmit')">
							<font face="cambria" size=4.5 color="red"><?php echo " Select All"?></label><?php

								$query = mysqli_query($con, "Select strRequirementName,intReqID from tbldocRequirements as a, tblrequirements as b,tblDocument where strReqId = intReqId and strDocName = 'Street Permit' and strDocId = intDocCode;");
								while($row = mysqli_fetch_object($query)){
									?>
								
								<div class="checkbox">
								<label><input type="checkbox" value="" name = "requirement" onclick="sample(this.checked, 'SPstreet', 'SPdateOfUse', 'DRpurpose', 'btnSubmit')">
								<font face="cambria" size=4.5 color="black"><?php echo "$row->strRequirementName"?></label>
								</div>
								<?php
								 }
							?>								
							
						</div>
						</form>
					</div>
					<br>
					<div class="showback">
						<form method="POST" id="Form1">
						<div class = "form-group">							
							
							<font face="cambria" size=5 color="grey"><center><b>Details</b></center></font><br>				
						
							<div class="col-sm-3">
								<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>						
								<input id='DRdatereq' class='form-control input-group-lg reg_name' type='date' name="DRdtereq" title='system-generated' 
								value = "<?php echo"$today"; ?>" disabled>		
							</div>
							
							<div class="col-sm-6">
								<p><font face="cambria" size=5 color="grey">Requested By:</font></p>						
								<input id='DRdocReqby' class='form-control input-group-lg reg_name' type='text' name="DRdocReqby" title='system-generated' 
								value = "<?php if(isset($_POST['DRdocReqby'])){echo $_POST['DRdocReqby'];}else{} ?>" disabled>		
							</div>
							<div class="col-sm-9">
								<p><font face="cambria" size=5 color="grey"> Address </font></p>
								<input id='SPstreet' class='form-control input-group-lg reg_name' type='text' name="SPstreet" title='system-generated' 
								value = '<?php echo $add; ?>' disabled>
							</div>
							
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Date of Use </font></p>			
								<input id="SPdateOfUse" class="form-control input-group-lg reg_name" type="date" name="SPdateOfUse" title="system-generated" min = '<?php  echo date("Y-m-d");  ?>' disabled required>
							</div>
							
							<div class="col-sm-5">
								<!-- Name Validation-->
								<p><font face="cambria" size=5 color="grey"> Purpose </font></p>			
								<input id="DRpurpose" class="form-control input-group-lg reg_name" type="text" name="DRpurpose" title="system-generated" placeholder="Purpose" disabled required>
								<br>
							</div><br><br><br><br><br><br><br><br><br><br><br>
							<center><input type="submit" class="btn btn-success" onclick = "return confirm('Do you want to save?')" name = "btnSubmit" id="btnSubmit" value = "Submit" disabled></center>
							
						</div>
						<script language="javascript">
						
						
						function sample(bEnable, SPdateOfUse, DRpurpose, btnSubmit){
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
									document.getElementById(DRpurpose).disabled = !bEnable;
									document.getElementById(SPdateOfUse).disabled = !bEnable;
									document.getElementById(btnSubmit).disabled = !bEnable;
							  
								}else{
									document.getElementById(DRpurpose).disabled = true;
									document.getElementById(SPdateOfUse).disabled = true;
									document.getElementById(btnSubmit).disabled = true;
								}
							}
						function sample2(bEnable, SPdateOfUse, DRpurpose, btnSubmit){
								var o = document.getElementById("Form1").getElementsByTagName("input");
								var max = o.length;
								if(bEnable){
									var allischecked = (function(){
								  for(var i=0,l=o.length;i<l;i++){
								    if((o[i].type == "checkbox" && o[i].name == "requirement" && !o[i].checked)) {
								    	o[i].checked = true;
								  	}
								  }
								  	document.getElementById(DRpurpose).disabled = !bEnable;
									document.getElementById(SPdateOfUse).disabled = !bEnable;
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
								document.getElementById(DRpurpose).disabled = true;
									document.getElementById(SPdateOfUse).disabled = true;
									document.getElementById(btnSubmit).disabled = true;
								}
							}
						</script>
						</form>
					</div>
				</div>
			</div>
			
		
		<?php
			
			if(isset($_POST['btnSubmit']))
			{
				//SPstreet, SPdateOfUse, SPtimeStart, SPtimeEnd, DRpurpose
				$docPurpose = $SPstreet = "";
				if(isset($_POST['DRpurpose']) && isset($_POST['SPstreet']) && isset($_POST['SPdateOfUse'])){
					$docPurpose = $_POST['DRpurpose'];
					$SPstreet = $_POST['SPstreet'];
					$SPdateOfUse = $_POST['SPdateOfUse'];
				}else{
					//echo "<script>alert('Pls Complete Form');</script>";
				}
								
				$error = 0;
				//Assuming all fields are validated!
				if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $docPurpose)){
						echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ is not allowed');</script>";
				}else{
					
					require('connection.php');
					$saveCertiSQL = "INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDRdocCode`, `strDRapplicantID`, `strDRapprovedBy`, `datDRdateRequested`, `strDocReqStat`, `strPurpose`, `strRequestOf`) VALUES (NULL, '$docCode', '$appId', '1', NOW(), 'For approval', '$docPurpose', '');";
					
					//Execute
					$saveRequest = mysqli_query($con, $saveCertiSQL);
					
					$saveStreet = mysqli_query($con, $saveStreetSQL);
					
					if($saveRequest == true){
						echo"<script> alert('Request Saved.')</script>";
						$_SESSION['clientID'] = $resid;
						$_SESSION['name'] = $name;
						$_SESSION['place'] = $add;
						$_SESSION['contactno'] = $contactno;
						$_SESSION['place'] = $add;
						$_SESSION['document']  = $doc;//Type of document
						$_SESSION['docPurpose']  = $docPurpose;
						$_SESSION['DRdocReq']  = $DRdocReq;
						$_SESSION['purposePrice']  = $purposePrice;
						echo"<script> alert('Request Saved.')</script>";
						
						echo "<script> window.location = 'DRformSummary.php';</script>";
					}//if($saveRequest == true)
					
				}//else
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


  