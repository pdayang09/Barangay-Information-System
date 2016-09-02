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
	
			<form method = POST  enctype='multipart/form-data'>
									
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
			
			<p><font face = "cambria" size = 5 color = "grey"> Day Charge </font></p>
			
			<div class = "form-group">
				<div class="col-sm-12">
					<input id="facId1" name ="dayprice" class="form-control input-group-lg reg_name" type= text value = 0 required>
				</div>
			</div><br><br>
		   
			<p><font face = "cambria" size = 5 color = "grey"> Night Charge </font></p>
			
			<div class = "form-group">
				<div class="col-sm-12">
					<input id="facId1" name ="nightprice" class="form-control input-group-lg reg_name" type= text value = 0 required>
				</div>
			</div><br><br>
			
			<p><font face = "cambria" size = 5 color = "grey"> Non Resident Charge </font></p>
			
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
  
			<center> <button  class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  >Save Record </button>  
	</div>
</div>
			<!-- DIV FOR TABLE -->
		<div class="col-sm-3 col-md-6 col-lg-6">
			<div class = "showback">
				<table  class="table table-striped table-bordered table-hover" >
					<thead>
						<th><i class="fa fa-question-circle"></i> Facility Name</th>
						<th><i class="fa fa-bookmark"></i> Day Price</th>
						<th><i class="fa fa-bookmark"></i> Night Price</th>
						<th><i class="fa fa-bookmark"></i> Non Resident Price</th>
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
									<td><?php echo $row->dblFaciNResidentCharge?></td>
							<?php }}?>
					</tbody>
				</table>
			</div>
		</div>
		
		
		<div class="col-sm-3 col-md-6 col-lg-6">
			<div class = "showback">
				<br>
					<input type='file' name='userFile' id = 'userFile'><br>
					<!-- input type='submit' name='upload_btn' value='upload'>
				
				
				<?php
					//if (isset($_POST['userFile'])){
						/*echo "<script> alert('asd'); </script>";
						 $info = pathinfo($_FILES['userFile']['name']);
			 		 	 $ext = $info['extension']; // get the extension of the file(filename)
					     $newname = "$dt.".$ext;*/
						// $ImageName2 = $_POST['image_name_1'];

					//$info = pathinfo($_FILES['userFile']['name']);
					//$ext = $info['extension']; // get the extension of the file

					//echo $_FILES['userFile']['tmp_name'];

					/*require('connection.php');
					mysqli_query($con,"INSERT INTO `tblfacility`( `imageUpload`) VALUES ('$originalname');");*/
					//echo "<script>alert('Success');</script>";
				//}
				?>
			</div>
		</div>
<!-- DIV END-->

</form>
				
		
			 <?php
			 if (isset($_POST['btnAdd'])){
			 	$dt = date('Ymdhis');
				 $strcode = $_POST['facId1'];
				 $strname = $_POST['facName1'];
				 $strdayprice = (double)$_POST['dayprice'];
				 $strnightprice = (double)$_POST['nightprice'];
				 $strresidentprice = (double)$_POST['residentprice'];
				 if($strdayprice == NULL || $strnightprice == NULL || $strresidentprice == NULL){
					 $strdayprice = 0;
					 $strnightprice = 0;
					 $strresidentprice = 0;
				 }
				 
				 $strStatus = $_POST['facstatus1'];
				 
				 if($strcode == NULL ||$strname == 'Select Category' ||$strStatus == NULL  ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 
					 require('connection.php');
					 $info = pathinfo($_FILES['userFile']['name']);
	 		 	 	 $ext = $info['extension']; // get the extension of the file(filename)
			     	 $newname = "$dt.".$ext;
					 //echo "<script> alert('$newname') </script>";
					 $target = 'Images/FacilityUpload/'.$newname;
					 mysqli_query($con,"INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategory`, `strFaciStatus`, `dblFaciDayCharge`, `dblFaciNightCharge`,`dblFaciNResidentCharge`,`imageUpload`) VALUES ('$strcode','$strname','$strStatus','$strdayprice','$strnightprice','$strresidentprice','$newname');");
					 //mysqli_query($con,'INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategoryCode`, `strFaciStatus`, `dblFaciFixedChargePerHour`, `dblFaciDayChargePerHour`,`dblFaciNightChargePerHour`,`imageUpload`) VALUES (`EEEE`,`$strcode`,`$strname`,`$strStatus`,`$strdayprice`,`$strnightprice`,`$strresidentprice`,`$newname`)');
					 /*$a = "INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategoryCode`, `strFaciStatus`, `dblFaciFixedChargePerHour`, `dblFaciDayChargePerHour`,`dblFaciNightChargePerHour`,`imageUpload`) VALUES ('$strcode','$strname','$strStatus','$strdayprice','$strnightprice','$strresidentprice','$newname')";
*/
					 $b = 'INSERT INTO tblfacility (strFaciName,strFaciCategoryCode,strFaciStatus,dblFaciFixedChargePerHour,dblFaciDayChargerPerHour,dblFaciNightChargePerHour,imageUpload) VALUES ("$strcode","$strname",`$strStatus`,`$strdayprice`,`$strnightprice`,`$strresidentprice`,`$newname`)';
					 //echo "<script> alert('INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategory`, `strFaciStatus`, `dblFaciDayCharge`, `dblFaciNightCharge`,`dblFaciNResidentCharge`,`imageUpload`) VALUES ('$strcode','$strname','$strStatus', $strdayprice, $strnightprice,$strresidentprice,$newname)' </script>" ;
					 move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
					 /*echo "<script>alert('Success');
					window.location = 'FacilityMaintenance.php'</script> </script>";*/
					 
				}
			}
			 
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
