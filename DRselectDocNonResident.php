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

		   
			
			<!--<button type="button" class="showback col-xs-5" name='btnBusClearance'>
						  <img src="images/docicon.ico" style="height:60px;" class="pull-left">
						<font face='cambria' size=5 color='black'><b><?php //echo"$busClear";?></b></font>	
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
					$_SESSION['clientID'] = $appId;
					$_SESSION['clientID'] = $resid;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = "";
					echo"<script> alert('$resId')</script>";
					echo "<script> window.location = 'DRBusinessTable.php';</script>";
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


  