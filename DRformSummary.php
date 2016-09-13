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
		  $docPurpose = $_SESSION['docPurpose'];
			$DRdocReq = $_SESSION['DRdocReq'];
			$purposePrice = $_SESSION['purposePrice'];
		  $_POST['DRdocReqby'] = $name;
		  
		  //Date Today
		  $today = date("Y-m-d"); 
		  		  
		  
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
							<font face="cambria" size=5 color="grey"><center><b>Details Summary</b></center></font><br>
							<div class="col-sm-3">
								<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>						
								<input id='DRdatereq' class='form-control input-group-lg reg_name' type='date' name="DRdtereq" title='system-generated' 
								value = "<?php echo"$today"; ?>" disabled>						
							</div>
							<div class="col-sm-4">
									<p><font face="cambria" size=5 color="grey"> Requested By </font></p>			
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReqby" title="system-generated" id='DRdocReqby' value="<?php echo "$name"; ?>" disabled>
							</div>
							<div class="col-sm-5">
									<p><font face="cambria" size=5 color="grey"> Requested For </font></p>			
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReq" title="system-generated" id='DRdocReq' value="<?php echo "$DRdocReq";?>" disabled>
									
							</div>
							<div class='col-sm-5'>
							<p><font face="cambria" size=5 color="grey">Address</font></p>		
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReq" title="system-generated" id='DRdocReq'  placeholder = "Family" value="<?php echo "$add"; ?>" disabled>				
								
							 </p>
							</div>
							<div class='col-sm-5'>
							<p><font face="cambria" size=5 color="grey">Document Purpose </font></p>		
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReq" title="system-generated" id='DRdocReq'  placeholder = "Family" value="<?php echo "$docPurpose"; ?>" disabled>				
								
							 </p>
							</div>
							
							<div class='col-sm-2'>
							<p><font face="cambria" size=5 color="grey">Price</font></p>		
									<input class="form-control input-group-lg reg_name" type="text" name="DRdocReq" title="system-generated" id='DRdocReq'  placeholder = "0" value="<?php echo "$purposePrice"; ?>" disabled>				
								
							 </p>
							</div>
						</div><br><br><br><br><br><br><br><br><br><br>
						<center><button  class="btn btn-info" name="btnBrgy" >&nbsp;Back to Brgy Inhabitants</button>
						<button  class="btn btn-info" name="btnReq" >&nbsp;Request Document Again</button>
						</center>
					</div>
					<br>
					</form>
				
						<form method="POST" id="Form1">
						<div class = "form-group">
						</div>
				</form>
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


  