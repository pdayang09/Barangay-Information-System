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
			<legend ><font face = "cambria" size = 8 color = "grey"> Add new Business </font></legend>
			<button  class="btn btn-info" onclick="window.location.href='BusinessMaintenance.php'"><i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
			<br><br>
			
		<form method = POST>
			<div class="col-sm-3 col-md-6 col-lg-6">
			<div class = "showback">
				<font face = "cambria" size = 5 color = "grey"> Business ID </font></p>
				<div class = "form-group">
					<div class="col-sm-8">
					   <input id="busId1" name="busId1" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" placeholder=" XXXXXX" maxlength  =10 required>					
					 </div>
				</div><br><br><br>
	
			
			 <p><font face = "cambria" size = 5 color = "grey"> Business Name </font></p>   
           <div class="col-sm-8">
             <input id="busName1"  name="busName1" class="form-control input-group-lg reg_name" type="text" placeholder="Business name" required> 
           </div> <br><br><br>
		   
		  	 <p><font face = "cambria" size = 5 color = "grey"> Business Description </font></p>
           <div class="col-sm-8">
              <input id="busDesc1" name="busDesc1" class="form-control input-group-lg reg_name" type="text"  placeholder="Description" maxlength = 100 required>
           </div><br><br><br>
		   
			 <p><font face = "cambria" size = 5 color = "grey"> Business Category</font></p>
			 
		   <div class = "form-group">
				<div class="col-sm-8">
					<select class="form-control input-group-lg reg_name" id = "busCategory" name = "busCategory" value=<?php echo $row->strBusCategory ?>>
                        <option>Select Category</option>
						<?php
							require('connection.php');
								$sql = "select * from tblbusinesscate where strStatus = 'Enabled'";
								$query = mysqli_query($con, $sql);
					
								if(mysqli_num_rows($query) > 0){
									$i = 1;
									while($row = mysqli_fetch_object($query)){?>
										<option> <?php echo $row->strBusCateName ?></option>
										<?php }} ?>
					</select>
				</div>
			</div><br><br>
	
			  <p><font face = "cambria" size = 5 color = "grey"> Contact Person</font></p>
			<div class="col-sm-8">
				<input id="contactperson1" class="form-control input-group-lg reg_name" type="text" name="contactperson1" title="Enter middle name" placeholder="Full Name" required >
			</div><br><br><br>
				   
			  <p><font face = "cambria" size = 5 color = "grey"> Contact Number</font></p>
			<div class="col-sm-8">
				<input id="contactNumber" class="form-control input-group-lg reg_name" type="text" name="contactNumber" title="Enter middle name" placeholder="Phone Number" maxlength = 11 required>
			</div><br><br><br>
			
			  <p><font face = "cambria" size = 5 color = "grey"> Location</font></p>
		   <div class="col-sm-8">
             <input id="Location1" class="form-control input-group-lg reg_name" type="text" name="Location1" title="Enter middle name" placeholder="Location"required>			 
           </div><br><br><br>
  
  	<center><input type="submit" class="btn btn-info" name = "btnAdd1" id = "btnAdd1"  value = "Save Record" >
    </center>

	
	<?php					
			 if (isset($_POST['btnAdd1'])){
				 $strbuscode = $_POST['busId1'];
				 $strbusname = $_POST['busName1'];
				 $strbusdesc = $_POST['busDesc1'];
				 $strbuscategory = $_POST['busCategory'];
				 $strcontact = $_POST['contactperson1'];
				 $strcontactn = $_POST['contactNumber'];
				 $strlocation = $_POST['Location1'];
			
				 if($strbuscode == NULL ||$strbusname == NULL ||$strbusdesc == NULL ||$strbuscategory == NULL 
				 ||$strcontact == NULL ||$strlocation == NULL){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
							//$_busname = mysqli_real_escape_string($con,$strbusname);
							//$_busdesc = mysqli_real_escape_string($con,$strbusdesc);
							//$_location = mysqli_real_escape_string($con,$strlocation);
					 mysqli_query($con,"insert into tblbusiness ('strBusinessName','strBusinessDesc','strBusinessLocation','strBusinessContactPerson','strContactNum') 
																values ('$strbusname','$strbusdesc','$strlocation','$strcontact','$strcontactn');");
					 echo "insert into tblbusiness ('strBusinessID','strBusinessName','strBusinessDesc','strBusinessLocation','strBusinessContactPerson','strContactNum') 
																values ('$strbuscode','$strbusname','$strbusdesc','$strlocation','$strcontact','$strcontactn');";
					 echo "<script>alert('Success');</script>";
			 }
			 }
			
			 ?>
			</div>
			</div>
			</form>
		</div>
	</section>	<!--/wrapper -->
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
