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
					
			
				 if($strDocument == NULL && $strCheckbox == NULL){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					
					require("connection.php");
					foreach($strCheckbox as $a){
						mysqli_query($con, "INSERT INTO `tbldocrequirements` VALUES ('$strDocument','$a');");									
						echo "<script>alert('$a')</script>";
					}
				 }
				 
			 }
			 
				 ?>		
				 
				 
				 

 </div>	
</form> <!--FORM METHOD -->
</div> <!--CLASS SHOWBACK -->	

<!--DIVISION FOR TABLE-->
	<form method = POST>	
	<div class="col-sm-3 col-md-6 col-lg-6">
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
					
					<input type="submit" class="btn btn-outline btn-success" name = "btnSearch" id = "btnS1"  value = "Search">
					
					<!--?php 
					
					if(isset($_POST['btnSearch']))
						{
							$document = $_POST['document'];
							// search in all table columns
							// using concat mysql function
							$query = "SELECT * FROM `tbldocrequirements` WHERE 'strDocID' = '$document'";
							$search_result = filterTable($query);
							
						}
						 else {
							$query = "SELECT * FROM `tbldocrequirements`";
							$search_result = filterTable($query);
						}					
					? -->   <!-- for filter
							**not yet working SHEMS problem in filter and get the data of delete.
							-->
					
					<br><br><br>
					<table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
					<thead>
					 <!-- ?php while($row = mysqli_fetch_array($search_result));? -->
					<tr>
					<th>Document Name</th>
					<th>Requirements</th>
					<th>Action</th>
					</tr>
					</thead>
					<tbody>
				<?php
					require('connection.php');
					$sql = "SELECT Distinct d.strDocName, s.strDocID FROM tbldocrequirements s INNER JOIN tbldocument d ON s.strDocID = d.intDocCode INNER JOIN tblrequirements r ON s.strReqID = r.intReqID group by intDocCode";
					$query = mysqli_query($con, $sql);
					if(mysqli_num_rows($query) > 0){
						$i = 1;
					
						while($row = mysqli_fetch_object($query)){
					?>
					<tr> 
						<td><?php echo $row->strDocName;?></td><td>
						
						<?php 	
						$id = $row->strDocID;
								$sql1 = "SELECT strRequirementName FROM tbldocrequirements as a inner join tblrequirements as b on a.strReqID = b.intReqID WHERE strDocId ='$id'";
								$query1 = mysqli_query($con, $sql1);
								
								if(mysqli_num_rows($query1) > 0){
								$i = 1;
								
								while($row1 = mysqli_fetch_array($query1)){
									echo $row1[0]."<br>";
								}
							}}?></td>
						<td><button class ="btn btn-success btn-sm" type = submit name = "del" value =<?php echo "SELECT s.strReqID, s.strDocID FROM tbldocrequirements s INNER JOIN tbldocument d ON s.strDocID = d.intDocCode INNER JOIN tblrequirements r ON s.strReqID = r.intReqID"?>>DELETE</button></td>
					</tr>
					<?php } ?>
				<?php if(isset($_POST['del'])){
					$a = $_POST['del'];
					mysqli_query($con,"Delete From tbldocrequirements where `strDocID` = '$a' AND 'strReqID' = '$a'");
					echo "<script>alert('Successful!');
					window.location ='documentUtilities.php';</script>";
				}?>
				</tbody>
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
