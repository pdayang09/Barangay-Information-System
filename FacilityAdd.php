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
 <button  class="btn btn-info" onclick="window.location.href='FacilityMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
	<legend ><font face = "cambria" size = 8 color = "grey"> Facility Maintenance </font></legend>
			<form method = POST>
									

			<p><font face = "cambria" size = 5 color = "grey"> Facility  </font></p>
	
			<div class = "form-group">
				<div class="col-sm-5">		   
					<input id="facId1" name ="facId1" class="form-control input-group-lg reg_name" type="text" maxlength =35 required>
				</div>
			</div><br><br><br>
	
			<p><font face = "cambria" size = 5 color = "grey"> Category </font></p>
	
			<div class = "form-group">
				<div class="col-sm-5">
					<select class="form-control input-group-lg reg_name" id = "facName1" name = "facName1">
                        <option>Select Category</option>
						<?php
							require('connection.php');
								$sql = "select * from tblcategory where strCategoryDesc = 'Facility' ";
								$query = mysqli_query($con, $sql);
					
								if(mysqli_num_rows($query) > 0){
									$i = 1;
									while($row = mysqli_fetch_object($query)){?>
										<option value=<?php echo $row->strCategoryCode ?>><?php echo $row->strCategoryType ?></option>
										<?php }} ?>
					</select>
				</div><a class="btn btn-info btn-success btn-xs" href="EquipmentCat.php">
				<label>Add Category</label></a>
			</div><br>
			
			<p><font face = "cambria" size = 5 color = "grey"> Facility Price </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input id="facId1" name ="price" class="form-control input-group-lg reg_name" type= text value = 0 required>
				</div>
			</div><br><br>
		   
		   <div class="form-group">
		   <br><p><font face = "cambria" size = 5 color = "grey"> Status </font></p>
				<div class="col-sm-5">
					<select class="form-control input-group-lg reg_name" id = "facstatus1" name = "facstatus1">
						<option> Good Condition</option>
						<option> Under Maintenance</option>
						<option> Broken</option>
					</select>
				</div>
			</div><br><br><br><br><br>
  
			<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 
			
</form>
		
			 <?php
			 if (isset($_POST['btnAdd'])){
				 $strcode = $_POST['facId1'];
				 $strname = $_POST['facName1'];
				 $strprice = (double)$_POST['price'];
				 
				 if($strprice == NULL){
					 $strprice = 0;
				 }
				 
				 $strStatus = $_POST['facstatus1'];
				 
				 if($strcode == NULL ||$strname == 'Select Category' ||$strStatus == NULL  ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					$q = mysqli_query($con,"Select * from tblcategory where strCategoryCode = '$strname'");
					$row = mysqli_fetch_object($q);
					$str = $row->strCategoryType;
					 require('connection.php');
					 mysqli_query($con,"INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategoryCode`, `strFaciStatus`, `dblFaciFixedChargePerHour`, `dblFaciDayChargePerHour`, `dblFaciNightChargePerHour`) VALUES ('$strcode','$strname','$strStatus',$strprice, $strprice, $strprice);");
					 echo "<script>alert('Success');</script>";
			 }}
			 
			?><br><br></center>
                    </div>
			
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
