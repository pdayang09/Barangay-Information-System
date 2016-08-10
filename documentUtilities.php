 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
<!--main content start-->
<!--MAIN CONTENT-->

      <section id="main-content">
         <section class="wrapper site-min-height">		
			<legend ><font face = "cambria" size = 8 color = "grey"> Business Maintenance </font></legend>   

<p><font face = "cambria" size = 5 color = "grey"> Maintenance -> Requirement Utility </font><font  size = 5 color = "Red"> </font></p>	   
<form method = POST>                              
<div class="col-sm-9 col-md-6 col-lg-6">
<div class = "showback">
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
<!-- select name -->		
		<div >	
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
		<br><br>
		<input type="submit" class="btn btn-outline btn-success" name = "btnAddRequirement" id = "btnAdd1"  value = "Save"  >			
		<input type="submit" class="btn btn-outline btn-success" name = "btnCancelRequirement" id = "btnCancel"  value = "Back"  >		
			
				<?php 
				 if (isset($_POST['btnCancelRequirement'])){ 
					echo "<script>
					window.location ='requirementMaintenance.php';</script>";
				 }
				 ?>
								
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

 </div>	
</form> <!--FORM METHOD -->
</div> <!--CLASS SHOWBACK -->	

<!--DIVISION FOR TABLE-->
	<form method = POST>	
	<div class="col-sm-3 col-md-6 col-lg-6">
	<div class = "showback">
					 <table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
					<thead>
					<tr>
					<th>Document Name</th>
					<th>Requirements</th>
					</tr>
					</thead>
					<tbody>
				<?php
					require('connection.php');
					$sql = "SELECT d.strDocName, r.strRequirementName FROM tbldocrequirements s INNER JOIN tbldocument d ON s.strDocID = d.intDocCode INNER JOIN tblrequirements r ON s.strReqID = r.intReqID";
					$query = mysqli_query($con, $sql);
					if(mysqli_num_rows($query) > 0){
						$i = 1;
						while($row = mysqli_fetch_object($query)){?>
						<tr> 
						<td><?php echo $row->strDocName;?></td>
							
							
							
					<td><?php echo $row->strRequirementName?></td>
					</tr>
					<?php }} ?>
				<!-- if(isset($_POST['del'])){
					$a = $_POST['del'];
					mysqli_query($con,"Delete From tblRequirements where `intReqID` = '$a'");
					echo "<script>alert('Successful!');
					window.location ='requirementMaintenance.php';</script>";
				}				--></tbody>
				</table></div>
   </div>
   </form>
<!--END OF DIVISON TABLE-->


	</section> <!--/wrapper -->
    </section><!-- /MAIN CONTENT -->	  
      <!--main content end-->     

  
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
