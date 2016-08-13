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

		  //Date Today
		  $today = date("Y-m-d"); 
		  		  
		  //for retrieving docID and name
		  $certiDocNameSQL = "SELECT strDocCode, strDocName FROM `tbldocument` WHERE `strDocName` LIKE 'Certification'";
		  $certiDocName = mysqli_query($con, $certiDocNameSQL);
		  while($row = mysqli_fetch_row($certiDocName))
			{
				$docCode= $row[0];
			}
			
		  //for Retrieving PurposeName (drop-down) in DB
		  $certiPurposeSQL = "SELECT strDocPurposeID, strPurposeName FROM tbldocumentpurpose where strDocID = '$docCode'";
		  $certiPurpose = mysqli_query($con, $certiPurposeSQL);
		  		  
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
							
							<font face="cambria" size=5 color="grey"><center><b>Requirements</b></center></font><br><?php

								$query = mysqli_query($con, "Select strRequirementName,intReqID from tbldocRequirements as a, tblrequirements as b,tblDocument where strReqId = intReqId and strDocName = 'Street Permit' and strDocId = intDocCode;");
								while($row = mysqli_fetch_object($query)){
									?>
								
								<div class="checkbox">
								<label><input type="checkbox" value="" name = "requirement" onclick="sample(this.checked, 'SPstreet', 'SPdateOfUse', 'SPtimeStart', 'SPtimeEnd', 'DRpurpose', 'btnSubmit')">
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
							
							<div class="col-sm-9">
								<p><font face="cambria" size=5 color="grey"> Street </font></p>
								<select class='form-control' id='SPstreet' name="SPstreet" disabled>
									<option selected='selected' value='' disabled>Street</option>							
								<?php							
									while($row = mysqli_fetch_array($certiPurpose))
									{
								?>		<option value='<?php echo "$row[0]";?>'><?php echo"$row[1]"; ?> </option>
								<?php	}?>
								</select>
							</div>
							
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Date of Use </font></p>			
								<input id="SPdateOfUse" class="form-control input-group-lg reg_name" type="date" name="SPdateOfUse" title="system-generated" disabled>
							</div>
							<div class="col-sm-4">
							<!--dpat number dropdown -->
							
								<p><font face="cambria" size=5 color="grey"> Start Time of Use </font></p>			
								<input id="SPtimeStart" class="form-control input-group-lg reg_name" type="number" name="SPtimeStart" title="system-generated" min="1" max="12" disabled>
							</div>
							<div class="col-sm-4">
							<!--dpat number dropdown -->
								<p><font face="cambria" size=5 color="grey"> End Time of Use </font></p>
								<input id="SPtimeEnd" class="form-control input-group-lg reg_name" type="number" name="SPtimeEnd" title="system-generated" min="1" max="12" disabled>
								
							</div>
							<div class="col-sm-12">
								<!-- Name Validation-->
								<p><font face="cambria" size=5 color="grey"> Purpose </font></p>			
								<input id="DRpurpose" class="form-control input-group-lg reg_name" type="text" name="DRpurpose" title="system-generated" placeholder="Purpose" disabled>
								<br>
							</div><br>
							<center><input type="submit" class="btn btn-success" name = "btnSubmit" id="btnSubmit" value = "Submit" disabled></center>

						</div>
						<script language="javascript">
						
						
						function sample(bEnable,SPstreet, SPdateOfUse, SPtimeStart, SPtimeEnd, DRpurpose, btnSubmit){
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
									document.getElementById(SPstreet).disabled = !bEnable;
									document.getElementById(SPdateOfUse).disabled = !bEnable;
									document.getElementById(SPtimeStart).disabled = true;
									document.getElementById(SPtimeEnd).disabled = true;
									document.getElementById(btnSubmit).disabled = true;
							  
								}else{
									document.getElementById(DRpurpose).disabled = true;
									document.getElementById(SPstreet).disabled = true;
									document.getElementById(SPdateOfUse).disabled = true;
									document.getElementById(SPtimeEnd).disabled = true;
									document.getElementById(SPtimeStart).disabled = true;
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
				$officer = "";//nag approved
				
				if(isset($_POST['DRpurpose'])){
					$docPurpose = $_POST['DRpurpose'];
				}else{
					echo "<script>alert('Pls Complete Form');</script>";
				}
								
				$error = 0;
				//Assuming all fields are validated!
				//Only tblDocRequest will update
				if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $docReqID)){
						echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ is not allowed');</script>";
				}else{
					
					$saveCertiSQL = "INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDocPurposeID`, `strDRdocCode`, `strDRapplicantID`, `datDRdateRequested`) VALUES ('$docReqID', '$docPurpose', '$docCode', '$resid', NOW());";
					
					require('connection.php');
					$save = mysqli_query($con, $saveCertiSQL);
					if($save == true)
						echo"<script> alert('Request Saved.')</script>";
					else
						echo "<script>alert('".mysqli_error($con)."');</script>";
				}
					
					$_SESSION['clientID'] = $resid;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $add;
					$_SESSION['document']  = $doc;//Type of document
				
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


  