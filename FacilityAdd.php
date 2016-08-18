<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
         <br>
          <section class="wrapper site-min-height">

 <legend ><font face = "cambria" size = 8 color = "grey"> Facility Maintenance </font></legend>

 <button  class="btn btn-info" onclick="window.location.href='FacilityMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button><br><br>
	
			<form method = POST>
									
	<div class="col-sm-9 col-md-6 col-lg-6">
	
  	<div class = 'showback'>
			<p><font face = "cambria" size = 5 color = "grey"> Facility  </font></p>
	
			<div class = "form-group">
				<div class="col-sm-12">		   
					<input id="facId1" name ="facId1" class="form-control input-group-lg reg_name" type="text" maxlength =35 required>
				</div>
			</div><br><br><br>
	
			<p><font face = "cambria" size = 5 color = "grey"> Category </font></p>
	
			<div class = "form-group">
				<div class="col-sm-12">
					<select class="form-control input-group-lg reg_name" id = "facName1" name = "facName1">
                        <option>Select Category</option>
						<?php
							require('connection.php');
								$sql = "select * from tblcategory where strCategoryType = 'Facility' ";
								$query = mysqli_query($con, $sql);
					
								if(mysqli_num_rows($query) > 0){
									$i = 1;
									while($row = mysqli_fetch_object($query)){?>
										<option value=<?php echo $row->strCategoryCode ?>><?php echo $row->strCategoryDesc ?></option>
										<?php }} ?>
					</select>
				</div>
			</div><br><br>
			
			<p><font face = "cambria" size = 5 color = "grey"> Facility Day Charge </font></p>
			<div class = "form-group">
				<div class="col-sm-12">
					<input id="facId1" name ="dayprice" class="form-control input-group-lg reg_name" type= text value = 0 required>
				</div>
			</div><br><br>
		   
			<p><font face = "cambria" size = 5 color = "grey"> Facility Night Charge </font></p>
			<div class = "form-group">
				<div class="col-sm-12">
					<input id="facId1" name ="nightprice" class="form-control input-group-lg reg_name" type= text value = 0 required>
				</div>
			</div><br><br>
			
			<p><font face = "cambria" size = 5 color = "grey"> Facility Resident Charge </font></p>
			<div class = "form-group">
				<div class="col-sm-12">
					<input id="facId1" name ="residentprice" class="form-control input-group-lg reg_name" type= text value = 0 required>
				</div>
			</div><br><br>
		   <div class="form-group">
		   <br><p><font face = "cambria" size = 5 color = "grey"> Status </font></p>
				<div class="col-sm-12">
					<select class="form-control input-group-lg reg_name" id = "facstatus1" name = "facstatus1">
						<option> Good Condition</option>
						<option> Under Maintenance</option>
						<option> Broken</option>
					</select>
				</div>
			</div><br><br><br><br><br>
  
			<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  >    </div></div>
			<!-- DIV FOR TABLE -->
		<div class="col-sm-3 col-md-6 col-lg-6">
		<div class = "showback">
		<table  class="table table-striped table-bordered table-hover" >
		<thead>
		<th>Facility Name</th>
		<th>Day Price</th>
		<th>Night Price</th>
		</thead>
		<tbody>
							<?php
					require('connection.php');
				$sql = "select * from tblfacility ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> 
					<td><?php echo $row->strFaciName?></td>
					<td><?php echo $row->dblFaciDayCharge?></td>
						<td><?php echo $row->dblFaciNightCharge?></td>
				<?php }}?>
		</tbody>
		</table></div>
		</div>
<!-- DIV END-->
</form>
		
			 <?php
			 if (isset($_POST['btnAdd'])){
				 $strcode = $_POST['facId1'];
				 $strname = $_POST['facName1'];
				 $strdayprice = (double)$_POST['dayprice'];
				 $strnightprice = (double)$_POST['nightprice'];
				 $strresidentprice = (double)$_POST['residentprice'];
				 if($strprice == NULL){
					 $strprice = 0;
				 }
				 
				 $strStatus = $_POST['facstatus1'];
				 
				 if($strcode == NULL ||$strname == 'Select Category' ||$strStatus == NULL  ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					
					 require('connection.php');
					 mysqli_query($con,"INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategory`, `strFaciStatus`, `dblFaciDayCharge`, `dblFaciNightCharge`,`dblFaciDiscount`) VALUES ('$strcode','$strname','$strStatus', $strdayprice, $strnightprice,$strresidentprice);");
					 echo "<script>alert('Success');
					 window.location = 'FacilityMaintenance.php'</script>";
			 }}
			 
			?><br><br></center>
                 
			
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
