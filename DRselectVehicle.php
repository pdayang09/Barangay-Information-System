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
		//$doc = $_SESSION['document'];
		
		//All Documents
		
		$TRU = "TRU Clearance";
		$Uti = "Utility Clearance"
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
		<legend><font face = "cambria" size = 10 color = "grey"> Select Vehicle Clearance</font></legend><br><br><br>

		    
			
			
			<button type='submit' class='showback col-xs-5' name='btnTRU'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='cambria' size=5 color='black'><b><?php echo"$TRU";?></b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button>
		
			<div class="col-xs-1"></div>
		<?php
				if(isset($_POST['btnTRU']))    
				{
					$appId  = $_SESSION['clientID'];
					$add = $_SESSION['place'];
					$resId = $_SESSION['clientID'];
					$contactno = $_SESSION['contactno'];		
					$name = $_SESSION['name'];
					$doc = $_SESSION['document'];
					
					$_SESSION['document'] = $TRU;
				$_SESSION['clientID'] = $resId;
				$_SESSION['clientID'] = $appId;
				$_SESSION['name'] = $name;
				$_SESSION['contactno'] = $contactno;
				$_SESSION['place'] = $add;
					echo "<script> window.location = 'DRTRUtable.php';</script>";
				}
		?>
			
			
			
			
			
			<button type='submit' class='showback col-xs-5' name='btnBusClearance'>
			<img src="images/docicon.ico" style="height:60px;" class="pull-left">
			<font face='cambria' size=5 color='black'><b><?php echo"$Uti";?></b></font>	
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
					
					$_SESSION['document'] = $Uti;
					$_SESSION['clientID'] = $appId;
					$_SESSION['clientID'] = $resid;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $add;
					echo "<script> window.location = 'DRUtilityTable.php';</script>";
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


  