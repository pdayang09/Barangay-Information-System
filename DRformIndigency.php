 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
	  
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
		  		  
		  //for retrieving docID and name
		  $certiDocNameSQL = "SELECT strDocCode, strDocName FROM `tbldocument` WHERE `strDocName` LIKE '%Indigency%'";
		  $certiDocName = mysqli_query($con, $certiDocNameSQL);
		  $docCode = $purposePrice = "";
		  while($row = mysqli_fetch_row($certiDocName))
			{
				$docCode= $row[0];
			}
			
		  //for Retrieving PurposeName (drop-down) in DB
		  $certiPurposeSQL = "SELECT strDocPurposeID, strPurposeName FROM tbldocumentpurpose";
		  $certiPurpose = mysqli_query($con, $certiPurposeSQL);
		  		  
		  //Determines if the document has an amount to be paid
		  $docPayment = 1;
		  
		?>
		
      <!--main content start-->
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
							<label><input type="checkbox" value="" id= "requirements" onclick="sample2(this.checked, 'DRpurpose', 'DRdocReq', 'btnSubmit')">
							<font face="cambria" size=4.5 color="red"><?php echo " Select All"?></label>
							<form method="POST">
							<div class = "form-group" id = "Form1">
							<?php

								$query = mysqli_query($con, "Select strRequirementName,intReqID from tbldocRequirements as a, tblrequirements as b,tblDocument where strReqId = intReqId and strDocName = 'Indigency' and strDocId = intDocCode;");
								while($row = mysqli_fetch_object($query)){
									?>
								
								<div class="checkbox">
								<label><input type="checkbox" value="" name = "requirement" onclick="sample(this.checked, 'DRpurpose', 'DRdocReq', 'btnSubmit')">
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
						<form method="POST" id="Form1">
						<div class = "form-group">							
							
							<font face="cambria" size=5 color="grey"><center><b>Details</b></center></font><br>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>						
								<input id='DRdatereq' class='form-control input-group-lg reg_name' type='date' name="DRdtereq" title='system-generated' 
								value = "<?php echo"$today"; ?>" disabled>						
							</div>
							<div class="col-sm-4">
									<p><font face="cambria" size=5 color="grey"> Requested By </font></p>			
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReqby" title="system-generated" id='DRdocReqby'  placeholder = "Family" value="<?php if(isset($_POST['DRdocReqby'])){echo $_POST['DRdocReqby'];}else{} ?>" disabled>
							</div>
							<div class="col-sm-4">
									<p><font face="cambria" size=5 color="grey"> Requested For </font></p>			
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReq" title="system-generated" id='DRdocReq'  placeholder = "Family" value="<?php if(isset($_POST['DRdocReq'])){echo $_POST['DRdocReq'];}else{} ?>" disabled>
									
							</div>
							<div class="col-sm-6">
									<p><font face="cambria" size=5 color="grey"> Address</font></p>			
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReq" title="system-generated" id=''  placeholder = "Family" value="<?php echo "$add";?>" disabled>
									
							</div>
							<div class='col-sm-6'>
								<p><font face='cambria' size=5 color='grey'>Purpose </font></p>
							</font>					
								<input id='DRpurpose' class='form-control input-group-lg reg_name' type='text' name="DRpurpose" title='system-generated' 
								value = "" placeholder = "Purpose" disabled required>
							 </p>
							</div>	
							<br><br><br><br><br><br><br><br>
							
							
							
						
						
						<script language="javascript">
						
						
						function sample(bEnable,DRpurpose,DRdocReq, btnSubmit){
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
									document.getElementById(DRdocReq).disabled = !bEnable;
									document.getElementById(btnSubmit).disabled = !bEnable;
							  
								}else{
									document.getElementById(DRpurpose).disabled = true;
									document.getElementById(DRdocReq).disabled = true;
									document.getElementById(btnSubmit).disabled = true;
								}
							}
							function sample2(bEnable,DRpurpose,DRdocReq, btnSubmit){
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
									document.getElementById(DRdocReq).disabled = !bEnable;
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
									document.getElementById(DRdocReq).disabled = true;
									document.getElementById(btnSubmit).disabled = true;	
								}
							}
						</script>
						</div>
						<center><input type="submit" class="btn btn-success" name = "btnSubmit" onclick = "return confirm('Do you want to save?')" id="btnSubmit" value = "Submit" disabled></center>
						
						</form>
					</div>
				
			</div>
			
	
		<?php
			
			if(isset($_POST['btnSubmit']))
			{
				
				$DRdocReq = $_POST['DRdocReq'];
				if(isset($_POST['DRpurpose'])){
					$docPurpose = $_POST['DRpurpose'];
				}else{
					echo "<script>alert('Pls Complete Form');</script>";
				}
								
				$error = 0;
				//Assuming all fields are validated!
				if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $docPurpose)){
						echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ is not allowed');</script>";
				}else{
					
					$docStat = "For approval";
					$saveCertiSQL = "INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDRdocCode`, `strDRapplicantID`, `strDRapprovedBy`, `datDRdateRequested`, `strDocReqStat`, `strPurpose`, `strRequestOf`) VALUES (NULL, '$docCode', '$appId', '1', NOW(), '$docStat', '$docPurpose', '$DRdocReq');";				
					
					require('connection.php');
					$save = mysqli_query($con, $saveCertiSQL);
					if($save == true)
					{
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
					}
					else
						echo "<script>alert('".mysqli_error($con)."');</script>";
					
				}
					
					
				//echo Another module
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


  