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
 
<legend ><font size = 8 color = "grey"> Add Position Details </font></legend>
		<button  class="btn btn-info" onclick="window.location.href='PositionMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button><br><br>
<div class="col-sm-9 col-md-6 col-lg-6">
	<div class = "showback">
		<form method = POST>
			<p><font face = "cambria" size = 5 color = "grey"> Position Name </font></p>
					<div class = "form-group">
						<div class="col-sm-12">		   
							<input id="DocumentN1"  name="DocumentN1" class="form-control input-group-lg reg_name" type="text" title="Enter Document name" maxlength = 40 required>					 
						</div>
					</div><br><br>		
					
					<font face = "cambria" size = 5 color = "grey"> Number </font></p>
					<div class = "form-group">
						<div class="col-sm-12">		   
						<input id="Price"  name="Price" class="form-control input-group-lg reg_name" type= number title="Enter Document name" value = '0'min = 0 required>					 
						</div>
					</div><br><br>
					<font face = "cambria" size = 5 color = "grey"> View </font></p>
					<div class = "form-group">
						<div class="col-sm-12">		   
						<input id="View"  name="View"  value = "Sec" type= radio> Secretary View <br>
						<input id="View"  name="View"  value = "Kap" type= radio> Barangay Captain View<br>
						<input id="View"  name="View"  value = "Liason" type= radio> Liaison View<br>
						<input id="View"  name="View"  value = "Admin" type= radio> Administrator View<br>
						</div>
					</div><br><br><br><br><br>					
		  
						<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 
					
					<?php
						if (isset($_POST['btnAdd'])){
						 $strDocN = $_POST['DocumentN1'];
						 $strPrice = $_POST['Price'];
						  $strView = $_POST['View'];
						 if($strPrice == NULL){
							 $strPrice = 0;
						 }	
						 if($strPrice == NULL ||$strDocN == NULL){
							 echo "<script>alert('Please Complete the form');</script>";
						 }
						 else{
							 require('connection.php');
							 mysqli_query($con,"insert into tblbrgyposition(`strPositionName`, `intNumber`,`strView`) values ('$strDocN',$strPrice,'$strView');");
							 echo "<script>alert('Success');
							 window.location = 'PositionMaintenance.php'</script>";
					 }}
					?>
						</center>
		</form>
	</div>
</div>
					<!-- DIV FOR TABLE -->
		<div class="col-sm-3 col-md-6 col-lg-6">
			<div class = "showback">
				<table  class="table table-striped table-bordered table-hover" >
					<thead>
						<th>Position Name</th>
						<th>View</th>
						<th>Number</th>
					</thead>
					
					<tbody>
							<?php
							require('connection.php');
							$sql = "select * from tblbrgyposition ";
							$query = mysqli_query($con, $sql);
							if(mysqli_num_rows($query) > 0){
								$i = 1;
								while($row = mysqli_fetch_object($query)){?>
								<tr> 
								<td><?php echo $row->strPositionName?></td>
								<td><?php echo $row->strView?></td>
								<td><?php echo $row->intNumber?></td>
							<?php }}?>
					</tbody>
				</table>
			</div>
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
