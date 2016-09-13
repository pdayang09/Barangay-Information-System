<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<section id="main-content">
         
<section class="wrapper site-min-height">
<legend ><font face = "cambria" size = 8 color = "grey"> Add Document Details</font></legend>
<button  class="btn btn-info" onclick="window.location.href='DocumentMaintenance.php'"><i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>

<br><br>
<form method = POST  enctype='multipart/form-data'>
	<div class="col-sm-9 col-md-6 col-lg-6">
		<div class = "showback">
				<p><font face = "cambria" size = 5 color = "grey"> Document Name </font></p>
				<div class = "form-group">
					<div class="col-sm-12">
						<input id="controlno" name = "controlno" class="form-control input-group-lg reg_name" type="text"  required>			 
				   </div>
				</div><br><br><br>			
				
		  <font face = "cambria" size = 5 color = "grey">Price </font></p>
					<div class = "form-group">
						<div class="col-sm-12">		   
						<input id="Price"  name="Price" class="form-control input-group-lg reg_name" type= number step = any title="Enter Document name" value = '0'min = 0 required>					 
						</div>
					</div><br><br><br><br><br>					
		  
						<center> <Button type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = ""  >Submit</button>
				
		</div>
	</div>


		<!-- DIV FOR TABLE -->
		

		
				<div class="col-sm-3 col-md-6 col-lg-6">
			<div class = "showback">
				
		
			<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Select Template</font></p>
					<div class="col-sm-12">		
					<select class="form-control input-group-lg reg_name" id = "Template" name = "Template">
						<option>Select Category</option>
						<?php
									require('connection.php');
										$sql = "select * from tbldocumenttemplate";
										$query = mysqli_query($con, $sql);
							
										if(mysqli_num_rows($query) > 0){
											$i = 1;
											while($row = mysqli_fetch_object($query)){?>
												<option value=<?php echo $row->intTemplate_ID ?>><?php echo $row->strTemplate_Name ?></option>
												<?php }} ?>
					</select>
					</div>
				</div>
				
<!-- DIV END-->
		
		

	<?php
		 if (isset($_POST['btnAdd'])){
				
					$documentName = $_POST['controlno'];
					$strImagePath = $_POST['Template'];
					$dblPrice = $_POST['Price'];
					if($dblPrice == NULL){
					 $dblPrice = 0;
				 }
				 
				 if($documentName == NULL){
				 echo "<script>alert('Please Complete the form');</script>";
				}
				 else {
					 require('connection.php');
					 mysqli_query($con, "INSERT INTO `tbldocument`(`strDocName`, `dblDocFee`, `strStatus`, `strDocTemplate`) 
					 VALUES ('$documentName','$dblPrice','Enabled','$strImagePath');");
					 echo "<script>alert('Success!');</script>";
					 
				 }			 			 		 			  
				//make sure you have created the **upload** directory

				//$filename    = $_FILES["picture"]["tmp_name"];
				//$destination = "Images/" . $_FILES["picture"]["name"]; 
				//move_uploaded_file($filename, $destination); //save uploaded picture in your directory
				//$search = $_FILES["picture"]["tmp_name"];;		
				//$_SESSION['template'] = $search;				
				//$_SESSION['] = $destination;	
				//echo "<script>window.location = 'DReditDocument.php'</script>";		 
			 	
			/* $dt = date('Ymdhis');
			 $strcont = $_POST['controlno'];
			 $intDisc = $_POST['disc'];
			 $strcategory = $_POST['equip'];
			 $intquantity = $_POST['quantity'];
			 $fee = $_POST['fee'];

			/*if($intquantity == NULL || $fee == NULL ){
					 $intquantity = 0;
					 $fee = 0;
				 }
				
			 if($strcont == NULL ||  $strcategory == 'Select Category' ){
				 echo "<script>alert('Please Complete the form');</script>";
			 } */
			/* else{
				 require('connection.php');
				 $info = pathinfo($_FILES['userFile']['name']);
	 		 	 	 $ext = $info['extension']; // get the extension of the file(filename)
			     	 $newname = "$dt.".$ext;
					 $target = 'Images/EquipmentUpload/'.$newname;
			
				mysqli_query($con,"INSERT INTO `tblequipment`(`strEquipName`, `strEquipCategory`, `intEquipQuantity`, `dblEquipFee`, `dblEquipNResidentCharge`, `imageUpload`,`strStatus`) 
					VALUES ('$strcont', '$strcategory', '$intquantity', '$fee', '$intDisc', '$newname', 'Enabled');");
					
					$b= 'INSERT INTO `tblequipment`(`strEquipName`, `strEquipCategory`, `intEquipQuantity`, `dblEquipFee`, `dblEquipNResidentCharge`, `imageUpload`,`strStatus`) 
					VALUES ("$strcont","$strcategory","$intquantity","$fee","$intDisc","$newname","Enabled")';
					move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
					
					/* echo "INSERT INTO `tblequipment`(`strEquipName`, `strEquipCategory`, `intEquipQuantity`, `dblEquipFee`, `dblEquipNResidentCharge`, `strStatus`) 
					//VALUES ('$strcont','$strcategory','$intquantity','$fee','$intDisc','Enabled')";
					 echo "<script>alert('Success');
					 
					 </script>";
			 }*/
	}
		?><br><br></center>
                    
	</form>		
		</section><!--/wrapper -->
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
	  
	  
	   var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	  };

  </script>

  </body>
</html>
