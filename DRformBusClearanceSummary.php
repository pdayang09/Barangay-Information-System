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
		  while($row = mysqli_fetch_row($BusCateResult))
								{
									$busCateName = $row[1];
								}
				//echo "<script>alert('$busCateName')</script>";
		  $_SESSION['clientID'] = $clientId;
		$_SESSION['name'] = $name;
		$busName = $_SESSION['busName'];
							$busCategory = $_SESSION['busCategory'];
							$busDesc = $_SESSION['document'];
							$busLoc = $_SESSION['busDesc'];
							$contactPerson = $_SESSION['contactPerson'];
							$contactNo = $_SESSION['contactNo'];
							$signageSingleSize = $_SESSION['signageSingleSize'];
							$signageDoubleSize = $_SESSION['signageDoubleSize'];
							$busPrice = $_SESSION['busPrice'];
		?>
	<section id="main-content">
		<section class="wrapper site-min-height">
			<div class="row">
                <div class="col-lg-12">
								
					<?php echo "<legend><font face = 'cambria' size = 10 color = 'grey'> $doc </font></legend><br>";?>		
					<br>
					<form method = "POST" >
			
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
									placeholder="Business Name" value="<?php echo "$name"?>" disabled required>
							</div>
							<?php
							$BusCateSQL = "SELECT strBusCatergory, strBusCateName, dblAmount FROM tblbusinesscate WHERE strStatus LIKE '%Enable%' AND strBusCatergory = '$busCategory'";
							
								?>
							<div class='col-sm-4'>
							<p><font face='cambria' size=5 color='grey'> Business Category </font></p>
								<input id='busName' class='form-control input-group-lg reg_name' type='text' name='busName' title='system-generated' placeholder='Business Name' value="<?php echo "$busCateName"?>" disabled required>
								
								
								</div>
								
								
								
							
							<div class="col-sm-3">
								<!-- Name Validation-->
								<p><font face="cambria" size=5 color="grey"> Contact Person </font></p>			
								<input id="contactPerson" class="form-control input-group-lg reg_name" type="text" name="contactPerson" 
									title="system-generated" placeholder="Contact Person" value="<?php echo "$contactPerson"?>" disabled required>
							</div>
							
							<div class="col-sm-3">
								<!--Contact Num: valid char onlny: ()+-   -->
								<p><font face="cambria" size=5 color="grey"> Contact Number </font></p>			
								<input id="contactNo" class="form-control input-group-lg reg_name" type="text" name="contactNo" title="system-generated" 
									placeholder="Contact Number" disabled value="<?php echo "$contactNo"?>" required>
							</div>
							
							<div class="col-sm-6">
								<p><font face="cambria" size=5 color="grey"> Location </font></p>
								<!-- May validation sa Address? -->
								
							  <input id='busLocation' class='form-control input-group-lg reg_name' type='text' name='busLocation' title='system-generated' 
								value="<?php echo "$busLoc"?>" disabled required>
								
							</div>
							
							<br><br><br><br>
							<div class="col-sm-4">
								 <p><font face="cambria" size=5 color="grey"> Single Signage Size</font></p>	
								<input id="signageSingleSize" class="form-control input-group-lg reg_name" type="number" name="signageSingleSize" title="system-generated" placeholder="Square foot" value="<?php echo "$signageSingleSize";?>" disabled>
								</div>
								<div class="col-sm-4">
								 <p><font face="cambria" size=5 color="grey"> Double Signage Size</font></p>	
								<input id="signageDoubleSize" class="form-control input-group-lg reg_name" type="number" name="signageDoubleSize" 
									title="system-generated" placeholder="Square foot" id="signageSize" value="<?php echo "$signageDoubleSize";?>" disabled>
								
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
								
								
							</div><br>
							<div class="col-sm-4">
								 <p><font face="cambria" size=5 color="grey">Price</font></p>	
								<input id="signageDoubleSize" class="form-control input-group-lg reg_name" type="number" name="signageDoubleSize" 
									title="system-generated" placeholder="Square foot" id="signageSize" value="<?php echo "$busPrice";?>" disabled>
								
							</div><br><br><br>
							<br><br><br><br><br><br><br>
							<br><br><br><br>
							<center><button  class="btn btn-info" name="btnBrgy" >&nbsp;Back to Brgy Inhabitants</button>
						<button  class="btn btn-info" name="btnReq" >&nbsp;Request Document Again</button>
						</center>
							

							
							
							<!-- Javascript for checkbox in Location-->
							
						</div>
						</form>
					</div>
				</div>
			</div>
			<?php
			
			if(isset($_POST['btnBrgy']))
			{
						echo "<script> window.location = 'validitycheck.php';</script>";
				//echo Another module
			}//IF(ISSET)
		?>
		<?php
			
			if(isset($_POST['btnReq']))
			{
						echo "<script> window.location = 'DRselectDocResident.php';</script>";
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


  