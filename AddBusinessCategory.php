<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
       <section id="main-content">
          <section class="wrapper site-min-height">
		
	  <!--main content start-->  
				 
		<legend ><font face = "cambria" size = 8 color = "grey"> Add Business Category </font></legend> 
		<button  class="btn btn-info" onclick="window.location.href='BusinessCat.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
		<br><br>
<form method = POST>
					
<!-- DIV FOR FORM -->
		<div class="col-sm-9 col-md-6 col-lg-6">
	
  	<div class = 'showback'>	
	<p><font face = "cambria" size = 5 color = "grey"> Business Category Name </font>  </font></p>
	<div class = "form-group">
		   <div class="col-md-12">
		   
	<input id="PDESC1" name="PDESC1" class="form-control input-group-lg reg_name" type="text" name="facName" title="Enter Facility name" required >	
           </div>
	</div><br><br><br>
	

	<p><font face = "cambria" size = 5 color = "grey"> Amount </font></p>
	<div class = "form-group">
		   <div class="col-md-12">
		   
	<input id="PDESC1" name="Amount" class="form-control input-group-lg reg_name" type=number step = any   min = 0 value = 0 name="facName" title="Enter Facility name" required>	
           </div>
	</div><br><br><br>
	

  	<center> <input type="submit" class="btn btn-round btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 	</div>
		
			 <?php
			 if (isset($_POST['btnAdd'])){
				 $strPD = $_POST['PDESC1'];
				  $strtype = $_POST['Amount'];
				
				 if($strPD == NULL ||$strtype == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					 mysqli_query($con,"INSERT INTO `tblBusinessCate`( `strBusCateName`, `dblAmount`,`strStatus`) VALUES ('$strPD','$strtype','Enabled');");
					 echo "<script>alert('Success');
					 window.location = 'BusinessCat.php'</script>";
			 }}
				 ?>
    </center>
	</form>
</div><!--DIV END -->
<!-- DIV FOR TABLE -->
		<div class="col-sm-3 col-md-6 col-lg-6">
		<div class = "showback">
		<table  class="table table-striped table-bordered table-hover" >
		<thead>
		<th>Category Name</th>
		<th>Price</th>
		<th>Status</th>
		</thead>
		<tbody>
							<?php
					require('connection.php');
				$sql = "select * from tblbusinesscate ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> 
					<td><?php echo $row->strBusCateName?></td>
					<td><?php echo $row->dblAmount?></td>
					<td><?php echo $row->strStatus?>
				<?php }}?>
		</tbody>
		</table></div>
		</div>
<!-- DIV END-->
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
