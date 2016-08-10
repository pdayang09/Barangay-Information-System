 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->  <!-- Modal Start-->
	<div id="myModala" class="modal fade" role="dialog" >
	<div class="modal-dialog" style = "width:900px ">
	<div class = "modal-content" style = "width:900px padding-left:20px">
<!-- Modal content-->	
</div>
</div></div> 

<!--MAIN CONTENT-->











      <section id="main-content">
         <section class="wrapper site-min-height">		
		  <form method = POST>
			<!-- 0legend ><font face = "cambria" size = 8 color = "grey"> Business Maintenance </font></legend -->
                     
<form method = POST>
	 <!-- input type="button" class="btn btn-info" name = "btnAdd" id = "btnAdd" value = "Add Requirement" data-toggle="modal" data-target="#myModala"> <!--MODAL BUTTON -->
          

<div class='requirementMain'>			
		<legend ><font face = "cambria" size = 8 color = "grey"> Requirement Maintenance </font><font  size = 5 color = "Red"> * </font></legend>
<form method = POST>
<div class = 'modal-body'>	

	<p><font face = "cambria" size = 5 color = "grey"> Maintenance </font><font  size = 5 color = "Red"> </font></p>
					
	<br><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Requirement </font><font  size = 5 color = "Red"> * </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
	<center>
	<input id ="strReqMain" name = "requirementMaintenance"  class="form-control input-group-lg reg_name" type="text" >	
         </center>  </div>
	</div><br><br><br>
	

	<!-- p><font face = "cambria" size = 5 color = "grey"> Amount </font><font  size = 5 color = "Red"> * </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="PDESC1" name="Amount" class="form-control input-group-lg reg_name" type=number min = 0 name="facName" title="Enter Facility name" >	
           </div>
	</div><br><br><br -->
	
	<center>
  	 <input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Add"  > 
			 <input type="submit" class="btn btn-outline btn-success" name = "btnCancel" id = "btnCancel"  value = "Cancel" >
				<input type="submit" class="btn btn-outline btn-success" name = "btnProceed" id = "btnProceed"  value = "Utility" >
		<br><br>
			  <?php
			 if (isset($_POST['btnAdd'])){
				 $strPD = $_POST['requirementMaintenance'];
				 //$strtype = $_POST['type'];
				
				 if($strPD == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					 mysqli_query($con,"INSERT INTO `tblrequirements`(`strRequirementName`) VALUES ('$strPD');");
					 echo "<script>alert('Success');</script>";
			 }}
				 ?>
				 
				 <?php 
				 if (isset($_POST['btnProceed'])){ 
					echo "<script>
					window.location ='documentUtilities.php';</script>";
				 }
				 
				 
				 
				 ?>
    </center>
</form>
</div><br><br>
</div><br><br>
		  
                               
	




		</section> <!--/wrapper -->
      </section><!-- /MAIN CONTENT -->



	  
      <!--main content end-->
      
  </section> <!--<section class="wrapper site-min-height">-->

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
