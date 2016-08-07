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
		<legend ><font face = "cambria" size = 10 color = "grey"> Select Document</font></legend><br><br><br>
		
		    <button type='submit' class='btn btn-info btn-lg btn-block' name='btnBrgyCertification'>
			<font face='cambria' size=5 color='white'><b><?php echo"$certi";?></b></font>
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>
		
		<?php
				if(isset($_POST['btnBrgyCertification']))    
				{
					$_SESSION['document'] = $certi;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					
					echo "<script> window.location = 'DRformCertification.php';</script>";
				}
		?>
		
			<button type='submit' class='btn btn-danger btn-lg btn-block' name='btnBusClearance'>
			<font face='cambria' size=5 color='white'><b><?php echo"$busClear";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>

		<?php
				if(isset($_POST['btnBusClearance']))
				{
					$_SESSION['document'] = $busClear;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					
					echo "<script> window.location = 'DRformBusClearanceNEW.php';</script>";
				} 
		?>
			<button type='submit' class='btn btn-success btn-lg btn-block' name='btnCTC'>
			<font face='cambria' size=5 color='white'><b><?php echo"$CTC";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>
			
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
			<button type='submit' class='btn btn-warning btn-lg btn-block' name='btnExcavation'>
			<font face='cambria' size=5 color='white'><b><?php echo"$excav";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>
			
		<?php		if(isset($_POST['btnExcavation']))
				{
					$_SESSION['document'] = $excav;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRformExcav.php';</script>";
				} 
		?>
		
			<button type='submit' class='btn btn-primary btn-lg btn-block'name='btnIndigency'>
			<font face='submit' size=5 color='white'><b><?php echo"$indig";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>
			
		<?php		if(isset($_POST['btnIndigency']))
				{
					$_SESSION['document'] = $indig;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRformIndigency.php';</script>";
				} 
			?>
		
			<button type='submit' class='btn btn-danger btn-lg btn-block'name='btnStreetPermit'>
			<font face='cambria' size=5 color='white'><b><?php echo"$streetPer";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>
			
		<?php	if(isset($_POST['btnStreetPermit']))
			{
				$_SESSION['document'] = $streetPer;
				$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
				echo "<script> window.location = 'DRformStreetPermit.php';</script>";
			} 
		
		?>
			<button type='submit' class='btn btn-info btn-lg btn-block' name='btnVehicle'>
			<font face='cambria' size=5 color='white'><b> <?php echo"Vehicle Clearance";?> </b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>";
			
		<?php		if(isset($_POST['btnVehicle']))
				{
					$_SESSION['document'] = $TRU;
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


  