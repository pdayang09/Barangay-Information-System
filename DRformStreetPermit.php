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

	<form method="post">
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Street Permit </font></legend><br>
		<!-- p><font face = "cambria" size =5 color = "red">* required fields</font -->
		
		<!-- Street Permit form section -->
		<!--div class="panel-group" -->
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>DOCUMENT REQUEST DETAILS</b></center></font></div>
					<div class="panel-body">
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
							<!-- div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Document Applicant ID </font></p>			
								<input id="DRapplicantID" class="form-control input-group-lg reg_name" type="text" name="DRapplicantID" title="system-generated">
							</div>
							<div class="col-sm-3">
								<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>			
								<input id="DRdatereq" class="form-control input-group-lg reg_name" type="text" name="DRdtereq" title="system-generated">
							</div>
							<div class="col-sm-5">
								<p><font face="cambria" size=5 color="grey"> Approved By </font></p>			
								<input id="DRapprovedBy" class="form-control input-group-lg reg_name" type="text" name="DRapprovedBy" title="system-generated">
							</div -->
						</div>
					</div>
				</div>	
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>STREET PERMIT DETAILS</b></center></font></div>
					<div class="panel-body">
						<div class="col-sm-12">
							<p><font face="cambria" size=5 color="grey"> Street </font></p>			
							<input id="SPstreet" class="form-control input-group-lg reg_name" type="text" name="SPstreet" title="system-generated">
						</div><br>
						<div class="col-sm-6">
							<p><font face="cambria" size=5 color="grey"> Date of Use </font></p>			
							<input id="SPdateOfUse" class="form-control input-group-lg reg_name" type="date" name="SPdateOfUse" title="system-generated">
						</div>
						<div class="col-sm-3">
						<!--dpat number dropdown -->
						
							<p><font face="cambria" size=5 color="grey"> Start Time of Use </font></p>			
							<input id="SPtimeStart" class="form-control input-group-lg reg_name" type="number" name="SPtimeStart" title="system-generated" min="1" max="12">
						</div>
						<div class="col-sm-3">
						<!--dpat number dropdown -->
							<p><font face="cambria" size=5 color="grey"> End Time of Use </font></p>
							<input id="SPtimeEnd" class="form-control input-group-lg reg_name" type="number" name="SPtimeEnd" title="system-generated" min="1" max="10">
							<br><br>
						</div>
							<input type="submit" class="btn btn-success btn-lg btn-block" name = "btnSubmitSP" id = "btnSubmitSP" value = "Submit">
						</form>
						</div>
					</div>
				</div>
			<div>
			<br>
		
		<?php
			
			if(isset($_POST['btnSubmit']))
			{
				$docReqID = $_POST['DRdocreqID'];						
				$busID = $_POST['busID'];
				$busName = $_POST['busName'];
				$contactPerson = $_POST['contactPerson'];
				$contactNo = $_POST['contactNo'];
				$busCategory = $_POST['busCategory'];
				$busLoc = $_POST['busLoc'];
				$busDesc = $_POST['busDesc'];
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


  