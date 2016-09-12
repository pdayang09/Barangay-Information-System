		 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->  
      <section id="main-content">
          <section class="wrapper site-min-height">		<br>
		  	<button  class="btn btn-info" onclick="window.location.href='EquipmentCat.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>

		<legend ><font face = "cambria" size = 8 color = "grey"> Add Facility/Equipment Category </font></legend>
		<div class="col-sm-9 col-md-6 col-lg-6">
		
<form method = POST>	
			<div class = "showback">
				<p><font face = "cambria" size = 5 color = "grey"> Item Description </font></p>
			<div class = "form-group">
				   <div class="col-md-12">
						<input id="PDESC1" name="PDESC1" class="form-control input-group-lg reg_name" type="text" name="facName" title="Enter Facility name" >	
				   </div>
			</div><br><br><br>
	
		<p><font face = "cambria" size = 5 color = "grey"> Item Type </font></p>
	<div class = "form-group">
		   <div class="col-md-12">
				<select class = "form-control" name = "type">
					<option> Facility</option>
					<option> Equipment</option>
				</select>
           </div>
	</div><br><br><br>
  
  	<center> <input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 
			</div>
		</div>
	
	<div class="col-sm-3 col-md-6 col-lg-6">
		<div class = "showback">
			<table  class="table table-striped table-bordered table-hover" >
				<thead>
					<th><i class="fa fa-bullhorn"></i> Category Name</th>
					<th><i class="fa fa-bookmark"></i> Category Type</th>
				</thead>
				
				<tbody>
						<?php
						require('connection.php');
						$sql = "select * from tblCategory ";
						$query = mysqli_query($con, $sql);
						if(mysqli_num_rows($query) > 0){
							$i = 1;
							while($row = mysqli_fetch_object($query)){?>
							<tr> 
							<td><?php echo $row->strCategoryDesc?></td>
							<td><?php echo $row->strCategoryType?></td>
							
						<?php }}?>
				</tbody>
			</table>
		</div>
	</div>	 

			 <?php
			 if (isset($_POST['btnAdd'])){
				 $strPD = $_POST['PDESC1'];
				  $strtype = $_POST['type'];
				
				 if($strPD == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					   	mysqli_query($con,"Set @a = 2;");
					 mysqli_query($con,"INSERT INTO `tblcategory`(`strCategoryDesc`, `strCategoryType`) VALUES ('$strPD','$strtype');");
					 echo "<script>alert('Success');
					 window.location = 'EquipmentCat.php'</script>";
			 }}
				 ?>
    </center>
	</form>
	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
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
