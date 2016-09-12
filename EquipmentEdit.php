<!DOCTYPE html>
          <?php session_start();
		  require('header.php');?>
    <?php require('sidebar.php');?>
	<script type = "text/javascript">

</script>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

      <section id="main-content">
	  <br>
          <section class="wrapper site-min-height">
 <button class="btn btn-theme" onclick= "window.location.href='EquipmentMaintenance.php'">Back to the Previous Page</button>
 	                           <form method = POST>


		<legend ><font face = "cambria" size = 8 color = "grey"> Edit Equipment </font></legend>

						
<div class="col-sm-9 col-md-6 col-lg-6">
		<div class = "showback">	<p><font face = "cambria" size = 5 color = "grey"> Equipment Name </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input name = "controlno1"   class="form-control input-group-lg reg_name" type="text" readonly = true <?php  if(isset($_SESSION['Name'])){ echo "value = '".$_SESSION['Name']."'"; }?>>			 
				</div>
			</div><br><br><br>
	
			<p><font face = "cambria" size = 5 color = "grey"> Category </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input name = "category"  class = "form-control input-group-lg reg_name" type="text" readonly = true value = <?php if(isset($_SESSION['cat'])){echo $_SESSION['cat']; } ?> >			 
				</div>
			</div><br><br><br>
			
			<p><font face = "cambria" size = 5 color = "grey"> Quantity </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input id="controlno1" name = "quantity" class="form-control input-group-lg reg_name" type="number" min="1" value = <?php if(isset($_SESSION['stat'])){echo $_SESSION['stat']; } ?> required>			 
				</div>
			</div><br><br><br>
			<p><font face = "cambria" size = 5 color = "grey"> Resident Price </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input id="controlno1" name = "price" class="form-control input-group-lg reg_name" type="number" min="1" step = any value = <?php if(isset($_SESSION['dblEquipFee'])){echo $_SESSION['dblEquipFee']; } ?> required>			 
				</div>
			</div><br><br><br>
			<p><font face = "cambria" size = 5 color = "grey"> Non-Resident Price</font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input id="controlno1" name = "discount" class="form-control input-group-lg reg_name" type="number" min="1" value = <?php if(isset($_SESSION['discount'])){echo $_SESSION['discount']; } ?> required>			 
				</div>
			</div><br><br><br><br><br>
		   
		   <?php
				echo '<script> a(); </script>';
			?>
	
			<center> <button type="submit" class="btn btn-info" name = "btnEdit" id = "btnEdit"  value = <?php if(isset($_SESSION['contno'])){echo $_SESSION['contno']; } ?>   > Save Record</button>
		<br><br>
			
			<?php
			 if (isset($_POST['btnEdit'])){
				 $strcont = $_POST['btnEdit'];		
				 $intquantity = $_POST['quantity'];
				 $Price = $_POST['price'];
				 $discount= $_POST['discount'];
				require('connection.php');
				  	mysqli_query($con,"Set @a = 2;");
				 $g = mysqli_query($con,"UPDATE tblequipment SET intEquipQuantity = '$intquantity', dblEquipFee = $Price , dblEquipNResidentCharge = $discount WHERE strEquipNo = '$strcont'");
				
				if($g == true){
					 echo "<script>alert('Success');</script>";
					 echo "<script> window.location = 'EquipmentMaintenance.php';</script>";}
					 else{
						 
					 }
			}
				
			 
			?> </form>
			</div>
			</div>
			
			<center>
	<div class="col-sm-9 col-md-6 col-lg-6">
		<div div class = "showback">
			<?php 
				$a= $_SESSION['equipmentCode'];
				//echo "<script>alert $a</script>";
			require('connection.php');
			$sql = "select imageUpload from tblequipment Where strEquipNo = $a ";
			$query = mysqli_query($con, $sql);
			if(mysqli_num_rows($query) > 0){
			$i = 1;
			while($row = mysqli_fetch_assoc($query)){?>
	
				<img src="Images/EquipmentUpload/<?php echo $row['imageUpload']; ?>" width="400px" height="200px">
			<?php  }}?>
			</div>
	</div>
	</center>
			
			
                               <!-- /#page-content-wrapper -->

			
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
