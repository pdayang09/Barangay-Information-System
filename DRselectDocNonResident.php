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
		
		<?php //Initialize variables
	
			//Gets Today's Date
			$today = date("F j, Y, g:i a"); // displays date today
			

		?>

	<form method="post"
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Select Document </font></legend><br><br><br>
		
		
		<button type="submit" class="btn btn-danger btn-lg btn-block" name="btnBusClearance">
			<font face="cambria" size=5 color="white"><b>Barangay Business Clearance</b></font>	
			<span class="glyphicon glyphicon-chevron-right pull-right"></span></button><br>
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
		<button type="button" class="btn btn-success btn-lg btn-block" name="btnCTC">
			<font face="cambria" size=5 color="white"><b>Community Tax Certificate</b></font>	
			<span class="glyphicon glyphicon-chevron-right pull-right"></span></button><br>
			<?php
				if(isset($_POST['btnCTC']))
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


  