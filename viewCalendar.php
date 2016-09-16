 <?php session_start();?>
<!DOCTYPE html>
	
	<link rel="stylesheet" href="components/bootstrap2/css/bootstrap.css">
	<link rel="stylesheet" href="components/bootstrap2/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/calendar.css">
	
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
	
      <section id="main-content">
        <section class="wrapper site-min-height">
			
	<?php //Initialize variables
			
	//Gets Today's Date
	$today = date("Y-m-d"); // displays date today
	
	//Personal Details
	$resId ="";
	$name ="";
	$contactno ="";	
	
	//Reservation Details
	//$resPurpose ="";
	$resDate = "";
	$resFrom = "";
	$resTo = "";
	$quantity = array();
	$returnedTemp =0;
	$unreturnedTemp =0;
	
	$returned =0;
	$unreturned =0;
?>

	
	<form method="POST">
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
		
		
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Reservation Calendar </font></legend>
		
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->	
		<?php include("calendar.php");?>
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
		
</form>	
	</section>
</section>

	<?php require('footer.php');?>	
  </body>
</html>