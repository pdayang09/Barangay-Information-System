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

 <legend ><font face = "cambria" size = 8 color = "grey"> Add new Equipment</font></legend>

 <button  class="btn btn-info" onclick="window.location.href='EquipmentMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button><br><br>
	
		<form method = POST>
							<div class="col-sm-9 col-md-6 col-lg-6">
<div class = "showback">
		<p><font face = "cambria" size = 5 color = "grey"> Equipment Name </font></p>
		<div class = "form-group">
			<div class="col-sm-12">
				<input id="controlno" name = "controlno" class="form-control input-group-lg reg_name" type="text"  required>			 
           </div>
		</div><br><br><br>
		
		<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Equipment Category</font></p>
			<div class="col-sm-12">		
			<select class="form-control input-group-lg reg_name" id = "equip" name = "equip">
                <option>Select Category</option>
				<?php
							require('connection.php');
								$sql = "select * from tblcategory where strCategoryType = 'Equipment' ";
								$query = mysqli_query($con, $sql);
					
								if(mysqli_num_rows($query) > 0){
									$i = 1;
									while($row = mysqli_fetch_object($query)){?>
										<option value=<?php echo $row->strCategoryCode ?>><?php echo $row->strCategoryDesc ?></option>
										<?php }} ?>
			</select>
			</div>
		</div><br><br><br>	
	
		<font face = "cambria" size = 5 color = "grey"> Fee </font><br>
		<div class = "form-group">
			<div class="col-sm-12">
				<input id="controlno1" name = "fee"  value="" class="form-control input-group-lg reg_name" type="number" step = any min= 0 value = "0"  required>			 
			</div>
		</div><br><br><br>	
		
		<font face = "cambria" size = 5 color = "grey"> Quantity </font><br>
		<div class = "form-group">
			<div class="col-sm-12">
				<input id="controlno1" name = "quantity"  value="" class="form-control input-group-lg reg_name" type="number" min="1" value = "0" required>			 
			</div>
		</div><br><br><br>	
  <font face = "cambria" size = 5 color = "grey"> Discount </font><br>
		<div class = "form-group">
			<div class="col-sm-12">
				<input id="controlno1" name = "disc"  value="" class="form-control input-group-lg reg_name" type="number" min="0" value = "0" required>			 
			</div>
		</div><br><br><br>	
  
		<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 
		<br><br></center></div></div>
		<!-- DIV FOR TABLE -->
		<div class="col-sm-3 col-md-6 col-lg-6">
		<div class = "showback">
		<table  class="table table-striped table-bordered table-hover" >
		<thead>
		<th>Category Name</th>
		<th>Quantity</th>
		<th>Price</th>
	
		</thead>
		<tbody>
							<?php
					require('connection.php');
				$sql = "select * from tblequipment ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> 
					<td><?php echo $row->strEquipName?></td>
					<td><?php echo $row->intEquipQuantity?></td>
					<td><?php echo $row->dblEquipFee?></td>
				<?php }}?>
		</tbody>
		</table></div>
		</div>
<!-- DIV END-->
		<?php
		 if (isset($_POST['btnAdd'])){
			 $strcont = $_POST['controlno'];
			 $intDisc = $_POST['disc'];
			 $strcategory = $_POST['equip'];
			 $intquantity = $_POST['quantity'];
			 $fee = $_POST['fee'];
				 
			 if($strcont == NULL ||  $strcategory == 'Select Category' ){
				 echo "<script>alert('Please Complete the form');</script>";
			 }
			 else{
				 require('connection.php');
			
				mysqli_query($con,"INSERT INTO `tblequipment`(`strEquipName`, `strEquipCategory`, `intEquipQuantity`, `dblEquipFee`,`dblEquipDiscount`,`strStatus`) VALUES ('$strcont','$strcategory',$intquantity,$fee,$intDisc,'Enabled');");
					 echo "<script>alert('Success');
					 window.location = 'EquipmentMaintenance.php'</script>";
			 }
		}
		?>
</form>
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
