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
			<legend ><font face = "cambria" size = 8 color = "grey"> Business Maintenance </font></legend>
                     
<form method = POST>
	 <!-- input type="button" class="btn btn-info" name = "btnAdd" id = "btnAdd" value = "Add Requirement" data-toggle="modal" data-target="#myModala"> <!--MODAL BUTTON -->
       
<p><font face = "cambria" size = 5 color = "grey"> Maintenance -> Requirement Utility </font><font  size = 5 color = "Red"> </font></p>	   
                               
<center>
<br><div class = "showback">
		<select name = "document" id = "document">
			<option value = ""> Select Document </option>
			<?php
				require('connection.php');
				$sql = "SELECT * FROM tbldocument ";
				$query = mysqli_query($con, $sql);
					
				if(mysqli_num_rows($query) > 0){
				$i = 1;
				while($row = mysqli_fetch_object($query)){?>
				<option value=<?php echo $row->intDocCode ?>> <?php echo $row->strDocName ?></option>
				
				<?php }} ?>	
		</select>
<br><br>
	<!-- select name -->

		<div class = "checkbox">	
			<?php
				$docCheckBox[] = array();
				require('connection.php');
				$sql = "SELECT * FROM tblrequirements ";
				$query = mysqli_query($con, $sql); 
					
				if(mysqli_num_rows($query) > 0){
				$i = 1;
				while($row = mysqli_fetch_object($query)){ ?> 
				<br><br>
				<input type = "checkbox" id = "docCheckBox" name = docCheckBox[]  value=<?php echo $row->intReqID ?>> <?php echo $row->strRequirementName?></input>
				
				<?php } } ?>
		</div>
		
		
		<input type="submit" class="btn btn-outline btn-success" name = "btnAddRequirement" id = "btnAdd1"  value = "Save"  >			
		<input type="submit" class="btn btn-outline btn-success" name = "btnCancelRequirement" id = "btnCancel"  value = "Back"  >		

				<?php
			 if (isset($_POST['btnAddRequirement'])){
				 $strDocument = $_POST['document'];
					$strCheckbox = $_POST['docCheckBox'];
					
					$req = "";
					foreach($strCheckbox as $a){
						echo "<script>alert('$a')</script>";
						
						$req = $req.$a;
					}
					// 	echo "<script>alert('$req')</script>";
					//$strtype = $_POST['type'];				
				 if($strDocument == NULL && $strCheckbox == NULL){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');					 
					// foreach($_POST['docCheckBox'] as $strCheckbox){
					// if(isset($strCheckbox)) {
					//echo $strCheckbox; 		
							mysqli_query($con, "INSERT INTO `tbldocrequirements` VALUES ('$strDocument','$req');");
						//	echo "INSERT INTO `tbldocrequirements`(`strDocID`,'strReqID') VALUES ('$strDocument','$strCheckbox')";														
						// }echo "$report_id was checked! ";						 
					 }
					  echo "<script>alert('Success');</script>"; 
					//while (isset($_POST['docCheckBox'])){
					// echo "asd";
					//	mysqli_query($con,"INSERT INTO `tbldocrequirements`(`strDocID`,'strReqID') VALUES ('$sql1',".$_POST['docCheckBox'].");");						
					}								 
				 ?>		
</center>
</form> <!--FORM METHOD -->
    </div> <!--CLASS SHOWBACK -->	
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
