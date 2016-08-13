 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
	  	<?php 
		
		$appId  = $_SESSION['clientID'];
		$add = $_SESSION['place'];
		$resid = $_SESSION['clientID'];
		$contactno = $_SESSION['contactno'];
		$name = $_SESSION['name'];
		$doc = $_SESSION['document'];
		
		//All Documents
		$certi = "Certification";
		$busClear = "Business Clearance";
		$CTC = "Community Tax Certificate";
		$excav = "Excavation";
		$indig = "Certification of Indigency";
		$streetPer = "Street Permit";
		$TRU = "TRU Clearance";
	?>	  
	  
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">

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
		
		<form method = "POST">
		<legend><font face = "cambria" size = 10 color = "grey"> Select Document</font></legend><br><br><br>

		    <!-- button type='submit' class='showback col-lg-5' name='btnBrgyCertification'>
			
			 <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th style="background-color:rgb(255,204,0);"><center><span class="glyphicon glyphicon-file" 
								  style="color:black; font-size:2.5em"></span></center></th>
								  <th><font face='cambria' size=5 color='black'><center><b><! ?php echo"$certi";?></b></center>
								  </font><span class='glyphicon glyphicon-chevron-right pull-right'></span>
								  </th>
                              </tr>
                              </thead>
				</table>
			</button -->
			
			
			
			<button type='submit' class='showback col-xs-5' name='btnBrgyCertification'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='cambria' size=5 color='black'><b><?php echo"$certi";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button>
		
			<div class="col-xs-1"></div>
		<?php
				if(isset($_POST['btnBrgyCertification']))    
				{
					$appId  = $_SESSION['clientID'];
					$add = $_SESSION['place'];
					$resId = $_SESSION['clientID'];
					$contactno = $_SESSION['contactno'];		
					$name = $_SESSION['name'];
					$doc = $_SESSION['document'];
					
					$_SESSION['document'] = $certi;
					$_SESSION['clientID'] = $resId;
					$_SESSION['clientID'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $add;
					$_SESSION['document'] = "Certification";
					echo "<script> window.location = 'DRformCertification.php';</script>";
				}
		?>
			
			<!--<button type="button" class="showback col-xs-5" name='btnBusClearance'>
						  <img src="images/docicon.ico" style="height:60px;" class="pull-left">
						<font face='cambria' size=5 color='black'><b><?php echo"$busClear";?></b></font>	
						<span class='glyphicon glyphicon-chevron-right pull-right'></span>
						  
						  
						  </button>
						  <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
						    <span class="caret"></span>
						    <span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li><a href="#">Something else here</a></li>
						    <li class="divider"></li>
						    <li><a href="#">Separated link</a></li>
						  </ul>
						  -->
			
			
			
			<button type='submit' class='showback col-xs-5' name='btnBusClearance'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='cambria' size=5 color='black'><b><?php echo"$busClear";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>
			

						  

								  

			
			
			

		<?php
				if(isset($_POST['btnBusClearance']))
				{
					$appId  = $_SESSION['clientID'];
					$add = $_SESSION['place'];
					$resId = $_SESSION['clientID'];
					$contactno = $_SESSION['contactno'];		
					$name = $_SESSION['name'];
					$doc = $_SESSION['document'];
					
					$_SESSION['document'] = $busClear;
					if($resid == NULL)
					{
						$_SESSION['clientID'] = $appId;
					}else
					$_SESSION['clientID'] = $resid;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $add;
					echo "<script> window.location = 'DRformBusClearanceNew.php';</script>";
				}
			?>
				 
		
			<button type='submit' class='showback col-sm-5' name='btnCTC'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='cambria' size=5 color='black'><b><?php echo"$CTC";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button>
			
			<div class="col-xs-1"></div>
			
		<?php		if(isset($_POST['btnCTC']))
				{
					$_SESSION['document'] = $CTC;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRformCTC.php';</script>";
				} 
		?>
			<button type='submit' class='showback col-sm-5' name='btnExcavation'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='cambria' size=5 color='black'><b><?php echo"$excav";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>
			
		<?php		if(isset($_POST['btnExcavation']))
				{
					$appId  = $_SESSION['clientID'];
					$add = $_SESSION['place'];
					$resId = $_SESSION['clientID'];
					$contactno = $_SESSION['contactno'];		
					$name = $_SESSION['name'];
					$doc = $_SESSION['document'];
					
					$_SESSION['document'] = $excav;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRformExcav.php';</script>";
				} 
		?>
		
			<button type='submit' class='showback col-sm-5'name='btnIndigency'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='submit' size=5 color='black'><b><?php echo"$indig";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button>
			
			<div class="col-xs-1"></div>
			
		<?php		
		if(isset($_POST['btnIndigency']))
				{
					$appId  = $_SESSION['clientID'];
					$add = $_SESSION['place'];
					$resId = $_SESSION['clientID'];
					$contactno = $_SESSION['contactno'];		
					$name = $_SESSION['name'];
					$doc = $_SESSION['document'];
					
					$_SESSION['document'] = $indig;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $add;
					echo "<script> window.location = 'DRformIndigency.php';</script>";
				} 
			?>
		
			<button type='submit' class='showback col-sm-5'name='btnStreetPermit'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='cambria' size=5 color='black'><b><?php echo"$streetPer";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>
			
		<?php	if(isset($_POST['btnStreetPermit']))
			{
				$appId  = $_SESSION['clientID'];
					$add = $_SESSION['place'];
					$resId = $_SESSION['clientID'];
					$contactno = $_SESSION['contactno'];		
					$name = $_SESSION['name'];
					$doc = $_SESSION['document'];
					
				$_SESSION['document'] = $streetPer;
				$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $add;
				echo "<script> window.location = 'DRformStreetPermit.php';</script>";
			} 
		
		?>
			<button type='submit' class='showback col-sm-5' name='btnVehicle'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='cambria' size=5 color='black'><b> <?php echo"Vehicle Clearance";?> </b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button>
			
			<div class="col-xs-1"></div>
			
		<?php		if(isset($_POST['btnVehicle']))
				{
					$appId  = $_SESSION['clientID'];
					$add = $_SESSION['place'];
					$resId = $_SESSION['clientID'];
					$contactno = $_SESSION['contactno'];		
					$name = $_SESSION['name'];
					$doc = $_SESSION['document'];
					
					
					//$_SESSION['document'] = $TRU;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					
				echo "<script> window.location = 'DRselectVehicle.php';</script>";
				} 
		?>
		
	</form>
			
			
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->			
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
			</form>
		</section> <! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
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


  