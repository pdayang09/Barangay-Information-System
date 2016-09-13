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

 <legend ><font face = "cambria" size = 8 color = "grey"> Maintenance </font></legend>
	<h2> Template</h2>
 <form method = POST  enctype='multipart/form-data'>
									
<div class="col-sm-9 col-md-6 col-lg-6">
  	<div class = 'showback'>
			<p><font face = "cambria" size = 5 color = "grey"> Template ID  </font></p>
			<div class = "form-group">
				<div class="col-sm-12">		   
					<input id="TemplateID" name ="TemplateID" class="form-control input-group-lg reg_name" type="text">
				</div>
			</div><br><br><br>
			
			<p><font face = "cambria" size = 5 color = "grey"> Template Name  </font></p>
			<div class = "form-group">
				<div class="col-sm-12">		   
					<input id="TemplateName" name ="TemplateName" class="form-control input-group-lg reg_name" type="text" required>
				</div>
			</div> <br><br>
			<center> <button  class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  >Save Record </button>  
	</div>
	
	
	<div class = "showback">
				<br>
					<input type='file' name='userFile' id = 'userFile' accept="image/*" onchange="loadFile(event)"><br>
					<img id="output" width="100%" height="150%" />
	</div>
</div>


				
			<!-- DIV FOR TABLE -->
		<div class="col-sm-3 col-md-6 col-lg-6">
			<div class = "showback">
				<table  class="table table-striped table-bordered table-hover" >
					<thead>
						<th> ID</th>
						<th> Template Name</th>
						<th>Template</th>
					
				
					</thead>
				
					<tbody>
							<?php
							require('connection.php');
							$sql = "select * from tbldocumenttemplate ";
							$query = mysqli_query($con, $sql);
							if(mysqli_num_rows($query) > 0){
								$i = 1;
								while($row = mysqli_fetch_object($query)){?>
								<tr> 
								<td><?php echo $row->intTemplate_ID?></td>
								<td><?php echo $row->strTemplate_Name?></td>
								<td><?php 
								require('connection.php');
						$sql = "select strTemplate_Path from tbldocumenttemplate";
						$query = mysqli_query($con, $sql);
						if(mysqli_num_rows($query) > 0){
						$i = 1;
						while($row = mysqli_fetch_assoc($query)){
							?>
				
							<img src="Images/TemplateUpload/<?php echo $row['strTemplate_Path']; ?>" width="200px" height="200px">
						<?php  }}?>
								
								</td>
								</tr>
								<!-- ?php  echo "<td><img src='Images/TemplateUpload/".$row['strTemplate_Path']."'></td>";?>
								</tr>
								<!-- td><img src="Images/TemplateUpload/ <!?php echo $row['strTemplate_Path'] ?> width="400px" height="200px"/></td -->
							
							
							<?php }}?>
					</tbody>
				</table>
				
			</div>
		</div>
		
		

			
					
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
				$strName = $_POST['TemplateName'];
				
			
				 
				 if($strName == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 
					 require('connection.php');
					 	mysqli_query($con,"Set @a = 2;");
					 $info = pathinfo($_FILES['userFile']['name']);
	 		 	 	 $ext = $info['extension']; // get the extension of the file(filename)
			     	 $newname = "$dt.".$ext;
					 //echo "<script> alert('$newname') </script>";
					 $target = 'Images/TemplateUpload/'.$newname;
					 mysqli_query($con,"INSERT INTO `tbldocumenttemplate`(`strTemplate_Name`,`strTemplate_Path`) VALUES ('$strName','$newname');");
					 //mysqli_query($con,'INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategoryCode`, `strFaciStatus`, `dblFaciFixedChargePerHour`, `dblFaciDayChargePerHour`,`dblFaciNightChargePerHour`,`imageUpload`) VALUES (`EEEE`,`$strcode`,`$strname`,`$strStatus`,`$strdayprice`,`$strnightprice`,`$strresidentprice`,`$newname`)');
					 /*$a = "INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategoryCode`, `strFaciStatus`, `dblFaciFixedChargePerHour`, `dblFaciDayChargePerHour`,`dblFaciNightChargePerHour`,`imageUpload`) VALUES ('$strcode','$strname','$strStatus','$strdayprice','$strnightprice','$strresidentprice','$newname')";
*/
					// $b = 'INSERT INTO `tbldocumenttemplate`(`strTemplate_Name`,`strTemplate_Path`) VALUES ("$strName","$newname");';
					 //echo "<script> alert('INSERT INTO `tblfacility`(`strFaciName`, `strFaciCategory`, `strFaciStatus`, `dblFaciDayCharge`, `dblFaciNightCharge`,`dblFaciNResidentCharge`,`imageUpload`) VALUES ('$strcode','$strname','$strStatus', $strdayprice, $strnightprice,$strresidentprice,$newname)' </script>" ;
					 move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
					 /*alert('Success');*/
					echo "<script>window.location = 'TemplateMaintenance.php'</script> </script>";
					 
				}
			}
			 
			?><br><br></center>
                 
			
		</section> <!--/wrapper-->
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
