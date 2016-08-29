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

		  //Date Today
		  $today = date("Y-m-d"); 
		  		  
		  //for retrieving docID and name
		  $certiDocNameSQL = "SELECT strDocCode, strDocName FROM `tbldocument` WHERE `strDocName` LIKE '%Certification%'";
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
						<form method="POST" id="Form1">
						<div class = "form-group">							
							
							<font face="cambria" size=5 color="grey"><center><b>Requirements</b></center></font><br>
							<?php

								$query = mysqli_query($con, "Select strRequirementName,intReqID from tbldocRequirements as a, tblrequirements as b,tblDocument where strReqId = intReqId and strDocName = 'Indigency' and strDocId = intDocCode;");
								while($row = mysqli_fetch_object($query)){
									?>
								
								<div class="checkbox">
								<label><input type="checkbox" value="" name = "requirement" onclick="sample(this.checked, 'DRpurpose', 'DRdocReq', 'btnSubmit')">
								<font face="cambria" size=5 color="black"><?php echo "$row->strRequirementName"?></label>
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
							<div class="col-sm-5">
									<p><font face="cambria" size=5 color="grey"> Requested For </font></p>			
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReq" title="system-generated" id='DRdocReq' disabled value="Family"><br><br>
							</div>
							<div class='col-sm-4'>
								<p><font face='cambria' size=5 color='grey'> Document Purpose </font></p>								
								<select class='form-control' id='DRpurpose' name="DRpurpose" disabled>
									<option selected='selected' value='0' disabled>Choose Document Purpose</option>							
								<?php							
									while($row = mysqli_fetch_array($certiPurpose))
									{
								?>		<option value='<?php echo "$row[1]";?>'><?php echo"$row[1]"; ?> </option>
								<?php	}?>
								</select>
								<p><input type="checkbox" value="$add" onclick="enableDisable(this.checked, 'DRotherPurpose', 'DRpurpose')"><font face="cambria" size=4.5 color="grey"> Other: 
							</font>					
								<input id='DRotherPurpose' class='form-control input-group-lg reg_name' type='text' name="DRpurpose" title='system-generated' 
								value = "" disabled>
							 </p>
							</div>	
							<br>
							
							
							<center><input type="submit" class="btn btn-success" name = "btnSubmit" id="btnSubmit" value = "Submit" disabled></center>
						
						
						<script language="javascript">
						function enableDisable(bEnable, DRotherPurpose, DRpurpose)
							{
								document.getElementById(DRotherPurpose).disabled = !bEnable;
								document.getElementById(DRpurpose).disabled = bEnable;
								
							}
						
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
						</script>
						</div>
						
						
						</form>
					</div>
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
					
					$saveCertiSQL = "INSERT INTO `tbldocumentrequest` (`strDRdocCode`, `strDRapplicantID`, `strDRapprovedBy`,`datDRdateRequested`, `strPurpose`, `strRequestOf`) VALUES ('$docCode', '$appId', NOW(), '$docPurpose', '$DRdocReq');";					
					
					require('connection.php');
					$save = mysqli_query($con, $saveCertiSQL);
					if($save == true){
						echo"<script> alert('Request Saved.')</script>";
					}
					else
						echo "<script>alert('".mysqli_error($con)."');</script>";
					
					//tblpaymentdetail`
					$lastID = mysqli_query($con, "SELECT strDocRequestID FROM `tbldocumentrequest` WHERE 1 ORDER BY `strDocRequestID` DESC LIMIT 1");
					while($row = mysqli_fetch_row($lastID))
					{
						$docIDPayment = $row[0];
					}
					
					mysqli_query($con, "INSERT INTO `tblpaymentdetail`(`strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES ('$docIDPayment','$purposePrice','0');");
					
					
					
					$_SESSION['clientID'] = $resid;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $add;
					$_SESSION['document']  = $doc;//Type of document
					
				if($purposePrice >= 0)
				{
					//echo Assess request module
				}else
				{
					echo "<script>alert('succ');</script>";
					echo "<script> window.location = 'DocumentRequestL.php';</script>";
				}
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


  